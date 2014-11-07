<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use Aura\Router\RouterFactory;
use Aura\Dispatcher\Dispatcher;

// Router
$router_factory = new RouterFactory();
$router = $router_factory->newInstance();

// Dispatcher
$dispatcher = new Dispatcher;
// Which parameter specifies the controller
$dispatcher->setObjectParam('controller');
// Which parameter specifies the method
$dispatcher->setMethodParam('action');

$router->addGet('home', '/')
    ->setValues([
        'controller' => 'home_controller',
    ]);

$dispatcher->setObject('home_controller', function () {
    echo "Hello World!";
});

$router->addGet('hello', '/hello{/name}')
    ->setValues(array(
        'controller' => 'hello_controller'
    ));

$dispatcher->setObject('hello_controller', function ($name = "aura") {
    echo "Hello " . htmlentities(ucfirst($name), ENT_QUOTES, "UTF-8");
});

$router->add('contact', '/contact')
    ->setValues(array(
        'controller' => 'contact_controller'
    ))
    ->addServer(array(
        'REQUEST_METHOD' => 'GET|POST',
    ));

$dispatcher->setObject('contact_controller', function ($post, $query, $server) {
    return new ContactController($post, $query, $server);
});

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = $router->match($path, $_SERVER);

if ($route) {
    $params = $route->params;
    $params['post'] = $_POST;
    $params['query'] = $_GET;
    $params['server'] = $_SERVER;
    $result = $dispatcher->__invoke($params);
} else {
    // not found
$content = <<<EOL
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>0hh Website Template | Home :: W3layouts</title>
        <meta name="keywords" content="404 iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
    </head>
    <body>
        <!--start-wrap--->
        <div class="wrap">
            <!---start-header---->
                <div class="header">
                    <div class="logo">
                        <h1><a href="/">Ohh</a></h1>
                    </div>
                </div>
            <!---End-header---->
            <!--start-content------>
            <div class="content">
                <img src="images/error-img.png" title="error" />
                <p><span><label>O</label>hh.....</span>You Requested the page that is no longer There.</p>
                <a href="#">Back To Home</a>
                <div class="copy-right">
                    <p>&#169 All rights Reserved | Designed by <a href="http://w3layouts.com/">W3Layouts</a></p>
                </div>
            </div>
            <!--End-Cotent------>
        </div>
        <!--End-wrap--->
    </body>
</html>
EOL;
    echo $content;
}
