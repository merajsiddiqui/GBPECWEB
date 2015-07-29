<?php

/**
 * Controller to all Public Request such as contact, about etc
 *
 * @author Meraj Ahmad Siddiqui
 */
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Admissions extends Controller {

    public function index() {
    	
        $this->changeLayout();
        $this->seo(array("title" => "GBPEC::Apply Online","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        if(RequestMethods::post("action")=="apply"){
            $sname = RequestMethods::post("name");
            $email = RequestMethods::post("email");
            $password = RequestMethods::post("password");

            $allready = ApplicationForm::first(array("student_email = ?"=>$email));
            if($allready){
                $view->set("allready", "{$allready->student_name} It seems that you have allready Registered for Application. ");

            }else{
                $application_form = new ApplicationForm(array("student_name = ?"=>$name, "student_email = ?"=>$email, "password =? "=>sha1($password)));
                if($application_form->validate()){
                    $application_form->save();
                }
            }
        }
        if(RequestMethods::post("action")=="app_status"){

        }

     }
     /**
     *
     *@before _secure
     *
     */
     public function application() {
        
        $this->changeLayout();
        $this->seo(array("title" => "GBPEC::Apply Online","keywords" => "admin","description" => "admin", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
     }

    protected function changeLayout() {
        $this->defaultLayout = "layouts/form";
        $this->setLayout();
        }


}