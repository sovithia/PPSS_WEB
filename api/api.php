<?php

/*

                            ,╓╗▄▒▒▓▓▓▓▓▓▓▓▓▓▓▓▒▒▄╗╦,
                       ╓▄▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▄╦
                   ╔▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▄
               ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▄
             ╔▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▄
           #▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▄
         ▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▄
       ╔▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▓▀▀▀▒▌║║╬░▌ ▀▓▓▓▓▓▓▀▀▀▓▀"║▀▓▓▓▓▓▓▄
      ╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▓▀░▀╠╣░░░░▓░╣▒▒▒▒╣▀▀▀ `▒Γ,▄ ▀ ]▓ ╢ ▒ ╣▓▓▓▓▓▓▌
    ,▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌`   ╫▌╣╬╣╣╣▒▒╝▀▓▓▀`▄╙▀L ╣▄`"▀▌ ▓ ▀▀┘╔▌ ▓▓▄╓╖╣▓▓▓▓▓▓▓▓▓╕
   ╒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌  "╙▀▓Γ╫▓ ╫╕ ▒▒ ╟ ╓▄æâ▌ ▓▌░ ╔▓╦╣▓▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╕
  .▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▒▒╕ ║╕"▀ ║▌ "`,╣▓▄▄▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╕
  ▓▓▓▓▓▀▀▀"╙     ╙▀▓▓▄  ,╔▓▓▒▄▒▓▓ ║▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀"`"▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
 ╣▓▓▓▓▌  ,╓╦╦▄▒▒╦  ╙▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄▓▓▓▓▓▓▓▀▀▀▀╙``        ,,  ║▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌
 ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌  ╙▓▓▓▓▓▓▓▓▓▀▀▀▀╙"^         ,╓╗▄ê▒  ║▓▓▓▌  ╫▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
║▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌  ╙▀"╙         ,,  %▒▒▓▓▌  ╙▀▀▀""         ╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌
╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌   ,╦╗▄▄  ║▓▓▓▀▀   "`        ,,╓   ▒▒▓Γ  ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌
▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌  ╙▀▀╙"           ╓╖╦▄▒∩  ▓▓▓▀▀   ``    ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀╙"`        ,,╖  ]▒▓▓▓▓  ╘▀▀╙"           ╓╦╗  ]▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
╣▓▓▓▓▓▓▓▓▓▓▌  ,,╔╗▄ê▒▓▌  ║▓▀▀─  "         ,╓µ  %▒▓▓▓▌  ▀▀▀  ║▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
║▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▌"           ╗▄▒▒▓  ╘▓▀▀▀   "           ╟▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌
╘▓▓▓▓▓▓▓▓▌`        ╓▓▄▄#▄  ║▓▓▌  ╙▀╙"`          ╖╦▄▒▒  ╫▓▌  ╫▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╛
 ╣▓▓▓▓▓▓▓▓▄▄▒▒▓▓▓▓▓▀▀▀▀╙"         ,,╓╦▄   ▓▓▓▌  ▀▀▀"`       ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓
 ╘▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌    ,,╓╗╕  ╣▓▓  ╘▀▀▀▀"          ,╓╦╗▄▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓Γ
  ╙▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╕          ,,╔╗▄▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀
   ║▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓   #▒▒▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀╙``       ,▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀
    ╙▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╕  ╙▀▀▀▀▀╙"^        ,╓╔╗▄▒▒▒▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀
     ╙▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌╦     ,,µ╗╗ê▒▒▓▓▓▓▓▓▓▀░░░░░░░▀▓▓▓▓▓▓▓▓▓▓▓▓▓Θ
       ▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀░░▀▓▓▓▓▓▓▓▓▓▓▓▌░░╣▓▓▓╬░░▓▓▓▓▓▓▓▓▓▓▓▀
        ╙▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀░░░▄░░░░▓▓▓▓▓▓▓▓▓▌░░╣▓▓▓▌░░▒▓▓▓▓▓▓▓▓▓┘
          ╙▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌░░╣▓▓▓▌░░║▓▓▓▓▓▓▓▓▓▒░░░░░░░╣▓▓▓▓▓▓▓▓▀
            ╙▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░▀▓▀░░░▓▓▓▓▓▓▓▓▓▓▓▓▓▒╣╣▓▓▓▓▓▓▓▓▀"
               ▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬░░░░░╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀
                  ╙▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀
                     `▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀"
                          `╙▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀╙`
*/




//require_once 'src/vendor/autoload.php';
require_once 'vendor/autoload.php';
require_once 'RestEngine.php';
require_once 'functions.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

$URL = "http://phnompenhsuperstore.com/api/api.php/picture/";

/**************CORE ***************/


/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   	  SETUP 
								   	  SETUP
								   	  SETUP                               */


function getModules($role)
{
	$db = getInternalDatabase();
	$sql = "SELECT * FROM ROLE WHERE name = ?";
	$getItems=$db->prepare($sql);
	
	$getItems->execute(array($role) ); 
	$role = $getItems->fetch(PDO::FETCH_ASSOC);
	return $role["modules"];	
}

function getUserSession($login,$password)
{
    $db = getInternalDatabase();
    $stmt = $db->prepare("SELECT USER.ID as 'USERID',ROLE.name as 'ROLENAME' FROM USER ,ROLE     			
    				      WHERE USER.role_id = ROLE.ID		 
    					  AND login = ? 
    					  AND  password = ?");

    $stmt->execute(array($login,$password));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user != false)
    {
    	$expiration = time() + 86400;
        $token = md5(uniqid(mt_rand(), true));
        $stmt = $db->prepare("UPDATE USER set accessToken = ?, tokenExpiration = ? WHERE ID = ?");
        $stmt->execute(array($token,$expiration,$user["USERID"]));        
        $session["token"] = $token;
        $session["role"] = $user["ROLENAME"];	// name of the module
        $session["modules"] = getModules($user["ROLENAME"]);  
        $session["ID"] = $user["USERID"];

        return $session;  	
    }
    else // TMP
    {
	    $role = findTmpUser($login,$password);	    
    	if ($role != null)
    	{    		
    		$session["token"] = md5(uniqid(mt_rand(), true));
    		$session["role"] = $role; // name of the module
    		$session["modules"] = getModules($role);
    		return $session;
    	}
    	else
    		return null;
				                	 
    }  
}

// WRAP
$app->get('/image/{id}',function(Request $request,Response $response) { 
	$id = $request->getAttribute('id');
	$result = RestEngine::GET("http://192.168.72.62/api/api.php/picture/".$id);	
	$response = $response->withJson($result);
	return $response;
});

$app->post('/image',function(Request $request,Response $response) { 
	$json = json_decode($request->getBody(),true);
	$result = RestEngine::POST("http://192.168.72.62/api/api.php/picture",$json);	
	$response = $response->withJson($result);
	return $response;
});
		
$app->post('/login',function(Request $request,Response $response) { 

	$json = json_decode($request->getBody(),true);
	$username = $json["username"];
	$password = $json["password"];

	
 	$session = getUserSession($username,$password); 
    if ($session != null)
	{
			$result["result"] = "OK";
			$result["role"] = $session["role"];
			$result["modules"] = $session["modules"];
			$result["token"] = $session["token"];
			$result["ID"] = $session["ID"];
	}
    else
    	$result["result"] = "KO";
	
	$response = $response->withJson($result);
	return $response;
});

/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   	SUPPLIERS 
								   	SUPPLIERS
								   	SUPPLIERS                               */

$app->get('/supplieritems/{id}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$id = $request->getAttribute('id');

	//$sql = "SELECT * FROM ICPRODUCT WHERE VENDID = ?";
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day30before 00:00:00.000' AND '$today 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',
			PRICE,LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND dbo.ICPRODUCT.VENDID = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($id));
	$items=$req->fetchAll(PDO::FETCH_ASSOC);


	$result = RestEngine::GET("http://phnompenhsuperstore.com/api/intrapi.php/supplier/".$id);
	$result["items"] = $items;

	$response = $response->withJson($result);
	return $response;   
});

$app->get('/supplierpurchaseorders/{id}',function(Request $request,Response $response) {
	$id = $request->getAttribute('id');
	$conn=getDatabase();	
	
	$sql = "SELECT * FROM POHEADER WHERE VENDID = ? ORDER BY PODATE DESC";
	$req = $conn->prepare($sql);
	$req->execute(array($id)); 
	$pos = $req->fetchAll(PDO::FETCH_ASSOC);	


	$result = RestEngine::GET("http://phnompenhsuperstore.com/api/intrapi.php/supplier/".$id);
	$result["purchaseorders"] = $pos;

	$response = $response->withJson($result);
	return $response;
});

/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   	  ITEMS 
								   	  ITEMS
								   	  ITEMS                               */


function packLookup($barcode)
{

	$conn=getDatabase();
	$params = array($barcode);
	$sql = "SELECT PRODUCTID,SALEPRICE,DESCRIPTION1,DESCRIPTION2,SALEUNIT,DISC,EXPIRED_DATE,SALEFACTOR,SALEUNIT FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?"; 	
	$req = $conn->prepare($sql);
	$req->execute($params);
	$item=$req->fetch(PDO::FETCH_ASSOC);	
		

	$json = RestEngine::GET($GLOBALS['URL'].str_replace(" ","%20",$barcode));      
	if ($item != false)
	{
		if ($json["result"] != "KO")			
			$item["PICTURE"] = $json["PICTURE"];
		else
			$item["PICTURE"] = null;	
		return $item;
	}
	else
		return null;
}

function weightedItemLookup($barcode){
	$code = substr($barcode,0,6);
	$item = itemLookup($code);
	if ($item != null){
		$weight = substr($barcode,6,5);	
		$d1 = substr($weight,0,1);
		$d2 = substr($weight,1,1);
		$d3 = substr($weight,2,1);
		$d4 = substr($weight,3,1);
		$d5 = substr($weight,4,1);
		$weightStr = $d1.$d2.".".$d3.$d4.$d5;
		$multiplier = floatval($weightStr);
		$item["PRICE"] = number_format(floatval($item["PRICE"]) * $multiplier,2); 	
	}
	return $item;
}

function itemLookup($barcode){
	$conn=getDatabase();
	
	$sql = "SELECT PRODUCTID FROM dbo.ICPRODUCT WHERE BARCODE = ?";	
	$req=$conn->prepare($sql);
	$fourDigit = substr($barcode,0,4);	
	$req->execute(array($fourDigit)); 
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	if (count($items) > 0)
		$barcode = $fourDigit;
	$req=$conn->prepare($sql);
	$sixDigit = substr($barcode,0,6);
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	if (count($items) > 0)
		$barcode = $sixDigit;

	$params = array($barcode,$barcode);
	$begin = date("Y-m-d");
	
	$sql="SELECT PRODUCTID,PACKINGNOTE,
	(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATETO DESC) as 'DISCPERCENT', 
	(SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	(SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',
	(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
	(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2',	

	CATEGORYID,CATEGORYNEWID,BARCODE,PRODUCTNAME,PRODUCTNAME1,
	(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST'
	,STORE,SIZE,COLOR,PRICE,VENDNAME,
	
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
	OTHER_ITEMCODE
	FROM dbo.ICPRODUCT,dbo.APVENDOR  
	WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID 
	AND BARCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute($params);
	$items=$req->fetchAll(PDO::FETCH_ASSOC);
	
	if (count($items) > 0)
	{
		$finalItem = $items[0];
		$sql="
		SELECT LOCONHAND 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$finalItem["WH1"] = $item["LOCONHAND"];
		
		$sql="
		SELECT LOCONHAND 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$finalItem["WH2"] = $item["LOCONHAND"];

		$json = RestEngine::GET($GLOBALS['URL'].$barcode);      
		if ($json["result"] != "KO")			
			$finalItem["PICTURE"] = $json["PICTURE"];
		else 		
			$finalItem["PICTURE"] = getImage($barcode);					
		return $finalItem;
	}
	else 
		return null;
}

/************** ANALYSIS ***************/
$app->get('/itemfull/{barcode}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$barcode = $request->getAttribute('barcode'); 
	$packInfo = packLookup($barcode);

	if ($packInfo != null) // IS  A PACK
	{
		$packcode = $barcode;		
		$result = itemLookup($packInfo["PRODUCTID"]);
		$result["BARCODE"] = $packcode;
		//if (file_exists("img/packs/".$packcode.".jpg"))
		//	$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
		$result["PICTURE"] = $packInfo["PICTURE"];
		$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
		$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
		$result["DISC"] = $packInfo["DISC"];
		$result["PRODUCTNAMEPACK"] = $packInfo["DESCRIPTION1"];
		$result["PRICE"] = $packInfo["SALEPRICE"];		
		
		// PICTURE PACK
		$result["ISPACK"] = "PACK";
		$result["result"] = "OK";
	}
	else
	{
		$result = itemLookup($barcode);
		if ($result != null){
			$result["ISPACK"] = "ITEM";
			$result["result"] = "OK";
		}					
		else
		{
			$result = weightedItemLookup($barcode);
			if ($result != null){
				$result["ISPACK"] = "ITEM";
				$result["result"] = "OK";
			}					
			else
				$result["result"] = "KO";	
		}
	}	
	$response = $response->withJson($result);
	return $response;   
});


/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   	 BARCODES 
								   	 BARCODES
								   	 BARCODES                               */


function generateBarcodeImage($barcode)
{
	$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
	return base64_encode($generator->getBarcode($barcode, $generator::TYPE_CODE_128,1.5));
}

/************** SMALL LABEL PRINTING ********/
$app->get('/itemlabels/{barcodes}', function(Request $request,Response $response) {    
	$conn=getDatabase();

	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	

	$result = array();
	foreach($barcodes as $barcode){

		$params = array($barcode);
		$sql="SELECT PRODUCTID,BARCODE,SALEFACTOR,PRODUCTNAME,PRODUCTNAME1,STKUM,SIZE,COLOR,PRICE,PACKINGNOTE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ?";
		$getItems=$conn->prepare($sql);
		$getItems->execute($params);
		$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) > 0) // NOT PACK
		{
			$item = $items[0];
			$oneItem["rielPrice"] = generateRielPrice($item["PRICE"]);
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($item["PRICE"]);
			$oneItem["nameEN"] = $item["PRODUCTNAME"];
			$oneItem["nameKH"] = $item["PRODUCTNAME1"];
			$oneItem["productImg"] = getImage($barcode);
			$oneItem["barcodeNumber"] = $barcode;
			$oneItem["barcodeImage"] = generateBarcodeImage($barcode);
			$oneItem["packing"] = $item["PACKINGNOTE"];
			$oneItem["return"] = $item["SIZE"];
			$oneItem["country"] = $item["COLOR"];
			$oneItem["salefactor"] = $item["SALEFACTOR"];
			$oneItem["unit"] = $item["STKUM"];
			$oneItem["isPack"] = "no";
			array_push($result,$oneItem);			
		}
		else // PACK
		{			

			$packInfo = packLookup($barcode);			
			if ($packInfo != null) // IS  A PACK
			{
				$packcode = $barcode;		
				$oneItem["isPack"] = "yes";
				$theItem = itemLookup($packInfo["PRODUCTID"]);
				$oneItem["barcode"] = $packcode;

				$oneItem["rielPrice"] = generateRielPrice($packInfo["SALEPRICE"]);
				$oneItem["dollarPrice"] = "$". truncateDollarPrice($packInfo["SALEPRICE"]);
				// PICTURE
				if (file_exists("img/packs/".$packcode.".jpg"))
					$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
				else
					$oneItem["productImg"] = $packInfo["PICTURE"];
				$oneItem["salefactor"] = $packInfo["SALEFACTOR"];				
				$oneItem["return"] = $packInfo["SALEUNIT"];		
				$oneItem["productImg"] = getImage($barcode);		
				$oneItem["barcodeNumber"] = $packcode;
				$oneItem["barcodeImage"] = generateBarcodeImage($packcode);

				$oneItem["PRICE"] = $packInfo["SALEPRICE"];		
				$oneItem["unit"] = $packInfo["SALEUNIT"];
				// FROM ITEM				
				$oneItem["nameEN"] = $packInfo["DESCRIPTION1"];
				$oneItem["nameKH"] = $packInfo["DESCRIPTION2"];
				

				$oneItem["country"] = null;			
				$oneItem["packing"] = null;
				// PICTURE PACK
				//$tmp["ISPACK"] = "PACK";
				//$tmp["result"] = "OK";		

				array_push($result,$oneItem);
			}
			else
			{
				array_push($result,"ERROR");	
			}
		
		}		
	}	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/biglabel/{barcodes}',function($request,Response $response) {
	$conn=getDatabase();
	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	

	$result = array();
	foreach($barcodes as $barcode){
		$params = array($barcode);
		$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ?";
		$getItems=$conn->prepare($sql);
		$getItems->execute($params);
		$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) > 0){
			$item = $items[0];
			$oneItem["barcode"] = $item["BARCODE"];
			$oneItem["rielPrice"] = generateRielPrice($item["PRICE"]);
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($item["PRICE"]);
			$oneItem["nameEN"] = $item["PRODUCTNAME"];
			$oneItem["nameKH"] = $item["PRODUCTNAME1"];
			$oneItem["productImg"] = getImage($barcode);			
			$oneItem["country"] = $item["COLOR"];
			array_push($result,$oneItem);
		}		
	}	
	$response = $response->withJson($result);
	return $response;
});

function itemLookupLabel($barcode)
{
	$conn=getDatabase();	
	$begin = date("m-d-y");
	$params = array($barcode);
	$sql="SELECT PRODUCTID,						
		  (SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT', 
					
		  (SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
		  (SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTEND', 
					
		   BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
						FROM dbo.ICPRODUCT WHERE BARCODE = ?";
	$getItems=$conn->prepare($sql);
	$getItems->execute($params);
	$items=$getItems->fetchAll(PDO::FETCH_ASSOC);

	if (count($items) > 0)
	{
		$item = $items[0];				
		$oneItem["barcode"] = $item["BARCODE"];						
		$oneItem["nameEN"] = $item["PRODUCTNAME"];
		$oneItem["nameKH"] = $item["PRODUCTNAME1"];
		$oneItem["productImg"] = getImage($barcode);			
		$oneItem["country"] = $item["COLOR"];

		if (substr($item["DISCPERCENT"],0,1) == ".")
			$item["DISCPERCENT"] = "0".$item["DISCPERCENT"];

		$exp = explode('.',$item["DISCPERCENT"]);
		if ( (count($exp) > 1) &&   intval($exp[1]) == 0)
			$oneItem["discpercent"] = explode('.',$item["DISCPERCENT"])[0];
		else 
			$oneItem["discpercent"] = $exp[0].".".substr($exp[1],0,2);	

		if ($item["DISCPERCENTEND"] != null && $item["DISCPERCENTEND"] != "")
		{
			$end = explode(' ',$item["DISCPERCENTEND"])[0];
			$end = explode('-',$end);
			$end = $end[2]."/".$end[1]."/".$end[0];
			$oneItem["discpercentend"] = $end;	
		}
		else
			$oneItem["discpercentend"] = "";		
		
		
		if ($item["DISCPERCENTSTART"] != null && $item["DISCPERCENTSTART"] != "")
		{
			$start = explode(' ',$item["DISCPERCENTSTART"])[0];
			$start = explode('-',$start);
			$start = $start[2]."/".$start[1]."/".$start[0];
			$oneItem["discpercentstart"] = $start;	
		}
		else
			$oneItem["discpercentstart"] = "";		
		
		$oneItem["oldPrice"] = 	"$". truncateDollarPrice($item["PRICE"]);

		$oldPrice = floatval(truncateDollarPrice($item["PRICE"]));					
		$percent = (100 - floatval($oneItem["discpercent"])) ;		

		if ($percent != 100)
		{
			$percent  /= 100;
			$newPrice = $percent * $oldPrice; 	
			//var_dump($newPrice);
			//exit;			
		}
		else			
			$newPrice = $oldPrice * 1; 	
			
		$oneItem["dollarPrice"] = "$". truncateDollarPrice($newPrice);										
		$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));
		return $oneItem;
	}
	return null;
}

$app->get('/biglabelpromo/{barcodes}',function($request,Response $response) {	
	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	

	$result = array();
	foreach($barcodes as $barcode)
	{
		if ($barcode == "")
			continue;
		$packInfo = packLookup($barcode);

		if ($packInfo != null)		
		{
			//var_dump($packInfo);
			$packcode = $barcode;
			$barcode = $packInfo["PRODUCTID"];									
			$oneItem = itemLookupLabel($barcode);
			$oneItem["barcode"] = $packcode;

			$oneItem["oldPrice"] = 	"$". truncateDollarPrice($packInfo["SALEPRICE"]);			

			// CALCULATE PROMO
			$oldPrice = floatval(truncateDollarPrice($packInfo["SALEPRICE"]));					
			$percent = (100 - intval($oneItem["discpercent"])) ;		
			if ($percent != 100)
			{
				$percent = floatval("0.".$percent);
				$newPrice = $percent * $oldPrice; 				
			}
			else			
				$newPrice = $oldPrice * 1; 	
			
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($newPrice);										
			$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));


			$oneItem["PRICE"] = $packInfo["SALEPRICE"];								
			$oneItem["ISPACK"] = "PACK";
			$oneItem["nameEN"] = $packInfo["DESCRIPTION1"]." (".$packInfo["SALEUNIT"].")";


			array_push($result,$oneItem);
		}
		else 					
			array_push($result,itemLookupLabel($barcode));					
	}	
	$response = $response->withJson($result);
	return $response;
});

$app->post('/itemdetails', function(Request $request,Response $response) {    
	$conn=getDatabase();

	$json = json_decode($request->getBody(),true);	
	$barcodes = $json["barcodes"];
	

	$result = array();
	foreach($barcodes as $barcode){
		$params = array($barcode);
		$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ?";
		$getItems=$conn->prepare($sql);
		$getItems->execute($params);
		$items=$getItems->fetchAll(PDO::FETCH_ASSOC);
		if (count($items) > 0){
			$item = $items[0];
			$oneItem["rielPrice"] = generateRielPrice($item["PRICE"]);
			$oneItem["dollarPrice"] = "$". truncateDollarPrice($item["PRICE"]);
			$oneItem["nameEN"] = $item["PRODUCTNAME"];
			$oneItem["nameKH"] = $item["PRODUCTNAME1"];
			$oneItem["productImg"] = getImage($barcode);
			$oneItem["barcodeNumber"] = $barcode;
			$oneItem["barcodeImage"] = generateBarcodeImage($barcode);
			$oneItem["packing"] = $item["STORE"];
			$oneItem["return"] = $item["SIZE"];
			$oneItem["country"] = $item["COLOR"];
			array_push($result,$oneItem);
		}		
	}	
	$response = $response->withJson($result);
	return $response;
});

/************** COMMON ***************/
$app->get('/item/{barcode}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$barcode = $request->getAttribute('barcode');	 
	$check = "NO";
	if (substr($barcode,0,1) == 'X'){
		$barcode = substr($barcode, 1);
		$check = "WH1";
	}
	if (substr($barcode,0,1) == 'Y'){
		$barcode = substr($barcode, 1);
		$check = "WH2";
	}
	
	$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,COST,PRICE,ONHAND,PACKINGNOTE,COLOR,SIZE,
	(SELECT ORDERPOINT FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'ORDERPOINT1',
	(SELECT ORDERQTY FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'ORDERQTY1'
		  FROM dbo.ICPRODUCT  
	      WHERE BARCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($barcode));
	$item =$req->fetch(PDO::FETCH_ASSOC);

	if (isset($item["PRODUCTID"]))
	{
			
		$sql="
		SELECT LOCONHAND,STORBIN 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item1=$req->fetch();

		$item["WH1"] = $item1["LOCONHAND"];
		$item["STOREBIN1"] = $item1["STORBIN"];
		
		$sql="
		SELECT LOCONHAND,STORBIN 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item2=$req->fetch();

		$item["WH2"] = $item2["LOCONHAND"];
		$item["STOREBIN2"] = $item2["STORBIN"];

		$item["result"] = "OK";

		$item["PICTURE"] = getImage($barcode);		

		if ($check == "WH1" || $check == "WH2")
		{							
			$inDB = getInternalDatabase();
			$begin = strtotime($request->getParam('begin',''));
			$params = array($barcode,$check,$begin);
			$sql = "SELECT * FROM ITEMADJUST WHERE BARCODE = ? AND location = ? AND DATE > ?";
			$req=$inDB->prepare($sql);
			$req->execute($params);
			$res = $req->fetch();			
			if ($res != false)
				$item["SCANNEDRANGE"] = 'YES';
			else 
				$item["SCANNEDRANGE"] = 'NO';
		}	
		else
			$item["SCANNED"] = 'NO';


		$sql1 = "SELECT count(*) AS CNT FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = 'WH1'";
		$req=$conn->prepare($sql1);
		$req->execute(array($barcode));
		$res1=$req->fetch()["CNT"];

		$sql2 = "SELECT count(*) AS CNT FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = 'WH2'";
		$req=$conn->prepare($sql2);
		$req->execute(array($barcode));
		$res2=$req->fetch()["CNT"];

		if ($res1 < 1)
			$item["WARNING"] = "WH1 Location missing"; 
		else if ($res2 < 1)
			$item["WARNING"] = "WH2 Location missing"; 			
	}
	else
	{
		$packInfo = packLookup($barcode);
		if ($packInfo != null) // IS  A PACK
		{
			$packcode = $barcode;		
			$result = itemLookup($packInfo["PRODUCTID"]);
			$result["BARCODE"] = $packcode;
			//if (file_exists("img/packs/".$packcode.".jpg"))
			//	$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
			$result["PICTURE"] = $packInfo["PICTURE"];
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
			$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
			$result["DISC"] = $packInfo["DISC"];
			$result["PRODUCTNAME"] = $packInfo["DESCRIPTION1"];
			$result["PRODUCTNAME1"] = $packInfo["DESCRIPTION2"];
			$result["PRICE"] = $packInfo["SALEPRICE"];	

			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];	
			
			// PICTURE PACK
			$result["ISPACK"] = "PACK";
			$result["result"] = "OK";
			$item = $result; 
		}
		else			
			$item["result"] = "KO";
	}

	// IF NO LOT NULL
	$qsql = "SELECT BATCHNO,QUANTITY,CONVERT(varchar(10), TDATE, 120) as TDATE FROM ICQUANTITY WHERE LOCID = 'WH1' AND PRODUCTID = ? AND ACTIVE = 1";
	$req=$conn->prepare($qsql);
	$req->execute(array($barcode));
	$item["LOTWH1LIST"] = $req->fetchAll();

	$qsql = "SELECT BATCHNO,QUANTITY, CONVERT(varchar(10), TDATE, 120) as TDATE FROM ICQUANTITY WHERE LOCID = 'WH2' AND PRODUCTID = ? AND ACTIVE = 1";
	$req=$conn->prepare($qsql);
	$req->execute(array($barcode));
	$item["LOTWH2LIST"] = $req->fetchAll();
	$response = $response->withJson($item);
	return $response;
});



$app->get('/picture/{barcode}',function(Request $request,Response $response) {
	$barcode = $request->getAttribute('barcode');
	$result["PICTURE"] = getImage($barcode);
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

/**************SALE ***************/
/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   	   KPI 
								   	   KPI
								   	   KPI                               */

$app->get('/KPIOneCategory',function(Request $request,Response $response) {   
	
	$conn=getDatabase();
	$type = $request->getParam('type','month');
	$category = $request->getParam('category','');
	$month = $request->getParam('month',date('m'));		
	$data = array();

	if ($type == "year")
	{
		for($i = 1;$i < 13;$i++)
		{					
			$month = sprintf("%02d",$i);
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,intval($year));

			$begin = $year."-".$month."-01 00:00:00.000";	
			$end = $year."-".$month."-".$daysInMonth." 23:59:59.999";
			$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,CATEGORYID
						FROM POSDETAIL,ICCATEGORY  			
						WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
						AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
						AND CATEGORYID = ".$category."
						GROUP BY CATEGORYID";		
			$req = $conn->prepare($sql);
			$req->execute(array());
			$result = $req->fetch(PDO::FETCH_ASSOC);					
			$oneResponse = array();
			$oneResponse["PROFIT"] = truncateNumber($result["PROFIT"]);
			$oneResponse["SALE"] = truncateNumber($result["SALE"]);								
			$data[$i] = $oneResponse;											
		}
	}
	else if($type == "month")
	{
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		for($i = 1; $i <= $daysInMonth;$i++)
		{
			$day = sprintf("%02d",$i);
			$begin = $year."-".$month."-".$day." 00:00:00.000";	
			$end = $year."-".$month."-".$day." 23:59:59.999";
			
			$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,CATEGORYID
						FROM POSDETAIL,ICCATEGORY  			
						WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
						AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
						AND CATEGORYID = ".$category."
						GROUP BY CATEGORYID";		
			$req = $conn->prepare($sql);
			$req->execute(array());
			$result = $req->fetch(PDO::FETCH_ASSOC);					
			$oneResponse = array();			
			$oneResponse["PROFIT"] = truncateNumber($result["PROFIT"]);
			$oneResponse["SALE"] = truncateNumber($result["SALE"]);								
			$data[$i] = $oneResponse;					
		}		
	}	
	$response = $response->withJson($data);
	return $response;
});

function querySection($section,$begin,$end){
	$conn=getDatabase();
	$oneResponse = array();
	$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,DEPARTMENT
				FROM POSDETAIL,ICCATEGORY  			
				WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
				AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
				AND CUSTID NOT IN (".clientToExclude().")
				AND SECTION = '".$section."'
				GROUP BY DEPARTMENT";									
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);					

	$oneResponse = array();
	foreach($result as $oneResult){
		$tmp = array();
		$tmp["PROFIT"] = truncateNumber($oneResult["PROFIT"]);
		$tmp["SALE"] = truncateNumber($oneResult["SALE"]);				
		//$tmp["NAME"] = 	;
		$oneResponse[$oneResult["DEPARTMENT"]] = $tmp;
	}	
	return $oneResponse;
}

function queryAllSection($begin,$end){	
	$conn=getDatabase();
	$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE,SECTION
				FROM POSDETAIL,ICCATEGORY  			
				WHERE POSDATE BETWEEN '".$begin."' AND '".$end."'
				AND POSDETAIL.CATEGORYID = ICCATEGORY.CATEGORYID
				AND SECTION IS NOT NULL
				AND CUSTID NOT IN (".clientToExclude().")
				GROUP BY SECTION";	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);					

	$oneResponse = array();
	foreach($result as $oneResult){
		$obj = array();
		$tmp = array();
		$tmp["PROFIT"] = truncateNumber($oneResult["PROFIT"]);
		$tmp["SALE"] = truncateNumber($oneResult["SALE"]);				
		$oneResponse[$oneResult["SECTION"]] = 	$tmp;		
	}	
	return $oneResponse;		
}

$app->get('/KPIRows',function(Request $request,Response $response) {   

	$conn=getDatabase();

	$year = $request->getParam('year',2020);		
	$month = $request->getParam('month',null);	
	$day = 	$request->getParam('day',null);
	$data = array();

	
	$rows = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","BB","DO","WI","SO","NU"];
	
	if ($day != null)
	{
		$start = $day." 00:00:00.000";
		$end = $end." 23:59:59.999";
	}
	else if ($month != null)
	{
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start = "01-".$month."-".$year;
		$end = $daysInMonth."-".$month."-".$year;	
	}
	else if ($year != null)
	{
		$start = $year."-1-1"." 00:00:00.000";
		$end = $year."-12-31"." 23:59:59.999";

	}

	$sql = "SELECT COUNT(TOTAL_AMT) as 'TOTAL', SUM(TOTAL_AMT) as 'AMOUNT' 
				FROM POSDETAIL 
				WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?) 
				AND POSDATE BETWEEN ? AND ?";	
	$req = $conn->prepare($sql);	
	foreach($rows as $row)
	{
		$req->execute(array($row."%",$start,$end));
		$data[$row] = $req->fetchAll(PDO::FETCH_ASSOC);			
	}	
	
	$response = $response->withJson($data);
	return $response;	
});

$app->get('/KPICategories',function(Request $request,Response $response) {   
	$conn=getDatabase();

	$year = $request->getParam('year',date('Y'));		
	$month = $request->getParam('month',null);		
	$data = array();
	$resp["year"] = $year;
	if ($month != null){
		$resp["month"] = $month;

		
		$oneMonthData = array();
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		for($j = 1; $j <= $daysInMonth;$j++)
		{			
			$day = sprintf("%02d",$j);
			$begin = $year."-".$month."-".$day." 00:00:00.000";	
			$end = $year."-".$month."-".$day." 23:59:59.999";

			$data["ALL"] = queryAllSection($begin,$end);					
			$data["FRESH"] = querySection("FRESH",$begin,$end);
			$data["DRY GROCERY"] = querySection("DRY GROCERY",$begin,$end);
			$data["FROZEN"] = querySection("FROZEN",$begin,$end);
			$data["NON-FOOD"] = querySection("NON-FOOD",$begin,$end);

			$oneMonthData[$j] = $data;
		}		

		$resp["data"] = $oneMonthData;	

	}
	else {

		$yearData = array();
		$monthData = array();
		$data = array();		
		for($i = 1;$i < 13;$i++)
		{			
			$oneData = array();

			$month = sprintf("%02d",$i);
			$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,intval($year));
			$begin = $year."-".$month."-01 00:00:00.000";	
			$end = $year."-".$month."-".$daysInMonth." 23:59:59.999";
							
			$data["ALL"] = queryAllSection($begin,$end);					
			$data["FRESH"] = querySection("FRESH",$begin,$end);
			$data["DRY GROCERY"] = querySection("DRY GROCERY",$begin,$end);
			$data["FROZEN"] = querySection("FROZEN",$begin,$end);
			$data["NON-FOOD"] = querySection("NON-FOOD",$begin,$end);

			$yearData[$i] = $data;	
		}
		$resp["data"] = $yearData;
	}
	$response = $response->withJson($resp);
	return $response;	
});
function clientToExclude(){
	return "'1111','200-100','200-101','2222','6666','L0026'";
}

$app->get('/KPISales',function(Request $request,Response $response) {   
	$conn=getDatabase();

	$year = $request->getParam('year',date('Y'));			
	$resp["year"] = $year;
	$data = array();
	
	$yearData = array();	
	$monthData = array();
	
	for($i = 1;$i < 13;$i++)
	{					
		$month = sprintf("%02d",$i);
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,intval($year));

		$begin = $year."-".$month."-01 00:00:00.000";	
		$end = $year."-".$month."-".$daysInMonth." 23:59:59.999";

		$sql = "
		SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
		FROM POSDETAIL 			
		WHERE POSDATE >= '".$begin."' 
		AND POSDATE <= '".$end."'
		AND CUSTID NOT IN (".clientToExclude().");
		";
		$req = $conn->prepare($sql);
		$req->execute(array());
		$result = $req->fetch(PDO::FETCH_ASSOC);
		$result["PROFIT"] =	truncateNumber($result["PROFIT"]);
		$result["SALE"] =	truncateNumber($result["SALE"]);

		$yearData[$i] = $result;

		// MONTH
		$oneMonthData = array();
		$daysInMonth = cal_days_in_month(CAL_GREGORIAN,$i,$year);
		for($j = 1; $j <= $daysInMonth;$j++)
		{
			$day = sprintf("%02d",$j);
			$begin = $year."-".$i."-".$day." 00:00:00.000";	
			$end = $year."-".$i."-".$day." 23:59:59.999";

			$sql = "
			SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
			FROM POSDETAIL 			
			WHERE POSDATE >= '".$begin."' 
			AND POSDATE <= '".$end."'
			AND CUSTID NOT IN (".clientToExclude().");
			";			
			$req = $conn->prepare($sql);
			$req->execute(array());
			$result = $req->fetch(PDO::FETCH_ASSOC);			
			$result["PROFIT"] = truncateNumber($result["PROFIT"]);		
			$result["SALE"] = truncateNumber($result["SALE"]);
			$oneMonthData[$j] = $result;
		}	
		$monthData[$i] = $oneMonthData;		
	}
	$data["year"] = $yearData;
	$data["months"] =  $monthData;

	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;	
});
/**************SALE ***************/



/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   	  SEARCH 
								   	  SEARCH
								   	  SEARCH                               */

$app->get('/itemsearch2',function(Request $request,Response $response) {    	
	$conn=getDatabase();

 	$today = date("Y-m-d");
	
	$category = $request->getParam('category','ALL');
	$thrownstart =  $request->getParam('thrownstart','2000-1-1');
	$thrownend =  $request->getParam('thrownend','2050-1-1');
	$sellstart =  $request->getParam('sellstart','2000-1-1');
	$sellend =  $request->getParam('sellend','2050-1-1');
	$zerosale =  $request->getParam('zerosale','NO');

    $sql = "SELECT PRODUCTID,BARCODE,		
		replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
		replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',		
		PACKINGNOTE,COST,PRICE,VENDNAME,
		(SELECT TOP(1) TRANDISC FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC)  as 'COSTPROMO',
		(SELECT TOP(1) DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEFROM <= '$today 00:00:00.000' AND DATETO >= '$today 23:59:59.999' ORDER BY DATEFROM DESC) as 'PRICEPROMO', 
		(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOSTX',
		LASTCOST,
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE BETWEEN ? AND ?),0) as 'THROWNINPERIOD',
		ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
		OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
		(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',			
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  ? AND ? GROUP BY PRODUCTID) as 'SALEINPERIOD',
		PRICE,LASTRECEIVEDATE, 
		(SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTRECEIVEQTY',
		LASTSALEDATE,dbo.ICPRODUCT.DATEADD
		FROM dbo.ICPRODUCT,dbo.APVENDOR  
		WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID";

	$params = array($thrownstart, $thrownend, $sellstart, $sellend);

	if ($category != "ALL"){
		$sql .=	" AND CATEGORYID = ?";
		array_push($params,$category);
	}			
	if ($zerosale == "NO"){
		$sql .= " 	GROUP BY PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,PACKINGNOTE,COST,
					PRICE,VENDNAME,TOTALSALE,OTHER_ITEMCODE,COLOR,LASTCOST,
					CATEGORYID,ONHAND,PRICE,LASTRECEIVEDATE,LASTSALEDATE,
					dbo.ICPRODUCT.DATEADD
					HAVING (SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  ? AND ? GROUP BY PRODUCTID)  > 0";	
		array_push($params,$thrownstart,$thrownend);
	}
	$sql .= " ORDER BY PRODUCTNAME ASC";
	$req = $conn->prepare($sql);	

	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 

$app->get('/itemsearch3',function(Request $request,Response $response) {    	
	$conn=getDatabase();

 	$today = date("Y-m-d");
	
	$category = $request->getParam('category','ALL');
	$year = $request->getParam('year','2021');

    $sql = "SELECT PRODUCTID,BARCODE,		
		replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
		replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',		
		PACKINGNOTE,COST,PRICE,VENDNAME,
		(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',
	
		ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
		CATEGORYID,				
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-1-1' AND '$year-1-31' GROUP BY PRODUCTID) as 'SALEJANUARY',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-2-1' AND '$year-2-28' GROUP BY PRODUCTID) as 'SALEFEBRUARY',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-3-1' AND '$year-3-31' GROUP BY PRODUCTID) as 'SALEMARCH',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-4-1' AND '$year-4-30' GROUP BY PRODUCTID) as 'SALEAPRIL',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-5-1' AND '$year-5-31' GROUP BY PRODUCTID) as 'SALEMAY',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALEJUNE',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALEJULY',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALEAUGUST',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALESEPTEMBER',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALEOCTOBER',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALENOVEMBER',
		(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSDATE BETWEEN  '$year-6-1' AND '$year-6-30' GROUP BY PRODUCTID) as 'SALEDECEMBER',

		PRICE,LASTRECEIVEDATE, 
		(SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTRECEIVEQTY',
		LASTSALEDATE,dbo.ICPRODUCT.DATEADD
		FROM dbo.ICPRODUCT,dbo.APVENDOR  
		WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID";

	$params = array();

	if ($category != "ALL"){
		$sql .=	" AND CATEGORYID = ?";
		array_push($params,$category);
	}			
	$sql .= " ORDER BY PRODUCTNAME ASC";
	$req = $conn->prepare($sql);	

	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 
/************** SEARCH   ***************/
//||||||LASTSALEDATE

$app->post('/itemget',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);
	$barcodes = $json["barcodes"];
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$sql =  "SELECT PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',	
			PACKING,PRICE,VENDNAME,
			(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST',
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',		
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
		  (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',	
		  ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',		
		  ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
		  ISNULL(PACKINGNOTE,'N/A') as 'PACKINGNOTE', 		
		  (SELECT COUNT(PRODUCTID) AS 'CNT' 
		   FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
		   AND POSDATE BETWEEN '$day30before 00:00:00.000'  
		   AND '$today 23:59:59.999' GROUP BY PRODUCTID) as 'SALELAST30',
			COLOR,CATEGORYID,ONHAND,PRICE,LASTRECEIVEDATE,LASTSALEDATE
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			 ";

	$params = array();    	 
	$sql .= " AND PRODUCTID in (";
  foreach($barcodes as $oneBarcode)
    {

    	$sql .=  "?,"; 
		  array_push($params,$oneBarcode);	
    }
  $sql = substr($sql, 0, -1);    
  $sql .= ")";
  $sql .= " ORDER BY CATEGORYID";

  
	
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;		
}); 
/************** SEARCH   ***************/
$app->get('/tinyitemsearch',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$barcode = $request->getParam('barcode','');

	
	$sql =  "SELECT PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',				
			(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST',
			PRICE,ONHAND 
			FROM dbo.ICPRODUCT
			WHERE PRODUCTID = ?"; 
			
	$req = $conn->prepare($sql);	
	$req->execute(array($barcode));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 

$app->get('/itemsearch',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$barcode = $request->getParam('barcode','');
	$category = $request->getParam('category','');
	$keyword =  $request->getParam('keyword','');
	$vendor =  $request->getParam('vendor',''); 
	$storebin = $request->getParam('storebin','');
	$vendid = $request->getParam('vendid','');
	$count = $request->getParam('count',"300");

	$storebin1 = $request->getParam('storebin1','');
	$storebin2 = $request->getParam('storebin2','');

	$params = array();

	if ($storebin1 != "")
	{
		$IN1 = "AND ICPRODUCT.PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND STORBIN LIKE ? )";
		$storebin1 = "%".$storebin1."%";
		array_push($params,$storebin1);
	}	
	else
		$IN1 = "";
	
	if ($storebin2 != "")
	{
		$IN2 = "AND ICPRODUCT.PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND STORBIN LIKE ? )";
		$storebin2 = "%".$storebin2."%";
		array_push($params,$storebin2);
	}	
	else
		$IN2 = "";

	$sql =  "SELECT DISTINCT TOP(".$count.") ICPRODUCT.PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',	
			(SELECT ORDERPOINT FROM dbo.ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'ORDERPOINT1',
			(SELECT ORDERQTY   FROM dbo.ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'ORDERQTY1',
			PACKINGNOTE,COST,PRICE,VENDNAME,
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',				
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',

			(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
			(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2',	

			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day30before 00:00:00.000' AND '$today 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',
			PRICE,LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR,dbo.ICLOCATION  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND dbo.ICPRODUCT.PRODUCTID = dbo.ICLOCATION.PRODUCTID 
			".$IN1." ".$IN2;
			




	if ($barcode != ""){

		if (strpos($barcode, '|') !== false) 
		{
    		$barcodes = explode('|',$barcode); 
			$sql .= " AND ICPRODUCT.PRODUCTID in (";
    		foreach($barcodes as $oneBarcode){
    			$sql .=  "?,"; 
				array_push($params,$oneBarcode);	
    		}
    		$sql = substr($sql, 0, -1);
    		$sql .= ")";
		}
		else 
		{
			$sql .= " AND ICPRODUCT.PRODUCTID = ?";
			array_push($params,$barcode);	
		}	
	}
	if ($category != "" && $category != "ALL"){
		$sql .=	" AND CATEGORYID = ?";
		array_push($params,$category);
	}			
	if ($keyword != ""){
		$keyword = "%".$keyword."%";		
			$sql .= " AND PRODUCTNAME like ?";
			array_push($params,$keyword);			
	}
	if ($vendor != ""){
		$vendor = "%".$vendor."%";
		$sql .= " AND VENDNAME like ?";
		array_push($params,$vendor);
	}

	if ($vendid != ""){
		$sql .= " AND dbo.ICPRODUCT.VENDID = ?";
		array_push($params,$vendid);
	}
	


	$sql .= " ORDER BY PRODUCTNAME ASC";	
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 



// ADMIN UPDATE PRODUCT PRICE/NAME/CATEGORY 
$app->get('/itemall',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$start = $request->getParam('page',0 ) * 100;	
	$end = $start + 100; 

	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,
				   COST,PRICE,COLOR,CATEGORYID,CATEGORYNEWID,
				   ONHAND,ACTIVE	
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY CATEGORYID) as SEQ ,
				    PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYNEWID,
				    COST,PRICE,COLOR,CATEGORYID,ONHAND,ACTIVE
			 FROM dbo.ICPRODUCT
			 WHERE CATEGORYID LIKE 'TO_RECLASSIFY'
			 )t
			 
			WHERE SEQ BETWEEN $start AND $end";
	$params = array(); 
	$req = $conn->prepare($sql);

	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$newItems = array();
	foreach($result as $item)
	{
		
		$sql = "SELECT 
					(SELECT MAX(TRANDATE) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = ?) as 'LASTRECEIVE',
					(SELECT MAX(TRANDATE) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = ?) as 'LASTSALE'
				FROM dbo.SYSUSER WHERE USERID = 'BLUE'				
				"; 
						 
		$req = $conn->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["PRODUCTID"]));
		$extra = $req->fetch(PDO::FETCH_ASSOC);			

		$item["LASTRECEIVE"] = $extra["LASTRECEIVE"];
		$item["LASTSALE"] = $extra["LASTSALE"];							
		
		array_push($newItems,$item);
	}


	$result["ITEMS"] = $newItems;

	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE CATEGORYID LIKE 'TO_RECLASSIFY'";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];

	$response = $response->withJson($result);
	return $response;		
});

$app->put('/itempromo/{barcode}', function(Request $request,Response $response) { 
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);	
	$barcode = $request->getAttribute('barcode'); 

	$isPack = $json["isPack"];
	if ($isPack == "PACK")
	{
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT_SALEUNIT set DISC = :disc, EXPIRED_DATE = :dateto WHERE BARCODE = :barcode");	
		$stmt->bindValue(':disc',$json["discount"],PDO::PARAM_STR);
		$stmt->bindValue(':dateto',$json["to"],PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
		$stmt->execute();
		$result["result"] = "OK";
		$response = $response->withJson($result);
	}
	else
	{
		$now = date("Y-m-d");
		$stmt = $conn->prepare("SELECT * FROM dbo.ICNEWPROMOTION where PRODUCTID = :barcode AND DATETO >  :now");
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);		
		$stmt->bindValue(':now',$now,PDO::PARAM_STR);		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);			

		if ($result == null) // INSERT
		{
			$params = array($json["from"],$json["to"],$barcode,"1.00000","DISCOUNT(%)",$json["discount"],"APP",$json["login"]);
			$sql = "INSERT INTO dbo.ICNEWPROMOTION (DATEFROM,DATETO,PRODUCTID,SALE_QTY,DISCOUNT_TYPE,DISCOUNT_VALUE,PCNAME,USERADD)  VALUES(?,?,?,?,?,?,?,?)";			
			$stmt = $conn->prepare($sql);		
			$stmt->execute($params);
		}
		else // UPDATE
		{
			$params = array($json["from"],$json["to"],$barcode,$json["discount"]);
			$sql = "UPDATE dbo.ICNEWPROMOTION  set DATEFROM = ?,DATETO = ?, DISCOUNT_VALUE = ? WHERE PRODUCTID = ?";			
			$stmt = $conn->prepare($sql);		
			$stmt->execute($params);		

		}
	}		
	return $response;
});


$app->put('/item/{barcode}',function(Request $request,Response $response) {   

	$db=getDatabase();	
	$json = json_decode($request->getBody(),true);	
	$field = $json["field"];
	$value = isset($json["value"]) ? $json["value"] : null;
	$barcode = $request->getAttribute('barcode'); 
	$author = isset($json["author"]) ? blueUser($json["author"]) : "";
	$now = date("Y-m-d H:i:s");


	$comment = isset($json["comment"]) ? $json["comment"] : ""; 

	if ($field == "PRODUCTNAME" || $field == "PRODUCTNAME1" || $field == "CATEGORYID" ||
		  $field == "PACKINGNOTE" || $field == "COLOR" || $field == "SIZE"){
		$sql = "UPDATE dbo.ICPRODUCT set ".$field." = ?, USEREDIT = ?,DATEEDIT = ?  WHERE BARCODE = ?";
		$req = $db->prepare($sql);
		$params = array ($value,$author,$now,$barcode);		
		$result = $req->execute($params);	
	}
	else if ($field == "DESCRIPTION1" || $field == "DESCRIPTION2"){
		$sql = "UPDATE dbo.ICPRODUCT_SALEUNIT set ".$field." = ?, WHERE PACK_CODE = ?";
		$req = $db->prepare($sql);
		$params = array ($value,$barcode);		
		$result = $req->execute($params);
	}
	else if ($field == "PICTURE"){		
		$data["image"] = $value;
		$json = RestEngine::POST("http://192.168.72.62/api/api.php/picture/".$barcode,$data);      
	}	
	else if ($field == "PACKPICTURE")	{

		$data["image"] = $value;
		$json = RestEngine::POST("http://192.168.72.62/api/api.php/picture/".$barcode,$data);   

		$sql = "UPDATE ICPRODUCT_SALEUNIT SET PICTURE_PATH = ? WHERE PACK_CODE = ?";
		$req = $db->prepare($sql);
		$imagePath = "Y:\\".$barcode.".jpg";	
		$req->execute(array($imagePath,$barcode));
		   
	}
	else if ($field == "STOREBIN1"){ // MEDIUM
		
		$sql = "UPDATE ICLOCATION SET STORBIN = ? WHERE PRODUCTID = ? AND LOCID = 'WH1' ";
		$req = $db->prepare($sql);
		$result = $req->execute(array($value,$barcode) );	
	
	}
	else if ($field == "STOREBIN2"){ // MEDIUM
		$sql = "UPDATE ICLOCATION SET STORBIN = ? WHERE PRODUCTID = ? AND LOCID = 'WH2' ";
		$req = $db->prepare($sql);
		$result = $req->execute(array($value,$barcode) );			
	}	
	else if ($field == "PRICE"){ // HIGH
			

		$sql = "SELECT PRODUCTNAME,PRODUCTNAME1,PRICE 
				FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($barcode));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$productname = $res["PRODUCTNAME"];
		$productname1 = $res["PRODUCTNAME1"];
		$oldprice = $res["PRICE"];

		$sql = "INSERT INTO  POSLOG_ITEMPRICE (PRODUCTID,PRODUCTNAME,PRODUCTNAME1,COMMENT,OLDPRICE,
												NEWPRICE,USERADD,DATEADD,PCNAME,OLD_OTHERPRICE,NEW_OTHERPRICE) 
												VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req-> execute(array($barcode,$productname,$productname1, $comment,$oldprice,
							 $value,$author,$now,"APPLICATION",$oldprice,$value));		

		$sql = "UPDATE dbo.ICPRODUCT set ".$field." = ?,USEREDIT = ?,DATEEDIT = ? WHERE BARCODE = ?";
		$req = $db->prepare($sql);
		$result = $req->execute(array($value,$author,$now,$barcode) ); 										
	}
	$result = array();
	$result["result"] = "OK";	
	$response = $response->withJson($result);
	return $response;
});


// DEPRECATED
$app->post('/itemupdate/{barcode}',function(Request $request,Response $response) {   
	$conn=getDatabase();	
	$json = json_decode($request->getBody(),true);	

	$field = $json["field"];
	$value = isset($json["value"]) ? $json["value"] : null;


	$barcode = $request->getAttribute('barcode'); 

	
	$stmt = null;
	if ($field == "PRODUCTNAME"){
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PRODUCTNAME = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	if ($field == "PRODUCTNAME1"){
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PRODUCTNAME1 = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "CATEGORY") {	
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set CATEGORYNEWID = :value WHERE BARCODE = :barcode");
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "PACKINGNOTE") {	
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PACKINGNOTE = :value WHERE BARCODE = :barcode");
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}

	else if ($field == "PACKNAME")
	{
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT_SALEUNIT set DESCRIPTION1 = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "PRICE")	{
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set PRICE = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}	
	else if ($field == "PACKPRICE") {
		$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT_SALEUNIT set SALEPRICE = :value WHERE BARCODE = :barcode");	
		$stmt->bindValue(':value',$value,PDO::PARAM_STR);
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
	}
	else if ($field == "ACTIVE")
	{
		$stmt = $conn->prepare("SELECT ACTIVE FROM dbo.ICPRODUCT WHERE BARCODE = :barcode");	
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);			

		if ($result["ACTIVE"] == 0)	
		{
			$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set ACTIVE = 1 WHERE BARCODE = :barcode");	
			$result["active"] = 1;
		}		
		
		else 
		{
			$stmt = $conn->prepare("UPDATE dbo.ICPRODUCT set ACTIVE = 0 WHERE BARCODE = :barcode");	
			$result["active"] = 0;
		}
		$stmt->bindValue(':barcode',$barcode,PDO::PARAM_STR);	
	}
	
	else if ($field == "PICTURE"){
		$data["image"] = $value;
		$json = RestEngine::POST($GLOBALS['URL'].$barcode,$data);      
	}	
	else if ($field == "PACKPICTURE")	{
		$data["image"] = $value;
		$json = RestEngine::POST($GLOBALS['URL'].$barcode,$data);      
	}
	else {
		$sql = "";
	}

	if ($stmt != null){
		$stmt->execute();	
		$result["result"] = "OK";	
	}
	else{
		$result["result"] = "KO";
	}

	$response = $response->withJson($result);
	return $response
			->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/allwaitingpo', function(Request $request,Response $response) { 

	$login = $request->getAttribute('login');
	$cvUser = CVUserByLogin($login);	
	$conn=getDatabase();	

	$sql = "SELECT PONUMBER,POHEADER.VENDID,POSTATUS,POHEADER.VENDNAME,POHEADER.DATEADD,POHEADER.USERADD,PHONE1,PHONE2 FROM POHEADER,APVENDOR WHERE POHEADER.VENDID = APVENDOR.VENDID  AND POSTATUS = ''ORDER BY DATEADD DESC";
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/podetail/{ponumber}', function(Request $request,Response $response) { 
	$id = $request->getAttribute('ponumber');

	$conn=getDatabase();	
	$sql = "SELECT PODETAIL.PONUMBER,PODETAIL.PURCHASE_DATE,PODETAIL.VENDID,PODETAIL.VENDNAME,PODETAIL.PRODUCTID,PODETAIL.PRODUCTNAME,PODETAIL.ORDER_QTY,PODETAIL.RECEIVE_QTY,PHONE1,PHONE2 FROM PODETAIL,APVENDOR WHERE PODETAIL.VENDID = APVENDOR.VENDID  AND PONUMBER = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($id));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/posearch', function(Request $request,Response $response) { 	

	$conn=getDatabase();	
	$ponumber = $request->getParam('ponumber','');
	$userpurchase = $request->getParam('userpurchase','');
	$useredit = $request->getParam('useredit','');
	$from = $request->getParam('from','');
	$to =  $request->getParam('to','');


	$sql = "SELECT * FROM POHEADER WHERE 1 = 1 ";
	$params = array();

	if ($ponumber != "")
	{
		$sql .= "AND PONUMBER = ? ";
		array_push($params,$ponumber);
	}
	if ($userpurchase != "")
	{
		$sql .= "AND USERADD = ? ";
		array_push($params,$userpurchase);
	}
	if ($useredit != "")
	{
		$sql .= "AND USEREDIT = ? ";
		array_push($params,$useredit);
	}
	if ($from != "")
		$sql .= "AND DATEADD >= '$from 00:00:00.000' ";

	if ($to != "")
		$sql .= "AND DATEADD <= '$to 23:59:59.999' ";
	$sql .= "ORDER BY DATEADD DESC";							
	$req = $conn->prepare($sql);
	$req->execute($params);	
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

// Received PO (with item count) of the month
$app->get('/myreceivedpo/{login}', function(Request $request,Response $response) {

	$today = date("Y-m-d");
	$month = explode('-',$today)[1];
	$year = explode('-',$today)[0];

	$firstday = $year."-".$month."-"."1";

	$login = $request->getAttribute('login');
	$cvUser = CVUserByLogin($login);

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE  USERADD = ? AND DATEADD BETWEEN '$firstday 00:00:00.000' AND '$today 23:59:59.999' ORDER BY DATEADD DESC";	
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/receivedposearch', function(Request $request,Response $response) { 
	$userreceive = $request->getParam('userreceive','');
	$from = $request->getParam('from','');
	$to =  $request->getParam('to','');

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE  USERADD = ? AND DATEADD BETWEEN '$from 00:00:00.000' AND '$to 23:59:59.999' ORDER BY DATEADD DESC";	
	$req = $conn->prepare($sql);	
	$req->execute(array($userreceive));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/receivedpodetail/{poreceivenumber}', function(Request $request,Response $response) { 
	$id = $request->getAttribute('poreceivenumber');

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEDETAIL WHERE RECEIVENO = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($id));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;
});

$app->post('/products',function(Request $request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$products = $json["products"];
	foreach($products as $product)
	{
		$sql = "SELECT * FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($product["PRODUCTID"]));
		$result = $req->fetchAll(PDO::FETCH_ASSOC);
		if (count($result) == 0) // INSERT
		{
			$sql = "INSERT INTO ICPRODUCT ()";
		} // UPDATE
		else 
		{

		}
	}
});

$app->get('/orderedCategories',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$sql = "SELECT CATEGORYNAME FROM CATEGORY ORDER BY CATEGORYNAME ASC";
	
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp = array();
	foreach ($result as $category) 	
		array_push($resp,$category["CATEGORYNAME"]);
	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/classifiedCategories',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$sql = "SELECT SECTIONNAME,DEPARTMENTNAME,CATEGORYNAME FROM CATEGORY";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	/*
	$resp = array();
	foreach ($result as $category) 	
		array_push($resp,$category["CATEGORYNAME"]);
	*/
	$response = $response->withJson($result);
	return $response;
});

/// 
$app->get('/calculatePrice',function(Request $request,Response $response) {

	$cost = $request->getParam('cost','');
	$category = $request->getParam('category','');
	
	
	$db = getInternalDatabase();
	$sql = "SELECT * FROM CATEGORY WHERE CATEGORYNAME = ?";
	$req = $db->prepare($sql);
	$req->execute(array($category));
	$result = $req->fetch(PDO::FETCH_ASSOC);

	$min = $result["MINCLASS"];
	$avg = $result["AVGCLASS"];
	$max = $result["MAXCLASS"];
	
	// FIND RANGE 
	$sql = "SELECT * FROM PRICECLASS";
	$req = $db->prepare($sql);
	$req->execute(array());
	$priceclasses = $req->fetchAll(PDO::FETCH_ASSOC);
	$selectedPriceClass = null;
	foreach($priceclasses as $priceclass){
		$splitted = explode(' -> ',$priceclass["RANGE"]);
		$rmin = substr($splitted[0],1);
		$rmax = substr($splitted[1],1);

		//echo $rmin."|".$rmax."<br>";
		if($cost >= $rmin && $cost <= $rmax){
			$selectedPriceClass = $priceclass;			
		}		
	}	
	$resp = array();
	if ($selectedPriceClass != null){
		$resp["MIN"] = $selectedPriceClass["CLASS".$min];
		$resp["AVG"] = $selectedPriceClass["CLASS".$avg];
		$resp["MAX"] = $selectedPriceClass["CLASS".$max];
		$resp["CLASSMIN"] = $min;
		$resp["CLASSAVG"] = $avg;
		$resp["CLASSMAX"] = $max;
		$resp["DATA"] = $selectedPriceClass;
	}	
	
	$response = $response->withJson($resp);
	return $response;
});


// SDDCCCNNNNPPPP
// S = SECTION
// DD = DEPARTMENT
// CCC = CATEGORY 
// NNNN = SEQUENCE
// PPPP = PADDING (1984)
function GenerateCategoryNumberByName($category){
	$padding = 1984;
	$sections = [
		'FRESH' => '1',
		'DRY GROCERY' => '2',
		'FROZEN' => '3',
		'NON-FOOD' => '4' 
	];

	$database = getInternalDatabase();
	$sql = "SELECT * FROM CATEGORY WHERE CATEGORYNAME = ?";
	$req = $database->prepare($sql);
	$req->execute(array($category));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	

	$categoryName = $result["CATEGORYNAME"];

	$sectionName = $result["SECTIONNAME"];
	
	$departmentName = $result["DEPARTMENTNAME"];


	$sql = "SELECT distinct(DEPARTMENTNAME) FROM CATEGORY WHERE SECTIONNAME = ?";
	$req = $database->prepare($sql);
	$req->execute(array($sectionName));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$positionDep = 1;
	foreach($result as $category){
		if ($category["DEPARTMENTNAME"] == $departmentName)
			break;
		$positionDep++;		
	}
	$positionDep = sprintf("%02d",$positionDep);

	$sql = "SELECT * FROM CATEGORY WHERE DEPARTMENTNAME = ?";
	$req = $database->prepare($sql);
	$req->execute(array($departmentName));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$positionCat = 1;
	foreach($result as $category){
		if ($category["CATEGORYNAME"] == $categoryName)
			break;
		$positionCat++;		
	}
	$positionCat = sprintf("%03d",$positionCat);

	$start = 9999;
	$db = getDatabase();
	$barcodes = "";
	$count = 0;	
	for($i = $start;$i > 0;$i--)
	{
		$sequenceName = sprintf("%04d",$i);

		$final = $sections[$sectionName].$positionDep.$positionCat.$sequenceName.$padding;			
		$sql = "SELECT * FROM ICPRODUCT WHERE BARCODE = ?";
		$req = $db->prepare($sql);
		$req->execute(array($final));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result == null)
		{
			$barcodes .= $final . "<br>";
			$count++;
		}				
		if($count == 100)
			break;
	}	
	return $barcodes;
}




/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								   SUPPLY RECORD 
								   SUPPLY RECORD
								   SUPPLY RECORD                               */

function pictureRecord($base64Str,$type,$id){
	

	if ($type == "INVOICES")
	{
		$filename = "./img/supplyrecords_invoices/";	
		$invoices = json_decode($base64Str,true);			
		$count = 1;
		if ($invoices != null)
		{
			foreach($invoices as $invoice)
			{
				file_put_contents($filename."INV_".$id."_".$count.".png", base64_decode($invoice));	
				$count++;
			}			
		}
		
	}
	else 
	{
		$imageData = base64_decode($base64Str);
		if ($type == "VAL")
			$filename = "./img/supplyrecords_signatures/VAL_".$id.".png";
		else if ($type == "PCH")
			$filename = "./img/supplyrecords_signatures/PCH_".$id.".png";
		else if ($type == "WH")
			$filename = "./img/supplyrecords_signatures/WH_".$id.".png";
		else if ($type == "RCV")
			$filename = "./img/supplyrecords_signatures/RCV_".$id.".png";
		else if ($type == "ACC")
			$filename = "./img/supplyrecords_signatures/ACC_".$id.".png";

		else if ($type == "")
			$filename = "./img/supplyrecords_signatures/ACC_".$id.".png";			
		file_put_contents($filename, $imageData);
	}	
}

function createSupplyRecordForPO(){
	$db = getDatabase();		
	$indb = getInternalDatabase();

	// ALL
	$sql = "SELECT * FROM POHEADER WHERE POSTATUS = '' AND VENDID <> '400-463'";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $onePO)
	{
		$sql = "SELECT count(*) as CNT FROM SUPPLY_RECORD WHERE PONUMBER = ?"; 
		$req = $indb->prepare($sql);
		$req->execute(array($onePO["PONUMBER"]));
		$cnt = $req->fetch(PDO::FETCH_ASSOC)["CNT"];
		if ($cnt == 0)
		{

			if($onePO["NOTES"] == "AUTOVALIDATED")
			{

				$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,'ORDERED','PO','YES')";
				$req = $indb->prepare($sql);
				$req->execute(array($onePO["PONUMBER"], $onePO["USERADD"], $onePO["VENDID"], $onePO["VENDNAME"], $onePO["DATEADD"]));

				$sql = "UPDATE PODETAIL SET PPSS_ORDER_PRICE = CONVERT(varchar,TRANCOST) WHERE PONUMBER = ?";
				$req = $db->prepare($sql);
				$req->execute(array($onePO["PONUMBER"]));

			}
			else if($onePO["NOTES"] == "NOPO")
			{
				$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,'ORDERED','NOPO','YES')";
				$req = $indb->prepare($sql);
				$req->execute(array($onePO["PONUMBER"], $onePO["USERADD"], $onePO["VENDID"], $onePO["VENDNAME"], $onePO["DATEADD"]));

				$sql = "UPDATE PODETAIL SET PPSS_ORDER_PRICE = CONVERT(varchar,TRANCOST) WHERE PONUMBER = ?";
				$req = $db->prepare($sql);
				$req->execute(array($onePO["PONUMBER"]));
			}
			else 
			{
				$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE) VALUES (?,?,?,?,?,'WAITING','PO')";
				$req = $indb->prepare($sql);
				$req->execute(array($onePO["PONUMBER"], $onePO["USERADD"], $onePO["VENDID"], $onePO["VENDNAME"], $onePO["DATEADD"]));
			}
		}		
	}

	// CLEAN
	$sql = "SELECT * FROM POHEADER WHERE POSTATUS = 'V'";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $onePO)
	{
		$sql = "DELETE FROM SUPPLY_RECORD WHERE PONUMBER = ?";
		$req = $indb->prepare($sql);
		$req->execute(array($onePO["PONUMBER"]));
	}
	// RETROACTIVE DELETE THE ONE VOIDED 



}	

$app->get('/supplyrecordsearch', function(Request $request,Response $response) {

	$today = date("Y-m-d");
		
	$ponumber = $request->getParam('PONUMBER','');
	$start =  $request->getParam('START','');
	$end =  $request->getParam('END','');
	$status =  $request->getParam('STATUS','ALL');
	$potype =  $request->getParam('POTYPE','ALL');
	$productid = $request->getParam('PRODUCTID','ALL');
	$vendorname = $request->getParam('VENDORNAME','');
	$vendid = $request->getParam('VENDID','');

	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT * FROM SUPPLY_RECORD 
		    WHERE 1 = 1";
	$params = array();

	if ($vendid != ''){
		$sql .= " AND VENDID = ? ";
		array_push($params,$vendid);
	}

	if ($vendorname != ''){
		$sql .= " AND VENDNAME LIKE ? ";
		array_push($params,'%'.$vendorname.'%');
	}

	if ($ponumber != ''){
		$sql .= " AND (PONUMBER = ? OR LINKEDPO = ?)";
		array_push($params,$ponumber,$ponumber);
	}

	if ($start != '' && $end != ''){
		$sql .= " AND CREATED between ? AND ?";
		array_push($params,$start." 00:00:00.000" ,$end." 23:59:59.999");	
	}

	if ($status != 'ALL'){
		$sql .= " AND STATUS = ?";
		array_push($params,$status);
	}

	if ($potype != 'ALL')
	{
		if ($potype == 'AUTOVALIDATED')
			$sql .= " AND AUTOVALIDATED = 'YES'";
		else {
			$sql .= " AND TYPE = ?";
			array_push($params,$potype);
		}
		
	}

	if ($productid != ''){
				
		$sql1 = "SELECT PONUMBER FROM PODETAIL WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql1);
		$ponumbers = $req->fetchAll();
		if (count($ponumbers) > 0)
		{
			$sql .= "AND PONUMBER IN (";
			foreach($ponumbers as $ponumber)
			{
				$sql .= "?,";
				array_push($params,$ponumber["PONUMBER"]);
			}
			$sql = substr($sql,0,-1);
			$sql .= ")"; 	
		} 
	}
	error_log($sql);

	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	// ADD VENDNAME	
	$newData = array();

	foreach($data as $oneData){
		$sql = "SELECT VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($oneData["PONUMBER"]));		
		$oneRes = $req->fetch();
		if ($oneRes != false)
			$oneData["VENDNAME"] = $oneRes["VENDNAME"];
		
		// COUNT INVOICES
		$count = 1;
		$nbinvoices = 0;
		do
		{       
	        if (file_exists("./img/supplyrecords_invoices/INV_".$oneData["ID"]."_".$count.".png"))
	          $nbinvoices++;                
	        $count++;        
	        $go = file_exists("./img/supplyrecords_invoices/INV_".$oneData["ID"]."_".$count.".png");
    	}while($go);		
		$oneData["NBINVOICES"] = $nbinvoices;
		array_push($newData,$oneData);
	}
	$response = $response->withJson($newData);
	return $response;
});

$app->get('/supplyrecord/{status}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$db2 = getDatabase();

	$status = $request->getAttribute('status');
	if ($status == "WAITING")
		createSupplyRecordForPO();

	if ($status == "ALL"){
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE TYPE = 'PO'
			ORDER BY LAST_UPDATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array());
		$POData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else if ($status == "DELIVEREDAUTO")
	{
		$sql = "SELECT *
		FROM SUPPLY_RECORD 
		WHERE STATUS = ?
		AND TYPE = 'PO' 
		ORDER BY LAST_UPDATED DESC";	
		$req = $db->prepare($sql);
		$req->execute(array("DELIVERED"));
		$POData = $req->fetchAll(PDO::FETCH_ASSOC);	

		$filter = array();
		foreach($POData as $onePOData)
		{
			if ($onePOData["PONUMBER"] != null)
			{
				$sql = "SELECT *,(TRANCOST - (TRANCOST * (TRANDISC / 100)) ) as REALCOST
						FROM PODETAIL WHERE PONUMBER = ?";
				$req = $db2->prepare($sql);
				$req->execute(array($onePOData["PONUMBER"]));
				$details = $req->fetchAll(PDO::FETCH_ASSOC);

				$isClean = true;
				foreach($details as $detail)
				{
					$maxsql = "SELECT TOP(1) VENDNAME,(TRANCOST  - (TRANCOST * (TRANDISC / 100)) ) as COST
							   FROM PORECEIVEDETAIL 
							   WHERE PRODUCTID = ?
							  ORDER BY TRANCOST DESC";
					$req = $db2->prepare($maxsql); 
	 				$req->execute(array($detail["PRODUCTID"]));
	 				$maxcost = $req->fetch(PDO::FETCH_ASSOC)["COST"];	
	 		 
	 				if ($detail["REALCOST"]  > $maxcost){
						$isClean = false;
						break;
	 				}		 		
				}
				if ($isClean == true)
	 				array_push($filter,$onePOData);
			} 					
		}
		$POData = $filter;
	}
	else if ($status == "RECEIVED")
	{
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE (STATUS = 'RECEIVED' OR STATUS = 'PAID')
			AND TYPE = 'PO' 
			ORDER BY LAST_UPDATED DESC";	
			$req = $db->prepare($sql);
			$req->execute(array());
			$POData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else 
	{
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE STATUS = ?
			AND TYPE = 'PO' 
			ORDER BY LAST_UPDATED DESC";	
		$req = $db->prepare($sql);
		$req->execute(array($status));
		$POData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	// ADD VENDNAME	
	$newPOData = array();
	foreach($POData as $onePOData){
		$sql = "SELECT VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
		$req = $db2->prepare($sql);
		$req->execute(array($onePOData["PONUMBER"]));
		$oneRes = $req->fetch();
		$onePOData["VENDNAME"] = $oneRes["VENDNAME"];
		
		// COUNT INVOICES
		$count = 1;
		$nbinvoices = 0;
		do
		{       

	        if (file_exists("./img/supplyrecords_invoices/INV_".$onePOData["ID"]."_".$count.".png"))
	          $nbinvoices++;                
	        $count++;        
	        $go = file_exists("./img/supplyrecords_invoices/INV_".$onePOData["ID"]."_".$count.".png");
    	}while($go);		
		$onePOData["NBINVOICES"] = $nbinvoices;
		array_push($newPOData,$onePOData);
	}
	$mixData["PO"] = $newPOData;

	// NO PO
	if ($status == "ALL"){
		$sql = "SELECT *
			FROM SUPPLY_RECORD 
			WHERE TYPE = 'NOPO'
			ORDER BY LAST_UPDATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array());
		$NOPOData = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else {
		$sql = "SELECT *
		FROM SUPPLY_RECORD 
		WHERE STATUS = ?
		AND TYPE = 'NOPO' 
		ORDER BY LAST_UPDATED DESC";	
		$req = $db->prepare($sql);
		$req->execute(array($status));
		$NOPOData = $req->fetchAll(PDO::FETCH_ASSOC);			
	}	

	$newNOPOData = array();
	foreach($NOPOData as $oneNOPOData){		
		// COUNT INVOICES
		$count = 1;
		$nbinvoices = 0;
		do
		{        
	        if (file_exists("./img/supplyrecords_invoices/INV_".$oneNOPOData["ID"]."_".$count.".png"))
	          $nbinvoices++;                
	        $count++;        
	        $go = file_exists("./img/supplyrecords_invoices/INV_".$oneNOPOData["ID"]."_".$count.".png");
    	}while($go);		
		$oneNOPOData["NBINVOICES"] = $nbinvoices;
		array_push($newNOPOData,$oneNOPOData);
	}
	$mixData["NOPO"] = $newNOPOData;

	$response = $response->withJson($mixData);
	return $response;
});

$app->post('/supplyrecord', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	if (isset($json["TYPE"]) == "NOPO") // NOPO, the only possible case 
	{
			$sql = "INSERT INTO SUPPLY_RECORD (WAREHOUSE_USER,NOPONOTE,STATUS,TYPE) 
			VALUES (:author,:noponote,'DELIVERED','NOPO')";
		$req = $db->prepare($sql);	
	
		$req->bindParam(':author',$json["WAREHOUSE_USER"],PDO::PARAM_STR);
		$req->bindParam(':noponote',$json["NOPONOTE"],PDO::PARAM_STR);
		$req->execute();
		$lastID = $db->lastInsertId();
		
		pictureRecord($json["WAREHOUSESIGNATUREIMAGE"],"WH",$lastID);
		pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$lastID);	
		$result["RESULT"] = "OK";
	}
	else
		$result["RESULT"] = "KO";
	
	

	$response = $response->withJson($result);
	return $response;
});

function splitPOWithItems($ponumber,$items)
{
	$dbBLUE = getDatabase();

	$now = date("Y-m-d H:i:s");
	$sql = "SELECT * FROM POHEADER WHERE PONUMBER = ?";
	$req = $dbBLUE->prepare($sql); 
	$req->execute(array($ponumber));
	$header = $req->fetch();

	$sql = "SELECT num1 FROM SYSDATA where sysid = 'PO'";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array());	
	$num1 = $req->fetch(PDO::FETCH_ASSOC)["num1"];
	$newID = intval($num1);
	$identifier = sprintf("PO%013d",$newID);

	// Increment gen ID for Next	
	$incremented = $newID + 1;
	$sql = "UPDATE SYSDATA set num1 = ? where sysid = 'PO'"; 
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($incremented));

	$PONUMBER = $identifier;
	$VENDID = $header["VENDID"];
	$VENDNAME = $header["VENDNAME"];
	$VENDNAME1 = $header["VENDNAME1"];
	$PODATE = $now;

	$LOCID = $header["LOCID"];	
	$USERADD = $header["USERADD"];
	$DATEADD = $now;
	$VAT_PERCENT = $header["VAT_PERCENT"];

	$PCNAME = "APPLICATION";
	$CURR_RATE = $header["CURR_RATE"];
	$CURRID = $header["CURRID"];
	$EST_ARRIVAL = $now;
	$REQUIRE_DATE = $now;

	$DISC_PERCENT = $header["DISC_PERCENT"];
	$BASECURR_ID = $header["BASECURR_ID"];
	

	$PURCHASE_AMT = 0;
	$VAT_AMT = 0;
			

	foreach($items as $item)
	{
		$sql = "SELECT TRANCOST,TRANDISC FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber,$item["ID"]));
		$res = $req->fetch();
		$TRANDISC = $res["TRANDISC"];
		$TRANCOST = $res["TRANCOST"];


		if ($TRANDISC != null && $TRANDISC != "0")
			$calculatedCost =  $TRANCOST - ($TRANCOST * ($TRANDISC / 100));
		else 
			$calculatedCost =  $TRANCOST;

		$vat = $calculatedCost * ($VAT_PERCENT / 100);
		$price =   $calculatedCost - ($calculatedCost * ($TRANDISC / 100)); 
		$PURCHASE_AMT += $price;
		$VAT_AMT += $vat;
	}
	$CURRENCY_VATAMOUNT = $VAT_AMT;

	$sql = "INSERT POHEADER (
		PONUMBER,VENDID,VENDNAME,VENDNAME1,PODATE,
		LOCID,PURCHASE_AMT,USERADD,DATEADD,VAT_PERCENT,
		PCNAME,CURR_RATE,CURRID,EST_ARRIVAL,REQUIRE_DATE,
		VAT_AMT,DISC_PERCENT,BASECURR_ID,CURRENCY_VATAMOUNT,
		NOTES,REFERENCE,POSTATUS) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$req =$dbBLUE->prepare($sql);	


	$params = array($PONUMBER,$VENDID,$VENDNAME,$VENDNAME1,$PODATE,
					$LOCID,$PURCHASE_AMT,$USERADD,$DATEADD,$VAT_PERCENT,					
					$PCNAME,$CURR_RATE,$CURRID,$EST_ARRIVAL,$REQUIRE_DATE,					
					$VAT_AMT,$DISC_PERCENT,$BASECURR_ID,$VAT_AMT,"AUTOVALIDATED",
					"SPLIT FROM ".$ponumber,"");
	$req->execute($params);

	$line = 1;
	foreach($items as $item)
	{
		$sql = "SELECT * FROM PODETAIL WHERE PRODUCTID = ? AND PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($item["ID"],$ponumber));		
		$itemdetail =  $req->fetch();


		$PURCHASE_DATE = $itemdetail["PURCHASE_DATE"];
		$PRODUCTID = $item["ID"];
		$PRODUCTNAME = $itemdetail["PRODUCTNAME"];
		$PRODUCTNAME1 = $itemdetail["PRODUCTNAME1"];
		$ORDER_QTY = $itemdetail["ORDER_QTY"];

		$TRANUNIT = $itemdetail["TRANUNIT"];	
		$TRANFACTOR = $itemdetail["TRANFACTOR"];
		$STKUNIT = $itemdetail["STKUNIT"];
		$STKFACTOR = $itemdetail["STKFACTOR"];
		$TRANDISC = $itemdetail["TRANDISC"];

		$TRANCOST = $itemdetail["TRANCOST"];
		$EXTCOST = $itemdetail["EXTCOST"];
		$CURRENTONHAND = $itemdetail["CURRENTONHAND"];
		$CURRID = $itemdetail["CURRID"];
		$CURR_RATE = $itemdetail["CURR_RATE"];

		$WEIGHT = $itemdetail["WEIGHT"];
		$OLDWEIGHT = $itemdetail["OLDWEIGHT"];
		$USERADD = $itemdetail["USERADD"];
		$DATEADD = $now;

		$VATABLE = $itemdetail["VATABLE"];
		$VAT_PERCENT = $itemdetail["VAT_PERCENT"];
		$BASECURR_ID = $itemdetail["BASECURR_ID"];
		$CURRENCY_AMOUNT = $itemdetail["CURRENCY_AMOUNT"];
		$CURRENCY_COST = $itemdetail["CURRENCY_COST"];

		$sql = "INSERT INTO PODETAIL (
		PONUMBER,VENDID,VENDNAME,VENDNAME1,PURCHASE_DATE, 
		PRODUCTID,LOCID,PRODUCTNAME,PRODUCTNAME1,ORDER_QTY, 	
		TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,TRANDISC,
		TRANCOST,EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,	
		WEIGHT,OLDWEIGHT,USERADD,DATEADD,TRANLINE,
		VATABLE,VAT_PERCENT,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 

		$req = $dbBLUE->prepare($sql);
		$params = array(
		$PONUMBER,$VENDID, $VENDNAME, $VENDNAME, $PURCHASE_DATE,
		$PRODUCTID, $LOCID,$PRODUCTNAME,$PRODUCTNAME1, $ORDER_QTY, 
		$TRANUNIT, $TRANFACTOR, $STKUNIT, $STKFACTOR, $TRANDISC,
		$TRANCOST, $EXTCOST, $CURRENTONHAND, $CURRID, $CURR_RATE,
		$WEIGHT, $OLDWEIGHT, $USERADD, $DATEADD, $line, 
		$VATABLE, $VAT_PERCENT,$BASECURR_ID, $CURRENCY_AMOUNT,$CURRENCY_COST);

		$req->execute($params);				
		$line++;
	}

	$indb = getInternalDatabase();
	$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,'ORDERED','PO','YES')";
	$req = $indb->prepare($sql);
	$req->execute(array($PONUMBER, $USERADD, $VENDID, $VENDNAME, $DATEADD));

	$sql = "UPDATE PODETAIL SET PPSS_ORDER_PRICE = CONVERT(varchar,TRANCOST) WHERE PONUMBER = ?";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($PONUMBER));

}

$app->put('/supplyrecord', function(Request $request,Response $response) {
	$json = json_decode($request->getBody(),true);	
	
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();

	if ($json["ACTIONTYPE"] == "VAL"){

		$sql = "UPDATE SUPPLY_RECORD SET VALIDATOR_USER = :author ,STATUS = 'VALIDATED'  WHERE ID = :identifier" ;
		$req = $db->prepare($sql);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();
		pictureRecord($json["SIGNATURE"],"VAL",$json["IDENTIFIER"]);

		if (isset($json["ITEMS"]))
		{
			// TODO UPDATE EXTCOST
			foreach($json["ITEMS"] as $key => $value)
			{
				$sql = "UPDATE PODETAIL SET  ORDER_QTY = ?,PPSS_VALIDATION_QTY = ?, PPSS_NOTE = ? WHERE  PRODUCTID = ? AND PONUMBER = ? ";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($value["PPSS_VALIDATION_QTY"],$value["PPSS_VALIDATION_QTY"],$value["PPSS_NOTE"],$key,$json["PONUMBER"]) );	 						
			}
		}
		$data["RESULT"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "PCH"){			
		$sql = "UPDATE SUPPLY_RECORD SET PURCHASER_USER = :author ,STATUS = 'ORDERED'  WHERE ID = :identifier";
		$req = $db->prepare($sql);			
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"PCH",$json["IDENTIFIER"]);		

		$sql = "UPDATE PODETAIL SET PPSS_ORDER_PRICE = CONVERT(varchar,TRANCOST) WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($json["PONUMBER"]));

		$data["RESULT"] = "OK";	

	}
	// CREATE ANOTHER PO WHEN THERE ARE ZERO QUANTITY ON ITEM FOR DKSH

	else if ($json["ACTIONTYPE"] == "WH"){

			$sql = "UPDATE SUPPLY_RECORD SET WAREHOUSE_USER = :author, STATUS = 'DELIVERED' WHERE ID = :identifier";
			$req = $db->prepare($sql);							
			$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
			$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);			
			$req->execute();			

			if(isset($json["INVOICEJSONDATA"]))
				pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$json["IDENTIFIER"]);
			pictureRecord($json["SIGNATURE"],"WH",$json["IDENTIFIER"]);

		if (isset($json["ITEMS"]))
		{
		
			$sql = "SELECT VENDID FROM POHEADER WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$vendid = $req->fetch()["VENDID"];

			$isSplitCompany = false;

			if ($vendid == "100-003" || $vendid == "100-050" || $vendid == "100-135" || $vendid == "100-328" || $vendid == "100-053" || 
				$vendid == "100-065" || $vendid == "100-022" || $vendid == "100-140" || $vendid == "100-015" || $vendid == "400-037" ||		
				$vendid == "100-108" || $vendid == "100-150" || $vendid == "100-999"){
				$isSplitCompany = true;
			}

			$absentitems = array();
			foreach($json["ITEMS"] as $key => $value) // TODO ITEM WITH NOT ENOUGH QTY
			{			
	
				if ($value["PPSS_RECEPTION_QTY"] == "0" || $value["PPSS_RECEPTION_QTY"] == 0)
				{
						$value["ID"] = $key; // useful ?
						array_push($absentitems,$value);
				}												
				else 
				{
					$sql = "SELECT TRANCOST,TRANDISC FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID = ?";
					$req = $dbBLUE->prepare($sql);
					$req->execute(array($json["PONUMBER"],$key));
					$res = $req->fetch();
					$TRANDISC = $res["TRANDISC"];


					if (!isset($value["PPSS_INVOICE_PRICE"]) ||  $value["PPSS_INVOICE_PRICE"] == null)				
						$value["PPSS_INVOICE_PRICE"] = "0";

					if (!is_numeric($value["PPSS_INVOICE_PRICE"]))
						$value["PPSS_INVOICE_PRICE"] = "0";
							
					if ($TRANDISC != null && $TRANDISC != "0")
						$calculatedCost =  $value["PPSS_INVOICE_PRICE"] - ($value["PPSS_INVOICE_PRICE"] * ($TRANDISC / 100));
					else 
						$calculatedCost =  $value["PPSS_INVOICE_PRICE"];

					$extcost = $value["PPSS_RECEPTION_QTY"] * $calculatedCost;
					 
					$sql = "UPDATE PODETAIL SET PPSS_INVOICE_PRICE = ?, TRANCOST = ?, EXTCOST = ?, ORDER_QTY = ?, PPSS_RECEPTION_QTY = ?,PPSS_NOTE = ? 
							WHERE  PRODUCTID = ? AND PONUMBER = ? ";
					$req = $dbBLUE->prepare($sql);

					$req->execute(array($value["PPSS_INVOICE_PRICE"],$calculatedCost,$extcost,$value["PPSS_RECEPTION_QTY"] ,
										$value["PPSS_RECEPTION_QTY"],$value["PPSS_NOTE"],$key,$json["PONUMBER"]) );	
				}					 						
			}
	
			if ($isSplitCompany  == true)
				splitPOWithItems($json["PONUMBER"],$absentitems);
			  
			// CLEAN ALL ZERO : IMPORTANT DO AFTER SPLIT 
			foreach($absentitems as $item)
			{
				$sql = "DELETE FROM PODETAIL WHERE PRODUCTID = ? AND PONUMBER = ?";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($item["ID"],$json["PONUMBER"]));
			}
			
			// RECALCULATE AMOUNT ON POHEADER
			$sql = "SELECT EXTCOST FROM PODETAIL WHERE PONUMBER = ? ";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$details = $req->fetchAll();
			$totalAMT = 0;
			foreach($details as $detail)			
				$totalAMT += $detail["EXTCOST"];

			$sql = "UPDATE POHEADER SET PURCHASE_AMT = ? WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($totalAMT,$json["PONUMBER"]));

		}
		$data["RESULT"] = "OK";
	}else if ($json["ACTIONTYPE"] == "RCV"){
		$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'RECEIVED', RECEIVER_USER = :author, 
				LINKEDPO = :linkedpo WHERE ID = :identifier";			
		$req = $db->prepare($sql);

		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);	
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':linkedpo',$json["LINKEDPO"],PDO::PARAM_STR);
		$req->execute();
		
		pictureRecord($json["SIGNATURE"],"RCV",$json["IDENTIFIER"]);
		$data["RESULT"] = "OK";

	}else if ($json["ACTIONTYPE"] == "ACC"){
		$sql = "UPDATE SUPPLY_RECORD SET 
					   ACCOUNTANT_USER = :author,
					   STATUS = 'PAID' 
					   WHERE ID = :identifier";	
		$req = $db->prepare($sql);
		$image = base64_decode($json["SIGNATURE"]);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"ACC",$json["IDENTIFIER"]);
		$data["RESULT"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "WHCANCEL"){
		$sql = "UPDATE SUPPLY_RECORD  
				SET WAREHOUSE_USER = null, 
				STATUS = 'ORDERED', 
				CANCELER = :author
			   WHERE ID = :identifier";
		$req = $db->prepare($sql);						
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();

		// Delete all invoices 
		$count = 1;
		$res = true;
		do{
			if(file_exists("./img/supplyrecords_invoices/INV_".$json["IDENTIFIER"]."_".$count.".png"))
				$res = unlink("./img/supplyrecords_invoices/INV_".$json["IDENTIFIER"]."_".$count.".png");
			else
				$res = false; 
			$count++;		
		}while($res);
		if (file_exists("./img/supplyrecords_signatures/WH_".$json["IDENTIFIER"].".png"))	
			unlink("./img/supplyrecords_signatures/WH_".$json["IDENTIFIER"].".png");

		// Cancel all validation
		$sql = "UPDATE PODETAIL SET PPSS_RECEPTION_QTY = '0', PPSS_NOTE = null WHERE  PONUMBER = ? ";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($json["PONUMBER"]) );	

		$data["RESULT"] = "OK";	 			
	}
	else if ($json["ACTIONTYPE"] == "PCHCANCEL")
	{
			$sql = "UPDATE SUPPLY_RECORD 
					SET PURCHASER_USER = null ,
					STATUS = 'VALIDATED',
					CANCELER = :author  
					WHERE ID = :identifier";
		$req = $db->prepare($sql);		
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);				
		$req->execute();
		if(file_exists("./img/supplyrecords_signatures/PCH_".$json["IDENTIFIER"].".png"))
			unlink("./img/supplyrecords_signatures/PCH_".$json["IDENTIFIER"].".png");
		$data["RESULT"] = "OK";	
	}
	else
	{
		$data["RESULT"] = "KO";
	}	

	$response = $response->withJson($data);
	return $response;
});

$app->get('/supplyrecorddetails/{id}', function(Request $request,Response $response) {
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();
	$db2 = getDatabase();

	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$rr = $req->fetch(PDO::FETCH_ASSOC);

	$rr["items"] = null;


	$sql = "SELECT PRODUCTID,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as PRODUCTNAME,VENDNAME,
				   ORDER_QTY,
					(TRANCOST -  (TRANCOST * (TRANDISC / 100)) ) as TRANCOST
				   ,TRANDISC,EXTCOST,PPSS_RECEPTION_QTY,PPSS_VALIDATION_QTY,PPSS_NOTE,PPSS_INVOICE_PRICE,PPSS_ORDER_PRICE FROM PODETAIL WHERE PONUMBER = ?";

	if ($rr["TYPE"] == "NOPO")
	{
		if ($rr["LINKEDPO"] != null)
		{
			$req = $db2->prepare($sql);
			$req->execute(array($rr["LINKEDPO"]));
			$rr["items"] = $req->fetchAll(PDO::FETCH_ASSOC);			 
		}
	}
	else 
	{
		$req = $db2->prepare($sql);
		$req->execute(array($rr["PONUMBER"]));
		$poitems  = $req->fetchAll(PDO::FETCH_ASSOC);
		$rr["items"] = $poitems;
	}

	$items = ($rr["items"] != null) ? $rr["items"] : array();

	$tmpItems = array();
	foreach($items as $item){

		$maxsql = "SELECT VENDNAME,TRANDISC, (TRANCOST -  (TRANCOST * (TRANDISC / 100)) ) as COST,TRANCOST
				   FROM PORECEIVEDETAIL 
				   WHERE PRODUCTID =  ? 
				   AND TRANDISC < 100 
				   ORDER BY TRANCOST DESC,TRANDISC ASC";

		$req = $db2->prepare($maxsql); 
 		$req->execute(array($item["PRODUCTID"]));
 		$res = $req->fetch();
		$item["MAXDISC"] = ($res != false) ? $res["TRANDISC"] : "";
 		$item["MAXCOST"] = ($res != false) ? $res["COST"] : "";
 		$item["MAXVENDORNAME"] = ($res != false) ? $res["VENDNAME"] : "";	
 	

		$minsql = "SELECT VENDNAME,TRANDISC, (TRANCOST -  (TRANCOST * (TRANDISC / 100)) ) as COST,TRANCOST
				   FROM PORECEIVEDETAIL 
				   WHERE PRODUCTID =  ? 
				   AND TRANDISC < 100 
				   ORDER BY TRANCOST ASC,TRANDISC DESC";
		$req = $db2->prepare($minsql);
		$req->execute(array($item["PRODUCTID"]));
 		$res = $req->fetch();

		$item["MINDISC"] = ($res != false) ? $res["TRANDISC"] : "";
 		$item["MINCOST"] = ($res != false) ? $res["COST"] : "";
 		$item["MINVENDORNAME"] = ($res != false) ? $res["VENDNAME"] : "";
 		array_push($tmpItems, $item);
	}
	$rr["items"] = $tmpItems;

	$response = $response->withJson($rr);
	return $response;
});


/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
								ITEMREQUESTACTIONS 
								ITEMREQUESTACTIONS
								ITEMREQUESTACTIONS                               */


$app->get('/itemrequestactionsearch', function(Request $request,Response $response) {

	$today = date("Y-m-d");
	// TYPE
	// REQUESTER 
	// REQUESTEE 
	// PRODUCTID ITEMREQUEST
	// DATE FROM
	// DATE TO  

	$type =  $request->getParam('TYPE','ALL');
	$requester =  $request->getParam('REQUESTER','');
	$requestee =  $request->getParam('REQUESTEE','');
	$productid = $request->getParam('PRODUCTID','');
	$start =  $request->getParam('START','');
	$end =  $request->getParam('END','');


	$db = getInternalDatabase();
	$sql = "SELECT * FROM ITEMREQUESTACTION   
		    WHERE 1 = 1 ";
	$params = array();

	if ($type != 'ALL'){
		$sql .= " AND TYPE = ?";
		array_push($params,$type);
	}

	if ($requester != ''){
		$sql .= " AND REQUESTER = ?";
		array_push($params,$requester);	
	}

	if ($requestee != ''){
		$sql .= " AND REQUESTEE = ?";
		array_push($params,$requestee);	
	}

	if ($start != '' && $end != ''){
		$sql .= " AND REQUEST_TIME between ? AND ?";
		array_push($params,$start." 00:00:00.000" ,$end." 23:59:59.999");	
	}

	if ($productid != '')
	{
		$sql1 = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ?";
		$req = $db->prepare($sql1);
		$req->execute(array($productid));
		$irs = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($irs != false)
		{
			$sql .= " AND ID in (";
			foreach($irs as $ir)
			{
				$sql .= "?,";
				array_push($params,$ir["ITEMREQUESTACTION_ID"]);
			}	
			$sql = substr($sql,0,-1);
			$sql .= " )";
		}
		else {
			$sql .= " AND ID in ('IMPOSSIBLE CODE') ";
		}	
	}
	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$response = $response->withJson($data);
	return $response;
});

function createGroupedPurchases()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$sql = "SELECT DISTINCT(VENDID) FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($vendors as $vendor)
	{
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDPURCHASE' AND ARG1 = ?"; 
		$req = $db->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false)
		{

			$sql = "SELECT VENDNAME FROM APVENDOR WHERE VENDID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false)
				$vendorname = $res["VENDNAME"];
			else 
				$vendorname = "";

			$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2) VALUES ('GROUPEDPURCHASE','AUTO',?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"],$vendorname));
			$theID = $db->lastInsertId();
		}
		else		
			$theID = $res["ID"];	

		$sql = "SELECT * FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL WHERE VENDID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($vendor["VENDID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item)
		{
			$sql = "SELECT * FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$theID));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false){
				$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,ITEMREQUESTACTION_ID) VALUES (?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$theID));
			}
			else{
				$sql = "UPDATE ITEMREQUEST SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? 
						WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$theID));
			}
			$sql = "DELETE FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
		}

	}
	
}


$app->get('/itemrequestaction/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	

	$type = $request->getAttribute('type');

	if ($type == "GROUPEDPURCHASE")
		createGroupedPurchases();

	if (substr($type,0,1) == "v")
	{
		$filter = "VALIDATED";
		$type = substr($type,1);
	}	
	else if (substr($type,0,1) == "s")
	{
		$filter = "SUBMITED";
		$type = substr($type,1);
	}
	else if (substr($type,0,1) == "a")
	{
		$filter = "ALL";
		$type = substr($type,1);
	}
	else
		$filter = "UNVALIDATED";




	if ($filter == "UNVALIDATED")
		$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? ORDER BY REQUEST_TIME DESC";
	else if ($filter == "VALIDATED")
		$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE NOT NULL AND TYPE = ? ORDER BY REQUEST_UPDATED DESC";
	else if ($filter == "SUBMITED")
		$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? ORDER BY REQUEST_UPDATED DESC";
	else if ($filter == "ALL")
		$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE TYPE = ? ORDER BY REQUEST_UPDATED DESC";		

	$req = $db->prepare($sql);
	$req->execute(array($type));
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);		
	$response = $response->withJson($actions);

	return $response;
});



$app->post('/itemrequestaction', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$json = json_decode($request->getBody(),true);	

	if($json["TYPE"] == "PURCHASE") 
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER,REQUESTEE) VALUES(?,?,'AUTO')";
	else 
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER) VALUES(?,?)";
	$req = $db->prepare($sql);

	if (substr($json["TYPE"],0,6) == "DEMAND")
		$req->execute(array("DEMAND",$json["REQUESTER"]));
	else 
		$req->execute(array($json["TYPE"],$json["REQUESTER"]));

	$lastID = $db->lastInsertId();

	$imageData = base64_decode($json["REQUESTERSIGNATURE"]);
	file_put_contents("./img/requestaction/R" .$lastID.".png" , $imageData);

	$items = json_decode($json["ITEMS"],true);
	
	$suffix = "";
	$suffix2 = "";
	$tableName = "";
	if ($json["TYPE"] == "RESTOCK") {// STORE SUPERVISOR CREATE RESTOCK REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTRESTOCKPOOL";
		if(isset($json["LISTNAME"]))
			$listname = $json["LISTNAME"];
		else 
			$listname = $items[0]["LISTNAME"];
		$suffix2 = " AND LISTNAME = '".$listname."'";
	}
	else if($json["TYPE"] == "TRANSFER") // WAREHOUSE CREATE TRANSFER REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($json["TYPE"] == "TRANSFERBACK") // WAREHOUSE CREATE TRANSFER REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTTRANSFERBACKPOOL";
	else if($json["TYPE"] == "PURCHASE") // WAREHOUSE CREATE PURCHASE REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if (substr($json["TYPE"],0,6) == "DEMAND"){
		$tableName = "ITEMREQUESTDEMANDPOOL";		
		$userid = substr($json["TYPE"],7);
		$suffix = " AND USERID = ".$userid;
	}

	foreach($items as $item)
	{		
		if ($item["REQUEST_QUANTITY"] == 0 && $suffix == "")
			continue;
		$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,LOCATION,LOTWH1,LOTWH2,ITEMREQUESTACTION_ID) VALUES (?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],
					(isset($item["LOCATION"]) ? $item["LOCATION"] : null),
					(isset($item["LOTWH1"]) ? $item["LOTWH1"] : null),
					(isset($item["LOTWH2"]) ? $item["LOTWH2"] : null),$lastID));

		// IF PURCHASE CLONE TO ITEMREQUESTUNGROUPEDPURCHASEPOOL
		if($json["TYPE"] == "PURCHASE") 
		{
			$sql = "SELECT 1 FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false)
			{
				$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?";
				$req = $dbBlue->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
				$res = $req->fetch(PDO::FETCH_ASSOC);

				if ($res == false)
				{
					$sql = "SELECT VENDID 
							FROM ICPRODUCT,ICPRODUCT_SALEUNIT 
							WHERE ICPRODUCT.PRODUCTID = ICPRODUCT_SALEUNIT.PRODUCTID
							AND PACK_CODE = ?";
					$req = $dbBlue->prepare($sql);
					$req->execute(array($item["PRODUCTID"]));
					$res = $req->fetch(PDO::FETCH_ASSOC)["VENDID"];
				} 
				$vendid = $res["VENDID"];


				$sql = "INSERT INTO ITEMREQUESTUNGROUPEDPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY,VENDID) VALUES (?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$vendid));
			}
			else
			{
				$sql = "UPDATE ITEMREQUESTUNGROUPEDPURCHASEPOOL SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE  PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"]));
			}
		}


		if ($suffix == "")
			$targetQty =$item["REQUEST_QUANTITY"];
		else
			$targetQty =$item["REQUEST_QUANTITY"];	
	
		// UPDATE POOL
		$sql = "SELECT REQUEST_QUANTITY FROM ".$tableName." WHERE PRODUCTID = ?".$suffix.$suffix2;			
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch();
				
		if (($res != false && $res["REQUEST_QUANTITY"] >= $item["REQUEST_QUANTITY"])) // DELETE FROM POOL
		{
			$sql = "DELETE FROM ".$tableName." WHERE PRODUCTID = ?".$suffix.$suffix2;
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));				
		}
		else if ($res != false && $res["REQUEST_QUANTITY"] != $targetQty)// SUBSTRACT POOL
		{
			$newQty = $item["REQUEST_QUANTITY"] - $targetQty;
			$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?".$suffix.$suffix2;
			$req = $db->prepare($sql);
			$req->execute(array($newQty,$item["PRODUCTID"]));								
		}									
	}		
	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

function transferItems($items, $author,$type = "TRANSFER"){	
	$db = getDatabase();
	$now = date("Y-m-d H:i:s");

	//************ TR ************ //
		// GENERATE ID
	$sql = "SELECT num3 FROM SYSDATA where sysid = 'IC'";
	$req = $db->prepare($sql);
	$req->execute(array());	
	$num3 = $req->fetch(PDO::FETCH_ASSOC)["num3"];
	$newID = intval($num3);	

	// Increment gen ID for Next	
	$incremented = $newID + 1;
	$sql = "UPDATE SYSDATA set num3 = ? where sysid = 'IC'"; 
	$req = $db->prepare($sql);
	$req->execute(array($incremented));


	$identifier = "TF" . sprintf("%013d",$newID);
	$FLOCID = ($type == "TRANSFER") ?  "WH2" : "WH1";
	$TLOCID = ($type == "TRANSFER") ?  "WH1" : "WH2"; 
	//$REFERENCE = $json["NOTE"];
	$REFERENCE = "";
	$TRANDATE = $now;
	$DATEADD = $now;
	$PCNAME = "APPLICATION";
	$USERADD = blueUser($author);
	$APPLID = "IC";
	
	$TOTAL_AMT = 0;
	foreach($items as $item){
		$psql = "SELECT COST FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($psql);
		$req->execute(array($item["PRODUCTID"]));	
		$cost = $req->fetch()["COST"];
		$TOTAL_AMT += $cost * $item["REQUEST_QUANTITY"];
	}
	$CURRENCY_AMOUNT = $TOTAL_AMT;

	$headerSQL = "INSERT INTO ICTRANHEADER
	(DOCNUM,FLOCID,TLOCID,REFERENCE,TRANDATE,
	DATEADD,TRANTYPE,PCNAME,USERADD,APPLID,
	TOTAL_AMT,CURRENCY_AMOUNT) 
	VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"; 
	$req = $db->prepare($headerSQL);

	$req->execute(array($identifier,$FLOCID,$TLOCID,$REFERENCE,$TRANDATE,$DATEADD,
						"TR", $PCNAME, $USERADD, $APPLID,$TOTAL_AMT, $CURRENCY_AMOUNT));

	$count = 1;
	foreach($items as $item)
	{
		$psql = "SELECT CATEGORYID,CLASSID,PRODUCTNAME,PRODUCTNAME1,SALEFACTOR,BIG_UNIT_FACTOR,STKFACTOR,COST,PRICE,LASTCOST FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($psql);
		$req->execute(array($item["PRODUCTID"]));	
		$itemDetails = $req->fetch();

		$osql = "SELECT LOCONHAND FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = ?";
		$req = $db->prepare($osql);
		$req->execute(array($item["PRODUCTID"],"WH1"));
		$ONHANDWH1 = $req->fetch()["LOCONHAND"];

		$osql = "SELECT LOCONHAND FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = ?";
		$req = $db->prepare($osql);
		$req->execute(array($item["PRODUCTID"],"WH2"));
		$ONHANDWH2 = $req->fetch()["LOCONHAND"];

		$DOCNUM = $identifier;
		$PRODUCTID = $item["PRODUCTID"];
		$LOCID = ($type == "TRANSFER") ? "WH1" : "WH2";
		$CATEGORYID = $itemDetails["CATEGORYID"];
		$CLASSID = $itemDetails["CLASSID"];
		$TRANDATE = $now;
		$TRANTYPE = "TR";
		$LINENUM = $count;
		$PRODUCTNAME = $itemDetails["PRODUCTNAME"];
		$PRODUCTNAME1 = $itemDetails["PRODUCTNAME1"];
		//$REFERENCE = $json["NOTE"];
		$REFERENCE = "";
		$TRANQTY = $item["REQUEST_QUANTITY"]; 
		$TRANUNIT = $itemDetails["SALEFACTOR"];
		$TRANFACTOR = $itemDetails["BIG_UNIT_FACTOR"];
		$STKFACTOR = $itemDetails["STKFACTOR"];
 		$TRANCOST = $itemDetails["COST"];
 		$TRANPRICE = $itemDetails["PRICE"];
		$PRICE_ORI = $itemDetails["PRICE"];
		$EXTPRICE = $itemDetails["PRICE"] * $item["REQUEST_QUANTITY"];
		$EXTCOST = $itemDetails["COST"] * $item["REQUEST_QUANTITY"];
		$CURRENTONHAND = ($type == "TRANSFER") ? $ONHANDWH1 : $ONHANDWH2;
		$WEIGHT = "1.0";
		$USERADD = blueUser($author);
		$DATEADD = $now;
		$OLDWEIGHT = "1.0";
		$CURRENTCOST = $TRANCOST;
		$LASTCOST = $itemDetails["LASTCOST"];
		$APPLID = "IC";
		$LINK_LINE = $LINENUM;
		$ICCLEARING_ACC = "77000";
		$INVENTORY_ACC = "17000";
		$DIMENSION = "1";
		$TRANQTY_NEW = $TRANQTY;
		$TRANCOST_NEW = $TRANCOST;
		$TRANEXTCOST_NEW = $EXTCOST;
		$COST_METHOD = "AG";
		$CURRENCY_COST = $TRANCOST;
		$CURRENCY_AMOUNT = $EXTCOST; // NEGATIVE IF TI		
		$CURRENCY_EXTPRICE = $EXTPRICE; // NEGATIVE IF TI
		$CURRENCY_PRICE = $itemDetails["PRICE"];
		$MAIN_PRODUCTID = $item["PRODUCTID"];
		
		$BATCHNO1 = "";
		$EXPIRED_DATE1 = "";
		$BATCHNO2 = "";
		$EXPIRED_DATE2 = "";

	// LOT
		if ($item["LOTWH1"] != null && $item["LOTWH2"] != null)
		{
			
			$qsql = "UPDATE ICQUANTITY SET QUANTITY = QUANTITY + ?, USEREDIT = ?, DATEEDIT = ?
					 WHERE PRODUCTID = ? AND LOCID = ? AND BATCHNO = ?";
			$qreq = $db->prepare($qsql);		
			$qty1 = ($type == "TRANSFER")  ? $item["REQUEST_QUANTITY"] : $item["REQUEST_QUANTITY"] * -1;
			$qty2 = ($type == "TRANSFER")  ? $item["REQUEST_QUANTITY"] * -1 : $item["REQUEST_QUANTITY"] ;			
			$qreq->execute(array($qty1,$USERADD, $now, $item["PRODUCTID"],"WH1" ,$item["LOTWH1"]));
			$qreq->execute(array($qty2,$USERADD, $now, $item["PRODUCTID"],"WH2" ,$item["LOTWH2"]));  		 
						
			$lsql = "SELECT TDATE FROM ICQUANTITY WHERE BATCHNO = ? AND LOCID = 'WH1'";
			$req1 = $db->prepare($lsql);
			$req1->execute(array($item["LOTWH1"]));			

			$lsql = "SELECT TDATE FROM ICQUANTITY WHERE BATCHNO = ? AND LOCID = 'WH2'";
			$req2 = $db->prepare($lsql);
			$req2->execute(array($item["LOTWH2"]));
			
			if ($type == "TRANSFER")
			{
				$BATCHNO1 = $item["LOTWH1"];
				$EXPIRED_DATE1 = $req1->fetch()["TDATE"];
				$BATCHNO2 = $item["LOTWH2"];
				$EXPIRED_DATE2 = $req2->fetch()["TDATE"];							
			}
			else if ($type == "TRANSFERBACK")
			{
				$BATCHNO1 = $item["LOTWH2"];
				$EXPIRED_DATE1 = $req2->fetch()["TDATE"];
				$BATCHNO2 = $item["LOTWH1"];
				$EXPIRED_DATE2 = $req1->fetch()["TDATE"];	
			}

		}

		$sql = "INSERT INTO ICTRANDETAIL(
		DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,
		TRANDATE,TRANTYPE,LINENUM,PRODUCTNAME,PRODUCTNAME1,
		REFERENCE,TRANQTY,TRANUNIT,TRANFACTOR,STKFACTOR,
		TRANCOST,TRANPRICE,PRICE_ORI,EXTPRICE,EXTCOST,
		CURRENTONHAND,WEIGHT,USERADD,DATEADD,OLDWEIGHT,
		CURRENTCOST,LASTCOST,APPLID,LINK_LINE,ICCLEARING_ACC,
		INVENTORY_ACC,DIMENSION,TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,
		COST_METHOD,CURRENCY_COST,CURRENCY_AMOUNT,CURRENCY_EXTPRICE,CURRENCY_PRICE,
		MAIN_PRODUCTID,BATCHNO,EXPIRED_DATE) VALUES (
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?,?,?,
		?,?,?) 
		";
		$req = $db->prepare($sql);

		// TR
		$req->execute(array(
		$DOCNUM,$PRODUCTID,$LOCID,$CATEGORYID,$CLASSID,
		$TRANDATE,$TRANTYPE,$LINENUM,$PRODUCTNAME,$PRODUCTNAME1,
		$REFERENCE,$TRANQTY,$TRANUNIT,$TRANFACTOR,$STKFACTOR,
		$TRANCOST,$TRANPRICE,$PRICE_ORI,$EXTPRICE,$EXTCOST,
		$CURRENTONHAND,$WEIGHT,$USERADD,$DATEADD,$OLDWEIGHT,
		$CURRENTCOST,$LASTCOST,$APPLID,$LINK_LINE,$ICCLEARING_ACC,
		$INVENTORY_ACC,$DIMENSION,$TRANQTY_NEW,$TRANCOST_NEW,$TRANEXTCOST_NEW,
		$COST_METHOD,$CURRENCY_COST,$CURRENCY_AMOUNT,$CURRENCY_EXTPRICE,$CURRENCY_PRICE,
		$MAIN_PRODUCTID,$BATCHNO1,$EXPIRED_DATE1));


		$locsql = "UPDATE dbo.ICLOCATION set LOCONHAND = (LOCONHAND + ?) WHERE LOCID = ? AND PRODUCTID = ?";
		$locreq  = $db->prepare($locsql);		
		$locreq->execute(array($item["REQUEST_QUANTITY"],$LOCID,$item["PRODUCTID"]));

		// TI
		$LOCID = ($type == "TRANSFER") ? "WH2" : "WH1";
		$TRANTYPE = "TI";
		$CURRENCY_AMOUNT = $EXTCOST * -1;
		$CURRENCY_EXTPRICE = $EXTPRICE * -1;
		$CURRENTONHAND = ($type == "TRANSFER") ? $ONHANDWH1 : $ONHANDWH2;
		$TRANQTY *= -1;	

		$req->execute(array(
		$DOCNUM,$PRODUCTID,$LOCID,$CATEGORYID,$CLASSID,
		$TRANDATE,$TRANTYPE,$LINENUM,$PRODUCTNAME,$PRODUCTNAME1,
		$REFERENCE,$TRANQTY,$TRANUNIT,$TRANFACTOR,$STKFACTOR,
		$TRANCOST,$TRANPRICE,$PRICE_ORI,$EXTPRICE,$EXTCOST,
		$CURRENTONHAND,$WEIGHT,$USERADD,$DATEADD,$OLDWEIGHT,
		$CURRENTCOST,$LASTCOST,$APPLID,$LINK_LINE,$ICCLEARING_ACC,
		$INVENTORY_ACC,$DIMENSION,$TRANQTY_NEW,$TRANCOST_NEW,$TRANEXTCOST_NEW,
		$COST_METHOD,$CURRENCY_COST,$CURRENCY_AMOUNT,$CURRENCY_EXTPRICE,$CURRENCY_PRICE,
		$MAIN_PRODUCTID,$BATCHNO2,$EXPIRED_DATE2));

		$locsql = "UPDATE dbo.ICLOCATION set LOCONHAND = (LOCONHAND - ?) WHERE LOCID = ? AND PRODUCTID = ?";
		$locreq  = $db->prepare($locsql);		
		$locreq->execute(array($item["REQUEST_QUANTITY"],$LOCID,$item["PRODUCTID"]));

		$count++;
	}
}

// TODO DEMAND (NO(AUTO on REQUEST))
// SUBMITTED DEMAND (NO)
// VALIDATED DEMAND (NO) 
// TODO RESTOCK (NO)
// SUBMITTED RESTOCK (NO)
// VALIDATED RESTOCK (NO)
// TODO PURCHASE (OK)
// SUBMITTED PURCHASE (OK) (NON-VALIDATED)
// VALIDATED (PURCHASE) (OK)
// TODO TRANSFER (OK)
// SUBMITTED TRANSFER (OK) (NON-VALIDATED)
// VALIDATED TRANSFER (NO)
$app->put('/itemrequestaction/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');

	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$ira = $req->fetch();

	$items = json_decode($json["ITEMS"],true);
	if($json["STATUS"] == "TODO") // Validation
	{
		$sql = "UPDATE ITEMREQUESTACTION set REQUESTEE = :requestee WHERE ID = :id";
		$req = $db->prepare($sql);
		$req->bindParam(':requestee',$json["REQUESTEE"],PDO::PARAM_STR);
		$req->bindParam(':id',$id,PDO::PARAM_STR);
		$req->execute();
		$imageData = base64_decode($json["REQUESTEESIGNATURE"]);
		file_put_contents("./img/requestaction/E" .$id.".png" , $imageData);
		
		if ($ira["TYPE"] == "DEMAND"){ // STORE SUPERVISOR VALIDATE DEMAND AND ADD TO RESTOCK POOL					
			
			foreach($items as $item){
				
				$sql = "SELECT sum(REQUEST_QUANTITY) as CNT,count(*) as OCU FROM ITEMREQUESTRESTOCKPOOL WHERE LISTNAME = 'A' AND PRODUCTID = ? ";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));			
				$cnt = $req->fetch();
				
				if ($cnt["OCU"] == 0){ // CREATE NEW ENTRY					
					$sql1 = "INSERT INTO ITEMREQUESTRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,LISTNAME) values (?,?,?)";
					$req1 = $db->prepare($sql1);
					$req1->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],'A'));	
				}
				else 
				{
					$newQty = $item["REQUEST_QUANTITY"] + $cnt["CNT"];					
					$sql1 = "UPDATE ITEMREQUESTRESTOCKPOOL SET REQUEST_QUANTITY = ? WHERE LISTNAME = 'A' AND PRODUCTID = ? ";
					$req1 = $db->prepare($sql1);
					$req1->execute(array($newQty,$item["PRODUCTID"]));		
				}
			}
		}
		else if ($ira["TYPE"] == "RESTOCK")  // WAREHOUSE VALIDATE RESTOCK AND TO TRANFER POOL & PURCHASE POOL
		{
			foreach($items as $item)
			{
				// TRANSFER POOL
				if (intval($item["TRANSFER_POOL_NEW"]) > 0)
				{

					$sql = "SELECT REQUEST_QUANTITY,count(*) as OCU FROM ITEMREQUESTTRANSFERPOOL WHERE PRODUCTID = ?";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"]));
					$cnt = $req->fetch();

						
					if ($cnt["OCU"] == 0){
						$sql1 = "INSERT INTO ITEMREQUESTTRANSFERPOOL (PRODUCTID,REQUEST_QUANTITY) values (?,?)";
						$req1 = $db->prepare($sql1);
						$req1->execute(array($item["PRODUCTID"],$item["TRANSFER_POOL_NEW"]));
					}
					else{			
						$newQty = $cnt["REQUEST_QUANTITY"] + $item["TRANSFER_POOL_NEW"];
						$sql1 = "UPDATE ITEMREQUESTTRANSFERPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
						$req1 = $db->prepare($sql1);
						$req1->execute(array($newQty,$item["PRODUCTID"]));
					}
				}

		
				// PURCHASE POOL
				if (intval($item["PURCHASE_POOL_NEW"]) > 0)
				{	
					$sql = "SELECT REQUEST_QUANTITY,count(*) as OCU FROM ITEMREQUESTPURCHASEPOOL WHERE PRODUCTID = ?";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"]));
					$cnt = $req->fetch();

					if ($cnt["OCU"] == 0){
						$sql2 = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY) values (?,?)";
						$req2 = $db->prepare($sql2);
						$req2->execute(array($item["PRODUCTID"],$item["PURCHASE_POOL_NEW"]));	
					}
					else{
						$newQty = $cnt["REQUEST_QUANTITY"] + $item["PURCHASE_POOL_NEW"];
						$sql2 = "UPDATE ITEMREQUESTPURCHASEPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
						$req2 = $db->prepare($sql2);
						$req2->execute(array($newQty,$item["PRODUCTID"]));
					}
					
					// WE PUT ALL QUANTITY BECAUSE AT THAT MOMENT NO TRANSFER IS CREATED YET
					$sql = "SELECT REQUEST_QUANTITY,count(*) as OCU FROM ITEMREQUESTDEBT WHERE PRODUCTID = ?";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"]));
					$cnt = $req->fetch();
					if ($cnt["OCU"] == 0) 
					{
						$sql = "INSERT INTO ITEMREQUESTDEBT (PRODUCTID,REQUEST_QUANTITY) VALUES (?,?)";
						$req = $db->prepare($sql);
						$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"]));
					}
					else
					{
						$totalQty = $cnt["REQUEST_QUANTITY"] + $item["REQUEST_QUANTITY"];
						$sql = "UPDATE ITEMREQUESTDEBT SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?";
						$req = $db->prepare($sql);
						$req->execute(array($totalQty,$item["REQUEST_QUANTITY"]));					
					}
				}

				
			}
		}
		else if ($ira["TYPE"] == "TRANSFER")
		{ 
			transferItems($items,$ira["REQUESTER"],$ira["TYPE"]);	
			// STORE SUPERVISOR VALIDATE TRANSFER AND UPDATE DEBT POOL
			foreach($items as $item)
			{
				$sql = "SELECT REQUEST_QUANTITY,count(*) as OCU FROM ITEMREQUESTDEBT WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
				$cnt = $req->fetch();


				if ($cnt["OCU"] == 0) // INSERT NEGATIVE QUANTITY : NOT NORMAL 
				{
						$sql = "INSERT INTO ITEMREQUESTDEBT (PRODUCTID,REQUEST_QUANTITY) VALUES (?,?)";
						$req = $db->prepare($sql);
						$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"]));
				}
				else
				{
						$totalQty = $cnt["REQUEST_QUANTITY"] - $item["REQUEST_QUANTITY"];
						if ($totalQty == 0) // DEBT FALL TO ZERO
						{
						
							
							$sql = "DELETE FROM ITEMREQUESTDEBT WHERE PRODUCTID = ?";
							$req = $db->prepare($sql);
							$req->execute(array($item["PRODUCTID"]));						
						}
						else // REDUCE DEBT
						{
							$sql = "UPDATE ITEMREQUESTDEBT SET REQUEST_QUANTITY = REQUEST_QUANTITY -  ? WHERE PRODUCTID = ?";
							$req = $db->prepare($sql);
							$req->execute(array($item["REQUEST_QUANTITY"], $item["PRODUCTID"]));						
						}
						
				}			
			}
		}
		else if ($ira["TYPE"] == "TRANSFERBACK")
		{
			transferItems($items,$ira["REQUESTER"],$ira["TYPE"]);
		}
		else if ($ira["TYPE"] == "PURCHASE"){// NOTHING}																
		}			
	}
	else if ($json["STATUS"] == "SUBMITTED")
	{
		if ($ira["TYPE"] == "DEMAND" && $ira["REQUESTEE"] == null)
		{

			$imageData = base64_decode($json["REQUESTERSIGNATURE"]);
			file_put_contents("./img/requestaction/R" .$id.".png" , $imageData);

			$items =  json_decode($json["ITEMS"],true);
			foreach($items as $item){
				$sql = "UPDATE ITEMREQUEST set REQUEST_QUANTITY = ? WHERE PRODUCTID = ? and ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$id));
			}
		}// RESTOCK,PURCHASE && TRANSFER CANNOT BE CHANGED ONCE SIGNED
	}
	// DEMAND -> RESTOCK POOL
	// RESTOCK -> TRANSFER POOL & PURCHASE POOL
	// 
	

	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});
			
$app->get('/itemrequestactionitems/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	$id = $request->getAttribute('id');
	if ($id == "DEBT")
		$sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
	else 
		$sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	


	$asql = "SELECT * FROM ITEMREQUESTACTION WHERE ID = ?";
	$req = $db->prepare($asql);
	$req->execute(array($id));
	$res = $req->fetch();	
	$type = $res["TYPE"];
	$requester = $res["REQUESTER"];
	// Debt (internal) OK
	// demand (internal) OK
	// restock(internal) OK
	// Transfer (internal) OK
	// Purchase(internal) OK
	// WH (Blue) OK	
	// SUPPLIERREQUESTED_QTY (2) PODETAIL(Blue)

	$newData = array();
	foreach($items as $item){
		$itemID = $item["PRODUCTID"];

		// LOT
		if ($item["LOTWH1"] != null && $item["LOTWH1"] != ""){
			$lsql = "SELECT CONVERT(varchar(10), TDATE, 120) as TDATE FROM ICQUANTITY WHERE BATCHNO = ? AND LOCID = 'WH1'";
			$req = $dbBlue->prepare($lsql);
			$req->execute(array($item["LOTWH1"]));
			$item["LOTEXPIREWH1"] = $req->fetch()["TDATE"];	
		}

		// 
		if ($item["LOTWH2"] != null && $item["LOTWH2"] != ""){
			$lsql = "SELECT CONVERT(varchar(10), TDATE, 120) as TDATE FROM ICQUANTITY WHERE BATCHNO = ?  AND LOCID = 'WH2'";
			$req = $dbBlue->prepare($lsql);
			$req->execute(array($item["LOTWH2"]));
			$item["LOTEXPIREWH2"] = $req->fetch()["TDATE"];
		}

		// TYPE
		$item["TYPE"] = $type;
		$item["REQUESTER"] = $requester;

		// DEBT
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as DEBT_QTY from ITEMREQUESTDEBT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));		
		$item["DEBT_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["DEBT_QTY"];				
		
		// DEMAND
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as DEMAND_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'DEMAND'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["DEMAND_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["DEMAND_QTY"];
		
		// RESTOCK
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as RESTOCK_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'RESTOCK'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["RESTOCK_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["RESTOCK_QTY"];
		
		// TRANSFER
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as TRANSFER_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'TRANSFER'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["TRANSFER_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["TRANSFER_QTY"];
		
		// PURCHASE
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as PURCHASE_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND TYPE = 'PURCHASE'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["PURCHASE_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["PURCHASE_QTY"];
		//

		// PURCHASE POOL
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as PURCHASE_POOL FROM ITEMREQUESTPURCHASEPOOL 
				WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["PURCHASE_POOL"] = $req->fetch(PDO::FETCH_ASSOC)["PURCHASE_POOL"];

		// TRANSFER POOL
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as TRANSFER_POOL FROM ITEMREQUESTTRANSFERPOOL 
				WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["TRANSFER_POOL"] = $req->fetch(PDO::FETCH_ASSOC)["TRANSFER_POOL"];

		// WH Stock
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));		
		$item["WAREHOUSE_QTY"] = floatval($req->fetch()["LOCONHAND"]);		

		// Store Stock
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));		
		$item["STORE_QTY"] = floatval($req->fetch()["LOCONHAND"]);		
				
		// On ORDER		
		$sql = "SELECT ISNULL(SUM(ORDER_QTY),0) as SUPPLIERREQUESTED_QTY 
				FROM dbo.PODETAIL, dbo.POHEADER
				WHERE dbo.PODETAIL.PONUMBER = dbo.POHEADER.PONUMBER	
				AND dbo.POHEADER.POSTATUS = ''
				AND PRODUCTID = ?				";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));		
		$item["SUPPLIERREQUESTED_QTY"] = floatval($req->fetch()["SUPPLIERREQUESTED_QTY"]);

		// VENDNAME
		$sql = "SELECT PRODUCTNAME,replace(VENDNAME,char(39),'') as 'VENDNAME' ,PACKINGNOTE
				FROM dbo.ICPRODUCT,APVENDOR
				WHERE ICPRODUCT.VENDID = APVENDOR.VENDID
				AND PRODUCTID = ?";

		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));
		$res = $req->fetch(); 				
		$item["VENDNAME"] = $res["VENDNAME"];	
		$item["PACKINGNOTE"] = $res["PACKINGNOTE"];	
		$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		//

		// IF NO LOT NULL
		$qsql = "SELECT BATCHNO,QUANTITY,TDATE FROM ICQUANTITY WHERE LOCID = 'WH1' AND PRODUCTID = ? AND ACTIVE = 1";
		$req=$dbBlue->prepare($qsql);
		$req->execute(array($itemID));
		$item["LOTWH1LIST"] = $req->fetchAll();

		$qsql = "SELECT BATCHNO,QUANTITY,TDATE FROM ICQUANTITY WHERE LOCID = 'WH2' AND PRODUCTID = ? AND ACTIVE = 1";
		$req=$dbBlue->prepare($qsql);
		$req->execute(array($itemID));
		$item["LOTWH2LIST"] = $req->fetchAll();

		

		array_push($newData,$item);
	}	

	$response = $response->withJson($newData);
	return $response;
});

$app->get('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$db2 = getDatabase();
	
	$type = $request->getAttribute('type');
	
	if ($type == "RESTOCK")
		$sql = "SELECT * FROM ITEMREQUESTRESTOCKPOOL";
	else if ($type == "PURCHASE")
		$sql = "SELECT * FROM ITEMREQUESTPURCHASEPOOL";
	else if ($type == "TRANSFER")
		$sql = "SELECT * FROM ITEMREQUESTTRANSFERPOOL";	
	else if ($type == "TRANSFERBACK")
		$sql = "SELECT * FROM ITEMREQUESTTRANSFERBACKPOOL";	
	else if ($type == "DEBT")
		$sql = "SELECT * FROM ITEMREQUESTDEBT";	
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$sql = "SELECT * FROM ITEMREQUESTDEMANDPOOL WHERE USERID = ".$userid;

	}
	$req = $db->prepare($sql);
	$req->execute(array());

	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$itemsNEW = array();
	foreach($items as $item)
	{
		$item["TYPE"] = $type;
		if(isset($item["LOTWH1"]) && $item["LOTWH1"] != "" && $item["LOTWH1"] != null)
		{
			$sql = "SELECT CONVERT(varchar(10), TDATE, 120) as TDATE FROM ICQUANTITY WHERE BATCHNO = ?";
			$req = $db2->prepare($sql);
			$req->execute(array($item["LOTWH1"]));
			$item["LOTEXPIREWH1"] = $req->fetch()["TDATE"];
		}

		if(isset($item["LOTWH2"]) && $item["LOTWH2"] != "" && $item["LOTWH2"] != null)
		{
			$sql = "SELECT CONVERT(varchar(10), TDATE, 120) as TDATE FROM ICQUANTITY WHERE BATCHNO = ?";
			$req = $db2->prepare($sql);
			$req->execute(array($item["LOTWH2"]));
			$item["LOTEXPIREWH2"] = $req->fetch()["TDATE"];
		}

		$sql = "SELECT PACKINGNOTE,VENDNAME,PRODUCTNAME 
				FROM ICPRODUCT,APVENDOR 
				WHERE ICPRODUCT.VENDID = APVENDOR.VENDID
				AND BARCODE = ?";

		$req = $db2->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$oneItem = $req->fetch(PDO::FETCH_ASSOC);
		$item["PACKINGNOTE"] = $oneItem["PACKINGNOTE"];
		$item["VENDNAME"] = $oneItem["VENDNAME"];
		$item["PRODUCTNAME"] = $oneItem["PRODUCTNAME"];
		array_push($itemsNEW,$item);
	}
	$items = $response->withJson($itemsNEW);
	return $items;	
});

$app->post('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	

	$suffix = "";
	if ($type == "RESTOCK")		
		$tableName = "ITEMREQUESTRESTOCKPOOL";		
	else if($type == "PURCHASE")
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($type == "TRANSFERBACK")
		$tableName = "ITEMREQUESTTRANSFERBACKPOOL";
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$tableName = "ITEMREQUESTDEMANDPOOL";
		$suffix = " AND USERID = ".$userid;
	}

	if (!isset($json["ITEMS"]))
	{
		$item["PRODUCTID"] = $json["PRODUCTID"];
		$item["REQUEST_QUANTITY"] = $json["REQUEST_QUANTITY"];
		$item["LOTWH1"] = isset($json["LOTWH1"]) ? $json["LOTWH1"] : "";
		$item["LOTWH2"] = isset($json["LOTWH2"]) ? $json["LOTWH2"] : "";
		$items = array($item);
	}else{

		$items = $json["ITEMS"];
	}


	foreach($items as $item)
	{		
		if ($type == "RESTOCK"){
			$sql = "SELECT REQUEST_QUANTITY,count(*) as OCU FROM ".$tableName." where PRODUCTID =  ? AND LISTNAME = ?";
			$req = $db->prepare($sql);	
			$req->execute(array($item["PRODUCTID"],$json["LISTNAME"]));
		}
		else
		{
			$sql = "SELECT REQUEST_QUANTITY,count(*) as OCU FROM ".$tableName." where PRODUCTID =  ?".$suffix;		
			$req = $db->prepare($sql);	
			$req->execute(array($item["PRODUCTID"]));
		}		
		$res = $req->fetch();	


		if ($res["OCU"] == 0) // NO RECORD THEN INSERT
		{
			if ($suffix == "")
			{
				if ($type == "TRANSFER" || $type == "TRANSFERBACK")
				{	
					$sql = "INSERT INTO ".$tableName." (PRODUCTID,REQUEST_QUANTITY,LOTWH1,LOTWH2) values(?,?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($json["PRODUCTID"],$json["REQUEST_QUANTITY"],
					(isset($item["LOTWH1"]) ? $item["LOTWH1"]:  null),
					(isset($item["LOTWH2"]) ? $item["LOTWH2"]:  null)));		
				}
				else if ($type == "RESTOCK"){

						$sql = "INSERT INTO ITEMREQUESTRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,LISTNAME) values(?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$json["LISTNAME"]));		
				}
				else 
				{
					$sql = "INSERT INTO ".$tableName." (PRODUCTID,REQUEST_QUANTITY) values(?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"]));		
				}
			}
			else
			{
				$sql = "INSERT INTO ".$tableName." (PRODUCTID,REQUEST_QUANTITY,USERID) values(?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$userid));		
			}		
		}
		else // RECORD THEN UPDATE
		{
			if ($type == "TRANSFER" || $type == "TRANSFERBACK")
			{				
				$newQty = $item["REQUEST_QUANTITY"]; // NO MORE ADD 
				$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ?, LOTWH1 = ?, LOTWH2 = ? WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($newQty,
					(isset($item["LOTWH1"]) ? $item["LOTWH1"]:  null),
					(isset($item["LOTWH2"]) ? $item["LOTWH2"]:  null),
					$item["PRODUCTID"]));		
			}
			else if ($type == "RESTOCK"){
				$newQty = $item["REQUEST_QUANTITY"]; // NO MORE ADD 
				$sql = "UPDATE ITEMREQUESTRESTOCKPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ? AND LISTNAME = ?";
				$req = $db->prepare($sql);
				$req->execute(array($newQty,$item["PRODUCTID"],$json["LISTNAME"]));		
			}
			else
			{		
				$newQty = $item["REQUEST_QUANTITY"]; // NO MORE ADD 
				$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?".$suffix;
				$req = $db->prepare($sql);
				$req->execute(array($newQty,$item["PRODUCTID"]));
			}
		}	
	}	
	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

// DELETE ITEM
$app->delete('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	

	$suffix = "";
	if ($type == "RESTOCK")
		$tableName = "ITEMREQUESTRESTOCKPOOL";
	else if($type == "PURCHASE")
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($type == "TRANSFERBACK")
		$tableName = "ITEMREQUESTTRANSFERBACKPOOL";
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$tableName = "ITEMREQUESTDEMANDPOOL";	
		$suffix = " AND USERID = ".$userid;
	}

	if ($type == "RESTOCK")
	{
		$sql = "DELETE FROM ".$tableName." WHERE PRODUCTID = ? AND LISTNAME = ?";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["LISTNAME"]));
	}
	else 
	{
		$sql = "DELETE FROM ".$tableName." WHERE PRODUCTID = ?".$suffix;	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));	
	}
	
	
	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->put('/itemrequestrestockpool/{id}', function(Request $request,Response $response) {
	
	$db = getInternalDatabase();	
	$id = $request->getAttribute('id');
	$json = json_decode($request->getBody(),true);	
	$listname = $json["LISTNAME"];	

	$sql = "UPDATE ITEMREQUESTRESTOCKPOOL SET LISTNAME = ? WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($listname,$id));

	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});


// UPDATE
$app->put('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	
	$suffix = "";

	if ($type == "RESTOCK")
		$tableName = "ITEMREQUESTRESTOCKPOOL";
	else if($type == "PURCHASE")
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($type == "TRANSFERBACK")
		$tableName = "ITEMREQUESTTRANSFERBACKPOOL";
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$tableName = "ITEMREQUESTDEMANDPOOL";	
		$suffix = " AND USERID = ".$userid;
	}

	if ($type == "TRANSFER")
	{
		$dbBlue = getDatabase();
		$sql = "SELECT LOCONHAND FROM ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if (floatval($res["LOCONHAND"]) < floatval($json["REQUEST_QUANTITY"]))
		{
			$data["RESULT"] = "KO";
			$data["MSG"] = $res["LOCONHAND"];
			$response = $response->withJson($data);
			return $response;
		}
	}

	if ($type == "TRANSFERBACK")
	{
		$dbBlue = getDatabase();
		$sql = "SELECT LOCONHAND FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if (floatval($res["LOCONHAND"]) < floatval($json["REQUEST_QUANTITY"]))
		{
			$data["RESULT"] = "KO";
			$data["MSG"] = $res["LOCONHAND"];
			$response = $response->withJson($data);
			return $response;
		}
	}

	if ($type == "RESTOCK")
	{
		$sql = "UPDATE ITEMREQUESTRESTOCKPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ? AND LISTNAME = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["REQUEST_QUANTITY"],$json["PRODUCTID"],$json["LISTNAME"]));	
	}
	else
	{
		$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ?".$suffix;
		$req = $db->prepare($sql);
		$req->execute(array($json["REQUEST_QUANTITY"],$json["PRODUCTID"]));	
	}
	
	$data["RESULT"] = "OK";
	$response = $response->withJson($data);
	return $response;
});



/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
									ITEM WASTE 
									ITEM WASTE
									ITEM WASTE                               */


//CREATED
//VALIDATED
//RECORDED
$app->get('/itemwaste/{status}', function(Request $request, Response $response){ 

	$status = $request->getAttribute('status','');

	$db=getInternalDatabase();
	$sql = "SELECT * FROM ITEMWASTE WHERE STATUS = ? ORDER BY DATECREATED DESC";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$records = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$response = $response->withJson($records);
	return $response;
});
$app->post('/itemwaste', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();

	$signatureData = base64_decode($json["SIGNATURE"]);
	$sigID = time() ."_". rand(1,100);	
	$signatureFilename = "./img/itemwaste_signatures/".$sigID.".png";
	$signature = $json["SIGNATURE"];
	file_put_contents($signatureFilename, $signatureData);

	$items = $json["ITEMS"];
	foreach($items as $item)
	{
		$sql = "INSERT INTO ITEMWASTE (BARCODE,QUANTITY,REASON,NAME,SIGNATURE_CREATOR,CREATOR) 
				VALUES (:barcode,:quantity,:reason,:name,:signature,:creator)";
		$req = $db->prepare($sql);
		$req->bindParam(':barcode',$item["BARCODE"],PDO::PARAM_STR);
		$req->bindParam(':quantity',$item["QUANTITY"],PDO::PARAM_STR);	
		$req->bindParam(':reason',$item["REASON"],PDO::PARAM_STR);
		$req->bindParam(':name',$item["NAME"],PDO::PARAM_STR);	
		$req->bindParam(':signature',$sigID,PDO::PARAM_STR);						
		$req->bindParam(':creator',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();

		if ($item["IMAGE"] != null)
		{
			$imageData = base64_decode($item["IMAGE"]);
			$filename = "./img/itemwaste_pictures/".$item["ID"].".png";	
			file_put_contents($filename, $imageData);
		}				
	}	

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});
$app->put('/itemwaste', function(Request $request, Response $response){ 
	// VALIDATE
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();
	$items = $json["ITEMS"]; 

	$signatureData = base64_decode($json["SIGNATURE"]);
	$sigID = time() ."_". rand(1,100);	
	$signatureFilename = "./img/itemwaste_signatures/".$sigID.".png";
	$signature = $json["SIGNATURE"];
	file_put_contents($signatureFilename, $signatureData);

	foreach($items as $item){

		if ($item["STATUS"] == "VALIDATED"){
			$fieldname = "VALIDATOR"; 
			$signatureField = "SIGNATURE_VALIDATOR";
		}
		else if ($item["STATUS"] == "RECORDED"){
			$fieldname = "RECORDER";	
			$signatureField = "SIGNATURE_RECORDER";	
		}

		$sql = "UPDATE ITEMWASTE SET QUANTITY_MODIFIED = ?, 
									   COMMENT = ?,			   
									   ".$fieldname." = ?,
									   ".$signatureField." = ?,	
									   STATUS = ? 									  
									   WHERE ID = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($item["QUANTITY_MODIFIED"],$item["COMMENT"],$json["AUTHOR"],$sigID,$item["STATUS"],$item["ID"]));
	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
							ITEMPROMOTIONREQUESTINTERNAL		
							ITEMPROMOTIONREQUESTINTERNAL 
							ITEMPROMOTIONREQUESTINTERNAL                       */

//CREATED
//VALIDATED
//LINKING
//DESIGNING
//FORSALE
$app->get('/itempromotionrequestinternal/{status}', function(Request $request, Response $response){ 

	$status = $request->getAttribute('status','');
	$db=getInternalDatabase();
	$sql = "SELECT * FROM ITEMPROMOTIONREQUESTINTERNAL WHERE STATUS = ? ORDER BY DATECREATED DESC";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$records = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$response = $response->withJson($records);
	return $response;
});

$app->post('/itempromotionrequestinternal', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();

	$items = $json["ITEMS"];
	
	// Signature
	$signatureData = base64_decode($json["SIGNATURE"]);
	$sigID = time() ."_". rand(1,100);	
	$signatureFilename = "./img/itempromotionrequestinternal_signatures/".$sigID.".png";
	$signature = $json["SIGNATURE"];
	file_put_contents($signatureFilename, $signatureData);

	foreach($items as $item)
	{
		$sql = "INSERT INTO ITEMPROMOTIONREQUESTINTERNAL (BARCODE,QUANTITY,DISCOUNT,REASON,SIGNATURE_CREATOR,CREATOR) 
				VALUES (:barcode,:name,:quantity,:discount,:reason,:signature,:creator)";
		$req = $db->prepare($sql);
		$req->bindParam(':barcode',$item["BARCODE"],PDO::PARAM_STR);		
		$req->bindParam(':quantity',$item["QUANTITY"],PDO::PARAM_STR);		
		$req->bindParam(':discount',$item["DISCOUNT"],PDO::PARAM_STR);		
		$req->bindParam(':reason',$item["REASON"],PDO::PARAM_STR);	
		$req->bindParam(':signature',$sigID,PDO::PARAM_STR);
		$req->bindParam(':creator',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();

		if ($item["IMAGE"] != null)
		{
			$imageData = base64_decode($item["IMAGE"]);
			$filename = "./img/itempromotionrequestinternal/".$item["ID"].".png";	
			file_put_contents($filename, $imageData);
		}	
	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->put('/itempromotionrequestinternal', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();
	$items = $json["ITEMS"]; 

	$signatureData = base64_decode($json["SIGNATURE"]);
	$sigID = time() ."_". rand(1,100);	
	$signatureFilename = "./img/itempromotionrequestinternal_signatures/".$sigID.".png";
	$signature = $json["SIGNATURE"];
	file_put_contents($signatureFilename, $signatureData);

	foreach($items as $item){
		if ($item["STATUS"] == "VALIDATED"){
			$fieldname = "VALIDATOR"; 
			$signatureField = "SIGNATURE_VALIDATOR";
		}
		else if ($item["STATUS"] == "LINKING"){
			$fieldname = "LINKER";
			$signatureField = "SIGNATURE_LINKER";
		}
		else if ($item["STATUS"] == "DESIGNING"){
			$fieldname = "DESIGNER";
			$signatureField = "SIGNATURE_DESIGNER";
		}						
		else if ($item["STATUS"] == "DISPLAYED"){
			$fieldname = "DISPLAYER";
			$signatureField = "SIGNATURE_DISPLAYER";
		}		

		$sql = "UPDATE ITEMPROMOTIONREQUESTINTERNAL 
										SET STATUS = ?,
									   	".$fieldname." = ?,
									   	".$signatureField." = ?									   									   	
									   	WHERE ID = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($item["STATUS"],$json["AUTHOR"],$sigID,$item["ID"]));
	}
	$result["result"] = "OK";
	return $response;
});

/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
							ITEMPROMOTIONREQUESTEXTERNAL		
							ITEMPROMOTIONREQUESTEXTERNAL 
							ITEMPROMOTIONREQUESTEXTERNAL                       */

//CREATED
//LINKING
//DESIGNING
//FORSALE
$app->get('/itempromotionrequestexternal/{status}', function(Request $request, Response $response){ 

	$status = $request->getAttribute('status','');
	$db=getInternalDatabase();
	$sql = "SELECT * FROM ITEMPROMOTIONREQUESTEXTERNAL WHERE STATUS = ? ORDER BY DATECREATED DESC";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$records = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$response = $response->withJson($records);
	return $response;
});

$app->post('/itempromotionrequestexternal', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();

	$items = $json["ITEMS"];

	$signatureData = base64_decode($json["SIGNATURE"]);
	$sigID = time() ."_". rand(1,100);	
	$signatureFilename = "./img/itempromotionrequestexternal_signatures/".$sigID.".png";
	$signature = $json["SIGNATURE"];
	file_put_contents($signatureFilename, $signatureData);


	foreach($items as $item)
	{
		$sql = "INSERT INTO ITEMPROMOTIONREQUESTEXTERNAL (BARCODE,NAME,QUANTITY,DISCOUNT,REASON,SIGNATURE_CREATOR,CREATOR) 
				VALUES (:barcode,:name,:quantity,:discount,:reason,:signature,:creator)";
		$req = $db->prepare($sql);
		$req->bindParam(':barcode',$item["BARCODE"],PDO::PARAM_STR);
		$req->bindParam(':name',$item["NAME"],PDO::PARAM_STR);	
		$req->bindParam(':quantity',$item["QUANTITY"],PDO::PARAM_STR);		
		$req->bindParam(':discount',$item["DISCOUNT"],PDO::PARAM_STR);		
		$req->bindParam(':reason',$item["REASON"],PDO::PARAM_STR);	
		$req->bindParam(':signature',$sigID,PDO::PARAM_STR);
		$req->bindParam(':creator',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();

		if ($item["IMAGE"] != null)
		{
			$imageData = base64_decode($item["IMAGE"]);
			$filename = "./img/itempromotionrequestexternal_pictures/".$item["ID"].".png";	
			file_put_contents($filename, $imageData);
		}	
	}
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->put('/itempromotionrequestexternal', function(Request $request, Response $response){ 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$now = time();
	$items = $json["ITEMS"]; 

	$signatureData = base64_decode($json["SIGNATURE"]);
	$sigID = time() ."_". rand(1,100);	
	$signatureFilename = "./img/itempromotionrequestexternal_signatures/".$sigID.".png";
	$signature = $json["SIGNATURE"];

	foreach($items as $item){
		
		if ($item["STATUS"] == "LINKING"){
			$fieldname = "LINKER";
			$signatureField = "SIGNATURE_LINKER";
		}
		else if ($item["STATUS"] == "DESIGNING"){
			$fieldname = "DESIGNER";
			$signatureField = "SIGNATURE_DESIGNER";
		}
		else if ($item["STATUS"] == "DISPLAYED"){
			$fieldname = "DISPLAYER";
			$signatureField = "SIGNATURE_DISPLAYER";
		}

		$sql = "UPDATE ITEMPROMOTIONREQUESTEXTERNAL 
										SET STATUS = ?,
									   	".$fieldname." = ?,
										".$signatureField." = ?	   									   	
									   	WHERE ID = ?";
		$req = $db->prepare($sql);	
		$req->execute(array($item["STATUS"],$json["AUTHOR"],$sigID,$item["ID"]));
	}
	$result["result"] = "OK";
	return $response;
});

/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
									PROBLEMS 
									PROBLEMS
									PROBLEMS                               */



$app->get('/costzero',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,replace(replace(PRODUCTNAME1,'\n',' '),'\"','') as 'PRODUCTNAME1',LASTCOST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',				
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND (LASTCOST = 0 OR LASTCOST IS NULL)
			AND dbo.ICPRODUCT.ACTIVE = 1
			";
	$params = array(); 
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$response = $response->withJson($result);
	return $response;				

});

$app->get('/zerosale',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	$start = 0;
	$end = 100000;
	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
				   COLOR,CATEGORYID,ONHAND,WH1,WH2,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
						
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) = 0
			AND ONHAND > 0
			AND dbo.ICPRODUCT.ACTIVE = 1)t
			WHERE SEQ BETWEEN $start AND $end";
	$params = array(); 
	$req = $conn->prepare($sql);
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$result["ITEMS"] = $result;


	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE ONHAND = 0";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];

	$response = $response->withJson($result);
	return $response;	
});

$app->get('/itemzerostock',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);
	
	$start = 0;
	$end = 100000;
	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
				   COLOR,CATEGORYID,ONHAND,WH1,WH2,SALELAST30,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN '$day30before 00:00:00.000'  AND '$today 23:59:59.999' GROUP BY PRODUCTID) as 'SALELAST30',
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND ONHAND = 0)t
			WHERE SEQ BETWEEN $start AND $end 
			ORDER BY VENDNAME
			";	
	$params = array(); 
	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$result["ITEMS"] = $result;

	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE ONHAND = 0";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];

	$response = $response->withJson($result);
	return $response;	
}); 


$app->get('/itemnegative',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	
	$start = 0;
	$end = 100000;

	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,AVGCOST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
				   COLOR,CATEGORYID,ONHAND,WH1,WH2,SALELAST30,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',		
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND POSDATE BETWEEN  '$day30before 00:00:00.000' 
			AND '$today 23:59:59.999' GROUP BY PRODUCTID) as 'SALELAST30',
			LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD as 'DA'
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND ONHAND < 0)t
			WHERE SEQ BETWEEN $start AND $end";
	$params = array(); 
	$req = $conn->prepare($sql);
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$result["ITEMS"] = $result;

	$sql2 = "SELECT count(*) AS NB FROM dbo.ICPRODUCT WHERE ONHAND < 0";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array());
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);			
	$result["NBPAGES"] = ceil($result2["NB"] / 100);
	$result["NBITEMS"] = $result2["NB"];


	$response = $response->withJson($result);
	return $response;		
}); 

/************** Low Margin  ***************/
$app->get('/lowprofit',function($request,Response $response) {
	$timestamp = strtotime('-30 days');
	$today = date("Y-m-d");
	$day30before = date("Y-m-d",$timestamp);
	$conn=getDatabase();
	$sql =  "SELECT TOP(1000) PRODUCTID,BARCODE,replace(PRODUCTNAME,'\n',' ') as  'PRODUCTNAME',replace(PRODUCTNAME1,'\n',' ') as  'PRODUCTNAME1',COST,
			(SELECT (sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			PRICE,VENDNAME,			
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day30before 00:00:00.000' AND '$today 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',
			PRICE,LASTRECEIVEDATE, LASTSALEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID			
			";		
	$req = $conn->prepare($sql);
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);	
	return $response;	
});

// LOW SELLER
$app->get('/lowseller',function($request,Response $response) {
	$conn=getDatabase();
	$sql = "
			SELECT TOP (1000)
			PRODUCTID,LASTRECEIVEDATE
			,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME'
			,replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1'	
			,PRICE
			,CATEGORYID
			,(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'LASTCOST'
			
			,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE'
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE'			
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN'
			, (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) as 'PERCENTSALE'		
			,ISNULL((SELECT TOP(1) DISCOUNT_VALUE FROM dbo.ICNEWPROMOTION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'DISCPERCENT'
			,ISNULL((SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as  'WH1'
			,ISNULL((SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as  'WH2'			
			,ONHAND
			,replace(replace(replace(VENDNAME,char(10),''),char(13),''),char(39),'') as 'VENDNAME'			
			,ISNULL(PACKINGNOTE,'N/A') as 'PACKINGNOTE' 		
			,ISNULL( (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1' ) ,'N/A') as 'LOCATION' 
			FROM dbo.ICPRODUCT,dbo.APVENDOR			
			WHERE dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID	
			AND ONHAND > 0				
			AND ( ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) > 0
			AND LASTRECEIVEDATE < DATEADD(day,-60,GETDATE()) 
			GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,CATEGORYID,COLOR,ONHAND,PACKINGNOTE,LASTRECEIVEDATE	
			HAVING (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) < 20
			ORDER BY PERCENTSALE ASC
			";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);		
	$response = $response->withJson($result);

	return $response;
});
      
/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
									  							 RETURNRECORD
									  							 RETURNRECORD
									  							 RETURNRECORD																		*/      

//
$app->post('/returnrecord',function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$sql = "INSERT INTO RETURN RECORD () VALUES";

});


// TODO FOR WH AND READ FOR ACC
$app->get('/returnrecord/{status}',function($request,Response $response) {
	$db=getInternalDatabase();
	$sql = "SELECT * FROM RETURNRECORD WHERE STATUS = ?";
});

// DETAIL VIEW 
$app->get('/returnrecorddetails/{id}',function($request,Response $response) {
		
});


$app->put('/returnrecord',function($request,Response $response) {
		// CREATE CREDIT NOTE AND RETURN ID 
		//
});


/*
                           ,,,,                   ,,,,,
                           ╙█▓▓▓▓▓▓▓█▄,    ╓▄▓▓▓▓▓▓▓▓▀
                    ,╓▄▄▄▄▄▄▄▄▓▓▓▓╬▓▓▓▓▓█▓▓▓▓▓▀╣▓▓▓▌▄▄▄▄▄▄▄µ,
                ,▄▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▌▄
              ╔▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╬▀▓▌╣╣╣╣╣╣╣╣╣╣▓▀╬╬╣╣╣╣╣╣╣╣╣╬╣▓▓▓▓▓▄
            ╓▓▓▓▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▀▓▓▓▓▓▓▓▓▄
             ,▄▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
           ,▓▓▓▓▀╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣▓▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▄
          ▄▓▓▓▀╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▀▀▀▀▀▓▓▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╬▓▓▓▓
         ▓▓▓▓╣╣╣╣╣▓▓▓░░░░▀▀▀▓▓▀░░░░░░░░░▀░░░░░░░░░░▀▓▓▀▀░░░░▀▓▓▓╣╣╣╣╣▓▓▓▄
        ▓▓▓▓╣╣╣╣╣╣▓▓▌░░▒▌▄░░░░░░░░░░░░░░░░░░░░░░░░░░░░░▄▄▓░░░▓▓▓╣╣╣╣╣╣▓▓▓▄
       ╟▓▓▓╣╣╣╣╣╣╣▓▓▓▄░░▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▀░░▓▓▓╬╣╣╣╣╣╣╣▓▓▓
       ▓▓▓╣╣▓▓▓╣╣╣╣╣▓▓▓▓▓▓▌░░░░░░░░░░░░░░░░░░░░░░░░░░░░▓▓▓▓▓▓▓╬╣╣╣╣▓▓▓╣╣▓▓▌
      ▐▓▓▓▓▓▓▓╣╣╣╣╣╣╣╬╬▓▓▓░░░░▓▓▓▄░░░░░░░░░░░░░░▄▓▓▌░░░║▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓
      ╟▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓░░░░░╚▓▓▓▓▓▄░░░░░░░░▓▓▓▓▓▀░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓
      ╙▀^╟▓▓▌╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░▀▀▓▌░░░░░░▓▓▀░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓ ▀▀
         ▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░▀░░░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓b
         ▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░░░░╣▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▌
        ]▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▒░░░░█▓▓▓▓▓▓░░░░░█▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
        ╫▓▓▓╣╣╣▓▓╬╣╣╣╣╣╣╣╣▀▓▓▓▓▀░░░░░░░▀▓▓▀░░░░░░░▓▓▓▓▓╬╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
      ╔▓▓▓▓╣▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░║▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓╬╣▓▓▓▄
    "▀▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▌░░░░░░░░╟▓▓░░░░░░░░░▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▓▓▓▓▀
             ║▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓▌▄▄░░▄▄▓▓▓▓▓▓▄░░░▄▄▓▓▓▌╣╣╣╣╣╣╣╣╣╣╣▓▓▓
             ╘▓▓▓╣╣╣╣╣▌╣╣╣╣╣╣▓▓▓▓▓▓▓▓▀▀░░░░▀▓▓▓▓▓▓▓▓▌╣╣╣╣╣╣▓╣╣╣╣╣▓▓▌
              ▀▓▓▓╣╣╣▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓░░░░░░░╣▓▓▓╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣╣▓▓▓
               ▀▓▓▓╣▓▓▓▓╣╣╣╣╣╣╣╣╣╣╬▓▓▓▓▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣▓▓▓╣╣▓▓▓Γ
                ╙▓▓▓▓▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╬▀▓▓▓▓▓▓▒╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▓▀
                  ▀▓▓▓▌▓▓▓▓╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▀▓▓▓▓`
                    ╙█▌ ▀▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓` ▓▀`
                          ▀█▓▓▓▓▓╬╣╣╣╣╣╣╣╣╣╣╣╣╣╣▓▓▓▓▓▓▀
                             ^▀▀▓▓▓▓▓╬╣╣╣╣╣╣▓▓▓▓▓▓▀╙ 
																		  MISC
																		  MISC
																		  MISC                        					*/

$app->get('/priceprogression',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$barcode = $request->getParam('barcode','');
	$vendor =  $request->getParam('vendor',''); 
	$vendorid = $request->getParam('vendorid','');	

	$sql =  "SELECT PRODUCTID,BARCODE,
			 replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',VENDNAME					
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID";

	$params = array();
	if ($barcode != ""){
		if (strpos($barcode, '|') !== false) 
		{
    		$barcodes = explode('|',$barcode); 
			$sql .= " AND PRODUCTID in (";
    		foreach($barcodes as $oneBarcode){
    			$sql .=  "?,"; 
				array_push($params,$oneBarcode);	
    		}
    		$sql = substr($sql, 0, -1);
    		$sql .= ")";
		}
		else 
		{
			$sql .= " AND PRODUCTID = ?";
			array_push($params,$barcode);	
		}
	}

	if ($vendor != ""){
		$vendor = "%".$vendor."%";
		$sql .= " AND VENDNAME like ?";
		array_push($params,$vendor);
	}

	if ($vendorid != ""){
		$sql .= " AND dbo.ICPRODUCT.VENDID = ?";
		array_push($params,$vendorid);
	}

	$sql .= " ORDER BY PRODUCTNAME ASC";


	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	$newResult = array();
	foreach($result as $oneproduct){
		$sql = "SELECT TOP(5) PORECEIVEDETAIL.VENDNAME,POHEADER.USERADD as 'PCH',PORECEIVEDETAIL.USERADD as 'RCV', TRANDATE,TRANCOST,PORECEIVEDETAIL.VAT_PERCENT 
				FROM PORECEIVEDETAIL, POHEADER 
				WHERE PRODUCTID = ?
				AND POHEADER.PONUMBER = PORECEIVEDETAIL.PONUMBER 
				ORDER BY TRANDATE DESC";
		$req = $conn->prepare($sql);
		$req->execute(array($oneproduct["PRODUCTID"]));		
		$lasts = $req->fetchAll(PDO::FETCH_ASSOC);
		$oneproduct["lasts"] =  $lasts;

		array_push($newResult,$oneproduct);
	}

	$response = $response->withJson($newResult);
	return $response;	
}); 
 
$app->post('/barcode/{categoryname}',function(Request $request,Response $response){
	$categoryname = $request->getAttribute('categoryname');	
	$result["BARCODES"] = GenerateCategoryNumberByName($categoryname);	
	$response = $response->withJson($result);
	return $response
			->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/custombarcodes', function(Request $request,Response $response){
	$db=getDatabase();
	$sql = 'SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE FROM ICPRODUCT WHERE LEN(BARCODE) = 15';
	$req = $db->prepare($sql);
	$req->execute(array($category));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	$response = $response->withJson($result);
	return $response;
});

$app->get('/averagebasket', function(Request $request, Response $response){

   $now = time();	
   $month = date('m');     
   $year = date('Y');

   $result = strtotime("{$year}-{$month}-01");
   $begin =  date('Y-m-d', $result)." 00:00:00";
		

   $result = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month', $result));
   $end =  date('Y-m-d', $result). " 00:00:00";
	
	$sql = "SELECT  AVG(PAID_AMT) AS BASKET FROM POSCASH WHERE POSDATE > ? AND POSDATE < ?";

	$db=getDatabase();
	$req = $db->prepare($sql);
	$req->execute(array($begin,$end));
	$result =$req->fetch(PDO::FETCH_ASSOC);


	return $result["BASKET"];
});

$app->get('/vendormargin', function(Request $request, Response $response){
	$vendorid = $request->getParam('vendorid','');
	$begin =  $request->getParam('begin','');
	$end =  $request->getParam('end',''); 

	$beginSale =  $request->getParam('beginSale','');
	$endSale =  $request->getParam('endSale',''); 
	
	$beginSale .= " 00:00:00.000";
	$endSale .= " 23:59:59.999 ";

	$begin .= " 00:00:00.000";
	$end .= " 23:59:59.999 ";

	$db=getDatabase();
	// VENDOR ID 
	// Begin 
	// End 
	// Calculate Spending
	$sql = "SELECT SUM(PAID_AMT) AS PAID FROM APPAY WHERE VENDID = ? AND PAIDDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($vendorid,$begin,$end));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$paidAMT = $result["PAID"];
	

	$sql = "SELECT SUM(PRICE * QTY) AS SALE_AMT 
			FROM POSDETAIL 
			WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICPRODUCT WHERE VENDID = ?)
			AND POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);


	$req->execute(array($vendorid,$beginSale,$endSale));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$saleAMT = $result["SALE_AMT"];
	
	$resp["SPENDING"] = $paidAMT;
	$resp["SALE_AMT"] = $saleAMT;
	$resp["MARGIN"] = $saleAMT - $paidAMT;

	$response = $response->withJson($resp);
	return $response;
});

$app->get('/productmargin', function(Request $request, Response $response){

	$productid = $request->getParam('productid','');
	
	$begin =  $request->getParam('begin','');
	$end =  $request->getParam('end',''); 
	$begin .= " 00:00:00.000";
	$end .= " 23:59:59.999 ";

	$beginSale =  $request->getParam('beginSale','');
	$endSale =  $request->getParam('endSale',''); 
	$beginSale .= " 00:00:00.000";
	$endSale .= " 23:59:59.999 ";

	$db=getDatabase();
	// VENDOR ID 
	// Begin 
	// End 
	// Calculate Spending
	$sql = "SELECT SUM(AMOUNT) AS PAID FROM APPO WHERE PRODUCTID = ? AND PURCHASE_DATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);
	$req->execute(array($productid,$begin,$end));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$paidAMT = $result["PAID"];
	

	$sql = "SELECT SUM(PRICE * QTY) AS SALE_AMT 
			FROM POSDETAIL 
			WHERE PRODUCTID = ? 
			AND POSDATE BETWEEN ? AND ?";
	$req = $db->prepare($sql);


	$req->execute(array($productid,$beginSale,$endSale));
	$result =$req->fetch(PDO::FETCH_ASSOC);
	$saleAMT = $result["SALE_AMT"];
	
	$resp["SPENDING"] = $paidAMT;
	$resp["SALE_AMT"] = $saleAMT;
	$resp["MARGIN"] = $saleAMT - $paidAMT;

	$response = $response->withJson($resp);
	return $response;
});

$app->get('/bank', function(Request $request, Response $response){
	$db=getDatabase();
	$sql = "SELECT * FROM RPT_TRIALBALANCE WHERE TYPEENG = 'Bank'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result =$req->fetchAll(PDO::FETCH_ASSOC);

	$response = $response->withJson($result);
	return $response;
});

$app->get('/itemthrown', function(Request $request, Response $response){
	$db=getDatabase();

	$barcode = $request->getParam('barcode','');	
	$begin = $request->getParam('begin','');	
	$end = $request->getParam('end','');	

	$sql = "SELECT PRODUCTID,LOCID, TRANDATE, replace(replace(PRODUCTNAME,'\n',' '),'\"','') as 'PRODUCTNAME',PRODUCTNAME1,REFERENCE,TRANQTY,
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICTRANDETAIL.PRODUCTID 
					AND TRANDATE BETWEEN '$begin 00:00:00.000'  AND '$end 23:59:59.999'  ),0) as 'THROWN' 
	FROM dbo.ICTRANDETAIL 
	WHERE DOCNUM LIKE 'IS%' 
	AND TRANTYPE = 'I'
	AND TRANDATE BETWEEN '$begin 00:00:00.000'  AND '$end 23:59:59.999'";

	if ($barcode != '')
		$sql .= " AND PRODUCTID = ?";

	$sql.= " ORDER BY TRANDATE DESC";

	$req = $db->prepare($sql);
	$req->execute(array($barcode));
	$result =$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);
	return $response;
});

$app->get('/itemreceived', function(Request $request,Response $response) {

	$begin = $request->getParam('begin','');	
	$end = $request->getParam('end','');	

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE DATEADD BETWEEN '$begin 00:00:00.000' AND '$end 23:59:59.999' ORDER BY TRANDATE DESC";	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$receivedpos = $req->fetchAll(PDO::FETCH_ASSOC);	


	$result = array();
	foreach($receivedpos as $receivedpo){

		$sql = "SELECT * FROM PORECEIVEDETAIL WHERE RECEIVENO = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($receivedpo["RECEIVENO"]));
		$receivedDetail = $req->fetchAll(PDO::FETCH_ASSOC);	


		$receivedpo["detail"] = $receivedDetail;
		array_push($result,$receivedpo);

	}
	$response = $response->withJson($result);
	return $response;
});

$app->get('/master',function(Request $request,Response $response) {    
	$conn=getDatabase();

	$sql = "SELECT PRODUCTID,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,LASTCOST,PRICE FROM ICPRODUCT";
	$req = $conn->prepare($sql);
	$req->execute(array());
	$items=$req->fetchAll(PDO::FETCH_ASSOC);	

	$data = array();

	foreach($items as $item){
		
		$sql2 = "SELECT PACK_CODE,DESCRIPTION1,DESCRIPTION2, SALEUNIT,SALEFACTOR,SALEPRICE 
				 FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";
		$req2 = $conn->prepare($sql2);
		$params = array($item["PRODUCTID"]);
		$req2->execute($params);
		$items2=$req2->fetchAll(PDO::FETCH_ASSOC);	
		
		$item["PACKS"] = $items2;
		array_push($data,$item);
	}
	
	$response = $response->withJson($data);
	return $response;
});

$app->get('/sale/{date}',function(Request $request,Response $response) {   
	$conn=getDatabase();
	$date = $request->getAttribute('date'); 
	//$splitted = explode('/',$date);
	//$date = $splitted[1] . "/" . $splitted[0] . "/" . $splitted[2];
	$date = str_replace("-","/",$date);
	
	$sql = "
			SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
			FROM POSDETAIL 			
			WHERE POSDATE >= '".$date." 00:00:00.000' 
			AND POSDATE <= '".$date." 23:59:59.999'
			AND CUSTID NOT IN (".clientToExclude().");
			";	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	$left = explode('.',$result["PROFIT"])[0];
	$right = explode('.',$result["PROFIT"])[1];
	$result["PROFIT"] = $left.".".substr($right, 0,2);

	$left = explode('.',$result["SALE"])[0];
	$right = explode('.',$result["SALE"])[1];
	$result["SALE"] = $left.".".substr($right, 0,2);

	$response = $response->withJson($result);
	return $response;	
});

$app->get('/adjusteditems', function(Request $request,Response $response) {

	$date = $request->getParam('date','');
	$storebin = $request->getParam('storebin','');
	$location =  $request->getParam('location','');
	$author =  $request->getParam('author',''); 

	$db = getInternalDatabase();
	$sql = "SELECT barcode,replace(replace(replace(name,'\"',''),x'0A',''),x'0D','') as 'name',oldqty,newqty,location,
			replace(replace(storebin,x'0A', ''),x'0D','') as 'storebin',
			cost,date,author
		    FROM ITEMADJUST WHERE 1 = 1";
	$params = array();
	if ($date != ""){
		$datePlus = $date + 86399;
		$sql .= " AND (date BETWEEN ? AND ?)";
		array_push($params,$date,$datePlus);		
	}
	if ($storebin != ""){
		$sql .= " AND storebin = ?";
		array_push($params,$storebin);		
	}
	if ($location != ""){
		$sql .= " AND location = ?";
		array_push($params,$location);		
	}
	if ($author != ""){
		$sql .= " AND author = ?";
		array_push($params,$author);		
	}	
	$sql .= " ORDER BY date DESC";
	$req = $db->prepare($sql);
	$req->execute($params);	
	$result=$req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($result);

	return $response;	
});  


$app->post('/item/{barcode}',function(Request $request,Response $response) {   

	$conn=getDatabase();
	// RETRIEVE INFO
	$barcode = $request->getAttribute('barcode'); 
	$json = json_decode($request->getBody(),true);	
	if ($json["secret"] != "alouette")
	{		
		$result["result"] = "KO";
		$response = $response->withJson($result);
		return $response;
	}
	$author = $json["author"];	
	$storebin = $json["storebin"];
	$quantity = $json["quantity"];	
	
	if (substr($storebin,0,1) == "W")	
		$location = "WH2";
	else
		$location = "WH1";

	$oldquantity = 0;
	$params = array($location,$barcode);
	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = ? AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute($params);
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$oldquantity = $result["LOCONHAND"];
	

	// RETRIEVE PRODUCT INFO
	$params = array($barcode);
	$sql = "SELECT ONHAND,PRODUCTNAME,PRODUCTNAME1,PRICE,LASTCOST,CATEGORYID,CLASSID  FROM dbo.ICPRODUCT WHERE BARCODE = ?";
	$req = $conn->prepare($sql);
	$req->execute($params);
	$theitem = $req->fetch(PDO::FETCH_ASSOC);
	$name = $theitem["PRODUCTNAME"];
	$nameKH = $theitem["PRODUCTNAME1"];
	$cost = $theitem["LASTCOST"];
	$price = $theitem["PRICE"];
	$category = $theitem["CATEGORYID"];
	$classid = $theitem["CLASSID"];

	$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = ? AND PRODUCTID = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($location,$barcode));
	$theitem = $req->fetch(PDO::FETCH_ASSOC);
	$onhand = $theitem["LOCONHAND"];
	
	
	// RECORD TRANSACTION
	$now = date("Y-m-d H:i:s");
	if($author == "thoeun_s") // TODO FUNCTION
		$userBLUE = "THOEUN SOPHAL";	
	else if ($author == "hay_s")
		$userBLUE = "HAY SE";
	else if ($author ==	"sen_s")
		$userBLUE = "SOVI";

	// GENERATE ID
	$sql = "SELECT num4 FROM SYSDATA where sysid = 'IC'";
	$req = $conn->prepare($sql);
	$req->execute(array());	
	$num4 = $req->fetch(PDO::FETCH_ASSOC)["num4"];
	$newID = intval($num4);	

	// CALCULATED
	$GENID = "AD000000000".$newID;	
	$TRANQTY =  $quantity - $onhand;
	if ($TRANQTY > 0)
		$type = 'AI';
	else if ($TRANQTY < 0)
		$type = 'AD';
	else 
		$type = 'NO';
	if ($type != 'NO')
	{
		$amountCost = sprintf("%.2f",$TRANQTY * $cost);
		$amountPrice = sprintf("%.2f",$TRANQTY * $price);
		// UPDATE HEADER	
		$params = array($GENID,$location,$now,$type,$amountCost,$userBLUE,$now,$amountCost);

		$sql = "
		INSERT INTO ICTRANHEADER (DOCNUM,FLOCID,TRANDATE,TRANTYPE,TOTAL_AMT,PCNAME,CURRID,CURR_RATE,
		DISC_PERCENT,VAT_PERCENT,USERADD,DATEADD,APPLID,BASECURR_ID,CURRENCY_AMOUNT) 
		VALUES (?,?,?,?,?,'SS2-IT-01','USD',1,0.0,0.0,?,?,'IC','USD',?)"; 
		$req = $conn->prepare($sql);
		$req->execute($params);		
		
		// UPDATE DETAIL	
		$params = array(
			$GENID,$barcode,$location,$category,$classid,$now, $type,$name,$nameKH,$TRANQTY,
			$cost,$price,$price,$amountPrice,
			$amountCost,$onhand,$userBLUE,$now,$cost,$cost,
			$TRANQTY,$cost,$amountCost,
			$amountCost,$cost,$amountPrice,$price,$barcode  
		);
		$sql = "INSERT INTO ICTRANDETAIL (
		DOCNUM,PRODUCTID,LOCID,CATEGORYID,CLASSID,TRANDATE,TRANTYPE,LINENUM,PRODUCTNAME,PRODUCTNAME1,TRANQTY,
		TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,TRANDISC,TRANTAX,TRANCOST,TRANPRICE,PRICE_ORI,EXTPRICE,	
		EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,WEIGHT,OLDWEIGHT,USERADD,DATEADD,CURRENTCOST,LASTCOST,
		APPLID,LINK_LINE,ICCLEARING_ACC,INVENTORY_ACC,DIMENSION,TRANQTY_NEW,TRANCOST_NEW,TRANEXTCOST_NEW,COST_METHOD,BASECURR_ID,	
		CURRENCY_AMOUNT,CURRENCY_COST,CURRENCY_EXTPRICE,CURRENCY_PRICE,MAIN_PRODUCTID) 
		VALUES (
		?,?,?,?,?,?,?,1,?,?,?,
		'UNIT',1.0,'UNIT',1.0,0.0,0.0,?,?,?,?,	
		?,?,'USD',1,1.0,1.0,?,?,?,?,
		'IC',0,77000,17000,1.0,?,?,?,'AG','USD',
		?,?,?,?,?
		)"; 
		$req = $conn->prepare($sql);
		$req->execute($params);

		// UPDATE BY SETTING THE FINAL QUANTITY AND STORBIN
		$params = array((float)$quantity,$storebin,$location,$barcode);
		$sql = "UPDATE dbo.ICLOCATION set LOCONHAND = ?, STORBIN = ?  WHERE LOCID = ? AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute($params);	
		// 
		
		// UPDATE ONHAND
		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result != null)		
			$QTY1 = $result["LOCONHAND"];
		else 
			$QTY1 = 0;

		$sql = "SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode));
		$result = $req->fetch(PDO::FETCH_ASSOC);
		if ($result != null)		
			$QTY2 = $result["LOCONHAND"];
		else 
			$QTY2 = 0;
		$totalQTY = $QTY1 + $QTY2;
		
		$params = array($totalQTY,$barcode);
		$sql = "UPDATE dbo.ICPRODUCT set ONHAND = ? WHERE PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute($params);	

		// Increment gen ID for Next
		$incremented = $newID + 1;
		$sql = "UPDATE SYSDATA set num4 = ? where sysid = 'IC'"; 
		$req = $conn->prepare($sql);
		$req->execute(array($incremented));
	}
	else
	{
		// UPDATE BY SETTING THE ONLY THE STORBIN
		$params = array($storebin,$location,$barcode);
		$sql = "UPDATE dbo.ICLOCATION set STORBIN = ?  WHERE LOCID = ? AND PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute($params);	
	}

	// RECORDING
	$conn2 = getInternalDatabase();
	$date = time(); 
	$params = array($barcode,$name,$oldquantity ,$quantity , $location,$storebin,$cost,$date,0,$author);
	$sql = "INSERT INTO ITEMADJUST VALUES(null,?,?,?,?,?,?,?,?,?,?)";
	$req = $conn2->prepare($sql);
	$req->execute($params);

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

// customer visit 
$app->get('/traffic/{date}',function($request,Response $response) {
	$date = $request->getAttribute('date');
	$conn=getDatabase();
	$date = str_replace("-","/",$date);
	$totalresp = array();
	for($i = 8;$i < 21;$i++)
	{
		$begin = $date." 0".($i + 1).":00:00.000"; // HACK BECAUSE OF SERVER
		$end = $date." 0".($i + 2).":00:00.000"; // HACK BECAUSE OF SERVER
		
		$sql = "SELECT  count([POSDATE]) as 'NB".$i."',sum([PAID_AMT]) as 'SUM".$i."'
		FROM [PhnomPenhSuperStore2019].[dbo].[POSCASH]
		WHERE POSDATE > '".$begin."' AND POSDATE < '".$end."'";
		
		$req = $conn->prepare($sql);
		$req->execute(array());
		$result = $req->fetch(PDO::FETCH_ASSOC);	
		$resp["hour"] = $i;	
		$resp["count"] = $result["NB".$i];
		$resp["amount"] = $result["SUM".$i];
		array_push($totalresp,$resp);
	}
	$response = $response->withJson($totalresp);
	return $response;	
});


$app->get('/freshsales',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$day = $request->getParam('day','');
	if ($day == '')
		$day = date("Y-m-d");
		

	$sql =  "SELECT  PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
			
			OTHER_ITEMCODE,COLOR,CATEGORYID,ONHAND,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
			
			(SELECT COUNT(PRODUCTID) AS 'CNT' FROM dbo.POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID 
			 AND POSDATE BETWEEN  '$day 00:00:00.000' AND '$day 23:59:59.999'
	  		 GROUP BY PRODUCTID) as 'SALELAST30',
			PRICE,LASTRECEIVEDATE,dbo.ICPRODUCT.DATEADD
			FROM dbo.ICPRODUCT,dbo.APVENDOR  
			WHERE dbo.ICPRODUCT.VENDID = dbo.APVENDOR.VENDID
			AND CATEGORYID in ('FRESH FRUIT','FRESH MEAT','FRESH MILK','FRESH VEGETABLE')";

	$params = array();


	$req = $conn->prepare($sql);	
	$req->execute($params);
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
}); 

$app->get('/itemsale',function($request,Response $response) {
	
	$begin = $request->getParam('begin','');
	$end = $request->getParam('end','');
	$barcode = $request->getParam('barcode',''); 
	$conn=getDatabase();

	$sql = "SELECT SUM(QTY) AS 'COUNT'
	  FROM [PhnomPenhSuperStore2019].[dbo].[POSDETAIL]
	  WHERE PRODUCTID = ?
	  AND POSDATE >=  '".$begin." 00:00:00.000' 
	  AND POSDATE <= '".$end." 23:59:59.999'	  
	  GROUP BY PRODUCTID";

	$req = $conn->prepare($sql);
	$req->execute(array($barcode));
	$result = $req->fetch(PDO::FETCH_ASSOC);
	if ($result == false)
		$result["COUNT"] = 0;	

	$sql2 = "SELECT PRODUCTNAME FROM 
			 dbo.POSDETAIL WHERE PRODUCTID = ?";
	$req2 = $conn->prepare($sql2);
	$req2->execute(array($barcode));			 
	$result2 = $req2->fetch(PDO::FETCH_ASSOC);
	if ($result2 != false)
		$result["PRODUCTNAME"] = $result2["PRODUCTNAME"];
	else
		$result["PRODUCTNAME"] = "N/A";
	$result["PRODUCTID"] = $barcode;	
	$response = $response->withJson($result);	

	return $response;	
});
          
function purifyPromotion($result)
{
	$output = array();

	foreach($result as $item)
	{
		if ($item["DISCAMOUNT"] != null && $item["DISCAMOUNTSTART"] != null && $item["DISCAMOUNTEND"] != null) 
			array_push($output,$item);
		
		if ($item["DISCPERCENT"] != null && $item["DISCPERCENTSTART"] != null && $item["DISCPERCENTEND"] != null) 
			array_push($output,$item);		
	}
	return $output;
}


$app->get('/currentpromotion',function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$begin = date("Y-m-d");
	$conn=getDatabase();

	$sql = "SELECT [PRODUCTID] ,[PRODUCTNAME] ,[PRODUCTNAME1] ,[PRICE] ,
	(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNT' ,
	(SELECT TOP(1) DATESTART FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNTSTART' ,
	(SELECT TOP(1) DATEEND FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNTEND' ,
	(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT', 
	(SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	
	(SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
	(SELECT VENDNAME FROM dbo.APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME',
	CATEGORYID,COLOR,
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
	ISNULL( (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1' ) ,'N/A') 
	as 'STOREBIN1',
	ISNULL( (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH2' ) ,'N/A') 
	as 'STOREBIN2'
  		
	FROM dbo.ICPRODUCT 	
	WHERE PRODUCTID in (SELECT PRODUCTID FROM [PhnomPenhSuperStore2019].[dbo].[ICPROMOTION] WHERE DATESTART <= '$begin 00:00:00.000' AND DATEEND >= '$begin 23:59:59.999' ) 
	OR PRODUCTID in (SELECT PRODUCTID FROM [PhnomPenhSuperStore2019].[dbo].[ICNEWPROMOTION] WHERE DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ) 
	GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE,CATEGORYID,COLOR,TOTALRECEIVE,TOTALSALE,VENDID"; 
	
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$result = purifyPromotion($result);

	$tmp = array();
	foreach($result as $item)
	{
		if ($item["DISCAMOUNT"] != null && $item["DISCAMOUNTSTART"] != null && $item["DISCAMOUNTEND"] != null) 
			array_push($tmp,$item);
		
		if ($item["DISCPERCENT"] != null && $item["DISCPERCENTSTART"] != null && $item["DISCPERCENTEND"] != null) 
			array_push($tmp,$item);		
	}
	$result = $tmp;

	$response = $response->withJson($result);


	return $response;	
});

$app->get('/bestsellerpromotion',function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$begin = $request->getParam('begin','');//$json["begin"];
	$end = $request->getParam('end','');//$json["end"];
	$conn=getDatabase();
	
	$sql = "SELECT TOP (50)
      [PRODUCTID]
      ,[PRODUCTNAME]
	  ,[PRODUCTNAME1]
	  ,[PRICE]
	  ,(SELECT (PRICE_ORI - PRICE) FROM ICPROMOTION WHERE PRODUCTID = POSDETAIL.PRODUCTID) as 'DISCAMOUNT'
	  ,(SELECT DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = POSDETAIL.PRODUCTID) as 'DISCPERCENT'
	  ,COUNT(PRODUCTID) AS 'COUNT'
	  FROM [PhnomPenhSuperStore2019].[dbo].[POSDETAIL]
	  WHERE POSDATE >=  '".$begin." 00:00:00.000' 
	  AND POSDATE <= '".$end." 23:59:59.999'
	  AND PRODUCTID in (SELECT  PRODUCTID FROM  [PhnomPenhSuperStore2019].[dbo].[ICPROMOTION]  
	  WHERE DATESTART >= '".$begin." 00:00:00.000' AND DATEEND <= '".$end." 23:59:59.999')
	  OR PRODUCTID in (SELECT  PRODUCTID FROM  [PhnomPenhSuperStore2019].[dbo].[ICNEWPROMOTION]  
	  WHERE DATEFROM >= '".$begin." 00:00:00.000' AND DATETO <= '".$end." 23:59:59.999')
	  GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE
	  ORDER BY COUNT DESC";
	$result = SELECTALL($sql);	
	//$req = $conn->prepare($sql);
	//$req->execute(array());
	//$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);  
	return $response;	
});

// Best Seller Selection
$app->get('/selection',function($request,Response $response) {
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);
	
	$sql = "
		SELECT TOP (1000)
		 dbo.POSDETAIL.PRODUCTID
		,dbo.POSDETAIL.PRODUCTNAME
		,dbo.POSDETAIL.PRODUCTNAME1
		,dbo.POSDETAIL.PRICE
		,dbo.ICPRODUCT.COST
		,dbo.POSDETAIL.CATEGORYID
		,dbo.ICPRODUCT.COLOR
		,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0) as 'TOTALSALE'
		,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0) as 'TOTALRECEIVE'
		, (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) as 'PERCENTSALE'		
		,(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID) as 'DISCAMOUNT' 
		,(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID) as 'DISCPERCENT'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH1'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH2'
		,VENDNAME		
		FROM dbo.POSDETAIL,dbo.ICPRODUCT,dbo.APVENDOR
		WHERE dbo.POSDETAIL.PRODUCTID = dbo.ICPRODUCT.PRODUCTID
		AND dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID		
		AND dbo.POSDETAIL.CATEGORYID NOT IN ('FRESH FRUIT','FRESH MEAT','FRESH MILK','FRESH VEGETABLE')
		AND ( ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) > 0
		
		GROUP BY dbo.POSDETAIL.PRODUCTID,dbo.POSDETAIL.PRODUCTNAME,dbo.POSDETAIL.PRODUCTNAME1,dbo.POSDETAIL.PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE, dbo.POSDETAIL.CATEGORYID,dbo.ICPRODUCT.COLOR,dbo.ICPRODUCT.COST		
		HAVING (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) < 100
		ORDER BY PERCENTSALE DESC
		"; 
	$result = SELECTALL($sql);	
	
	$response = $response->withJson($result);
	return $response;	
});

// best seller general
$app->get('/bestseller',function($request,Response $response) {
	
	$conn=getDatabase();
	$json = json_decode($request->getBody(),true);
	$begin = $request->getParam('begin','');
	$end = $request->getParam('end','');
	$sql = "
		SELECT TOP (50)
		dbo.POSDETAIL.PRODUCTID
		,dbo.POSDETAIL.PRODUCTNAME
		,dbo.POSDETAIL.PRODUCTNAME1
		,dbo.POSDETAIL.PRICE
		,dbo.ICPRODUCT.COST
		,dbo.POSDETAIL.CATEGORYID
		,dbo.ICPRODUCT.COLOR
		,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0) as 'TOTALRECEIVE'
		,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0) as 'TOTALSALE'
		,(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID AND DATESTART <= '$begin 00:00:00.000' 
		AND DATEEND >= '$end 23:59:59.999' ORDER BY DATESTART DESC) as 'DISCAMOUNT' 
		,(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' 
		AND DATETO >= '$end 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH1'
		,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH2'
		,VENDNAME
		,COUNT(dbo.POSDETAIL.PRODUCTID) AS 'COUNT'
		FROM dbo.POSDETAIL,dbo.ICPRODUCT,dbo.APVENDOR
		WHERE dbo.POSDETAIL.PRODUCTID = dbo.ICPRODUCT.PRODUCTID
		AND dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID
		AND POSDATE >=  '$begin 00:00:00.000' 
		AND POSDATE <= '$end 23:59:59.999'
		GROUP BY dbo.POSDETAIL.PRODUCTID,dbo.POSDETAIL.PRODUCTNAME,dbo.POSDETAIL.PRODUCTNAME1,dbo.POSDETAIL.PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,dbo.POSDETAIL.CATEGORYID,dbo.ICPRODUCT.COLOR,dbo.ICPRODUCT.COST
		ORDER BY COUNT DESC"; 

	$req = $conn->prepare($sql);	
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$response = $response->withJson($result);
	return $response;	
});

$app->get('/info',function(Request $request,Response $response){
	$db=getDatabase();
	$sql = "SELECT TOP(1) * FROM ICPRODUCT";
	$req = $db->prepare($sql);
	$req->execute(array());
	$item = $req->fetch();
	$response = $response->withJson($item);
	return $response;
});


$app->get('/depleteditems', function($request,Response $response) {
	$db=getDatabase();
	$sql = "SELECT ICPRODUCT.PRODUCTID,
		replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'PRODUCTNAME', 
		ICLOCATION.ORDERPOINT, ORDERQTY,
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2',
		(SELECT replace(replace(VENDNAME,char(39),''),char(34),'') as 'VENDNAME' FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME'

					FROM ICLOCATION,ICPRODUCT 
					WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
					AND ACTIVE = 1
					AND LOCID = 'WH1'
					AND ONHAND < ICLOCATION.ORDERPOINT 
					AND ICLOCATION.ORDERPOINT > 0";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$response = $response->withJson($items);
	return $response;
});


ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();