<?php
/* Usage:
$secureVars = new secureVars();
 
 */

//Defined regexps (you can add your own ones).
define('REG_DIGIT_UNSIGNED', '^[[:digit:]]+$');
define('REG_WORD'          , '^[[:alpha:]]+$');
define('REG_TEXT'          , '^[[:alpha:][:blank:]]+$');

error_reporting(0); //Comment before deploying

final class secureVars{
  private $tmp;

  //Check if the variable is set.
  private function cisSet(&$field){
    if(isset($_REQUEST[$field]))
      return true;
    else
      throw new Exception("The $field field is empty.");
  }
  
  //Set $tmp and remove threatening characters.
  private function removeCharsThreats(&$field){
    $this->tmp = trim($_REQUEST[$field]);
    $this->tmp = htmlspecialchars($_REQUEST[$field], ENT_QUOTES, 'UTF-8', false); 
  }

  /* Checks if the value respects the   defined regexp,
  and if its length is not superior than the given maxlength. */
  public function secText($field, $maxlength, $regexp){
    if($this->cisSet($field)){
      $this->removeCharsThreats($field);
      if(!mb_ereg($regexp, $this->tmp))
        throw new Exception("Unallowed characters in $field field.");
      elseif(mb_strlen($this->tmp, 'UTF-8') > $maxlength)
        throw new Exception("Too long string length for $field field.");
      else
        return $this->tmp;
    }
  }
}

?>