<?php
    class View {
        
        public function __construct() {
            ;
        }

        public function show($viewName, $vars = array()) {
            $config = Config::singleton();
            $path = $config->get('viewFolder') . $viewName;

            if (is_file($path) == FALSE) {
                trigger_error('Page ' . $path . ' - 404 Not found', E_USER_NOTICE);
                return FALSE;
            }

            if (is_array($vars)) {
                foreach ($vars as $key => $value) {
                    $key = $value;
                }
            }
            include $path;
        }

        public function convert($vars = array()) {
            if (is_array($vars)) {
                foreach ($vars as $key => $value) {
                    $key = $value;
                }
            }
        }
    }
?>
