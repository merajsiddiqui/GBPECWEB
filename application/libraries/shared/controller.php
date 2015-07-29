<?php

/**
 * Subclass the Controller class within our application.
 *
 * @author Meraj Ahmad Siddiqui
 */

namespace Shared {

    use Framework\Events as Events;
    use Framework\Router as Router;
    use Framework\Registry as Registry;

    class Controller extends \Framework\Controller {

        /**
         * @readwrite
         */
        protected $_user;

        public function seo($params = array()) {
            $seo = Registry::get("seo");
            foreach ($params as $key => $value) {
                $property = "set" . ucfirst($key);
                $seo->$property($value);
            }
            $params["view"]->set("seo", $seo);
        }
        
        protected function checkData($data) {
            return empty($data)? "" : $data;
        }

        /**
         * @protected
         */
        public function _secure() {
            $user = $this->getUser();
            if (!$user) {
                header("Location:/admissions");
                exit();
            }
        }
        
        protected function read($options = array()) {
            $model = $options["model"];
            
            $r = new \ReflectionClass(ucfirst($model));
            $object = $r->newInstanceWithoutConstructor()->first($options["where"]);
            if ($object) {
                return $object;
            } else {
                return FALSE;
            }
        }

        public static function redirect($url) {
            header("Location: {$url}");
            exit();
        }
        
        public function setUser($user) {
            $session = Registry::get("session");
            if ($user) {
                $session->set("user", $user);
            } else {
                $session->erase("user");
            }
            $this->_user = $user;
            return $this;
        }

        public function __construct($options = array()) {
            parent::__construct($options);
            
            //$this->setRedirect();
            // connect to database
            $database = Registry::get("database");
            $database->connect();
            
            // schedule: load user from session           
            Events::add("Framework.router.beforehooks.before", function($name, $parameters) {
                $session = Registry::get("session");
                $controller = Registry::get("controller");
                $user = $session->get("user");
                if ($user) {
                    $controller->user = $user;
                }
            });

            // schedule: save user to session
            Events::add("Framework.router.afterhooks.after", function($name, $parameters) {
                $session = Registry::get("session");
                $controller = Registry::get("controller");
                if ($controller->user) {
                    $session->set("user", $controller->user);
                }
            });

            // schedule: disconnect from database
            Events::add("Framework.controller.destruct.after", function($name) {
                $database = Registry::get("database");
                $database->disconnect();
            });
        }

        /**
         * Checks whether the user is set and then assign it to both the layout and action views.
         */
        public function render() {
            /* if the user and view(s) are defined, 
             * assign the user session to the view(s)
             */
            if ($this->user) {
                if ($this->actionView) {
                    $key = "user";
                    if ($this->actionView->get($key, false)) {
                        $key = "__user";
                    }
                    $this->actionView->set($key, $this->user);
                }
                if ($this->layoutView) {
                    $key = "user";
                    if ($this->layoutView->get($key, false)) {
                        $key = "__user";
                    }
                    $this->layoutView->set($key, $this->user);
                }
            }
            parent::render();
        }

    }

}
