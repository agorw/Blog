<?php

namespace Core\Table;

use Core\Database\MysqlDatabase;

class Table
{

    protected $table;
    protected $db;
    protected $name_id='id';

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
        if (is_null($this->table)) {
            $result = explode('\\', get_class($this));
            $class_name = end($result);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

    public function all()
    {
        return $this->query("SELECT * FROM " . $this->table);
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM " . $this->table . " WHERE ".$this->name_id." = ?", [$id], true);
    }

    public function lists($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function update($id, $tab = [])
    {
        $str = [];
        $attributes = [];
        foreach ($tab as $key => $value) {
            $str[] = "$key = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $set = implode(', ', $str);
        return $this->query("UPDATE " . $this->table . " SET " . $set . " WHERE ".$this->name_id." = ?", $attributes, true);
    }

    public function delete($id)
    {
        return $this->query("DELETE FROM " . $this->table . "  WHERE ".$this->name_id." = ?", [$id], true);
    }

    public function create($tab)
    {
        $str = [];
        $attributes = [];
        foreach ($tab as $key => $value) {
            $str[] = "$key = ?";
            $attributes[] = $value;
        }
        $set = implode(', ', $str);
        return $this->query("INSERT INTO " . $this->table . " SET " . $set . " ", $attributes, true);
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare($statement, $attributes, str_replace('Table', 'Entitie', get_class($this)), $one);
        } else {
            return $this->db->query($statement, str_replace('Table', 'Entitie', get_class($this)), $one);
        }
    }
}
