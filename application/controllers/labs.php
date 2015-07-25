<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use framework\Registry as Registry;
use framework\RequestMethods as RequestMethods;

class Labs extends Controller {

    public function vlsi() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }
    public function cslab() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function microwave() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function dsplab() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function eclab() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function setantena() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function networking() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function cybersecurity() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    
}
