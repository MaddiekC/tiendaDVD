<?php
//1
class conn {
    // Atributos
    private $usr = "root";
    private $pwd = "";
    private $dbcon = null;
    private $url = "mysql:host=localhost:3307;dbname=peliculas";
    private $error = null;
    
    public function conectar() {
        try {
            $this->dbcon = new PDO($this->url, $this->usr, $this->pwd);
            $this->dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
    
    public function getDbCon() {
        return $this->dbcon;
    }
    
    public function getError() {
        return $this->error;
    }
}
?>
