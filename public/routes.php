<?php
// define routes
$routes = array(
        array(
        "pattern" => "index",
        "controller" => "home",
        "action" => "index"
    ),
        array(
        "pattern" => "ContactUs",
        "controller" => "home",
        "action" => "contact"
    ),
        array(
        "pattern" =>"Alumni",
        "controller" => "home",
        "action" => "alumni"
    ),
        array(
        "pattern" => "AboutUs",
        "controller" => "home",
        "action" => "about"
    ),
        array(
        "pattern" => "PrivacyPolicy",
        "controller" => "home",
        "action" => "privacy"
    ),
        array(
        "pattern" => "NoticeBoard",
        "controller" => "home",
        "action" => "notice"
    ),
        array(
        "pattern" => "Sports",
        "controller" => "home",
        "action" => "sports"
    ),
        array(
        "pattern" => "Forms",
        "controller" => "forms",
        "action" => "index"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);

?>