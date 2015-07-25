<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use framework\Registry as Registry;
use framework\RequestMethods as RequestMethods;

class Course extends Controller {

    public function ece() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }
    public function cse() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function mae() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    
}
