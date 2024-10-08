<?php
require 'vendor/autoload.php';
use Plg\MyMoneyExpenseTracker\Service\Authentication\Authentication;
use Plg\MyMoneyExpenseTracker\Service\Route\Route;

/*var_dump($val->minLength(5)->isInteger()->validated());
var_dump($val->getErrors());
var_dump($_SESSION);
*/
$route= new Route();
$route->get('/','Plg\\MyMoneyExpenseTracker\\Controllers\\UserController.index');
$route->get('/dashboard','Plg\\MyMoneyExpenseTracker\\Controllers\\UserController.dashboard');
$route->post('/user/store','Plg\\MyMoneyExpenseTracker\\Controllers\\UserController.store');


$route->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

/*foreach($_SERVER as $key=>$data){
    echo "$key=>$data";
    echo "<br>";
}*/
?>
