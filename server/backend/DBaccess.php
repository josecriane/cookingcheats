<?php
include ('config.php');

//Revise all functions

class DBaccess {
    private $bd;
    private $error_number;
    private $error_text;
  
    // Class constructor
    public function __construct () {
        $this->bd = @new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
        if (mysqli_connect_errno()==0) {
            $this->error_number = 0;
            $this->error_text = "";
        } else {
            $this->error_number = mysqli_connect_errno();
            $this->error_text = mysqli_connect_error();
        }
    }
  
    // Class destroyer
    public function __destruct() {
        $this->bd->close();
    }
  
    public function getErrorNumber () {
        return $this->error_number;
    }
  
    public function getErrorText () {
        return $this->error_text;
    }

    /*  Execute a modification sql query in database
        returns the number of row affected, or false if it fails. */ 
    public function ejecutarAccion ($query) {
        $result = @$this->bd->query($query);
        if ($result) {
            $this->error_number = 0;
            $this->error_text = "";
            return $this->bd->affected_rows;
        } else { // query fails
            $this->error_number = $this->bd->mysqli_errno;
            $this->error_text = $this->bd->mysqli_error;
            return $result;
        }
    }
  
    /*  Execute a select sql query in database
        returns a array, of false if it fails. */
    public function obtenerDatos($query) {
        $result = @$this->bd->query($query);
        if ($result) {
            $this->error_number = $this->bd->errno;
            $this->error_text = $this->bd->error;
            for($i=0; $i<$result->num_rows; $i++)
                $return[$i] = $result->fetch_assoc();
        } else { // query fails
            $this->error_number = $this->bd->errno;
            $this->error_text = $this->bd->error;
            $return = false;
        }
        return $return;
    }
}
?>