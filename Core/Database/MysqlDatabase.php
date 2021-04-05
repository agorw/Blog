<?php

namespace Core\Database;

use \pdo;

class MysqlDatabase extends Database
{

    private $db_name;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $pdo;
    public function __construct($db_name = 'agorw', $db_host = 'localhost', $db_user = 'root', $db_pass = 'root')
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_user = $db_user;
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);
                if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
        return $req;
        }
        ($class_name === null) ?
            $req->setFetchMode(PDO::FETCH_OBJ)
            :
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $param, $class_name = null, $one = false)
    {
        $rep = $this->getPDO()->prepare($statement);
        $res = $rep->execute($param);
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
        return $res;
        }
        ($class_name === null) ?
            $rep->setFetchMode(PDO::FETCH_OBJ)
            :
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one) {
            $datas = $rep->fetch();
        } else {
            $datas = $rep->fetchAll();
        }
        return $datas;
    }

    public function lastInsertId(){
        $this->getPDO()->lastInsertId();
    }
}
