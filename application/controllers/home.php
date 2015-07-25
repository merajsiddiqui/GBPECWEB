<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use framework\Registry as Registry;
use framework\RequestMethods as RequestMethods;

class Home extends Controller {

    public function index() {
        $view = $this->getActionView();     
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
        $notice = Notice::all(array("for_user =?"=>1, "active = ?"=>1), array("id", "title", "event_date", "content", "for_user"), "id", "desc", 5, 1);
        $view->set("notice", $notice);
    }
    public function contact() {

        $view = $this->getActionView();  
             
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        $view->set("errors", array());



        if(RequestMethods::post("action")=="contact")
        {
            $name = RequestMethods::post("name");
            $email = RequestMethods::post("email");
            $mobile = RequestMethods::post("mobile");
            $address = RequestMethods::post("address");
            $dept = RequestMethods::post("department");
            $message = RequestMethods::post("message");
            $subject = RequestMethods::post("subject");
            if($this->validate_email($email) && $this->Validate_mobile($mobile))
            {
                $query = new Query(array("name"=>$name, "email"=>$email, "mobile" =>$mobile, "subject"=>$subject, "message"=>$message, "department"=>$dept, "address"=>$address));
                if($query->validate()){
                    
                    $query->save();
                    $view->set("success", "Your Qury has been successfully submitted. Our Respective department will contact you soon. Our working days are Monday to Friday");
                }
                $view->set("errors", $query->getErrors());
             }
             if(!$this->validate_email($email))
             {
                $view->set("emailw", "Inavlid Email Address");
             }
             if(!$this->Validate_mobile($mobile))
             {
                $view->set("mobilew", "Invalid mobile Number");
             }
        }
    }
    public function about() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
    }
    public function privacy() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function sports() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function alumni() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));
        
    }
    public function notice() {
        $view = $this->getActionView();       
        $this->getLayoutView()->set("seo", framework\Registry::get("seo"));

        if(RequestMethods::get("click")=="true"){
            $id = RequestMethods::get("notice_id");
            $user = RequestMethods::get("user_type");

            $note = Notice::first(array("id =?"=>$id, "for_user =?"=>$user));
            $view->set("note", $note);
        }
    }
    protected function validate_email($email)   
    {
        $_email = explode("@", $email);
        if(array_key_exists(1, $_email)){
            $_url = "www.".$_email[1];
            $result = checkdnsrr($_url);
            if($result)
            {
                define('PATTERN', '/^[\-\*\w\d\.]+$/');
                return preg_match(PATTERN, $_email[0]) ? true : false;
            }
        }
        else{
            return false;
        }   
    }

    protected function Validate_mobile($mobile){
        if(empty($mobile))
        {
            return false;
        }
        if(!empty($mobile))
        {
                if((strlen($mobile)==10 && preg_match("/^[0-9]{10}$/", $mobile)))
                {
                    return false;
                }
                else{return false;}
        }
    }
 
}
