<?php
require 'vendor/autoload.php';
use Plg\MyMoneyExpenseTracker\Service\Authentication\Authentication;
use Plg\MyMoneyExpenseTracker\Service\Authentication\Validation;

use Plg\MyMoneyExpenseTracker\Service\Route\Route;

$reg=new Authentication;
$reg->login("xp2@mail.com","ashshshs");
$arr=[2,2,3,3,3,3,3,3,3,3,3,33];
$val=new Validation('input',9.0);
/*var_dump($val->minLength(5)->isInteger()->validated());
var_dump($val->getErrors());
var_dump($_SESSION);
*/
$route= new Route();
$route->get('/search','Plg\\MyMoneyExpenseTracker\\Controllers\\UserController.index');

$route->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);

/*foreach($_SERVER as $key=>$data){
    echo "$key=>$data";
    echo "<br>";
}*/
?>
