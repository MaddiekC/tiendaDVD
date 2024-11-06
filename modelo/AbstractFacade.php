<?php
//2
require_once("conn.php");

class AbstractFacade extends conn{
    protected $Entity;
    
    function __construct($entity) {
        $this->Entity = $entity;
    }
    
    public function findAll() {
        try {
            if (!$this->conectar()) {
                return "Error : " . $this->getError();
                exit;
            }
            $query = "select * from " . $this->Entity;
            $rst = $this->getDbCon()->prepare($query);
            $rst->execute();
            $result = $rst->fetchAll();
            return $result;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    
    public function add($datos) {
        try {
            if (!$this->conectar()) {
                return "Error : " . $this->getError();
                exit;
            }
            // Forma el query de inserción
            $sql = "INSERT INTO $this->Entity (";
            foreach($datos as $clave=>$valor) {
                $sql .= $clave . ",";
            }
            $sql = substr($sql, 0, strlen($sql) - 1) . ") VALUES (";
            foreach($datos as $clave=>$valor) {
                $sql .= ":" . $clave . ",";
            }
            $sql = substr($sql, 0, strlen($sql) - 1).")";
            $stmt = $this->getDbCon()->prepare($sql);
            foreach($datos as $clave=>$valor) {
                $clave= ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            
            // execute the insert statement
            $stmt->execute();
            return "Datos insertados...";
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    
    public function update($datos, $filtro) {
        try {
            if (!$this->conectar()) {
                return "Error : " . $this->getError();
                exit;
            }
            // Forma el query de inserción
            $sql = "update $this->Entity set ";
            foreach($datos as $clave=>$valor) {
                $sql .= "$clave = :$clave,";
            }
            $sql = substr ($sql, 0, strlen($sql) - 1) . " where ";
            foreach($filtro as $clave=>$valor) {
                $sql .= "$clave = :$clave and ";
            }
            $sql = substr ($sql, 0, strlen($sql) - 4);
            #echo $sql;
            $stmt = $this->getDbCon()->prepare($sql);
            foreach($datos as $clave=>$valor) {
                $clave= ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            foreach($filtro as $clave=>$valor) {
                $clave= ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            // execute the insert statement
            $stmt->execute();
            return "Datos actualizados...";
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function delete($datos, $filtro) {
        try {
            if (!$this->conectar()) {
                return "Error : " . $this->getError();
                exit;
            }
            // Forma el query de inserción
            $sql = "delete from $this->Entity ";
            #foreach($datos as $clave=>$valor) {
            #    $sql .= "$clave = :$clave,";
            #}
            $sql = substr ($sql, 0, strlen($sql) - 1) . " where ";
            foreach($filtro as $clave=>$valor) {
                $sql .= "$clave = :$clave and ";
            }
            $sql = substr ($sql, 0, strlen($sql) - 4);
             
            $stmt = $this->getDbCon()->prepare($sql);
            foreach($datos as $clave=>$valor) {
                $clave= ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            foreach($filtro as $clave=>$valor) {
                $clave= ':' . $clave;
                $stmt->bindValue($clave, $valor);
            }
            // execute the delete statement
            $stmt->execute();
            return "Datos eliminados...";
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
?>
