<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Events extends Controller {

    public function inceptum() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }
    public function Ambrosia() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function Fantasia() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function Fortius() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    
}
