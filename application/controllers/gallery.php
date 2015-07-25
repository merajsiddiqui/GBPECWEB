<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use framework\Registry as Registry;
use framework\RequestMethods as RequestMethods;

class Gallery extends Controller {

    public function CollegeInfraStructure() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }
    public function Events() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function workshopsseminars() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    
}
