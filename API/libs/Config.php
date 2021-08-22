<?php

    class Config {

        private $vars;
        private static $instance;

        private function __construct() {
            $this->vars = array();
        }

        public function set($attributeName, $value) {
            if (!isset($this->vars[$attributeName])) {
                $this->vars[$attributeName] = $value;
            }
        }

        public function get($attributeName) {

            if (isset($this->vars[$attributeName])) {
                return $this->vars[$attributeName];
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