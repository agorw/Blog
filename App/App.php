<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App
{

    public $title = 'Agorw.fr';
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/App/Autoloader.php';
        Agorw\Autoloader::register();
        require ROOT . '/Core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable(string $name)
    {
        $class_name = '\\Agorw\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDB());
    }

    public function getDB()
    {
        if (is_null($this->db_instance)) {
            $config = Config::getInstance(ROOT . '/Config/Config.php');
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
        }
        return $this->db_instance;
    }

}
