<?php

$router = new AltoRouter;
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
// $match = $router->match();

// if($match) {
//     // var_dump($match); exit;
//     list($controller, $method) = explode('@', $match['target']);
//     echo $controller . "<br/>";
//     echo $method . "<br/>";
    
//      require_once __DIR__.'/../controllers/BaseController.php';
//      require_once __DIR__.'/../controllers/IndexController.php';
//     if(is_callable(array(new $controller, $method))) {
//         // echo "Yes, it is callable";
//         call_user_func_array(array(new $controller, $method), array($match['params']));
                
//     }else {
//         echo "The method {$method} is not defined in {$controller}";
//     }
     
// //    // echo 'This is ABOUT US page';
// //    require_once __DIR__.'/../controllers/BaseController.php';
// //    require_once __DIR__.'/../controllers/IndexController.php';
// //    $index = new \App\Controllers\IndexController();
// //    $index->show();
// } else {
//     header($_SERVER['SERVER_PROTOCOL'].'404 Not Found');
//     echo "Page cannot be found";
// }
// // // var_dump($match);
