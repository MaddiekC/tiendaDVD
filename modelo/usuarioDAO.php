<?php
//3
require_once("AbstractFacade.php");

class usuarioDAO extends AbstractFacade {
    function __construct() {
        $this->Entity = "listado";
    }
    
    public function findByNick($nombre) {
        try {
            
            if (!$this->conectar()) {
                return "Error : " . $this->getError();
                exit();
            }
            $query = "select * from $this->Entity where nombre = '". $nombre . "'";
            $rst = $this->getDbCon()->prepare($query);
            $rst->execute();
            $result = $rst->fetch();
            return $result;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    
 

    
}
?>
