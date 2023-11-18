<?php

use App\Core\Config\Config;
use App\Core\Database\MysqlDatabase;


class App {

    private static $_instance;
    private $title;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function setTitle($title)
    {
        $this->title = "KabaBlog";
    }

    public function getDB() 
    {
        $config = Config::getInstance('../App/Config/config.php');
        return new MysqlDatabase($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
    }

    public function getTable($table) 
    {
        $class_name = ucfirst($table) . 'Table';
        $class_name = 'App\\Table\\' . $class_name;
        return new $class_name($this->getDB());
    }

    public function getDbAuth($class_name)
    {
        $class = 'Auth' . ucfirst($class_name);
        $class = 'App\\Core\\DbAuth\\' . $class;
        return new $class($this->getDB());
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function load()
    {
        session_start();
        require dirname(__DIR__). '/vendor/autoload.php';
    }
}