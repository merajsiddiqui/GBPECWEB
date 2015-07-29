<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Society extends Controller {

    public function ingenium() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
    public function sae() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function samidha() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function gbpecieee() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    
}
