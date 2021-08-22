<?php

class Config {

    private $vars;
    private static $instance;

    private function __construct() {
        $this->vars = array();
    }

    public function set($attribute_name, $value) {
        if (!isset($this->vars[$attribute_name])) {
            $this->vars[$attribute_name] = $value;
        }
    }

    public function get($attribute_name) {

        if (isset($this->vars[$attribute_name])) {
            return $this->vars[$attribute_name];
        }
    }

    public static function singleton() {
        if (!isset(self::$instance)) {
            $tmpClass = __CLASS__;
            self::$instance = new $tmpClass;
        }
        return self::$instance;
    }
}
?>
