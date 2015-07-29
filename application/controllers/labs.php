<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Labs extends Controller {

    public function vlsi() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
    public function cslab() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function microwave() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function dsplab() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function eclab() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function setantena() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function networking() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    public function cybersecurity() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
        
    }
    
}
