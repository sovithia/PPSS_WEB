<?php 

require_once 'RestEngine.php';

require_once 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

/**************CORE ***************/



// Month
// Year 
$app->get('/percentageincrease',function(Request $request,Response $response) { 

	$json = json_decode($request->getBody(),true);
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


// User 
// Month 
// Year
// Number of AP Produced per month by user
$app->get('/apquantity', function(Request $request,Response $response) {
});



// User
// Row
// Month
// Year
$app->get('/saleincreasebyrow', function(Request $request,Response $response) {
});


// Row
// Month 
// Year
$app->get('/nonfreshwaste', function(Request $request,Response $response) {
});


// Month 
// Year
$app->get('/zerosalecleaned', function(Request $request,Response $response) {
});


// Month 
// Year
$app->get('/freshsaleincrease', function(Request $request,Response $response) {
});

// Month
// Year
$app->get('/freshwaste', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/poreceived', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/latepo', function(Request $request,Response $response) {
});

// Month 
// Year
// User
$app->get('/nbpriceincrease', function(Request $request,Response $response) {
});


// Month
// Year
$app->get('/itemadjustedqty', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/creditnote', function(Request $request,Response $response) {
});


// Month
// Year
$app->get('/negativeprofit', function(Request $request,Response $response) {
});


// Month
// Year
// User
$app->get('/purchasepriceincrease', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/purchasepricedecrease', function(Request $request,Response $response) {
});


// Month
// Year
// User
$app->get('/latedelivery', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/itemstransferred', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/wrongpo', function(Request $request,Response $response) {
});

// Month
// Year
// User
$app->get('/lateattendance', function(Request $request,Response $response) {
});







?>