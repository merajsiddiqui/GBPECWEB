<?php
ob_start();
define("DEBUG", TRUE);

// 1. define the default path for includes
define("APP_PATH", str_replace(DIRECTORY_SEPARATOR, "/", dirname(__FILE__)));
define("APP", "http://localhost/GBPECAPP/");
define("URL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define("CDN", "http://localhost/GBPECAPP/public/assets/");
define("LOGO", "1431");

try {

    // library's class autoloader
    spl_autoload_register(function($class) {
        $path = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        $file = APP_PATH . "/application/libraries/{$path}.php";

        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    });
    
    // 2. load the Core class that includes an autoloader
    require("framework/core.php");
    framework\Core::initialize();
    
    $datetime = new DateTime();
    date_default_timezone_set('Asia/Kolkata');

    // plugins
    $path = APP_PATH . "/application/plugins";
    $iterator = new DirectoryIterator($path);

    foreach ($iterator as $item) {
        if (!$item->isDot() && $item->isDir()) {
            include($path . "/" . $item->getFilename() . "/initialize.php");
        }
    }

    // 3. load and initialize the Configuration class 
    $configuration = new framework\Configuration(array(
        "type" => "ini"
    ));
    framework\Registry::set("configuration", $configuration->initialize());
    
    // 4. load and initialize the Database class – does not connect
    $database = new framework\Database();
    framework\Registry::set("database", $database->initialize());
    
    // 5. load and initialize the Cache class – does not connect
    $cache = new framework\Cache();
    framework\Registry::set("cache", $cache->initialize());

    // 6. load and initialize the Session class 
    $session = new framework\Session();
    framework\Registry::set("session", $session->initialize());

    // 7. load the Router class and provide the url + extension
    $router = new framework\Router(array(
        "url" => isset($_GET["url"]) ? $_GET["url"] : "cron/index",
        "extension" => !empty($_GET["extension"]) ? $_GET["extension"] : "html"
    ));
    framework\Registry::set("router", $router);

    // include custom routes 
    include("public/routes.php");
    // 8. dispatch the current request 
    $router->dispatch();

    // 9. unset global variables
    unset($configuration);
    unset($database);
    unset($cache);
    unset($session);
    unset($router);
} catch (Exception $e) {

    // list exceptions
    $exceptions = array(
        "500" => array(
            "framework\Cache\Exception",
            "framework\Cache\Exception\Argument",
            "framework\Cache\Exception\Implementation",
            "framework\Cache\Exception\Service",
            "framework\Configuration\Exception",
            "framework\Configuration\Exception\Argument",
            "framework\Configuration\Exception\Implementation",
            "framework\Configuration\Exception\Syntax",
            "framework\Controller\Exception",
            "framework\Controller\Exception\Argument",
            "framework\Controller\Exception\Implementation",
            "framework\Core\Exception",
            "framework\Core\Exception\Argument",
            "framework\Core\Exception\Implementation",
            "framework\Core\Exception\Property",
            "framework\Core\Exception\ReadOnly",
            "framework\Core\Exception\WriteOnly",
            "framework\Database\Exception",
            "framework\Database\Exception\Argument",
            "framework\Database\Exception\Implementation",
            "framework\Database\Exception\Service",
            "framework\Database\Exception\Sql",
            "framework\Model\Exception",
            "framework\Model\Exception\Argument",
            "framework\Model\Exception\Connector",
            "framework\Model\Exception\Implementation",
            "framework\Model\Exception\Primary",
            "framework\Model\Exception\Type",
            "framework\Model\Exception\Validation",
            "framework\Request\Exception",
            "framework\Request\Exception\Argument",
            "framework\Request\Exception\Implementation",
            "framework\Request\Exception\Response",
            "framework\Router\Exception",
            "framework\Router\Exception\Argument",
            "framework\Router\Exception\Implementation",
            "framework\Session\Exception",
            "framework\Session\Exception\Argument",
            "framework\Session\Exception\Implementation",
            "framework\Template\Exception",
            "framework\Template\Exception\Argument",
            "framework\Template\Exception\Implementation",
            "framework\Template\Exception\Parser",
            "framework\View\Exception",
            "framework\View\Exception\Argument",
            "framework\View\Exception\Data",
            "framework\View\Exception\Implementation",
            "framework\View\Exception\Renderer",
            "framework\View\Exception\Syntax"
        ),
        "404" => array(
            "framework\Router\Exception\Action",
            "framework\Router\Exception\Controller"
        )
    );

    $exception = get_class($e);

    // attempt to find the approapriate template, and render
    foreach ($exceptions as $template => $classes) {
        foreach ($classes as $class) {
            if ($class == $exception) {
                header("Content-type: text/html");
                include(APP_PATH . "/application/views/layouts/errors/{$template}.php");
                exit;
            }
        }
    }

    // log or email any error
    // render fallback template
    header("Content-type: text/html");
    echo "An error occurred.". $e;
    exit;
}
?>

