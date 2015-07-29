<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Gallery extends Controller {

    public function CollegeInfraStructure() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
    public function Events() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function workshopsseminars() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    
}
