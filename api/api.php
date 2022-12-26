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
require_once 'issuestock.php';
require_once 'receivepo.php';
require_once 'generator.php';
require_once 'createcreditnote.php';


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;


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
	$req=$db->prepare($sql);
	$req->execute(array($role) ); 
	$role = $req->fetch(PDO::FETCH_ASSOC);
	return $role["appmodules"];	
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
        $session["appmodules"] = getModules($user["ROLENAME"]);  
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
	$result["image"] = loadPicture($id,300,true);
	$response = $response->withJson($result);
	return $response;
});

$app->post('/refreshtoken',function(Request $request,Response $response){
	$json = json_decode($request->getBody(),true);
	$userid = $json["USERID"];
	$fcmtoken = $json["fcmtoken"];
	$db = getInternalDatabase();
	$sql = "UPDATE USER SET fcmtoken = ? WHERE ID = ?";
    $req = $db->prepare($sql);	
	$req->execute(array($json["fcmtoken"],$userid));
		
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
}); 
	
$app->post('/login',function(Request $request,Response $response) { 

	$json = json_decode($request->getBody(),true);
	$username = $json["username"];
	$password = $json["password"];

    //$stmt->execute(array($login,$password));
    //$user = $stmt->fetch(PDO::FETCH_ASSOC);	
 	$session = getUserSession($username,$password); 

    if ($session != null)
	{			
			$data = array();
			$data["role"] = $session["role"];
			$data["appmodules"] = $session["appmodules"];
			$data["token"] = $session["token"];
			$data["ID"] = $session["ID"];
			$result["data"] = $data;
			$result["result"] = "OK";

			if(isset($json["fcmtoken"]))
			{
				$fcmtoken = $json["fcmtoken"];
				$db = getInternalDatabase();
				$sql = "UPDATE USER SET fcmtoken = ? WHERE ID = ?";
    			$req = $db->prepare($sql);	
				$req->execute(array($json["fcmtoken"],$session["ID"]));				
			}
			else{
				error_log("NO TOKEN AVAILABLE FOR ".$session["ID"]);
			}			
	}
    else
    	$result["result"] = "KO";
	
	$response = $response->withJson($result);
	return $response;
});

$app->post('/logout/{id}',function(Request $request,Response $response) { 
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();
	$sql = "UPDATE USER SET fcmtoken = null WHERE ID = ?";
	$req = $db->prepare($sql);	
	$req->execute(array($id));

	$result = array();	
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
								   	SUPPLIERS 
								   	SUPPLIERS
								   	SUPPLIERS                               */

$app->get('/supplieritems/{id}',function(Request $request,Response $response) {    
	$conn=getDatabase();
	$id = $request->getAttribute('id');
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);
	

	//$sql = "SELECT * FROM ICPRODUCT WHERE VENDID = ?";
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
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

	$resp["result"] = "OK";
	$resp["data"] = $result;

	$response = $response->withJson($resp);
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

	$resp["result"] = "OK";
	$resp["data"] = $result;

	$response = $response->withJson($resp);
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
	$sql = "SELECT PRODUCTID,SALEPRICE,DESCRIPTION1,DESCRIPTION2,SALEUNIT,DISC,EXPIRED_DATE,SALEFACTOR,GETDATE() as 'NOW' FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?"; 		
	$req = $conn->prepare($sql);
	$req->execute($params);
	$item=$req->fetch(PDO::FETCH_ASSOC);		
	if ($item != false){		
		if ($item["EXPIRED_DATE"] > $item["NOW"])
			$item["DISC"] = round($item["DISC"],2);
		else
			$item["DISC"] = "0";
		$item["PICTURE"]= loadPicture($barcode,true);		
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
	(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE DISCOUNT_TYPE = 'DISCOUNT(%)' AND PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATETO DESC) as 'DISCPERCENT', 
	(SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
	(SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID ORDER BY DATEFROM DESC) as 'DISCPERCENTEND',
	(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
	(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2',	

	CATEGORYID,CATEGORYNEWID,BARCODE,PRODUCTNAME,PRODUCTNAME1,
	(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST'
	,STORE,SIZE,COLOR,PRICE,VENDNAME,
	
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
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
		$finalItem["WH1"] = $item["LOCONHAND"] ?? "";
		
		$sql="
		SELECT LOCONHAND 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item=$req->fetch();
		$finalItem["WH2"] = $item["LOCONHAND"] ?? "";
	
		$finalItem["PICTURE"] = loadPicture($barcode,300,true);					
				
		return $finalItem;
	}
	else 
		return null;
}

/************** ANALYSIS ***************/
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

		$params = array($barcode,$barcode);
		$sql="SELECT PRODUCTID,OTHERCODE,BARCODE,SALEFACTOR,PRODUCTNAME,PRODUCTNAME1,STKUM,SIZE,COLOR,PRICE,PACKINGNOTE,STORE
		FROM dbo.ICPRODUCT  
		WHERE BARCODE = ? OR OTHERCODE = ?";
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
			$oneItem["productImg"] = loadPicture($item["PRODUCTID"],300,true);
			$oneItem["barcodeNumber"] = $barcode;
			$oneItem["barcodeImage"] = generateBarcodeImage($item["PRODUCTID"]);
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
				$oneItem["productImg"] = base64_encode($packInfo["PICTURE"]);			
				//if (file_exists("img/packs/".$packcode.".jpg"))
				//	$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
				//else
				//	$oneItem["productImg"] = base64_encode($packInfo["PICTURE"]);			

				$oneItem["salefactor"] = $packInfo["SALEFACTOR"];				
				$oneItem["return"] = $packInfo["SALEUNIT"];		
				$oneItem["productImg"] = loadPicture($barcode,300,true);		
				$oneItem["barcodeNumber"] = $packcode;
				$oneItem["barcodeImage"] = generateBarcodeImage($packcode);

				$oneItem["PRICE"] = $packInfo["SALEPRICE"];		
				$oneItem["unit"] = $packInfo["SALEUNIT"];
				// FROM ITEM				
				$oneItem["nameEN"] = $packInfo["DESCRIPTION1"];
				$oneItem["nameKH"] = $packInfo["DESCRIPTION2"];
				

				$oneItem["country"] = null;			
				$oneItem["packing"] = null;
				$oneitem["discpercent"] = $packinfo["DISC"] ?? "";
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
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
			$oneItem["productImg"] = loadPicture($barcode,300,true);			
			$oneItem["country"] = $item["COLOR"];
			array_push($result,$oneItem);
		}		
	}	
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
	return $response;
});

function itemLookupLabel($barcode,$withImage = false,$forceDiscount = 0)
{
	$conn=getDatabase();	
	$begin = date("m-d-y");
	$params = array($barcode,$barcode);

	$sql="SELECT PRODUCTID,OTHERCODE,SIZE,SALEFACTOR,						
		  (SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENT', 					
		  (SELECT TOP(1) DATEFROM FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTSTART',
		  (SELECT TOP(1) DATETO FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = [ICPRODUCT].PRODUCTID  AND DATEFROM <= '$begin 00:00:00.000' AND DATETO >= '$begin 23:59:59.999' ORDER BY DATEFROM DESC) as 'DISCPERCENTEND', STKUM,
					
		   BARCODE,PRODUCTNAME,PRODUCTNAME1,SIZE,COLOR,PRICE,STORE
						FROM dbo.ICPRODUCT WHERE BARCODE = ? OR OTHERCODE = ?";
	$req = $conn->prepare($sql);
	$req->execute($params);
	$item = $req->fetch(PDO::FETCH_ASSOC);


	$sql = "SELECT PROSTARTDATE,PROENDDATE,PROPRICE FROM ICGROUPPRICE WHERE PRODUCTID = ? AND PROENDDATE > GETDATE() ";
	$req = $conn->prepare($sql);
	$req->execute($params); 
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$isSpecial = false;
	if ($res != false){
		$item['DISCPERCENTSTART'] = $res['PROSTARTDATE'];
		$item['DISCPERCENTEND'] = $res['PROENDDATE'];
		$item['DISCPERCENT'] = "-1";
		$specialPrice = $res['PROPRICE'];
		$isSpecial = true;
	}


	if ($item != false)
	{
		if ($withImage == true)
			$oneItem["productImg"] = loadPicture($barcode,150,true);

		$oneItem["unit"] = $item["STKUM"];	
		$oneItem["barcode"] = $item["BARCODE"];
		$oneItem["nameEN"] = $item["PRODUCTNAME"];
		$oneItem["nameKH"] = $item["PRODUCTNAME1"];			
		$oneItem["country"] = $item["COLOR"];

		$oneItem["barcodeImage"] = generateBarcodeImage($barcode);
		$oneItem["barcodeNumber"] = $barcode;
		$oneItem["return"] = $item["SIZE"];
		$oneItem["salefactor"] = $item["SALEFACTOR"];
		$oneItem["isPack"] = "no";

		if ($forceDiscount != 0)
			$oneItem["discpercent"] = $forceDiscount;				
		else 
			$oneItem["discpercent"] = floatval($item["DISCPERCENT"]);


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
		
		$oneItem["oldPrice"] = 	 truncateDollarPrice($item["PRICE"]);

		$oldPrice = floatval(truncateDollarPrice($item["PRICE"]));					
		$percent = (100 - floatval($oneItem["discpercent"])) ;		

		if ($percent != 100 && $percent != 101)
		{
			$percent  /= 100;
			$newPrice = $percent * $oldPrice; 			
			
		}
		else if ($isSpecial){
			$newPrice = $specialPrice;		
		}
		else			
			$newPrice = $oldPrice * 1; 	
			
		$oneItem["dollarPrice"] = truncateDollarPrice($newPrice);										
		$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));
		return $oneItem;
	}
	return null;
}

$app->get('/label/{barcodes}',function($request,Response $response) {	
	$barcodes = $request->getAttribute('barcodes'); 		
	$barcodes = explode("|",$barcodes);	
	$percentages = $request->getParam('percentages','');
	$percentages = explode("|",$percentages);

	$result = array();
	$count = 0;
	foreach($barcodes as $barcode)
	{
		if ($barcode == "")
			continue;
		$packInfo = packLookup($barcode);
		if ($packInfo != null)		
		{
			$packcode = $barcode;
			$barcode = $packInfo["PRODUCTID"];				
			if (isset($percentages[$count]))
				$oneItem = itemLookupLabel($barcode,true,$percentages[$count]);
			else
				$oneItem = itemLookupLabel($barcode,true);										
			$oneItem["productImg"] = base64_encode($packInfo["PICTURE"]);			
			$oneItem["unit"] = $packInfo["SALEUNIT"];
			$oneItem["packing"] =  $packInfo["SALEUNIT"];
			$oneItem["barcode"] = $packcode;
			$oneItem["oldPrice"] = 	truncateDollarPrice($packInfo["SALEPRICE"]);			
			$oneItem["discpercent"] = $packInfo["DISC"];
			// CALCULATE PROMO
			$oldPrice = floatval(truncateDollarPrice($packInfo["SALEPRICE"]));					
			$percent = (100 - intval($oneItem["discpercent"])) ;				
			if ($percent != 100)
			{				
				$percent = floatval("0.".$percent);
				$newPrice = $percent * $oldPrice; 				
			}
			else{				
				$newPrice = $oldPrice * 1; 	
			}			
			$oneItem["dollarPrice"] =  truncateDollarPrice($newPrice);										
			$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));
			$oneItem["PRICE"] = $packInfo["SALEPRICE"];								
			$oneItem["ISPACK"] = "YES";
			$oneItem["nameEN"] = $packInfo["DESCRIPTION1"]." (".$packInfo["SALEUNIT"].")";
						
			array_push($result,$oneItem);
		}
		else 
		{			
			if (isset($percentages[$count]) && $percentages[$count] != ""){			
				$oneItem = itemLookupLabel($barcode,true,$percentages[$count]);
			}				
			else
				$oneItem = itemLookupLabel($barcode,true);
			if ($oneItem != null){
				$oneItem["packing"] = "";
				$oneItem["ISPACK"] = "NO";	
				array_push($result,$oneItem);
			}										
		}
		$count++;				
			
	}	
	if (count($result) == 0){
		$resp["result"] = "KO";
		$resp["message"] = "Product not found";
	}else{
		$resp["result"] = "OK";
		$resp["data"] = $result;
	}
	
	$response = $response->withJson($resp);
	return $response;
});

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
		
			$packcode = $barcode;
			$barcode = $packInfo["PRODUCTID"];									
			$oneItem = itemLookupLabel($barcode,true);
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
		else 	{

			array_push($result,itemLookupLabel($barcode,true));					
		}										
	}	
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
			$oneItem["productImg"] = loadPicture($barcode,300,true);
			$oneItem["barcodeNumber"] = $barcode;
			$oneItem["barcodeImage"] = generateBarcodeImage($barcode);
			$oneItem["packing"] = $item["STORE"];
			$oneItem["return"] = $item["SIZE"];
			$oneItem["country"] = $item["COLOR"];
			array_push($result,$oneItem);
		}		
	}	
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
	return $response;
});



/************** COMMON ***************/
function updateCost($barcode)
{
	$db=getDatabase();
	$sql = "SELECT PPSS_NEW_COST,PPSS_NEW_COST_DATE FROM ICPRODUCT WHERE PRODUCTID = ? AND PPSS_NEW_COST_DATE < GETDATE() ";
	$req = $db->prepare($sql);
	$req->execute(array($barcode));
	$item = $req->fetch(PDO::FETCH_ASSOC);

	if($item != false && $item["PPSS_NEW_COST"] != null && $item["PPSS_NEW_COST_DATE"] != null){
		
		$sql = "SELECT TOP(1) PONUMBER,PRODUCTID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
		$req = $db->prepare($sql);
		$req->execute(array($barcode));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($req != false){
			//$sql = "UPDATE PORECEIVEDETAIL SET TRANCOST = ? WHERE PONUMBER = ? AND PRODUCTID = ?";
			//$req = $db->prepare($sql);
			//$req->execute(array($item["PPSS_NEW_COST"],$res["PONUMBER"],$res["PRODUCTID"]));

			$sql = "UPDATE ICPRODUCT SET PPSS_NEW_COST = null, PPSS_NEW_COST_DATE = null,PPSS_NEW_COST_FINAL = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PPSS_NEW_COST"],$barcode));
		}
	}
}

$app->get('/item/{barcode}',function(Request $request,Response $response) {    
	$conn=getDatabase();	
	$barcode = $request->getAttribute('barcode');	 
	updateCost($barcode);
	$check = "NO";
	if (substr($barcode,0,1) == 'X'){
		$barcode = substr($barcode, 1);
		$check = "WH1";
	}
	if (substr($barcode,0,1) == 'Y'){
		$barcode = substr($barcode, 1);
		$check = "WH2";
	}
	
	$sql="SELECT PRODUCTID,OTHERCODE,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,PPSS_IS_BLACKLIST,PPSS_NEW_COST,VENDID,PPSS_NEW_COST,PPSS_NEW_COST_DATE,ACTIVE,
	(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'COST',
	isnull((SELECT TOP(1) TRANDISC FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC),0) as 'DISCOUNT',
	isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 4))   FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC),LASTCOST) as 'LASTCOST'
	,PRICE,ONHAND,PACKINGNOTE,COLOR,SIZE,
	(SELECT VENDNAME FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID) as 'VENDNAME',
	isnull((SELECT TAX FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID),0) as 'TAX',
	HAS_VAT,HAS_PLT,
	(SELECT ORDERPOINT FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'ORDERPOINT1'
	FROM dbo.ICPRODUCT  
	      WHERE BARCODE = ? OR OTHERCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($barcode,$barcode));
	$item =$req->fetch(PDO::FETCH_ASSOC);
	
	if ($item != false && $item["OTHERCODE"] != null)
		$item["PRODUCTID"] = $item["OTHERCODE"];
	if ($item != false && isset($item["LASTCOST"]))
		$item["LASTCOST"] = round($item["LASTCOST"],4);
	else
		$item["LASTCOST"] = "0";
	if (isset($item["COST"]))
		$item["COST"] = round($item["COST"],4);
	else 
		$item["COST"] = "0";
	$resp = array();
	if (isset($item["PRODUCTID"]))
	{		
		$sql="
		SELECT LOCONHAND,STORBIN,ORDERQTY 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item1=$req->fetch();

		if ($item1 != false){
			$item["WH1"] = $item1["LOCONHAND"];
			$item["STOREBIN1"] = $item1["STORBIN"] ?? "";			
		}else{
			$item["WH1"] = "";
			$item["STOREBIN1"] = "";			
		}
		$sql="
		SELECT LOCONHAND,STORBIN 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item2=$req->fetch();

		if ($item2 != false){
			$item["WH2"] = $item2["LOCONHAND"];
			$item["STOREBIN2"] = $item2["STORBIN"] ?? "";	
		}else{
			$item["WH2"] = "";
			$item["STOREBIN2"] = "";	
		}	
		$item["result"] = "OK";		
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

		$resp["result"] = "OK";
		$resp["data"] = $item;

		if ($res1 < 1)
		{			
			$resp["message"] = "WH1 Location missing"; 			
		}
		else if ($res2 < 1){		
			$resp["message"] = "WH2 Location missing"; 			
		}
	}
	else
	{
		$packInfo = packLookup($barcode);
		if ($packInfo != null) // IS  A PACK
		{
			$packcode = $barcode;		
			$result = itemLookup($packInfo["PRODUCTID"]);
			$result["BARCODE"] = $packcode;
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
			$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
			$result["DISC"] = $packInfo["DISC"];
			$result["PRODUCTNAME"] = $packInfo["DESCRIPTION1"];
			$result["PRODUCTNAME1"] = $packInfo["DESCRIPTION2"];
			$result["PRICE"] = $packInfo["SALEPRICE"];	
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];	
			// PICTURE PACK
			$result["ISPACK"] = "PACK";
			$item = $result; 

			$resp["result"] = "OK";
			$resp["data"] = $item;
		}
		else{
			$resp["result"] = "KO";
			$resp["message"] = "Product not found";
		}			
			
	}
	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/curatedstats/{productid}', function (Request $request,Response $response) {
	$db=getDatabase();	
	$productid = $request->getAttribute('productid');	 

	$sql = "SELECT PRODUCTID,PRODUCTNAME,PRODUCTNAME1,PRICE,SIZE,
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',			
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
	(SELECT TOP(1) (TRANCOST - (TRANCOST * (TRANDISC/100)) ) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',
	ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALORDERTIME',	
	(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
	LASTRECEIVEDATE,
	(SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTRECEIVEQTY',			
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
	(SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND POSDATE >= dbo.ICPRODUCT.LASTRECEIVEDATE AND POSDATE <=  GETDATE()) as 'SALESINCELASTRCV'
	FROM ICPRODUCT
	WHERE PRODUCTID = ?";

	$req = $db->prepare($sql);
	$req->execute(array($productid));
	$item = $req->fetch(PDO::FETCH_ASSOC);
	$item["MULTIPLE"] = calculateMultiple($productid);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $item;
	$response = $response->withJson($resp);
	return $response;
});


$app->get('/itemwithstats',function(Request $request,Response $response) {    
	$conn=getDatabase();	 
	
	$item = null;
	$barcode = $request->getParam('barcode','');
	$type = $request->getParam('type','');
	$expiration = $request->getParam('expiration','');
	$depreciationtype = $request->getParam('depreciationtype','');

	$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,
	isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 4))   FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY COLID DESC),LASTCOST) as 'COST'
	,PRICE,ONHAND,PACKINGNOTE,COLOR,SIZE,VENDID,
	(SELECT ORDERPOINT FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1') as 'ORDERPOINT1'
		  FROM dbo.ICPRODUCT  
	      WHERE BARCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($barcode));
	$item =$req->fetch(PDO::FETCH_ASSOC);

	if(isset($item["COST"]))		
		$item["COST"] = sprintf("%.4f",$item["COST"]);	
	else 
		$item["COST"] = "0";

	if ($item != false){
		$sql = "SELECT PPSS_NEW_COST FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $conn->prepare($sql);
		$req->execute(array($barcode));
		$res2 = $req->fetch(PDO::FETCH_ASSOC);
		if ($res2 != false &&  $res2["PPSS_NEW_COST"] != null && $res2["PPSS_NEW_COST"] != "0" && $res2["PPSS_NEW_COST"] != 0)
			$item["COST"] =  sprintf("%.4f",$res2["PPSS_NEW_COST"]);	
	}
	
		
	if (isset($item["VENDID"]))
		$VENDID = $item["VENDID"];
	else 
		$VENDID = "0";

	$resp = array();
	if (isset($item["PRODUCTID"])){		
		$sql="
		SELECT LOCONHAND,STORBIN,ORDERQTY 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item1=$req->fetch();

		if ($item1 != false){
			$item["WH1"] = $item1["LOCONHAND"];
			$item["STOREBIN1"] = $item1["STORBIN"];
			
		}else{
			$item["WH1"] = "";
			$item["STOREBIN1"] = "";			
		}

		$sql="
		SELECT LOCONHAND,STORBIN 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item2=$req->fetch();

		if ($item2 != false){
			$item["WH2"] = $item2["LOCONHAND"];
			$item["STOREBIN2"] = $item2["STORBIN"];	
		}else{
			$item["WH2"] = "";
			$item["STOREBIN2"] = "";	
		}		
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
			$result["PICTURE"] = base64_encode($packInfo["PICTURE"]);
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
			$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
			$result["DISC"] = $packInfo["DISC"];
			$result["PRODUCTNAME"] = $packInfo["DESCRIPTION1"];
			$result["PRODUCTNAME1"] = $packInfo["DESCRIPTION2"];
			$result["PRICE"] = $packInfo["SALEPRICE"];	
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];	
			// PICTURE PACK
			$result["ISPACK"] = "PACK";
			$item = $result; 

			$resp["result"] = "OK";
			$resp["data"] = $item;
		}
		else{
			$resp["result"] = "KO";
			$response = $response->withJson($resp);
			return $response;
		}			
			
	}
	
	if ($item != null)
	{
		if ($type == "ORDERSTATS"){					
			$stats = orderStatistics($barcode);
			
			
			
			$item["TOTALRECEIVE"] = $stats["TOTALRECEIVE"] ?? "";
			
			$item["LASTRECEIVEQUANTITY"] = $stats["RCVQTY"] ?? "";
			$item["ONHAND"] = $stats["ONHAND"] ?? "";
			$item["LASTRCVDATE"] = $stats["LASTRCVDATE"] ?? "";
			$item["TOTALORDERTIME"] = $stats["TOTALORDERTIME"] ?? "";
			$item["WASTE"] = $stats["WASTE"] ?? "";
			$item["PROMO"] = $stats["PROMO"] ?? "";

			$item["LASTSALEDAY"] = $stats["LASTSALEDAY"] ?? "";

			$item["TOTALSALE"] = $stats["TOTALSALE"] ?? "";
			$item["SALESINCELASTRECEIVE"] = $stats["SALESINCELASTRECEIVE"] ?? "";
			$item["SALESPEED"] = $stats["SALESPEED"] ?? "";		
			$item["ORDERQTY"] = $stats["FINALQTY"] ?? "";		
			$item["DECISION"] = $stats["DECISION"] ?? "";
			if(isset($stats["RCVQTY"]))
				$item["LASTRCVQTY"] = $stats["RCVQTY"];
			else 
				$item["LASTRCVQTY"] = "0";

			$sql = "SELECT TOP(1)TRANDISC,TRANCOST,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";		
			$req = $conn->prepare($sql);			
			$req->execute(array($barcode));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false){
				$item["COST"] = floatval($res["TRANCOST"]);
				$item["COST"] = round($item["COST"],4);				
			}
			
			$sql = "SELECT TAX FROM APVENDOR WHERE VENDID = ?";
			$req = $conn->prepare($sql);
			$req->execute(array($VENDID));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false)
			 $item["VAT"] =  $res["TAX"];
			else 
			 $item["VAT"] = 0; 
			
			if (isset($stats["DISCOUNT"]))
				$item["DISCOUNT"] = $stats["DISCOUNT"];
			else 
				$item["DISCOUNT"] = "0";			
		}else if ($type == "RESTOCKSTATS"){
			$stats = orderStatistics($barcode);
			$item["ORDERQTY"] = $stats["FINALQTY"] ?? "";		
			$item["DECISION"] = $stats["DECISION"] ?? "";	
			$item["LASTRCVQTY"] = $stats["RCVQTY"] ?? "";	
		}else if ($type == "PROMOSTATS"){
			$stats = calculatePenalty($barcode,$expiration,$depreciationtype);
			$item["STATUS"] = $stats["status"] ?? "";		
			$item["PERCENTPENALTY"] = $stats["percentpenalty"] ?? "";		
			$item["PERCENTPROMO"] = $stats["percentpromo"] ?? "";
			$item["START"] = $stats["start"] ?? "";
			$item["END"] = $stats["end"] ?? "";
			$item["POLICY"]	= $stats["policy"] ?? "";	
			$item["COST"] = round($stats["cost"],4);			
		}
		else if ($type == "WASTESTATS"){
			$stats = wasteStatistics($barcode,$expiration);
			$item["STATUS"] = $stats["status"];
			$item["PERCENTPENALTY"] = $stats["percentpenalty"];
		}
		$resp["result"] = "OK";
		$resp["data"] = $item;
	}

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
								   	   KPI 
								   	   KPI
								   	   KPI     										 
										  */


function getSaleByLocations($start,$end,$userid)
{
	$db=getDatabase();	

	$sql = "SELECT 
	POSDETAIL.PRODUCTID
	,POSDETAIL.PRODUCTNAME
	,POSDETAIL.PRODUCTNAME1	
	,POSDETAIL.CATEGORYID	
	,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH1'
	,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH2'	
	,COUNT(dbo.POSDETAIL.PRODUCTID) AS 'COUNT'
	FROM dbo.POSDETAIL WHERE 1=1 ";	
	$params = array();
	if ($userid != 0){
		$indb = getInternalDatabase();
		$sql2 = "SELECT location from USER WHERE ID = ?";
		$req = $indb->prepare($sql2);
		$req->execute(array($userid));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$allloc = $res["location"];
		$locs = explode('|',$allloc);
		$sql .= "AND PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE (";
		
		foreach($locs as $loc){
			$sql .= ' STORBIN LIKE ? OR';
			array_push($params, '%'.$loc.'%' );
		}
		$sql = substr($sql,0,-2);
		$sql .= "))";		
	}
	$sql .= "
	AND POSDATE BETWEEN ? AND ?
	GROUP BY PRODUCTID,PRODUCTNAME,PRODUCTNAME1,CATEGORYID
	";
	array_push($params,$start);
	array_push($params,$end);

	$req = $db->prepare($sql);
	$req->execute($params);
	$items = $req->fetchAll(PDO::FETCH_ASSOC);


	return $items;
}

$app->get('/SaleByRowAll',function(Request $request,Response $response) {   
			 	
	$date = $request->getParam('DATE',date('m/d/Y h:i:s a', time()));		
	$end = $request->getParam('END', null);			
	$start = $date." 00:00:00.000";
	if ($end == null)
		$end = $date." 23:59:59.999";
	else 
		$end = $end." 23:59:59.999";
	$results = array();
	$results["RAT"] = getSaleByTeam($start,$end,"RAT");
	$results["OX"] = getSaleByTeam($start,$end,"OX");		
	$results["TIGER"] = getSaleByTeam($start,$end,"TIGER");
	$results["HARE"] = getSaleByTeam($start,$end,"HARE");
	$results["DRAGON"] = getSaleByTeam($start,$end,"DRAGON");
	$results["SNAKE"] = getSaleByTeam($start,$end,"SNAKE");
	$results["HORSE"] = getSaleByTeam($start,$end,"HORSE");
	$results["GOAT"] = getSaleByTeam($start,$end,"GOAT");

	$resp["result"] = "OK";
	$resp["data"] = $results;
	$response = $response->withJson($resp);	
	return $response;	
});

$app->get('/SaleAllLocation',function(Request $request,Response $response){

});


$app->get('/SaleByRow',function(Request $request,Response $response) {   

	$db=getDatabase();
	$userid = $request->getParam('USERID',0);		 	
	$date = $request->getParam('DATE',date('m/d/Y', time()));		
	$end = $request->getParam('END', null);		
	
	$start = $date." 00:00:00.000";
	if ($end == null)
		$end = $date." 23:59:59.999";
	else 
		$end = $end." 23:59:59.999";

	$items = getSaleByLocations($start,$end,$userid);
	
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);	
	return $response;	
});

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
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
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
	
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);	
	return $response;	
});

$app->get('/KPICategories',function(Request $request,Response $response) {   
	$conn=getDatabase();

	$year = $request->getParam('year',date('Y'));		
	$month = $request->getParam('month',null);		
	$thedata = array();

	$thedata["year"] = $year;
	if ($month != null)
	{
		$thedata["month"] = $month;

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
		$thedata["data"] = $oneMonthData;	
	}
	else 
	{
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
		$thedata["data"] = $yearData;
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $thedata;

	$response = $response->withJson($resp);
	return $response;	
});
function clientToExclude(){
	return "'1111','200-100','200-101','200-103','2222','6666','L0026'";
}

$app->get('/KPISales',function(Request $request,Response $response) {   
	$conn=getDatabase();

	$year = $request->getParam('year',date('Y'));			

	$thedata = array();
	$thedata["year"] = $year;
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
	

	$$thedata["data"] = $data;

	$resp = array();
	$resp["data"] = $thedata;
	$resp["status"] = "OK";

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
	
	$vendorname = $request->getParam('vendor','');
	$vendid = $request->getParam('vendid','');
	$category = $request->getParam('category','ALL');
	$thrownstart =  $request->getParam('thrownstart','2000-1-1');
	$thrownend =  $request->getParam('thrownend','2050-1-1');
	$sellstart =  $request->getParam('sellstart','2000-1-1');
	$sellend =  $request->getParam('sellend','2050-1-1');
	$zerosale =  $request->getParam('zerosale','NO');

    $sql = "SELECT PRODUCTID,BARCODE,		
		replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
		replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',		
		PACKINGNOTE,LASTCOST as 'COST' ,PRICE,VENDNAME,
		(SELECT TOP(1) TRANDISC FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY DATEADD DESC)  as 'COSTPROMO',
		(SELECT TOP(1) DISCOUNT_VALUE FROM ICNEWPROMOTION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND DATEFROM <= '$today 00:00:00.000' AND DATETO >= '$today 23:59:59.999' ORDER BY DATEFROM DESC) as 'PRICEPROMO', 
		(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY COLID DESC) as 'LASTCOSTX',
		LASTCOST,
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE BETWEEN ? AND ?),0) as 'THROWNINPERIOD',
		ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0) as 'TOTALSALE',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
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

		if ($vendid != ''){
			$sql .= " AND dbo.ICPRODUCT.VENDID = ? ";
			array_push($params,$vendid);
		}

		if ($vendorname != ''){
			$sql .= " AND VENDNAME LIKE ? ";
			array_push($params,'%'.$vendorname.'%');
		}

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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
		PACKINGNOTE,LASTCOST as 'COST',PRICE,VENDNAME,
		(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
		isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 2))   FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY COLID DESC),LASTCOST) as 'LASTCOST',
	
		ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
		ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
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
		(SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY COLID DESC) as 'LASTRECEIVEQTY',
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
			(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY COLID DESC) as 'COST',
			(SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID  AND POSTATUS = 'C') as 'TOTALRECEIVE',
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 2))   FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY COLID DESC),LASTCOST) as 'LASTCOST',		
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
			(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY COLID DESC) as 'COST',
			PRICE,ONHAND 
			FROM dbo.ICPRODUCT
			WHERE PRODUCTID = ?"; 
			
	$req = $conn->prepare($sql);	
	$req->execute(array($barcode));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
			replace(replace(replace(PACKINGNOTE,char(10),''),char(13),''),'\"','') as 'PACKINGNOTE'
			,COST,PRICE,VENDNAME,			
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 

			isnull((SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2))   FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC),LASTCOST) as 'LASTCOST',
			

			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',				
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
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
	return $response;	
}); 

// ADMIN UPDATE PRODUCT PRICE/NAME/CATEGORY 
$app->get('/itemall',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$start = $request->getParam('page',0 ) * 100;	
	$end = $start + 100; 

	
	$sql = "SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,
				   LASTCOST as 'COST',PRICE,COLOR,CATEGORYID,CATEGORYNEWID,
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
		$result["result"] = "OK";
		$response = $response->withJson($result);
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
		writePicture($barcode,$value);
		$sql = "UPDATE ICPRODUCT SET PICTURE_PATH = ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$imagePath = "Y:\\".$barcode.".jpg";	
		$req->execute(array($imagePath,$barcode));	
	}	
	else if ($field == "PACKPICTURE")	{
		writePicture($barcode,$value);
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
	else if ($field == "PPSS_IS_BLACKLIST"){
		$sql = "UPDATE ICPRODUCT SET PPSS_IS_BLACKLIST = ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$result = $req->execute(array($value,$barcode) );			
	}
	else if ($field == "PPSS_NEW_COST"){
		$sql = "UPDATE ICPRODUCT SET PPSS_NEW_COST = ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$result = $req->execute(array($value,$barcode) );			
		if (isset($json["extra"])){
			$sql = "UPDATE ICPRODUCT SET PPSS_NEW_COST_DATE = ? WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$result = $req->execute(array($json["extra"],$barcode) );			
		}
	}
	else if ($field == "ACTIVE"){
		$sql = "UPDATE ICPRODUCT SET ACTIVE = ? WHERE PRODUCTID = ?";
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

		$sql = "UPDATE dbo.ICPRODUCT set PRICE = ?, OTHER_PRICE = ?,USEREDIT = ?,DATEEDIT = ? WHERE BARCODE = ?";
		$req = $db->prepare($sql);
		$result = $req->execute(array($value,$value,$author,$now,$barcode) ); 										
	}
	$result = array();
	$result["result"] = "OK";	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/allwaitingpo', function(Request $request,Response $response) { 

	$login = $request->getAttribute('login');
	$cvUser = blueUser($login);	
	$conn=getDatabase();	

	$sql = "SELECT PONUMBER,POHEADER.VENDID,POSTATUS,POHEADER.VENDNAME,POHEADER.DATEADD,POHEADER.USERADD,PHONE1,PHONE2 FROM POHEADER,APVENDOR WHERE POHEADER.VENDID = APVENDOR.VENDID  AND POSTATUS = '' ORDER BY DATEADD DESC";
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
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
	return $response;
});

// Received PO (with item count) of the month
$app->get('/myreceivedpo/{login}', function(Request $request,Response $response) {

	$today = date("Y-m-d");
	$month = explode('-',$today)[1];
	$year = explode('-',$today)[0];

	$firstday = $year."-".$month."-"."1";

	$login = $request->getAttribute('login');
	$cvUser = blueUser($login);

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEHEADER WHERE  USERADD = ? AND DATEADD BETWEEN '$firstday 00:00:00.000' AND '$today 23:59:59.999' ORDER BY DATEADD DESC";	
	$req = $conn->prepare($sql);
	$req->execute(array($cvUser));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/receivedpodetail/{poreceivenumber}', function(Request $request,Response $response) { 
	$id = $request->getAttribute('poreceivenumber');

	$conn=getDatabase();	
	$sql = "SELECT * FROM PORECEIVEDETAIL WHERE RECEIVENO = ?";
	$req = $conn->prepare($sql);
	$req->execute(array($id));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/orderedCategories',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$sql = "SELECT CATEGORYNAME FROM CATEGORY ORDER BY CATEGORYNAME ASC";
	
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$data = array();
	foreach ($result as $category) 	
		array_push($data,$category["CATEGORYNAME"]);
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/classifiedCategories',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$sql = "SELECT SECTIONNAME,DEPARTMENTNAME,CATEGORYNAME FROM CATEGORY";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	$data = array();
	if ($selectedPriceClass != null){
		$data["MIN"] = $selectedPriceClass["CLASS".$min];
		$data["AVG"] = $selectedPriceClass["CLASS".$avg];
		$data["MAX"] = $selectedPriceClass["CLASS".$max];
		$data["CLASSMIN"] = $min;
		$data["CLASSAVG"] = $avg;
		$data["CLASSMAX"] = $max;
		$data["DATA"] = $selectedPriceClass;

		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $data;
		$response = $response->withJson($resp);
	}else
		$resp["result"] = "KO";

	return $response;
});


// SDDCCCNNNNPPPP
// S = SECTION
// DD = DEPARTMENT
// CCC = CATEGORY 
// NNNN = SEQUENCE
// PPPP = PADDING (1984)
function GenerateCategoryNumberByName($category, $occurence = 100){
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
	if ($result == false)
		return false;
	
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
			if ($occurence == 1)
				$barcodes = $final;
			else
				$barcodes .= $final . "<br>";
			$count++;
		}				
		if($count == $occurence)
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




function markAnomalies()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ANOMALY_STATUS is null 
			and (status = 'RECEIVED' or status = 'RECEIVEDFRESH' or status = 'PAID')			
			and PONUMBER is not null";
	$req = $db->prepare($sql);
	$req->execute(array());
	$records = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($records as $record)
	{
		$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($record["PONUMBER"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
				
		$status = "NOANOMALY";
		foreach($items as $item)
		{
			if ( floatval($item["PPSS_DELIVERED_PRICE"]) != floatval($item["PPSS_WAITING_PRICE"]))
			{
				$status = "ANOMALYUNSOLVED";				
				break;
			} 						

			if ( floatval($item["PPSS_DELIVERED_QUANTITY"]) != floatval($item["PPSS_WAITING_QUANTITY"]))
			{
				$status = "ANOMALYUNSOLVED";				
				break;
			} 						

			//if ( floatval($item["PPSS_WAITING_CALCULATED"]) != floatval($item["PPSS_WAITING_QUANTITY"])) // WE DONT CONSIDER THIS AS AN ANOMALY ANYMORE
			//{
			//	$status = "ANOMALYUNSOLVED";				
			//	break;
			//} 						

		}			
		$sql = "UPDATE SUPPLY_RECORD SET ANOMALY_STATUS = ? WHERE PONUMBER = ?";
		$req = $db->prepare($sql);
		$req->execute(array($status,$record["PONUMBER"]));						
	}
}
$app->get('/go', function(Request $request,Response $response) {
	markAnomalies();
});

$app->get('/supplyrecordsearch', function(Request $request,Response $response) {
	
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
		    WHERE 1 = 1 ";
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
		$sql .= " AND (PONUMBER LIKE ? OR LINKEDPO LIKE ?)";
		array_push($params,'%'.$ponumber.'%','%'.$ponumber.'%');
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

	if ($productid != 'ALL'){
				
		$sql1 = "SELECT PONUMBER FROM PODETAIL WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql1);
		$req->execute(array($productid));
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

	$sql .= " ORDER BY CREATED DESC";	
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
	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/supplyrecord/{status}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$status = $request->getAttribute('status');

	// ******************//
	// ***** WITH PO ****//
	// ******************//
	$params = array($status); // DEFAULT STATUS
	if ($status == "ALL"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' ORDER BY LAST_UPDATED DESC";
		$params = array();
	}
	else if ($status == "ANOMALYUNSOLVED" || $status == "ANOMALYSOLVED" || $status == "NOANOMALY"){
		markAnomalies();
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = ? AND CREATED > date('now','-45 day') ORDER BY LAST_UPDATED DESC";
		$params = array($status);
	}	
	else if ($status == "ORDERED")
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND STATUS = ? AND CREATED > date('now','-45 day') ORDER BY LAST_UPDATED DESC";	
	else if ($status == "RECEIVEDBOTH"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND (STATUS = 'RECEIVED' OR STATUS = 'RECEIVEDFRESH') AND CREATED > date('now','-45 day') ORDER BY LAST_UPDATED DESC";	
		$params = array();
	}
	else if ($status == "RECEIVEDFORTRANSFERBOTH"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND (STATUS = 'RECEIVEDFORTRANSFER' OR STATUS = 'RECEIVEDFORTRANSFERFRESH') AND CREATED > date('now','-45 day')  ORDER BY LAST_UPDATED DESC";	
		$params = array();
	}	
	else if ($status == "DELIVERED"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND (STATUS = 'DELIVERED') AND CREATED > date('now','-45 day')  ORDER BY LAST_UPDATED DESC";	
		$params = array();
	}else if ($status == "DELIVEREDFRESH"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND (STATUS = 'DELIVEREDFRESH') AND CREATED > date('now','-45 day')  ORDER BY LAST_UPDATED DESC";	
		$params = array();
	}		
	else 
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND STATUS = ? AND CREATED > date('now','-45 day') ORDER BY LAST_UPDATED DESC LIMIT 200";			

	$req = $db->prepare($sql);
	$req->execute($params);
	$POData = $req->fetchAll(PDO::FETCH_ASSOC);
	$IDS = extractIDS($POData,"PONUMBER");

	$sql = "SELECT VENDNAME,PONUMBER FROM POHEADER WHERE PONUMBER in ".$IDS;
	$req = $dbBlue->prepare($sql);
	$req->execute(array());		
	$itemsWithDetails = $req->fetchAll(PDO::FETCH_ASSOC);
	$INDEX = array();
	foreach($itemsWithDetails as $item2)
		$INDEX[$item2["PONUMBER"]] = $item2;

	// ADD VENDNAME	& COUNT INVOICES
	$newPOData = array();
	foreach($POData as $onePOData)
	{
		if(isset($INDEX[$onePOData["PONUMBER"]]))			
			$onePOData["VENDNAME"] = $INDEX[$onePOData["PONUMBER"]]["VENDNAME"];
		
		if($onePOData["NBINVOICES"] == null){ // OLD STYLE 
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
		}	
		array_push($newPOData,$onePOData);					
	}
	$mixData["PO"] = $newPOData;

	
	// ******************//
	// ***** NO PO ******//
	// ******************//

	if ($status == "ALL"){
			$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'NOPO' ORDER BY LAST_UPDATED DESC";
			$params = array();
	}	
	else if ($status == "ORDERED")
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'NOPO' AND STATUS = ? AND CREATED > date('now','-45 day') ORDER BY LAST_UPDATED DESC";	
	else if ($status == "RECEIVEDBOTH"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'NOPO' AND (STATUS = 'RECEIVED' OR STATUS = 'RECEIVEDFRESH')  ORDER BY LAST_UPDATED DESC";	
			$params = array();
	}			
	else 
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'NOPO' AND STATUS = ? ORDER BY LAST_UPDATED DESC";			
	

	$req = $db->prepare($sql);
	$req->execute($params);
	$NOPOData = $req->fetchAll(PDO::FETCH_ASSOC);

	$IDS2 = extractIDS($NOPOData,"LINKEDPO");

	$sql = "SELECT VENDNAME,PONUMBER FROM POHEADER WHERE PONUMBER in ".$IDS2;
	$req = $dbBlue->prepare($sql);
	$req->execute(array());		
	$itemsWithDetailsNOPO = $req->fetchAll(PDO::FETCH_ASSOC);

	$INDEXNOPO = array();
	foreach($itemsWithDetailsNOPO as $itemNOPO)
		$INDEXNOPO[$itemNOPO["PONUMBER"]] = $itemNOPO;

	// ADD VENDNAME	& COUNT INVOICES
	$newNOPOData = array();
	foreach($NOPOData as $oneNOPOData){		
		if(isset($INDEXNOPO[$oneNOPOData["LINKEDPO"]]))
			$onePOData["VENDNAME"] = $INDEXNOPO[$oneNOPOData["LINKEDPO"]]["VENDNAME"];		
		// COUNT INVOICES
		if($oneNOPOData["NBINVOICES"] == null){ // OLD STYLE 
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
		}
		array_push($newNOPOData,$oneNOPOData);
	}
	$mixData["NOPO"] = $newNOPOData;
	
	$mixData["PO"] = array_merge($mixData["PO"],$mixData["NOPO"]);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $mixData;
	$response = $response->withJson($resp);

	return $response;
});

$app->post('/supplyrecord', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$json = json_decode($request->getBody(),true);
   
	if (isset($json["TYPE"]) &&  ($json["TYPE"] ==  "NOPOPOOL")) // NOPO CREATE AND RECEIVE
	{
			$author = blueUser($json["AUTHOR"]);		
			$items = json_decode($json["ITEMS"],true);
			$vendorid = $json["VENDID"];			
			$now = date("Y-m-d H:i:s");
			
			$sql = "SELECT VENDNAME FROM APVENDOR WHERE VENDID = ?";			
			$req = $dbBlue->prepare($sql);
			$req->execute(array($vendorid));
			$res = $req->fetch(PDO::FETCH_ASSOC);					
			$vendname = $res["VENDNAME"];

			if (isset($json["NOTES"]))
				$notes = $json["NOTES"];
	   		else 
		   		$notes = "";
			updateVendor($items,$author);					   
			$ponumber = createAndReceivePO($items,$author,$notes,$vendorid);

			$sql = "UPDATE PODETAIL SET PPSS_VALIDATED_QUANTITY = PPSS_WAITING_QUANTITY,		
										PPSS_DELIVERED_QUANTITY = PPSS_WAITING_QUANTITY,
										PPSS_DELIVERED_PRICE = PPSS_WAITING_PRICE,
										PPSS_DELIVERED_VAT = PPSS_WAITING_VAT,
										PPSS_DELIVERED_DISCOUNT = PPSS_WAITING_DISCOUNT										
										WHERE PONUMBER = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($ponumber));
		
			// Set Expire
			foreach($items as $item)
			{
				if ($item["EXPIRE"] != "NO EXPIRE"){
					$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_EXPIRE = ? WHERE PONUMBER = ? AND PRODUCTID = ?"; 
					$req = $dbBlue->prepare($sql);				
					$req->execute(array($item["EXPIRE"],$ponumber,$item["PRODUCTID"]));	
				}
				
			}													

			if ($items[0]["LOCID"] == "WH1")
				$status = "RECEIVEDFORTRANSFERFRESH";
			else 
				$status = "RECEIVEDFORTRANSFER";

			$resp["message"] = "Po created and received with number ".$ponumber;
			
			$invoiceCount = 0;
			

			$db->beginTransaction();
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,?,'NOPO','YES')"; 
			$req = $db->prepare($sql);
			$req->execute(array($ponumber, $author, $vendorid, $vendname, $now,$status));
			$supplyrecordid = $db->lastInsertId();
			$db->commit(); 

			if (isset($json["INVOICEJSONDATA"])){
				$invoiceCount = pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$supplyrecordid);
				$sql = "UPDATE SUPPLY_RECORD SET NBINVOICES = ? WHERE ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($invoiceCount,$supplyrecordid));
			}
				

			

			if ($json["TYPE"] ==  "NOPOPOOL"){
				$sql = "DELETE FROM SUPPLYRECORDNOPOPOOL WHERE USERID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($json["USERID"]));	
			}
					
			// NEW CODE FOR PAYMENT
			$sql = "INSERT INTO EXTERNALPAYMENT (SUPPLY_RECORD_ID,STATUS,PAYMENTAMOUNT,REQUESTER,PAYMENTTYPE,PAYMENTNUMBER,PAYMENTNAME,REQUESTER) VALUES (?,?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			if ($json["PAYMENTTYPE"] == "PAID")
				$req->execute(array($supplyrecordid,"PAID",$json["PAYMENTAMOUNT"],$json["AUTHOR"],$json["PAYMENTTYPE"],$json["PAYMENTNUMBER"],$json["PAYMENTNAME"],$author));	
			else
				$req->execute(array($supplyrecordid,"WAITING",$json["PAYMENTAMOUNT"],$json["AUTHOR"],$json["PAYMENTTYPE"],$json["PAYMENTNUMBER"],$json["PAYMENTNAME"],$author));	
			
			if ($json["PAYMENTTYPE"] == "ABA" || $json["PAYMENTTYPE"] == "ACLEDA")
				sendPushToUser("Payment Waiting", $json["PAYMENTTYPE"] . " with amount ".$json["PAYMENTAMOUNT"]." waiting to be paid",66);
			
	} 
	else if (isset($json["TYPE"]) &&  ($json["TYPE"] ==  "PO" || $json["TYPE"] ==  "POPOOL") ) // GroupedPurchase OR SupplyRecord Create
	{
			$author = blueUser($json["AUTHOR"]);
			$items = json_decode($json["ITEMS"],true);
			$now = date("Y-m-d H:i:s");

			$sql = "SELECT ICPRODUCT.VENDID,VENDNAME FROM ICPRODUCT,APVENDOR WHERE APVENDOR.VENDID = ICPRODUCT.VENDID AND PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($items[0]["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			
			$vendorid = $res["VENDID"];
			$vendname = $res["VENDNAME"];
										
			$ponumber = createPO($items,$author);

			$resp["message"] = "Po created with number ".$ponumber;
			if ($author == 'prem_v' || $author == 'soeurng_s' || $author == 'SOPHY' || $author == 'VANNA1')
				$status = 'ORDERED';
			else 
				$status = 'WAITING';
			$db->beginTransaction();			
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,?,'PO','YES')"; // LEAVE NBINVOICES TO ZERO		
			$req = $db->prepare($sql);
			$req->execute(array($ponumber, $author, $vendorid, $vendname, $now,$status));
			$lastID = $db->lastInsertId();
			$db->commit(); 

			pictureRecord($json["PURCHASERSIGNATUREIMAGE"],"PCH",$lastID);
			
			if ($status == "WAITING"){
				sendPushToUser("SUPPLYRECORD", "SUPPY RECORD with ID ".$lastID." is waiting validation" ,66);		
			}

			if ($json["TYPE"] ==  "POPOOL"){
				$sql = "DELETE FROM SUPPLYRECORDPOOL WHERE USERID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($json["USERID"]));	
			}			
		}	
		$resp["result"] = "OK";
		$response = $response->withJson($resp);
		return $response;
});

$app->post('/supplyrecordpool', function(Request $request,Response $response) {
	// CHECK IF ITEM IS SAME VENDOR
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$ignoreSpecial = false;
	
	$json = json_decode($request->getBody(),true);	
	$userid = $json["USERID"];	
	if (!isset($json["ITEMS"])) // MANUAL
	{
		$item["PRODUCTID"] = $json["PRODUCTID"];
		if ($json["QUANTITY"] != $json["ALGOQTY"])
			$item["SPECIALQTY"] = $json["QUANTITY"];
		$item["USERID"] = $userid;
		$item["COST"] = $json["COST"];
		if (isset($json["PACKING"]))
			$item["PACKING"] = $json["PACKING"];
		else
			$item["PACKING"] = "";
		$item["DISCOUNT"] = $json["DISCOUNT"];
		$item["ALGOQTY"] = $json["ALGOQTY"];
		$item["REASON"] = $json["REASON"] ?? "N/A";
		$item["VAT"] = $json["VAT"];
		$items = array();
		array_push($items,$item);
	}else{ // EXCEL
		$items = json_decode($json["ITEMS"],true);	
	}
	$message = "";
	foreach($items as $item)
	{		
		updateCost($item["PRODUCTID"]);

		if (!isset($item["TAX"]))
			$item["TAX"] = 0;

		// TEST PRODUCT EXISTENCE		
		$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res == false){

			$message .= "\n".$item["PRODUCTID"]." Not Found";
			continue;
		} 			
		// TEST IF POOL IS EMPTY AND PICK FIRST ITEM
		$sql = "SELECT PRODUCTID FROM SUPPLYRECORDPOOL WHERE USERID = ? LIMIT 1";
		$req = $db->prepare($sql);
		$req->execute(array($json["USERID"]));
		$firstItem = $req->fetch(PDO::FETCH_ASSOC);

		$decision = $stats["DECISION"] ?? "";
		$specialqty = $item["SPECIALQTY"] ?? "";
		
		$stats = orderStatistics($item["PRODUCTID"],true);		
		
		//if ( $decision == "NEVER RECEIVED" || ($decision == "TOOEARLY"  && $specialqty == "" || $specialqty == null) )
		//{
		//	$message .= "\n".$item["PRODUCTID"]." Not Added:".$decision;
		//	continue;
		//}
		$item["ALGOQTY"] = $stats["FINALQTY"] ?? "";

		$sql = "SELECT TOP(1) TRANCOST,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);			
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if (!isset($item["COST"]) || $item["COST"] == "0")	
		{			
			if ($res != false)
				$item["COST"] = $res["TRANCOST"];
			else
				$item["COST"] = "0";		
		}

		$sql = "SELECT PPSS_NEW_COST_FINAL FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false && $res["PPSS_NEW_COST_FINAL"] != null){
			$item["COST"] = $res["PPSS_NEW_COST_FINAL"];
			
			if (isset($data["message"]))
				$data["message"] .= "|".$item["PRODUCTID"]." NEW COST : ".$res["PPSS_NEW_COST_FINAL"];					
			else
				$data["message"] = $item["PRODUCTID"]."  NEW COST : ".$res["PPSS_NEW_COST_FINAL"];
		}

		if(!isset($item["VAT"]))
		{
			if ($res != false)
				$item["VAT"] = $res["VAT_PERCENT"];
			else
				$item["VAT"] = "0";				
		}
		$item["DECISION"] = $stats["DECISION"] ?? "";

		if (isset($item["SPECIALQTY"]) && $item["SPECIALQTY"] != "" &&  $item["SPECIALQTY"] != "0" && $ignoreSpecial == false)
			$QUANTITY = $item["SPECIALQTY"];
		else
			$QUANTITY = $item["ALGOQTY"];
		
		if ($firstItem == false) // NO RECORD
		{			
			$sql = "INSERT INTO SUPPLYRECORDPOOL (PRODUCTID,ALGOQTY,REQUEST_QUANTITY,DISCOUNT,REASON,COST,DECISION,VAT,USERID) values (?,?,?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["ALGOQTY"],$QUANTITY,$item["DISCOUNT"],$item["REASON"],trim($item["COST"],'$'),$item["DECISION"],$item["VAT"],$userid));
		}
		else
		{
			$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res2 = $req->fetch(PDO::FETCH_ASSOC);

			$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($firstItem["PRODUCTID"]));
			$res3 = $req->fetch(PDO::FETCH_ASSOC);
			
			if ($res2["VENDID"] != $res3["VENDID"]){
				$data["result"] = "KO";	
				if (isset($data["message"]))
					$data["message"] .= "|".$item["PRODUCTID"]." Different vendor";					
				else
					$data["message"] = $item["PRODUCTID"]." Different vendor";
					continue;				
			}
			$sql = "SELECT PRODUCTID FROM SUPPLYRECORDPOOL WHERE PRODUCTID = ? AND USERID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$userid));
			$res4 = $req->fetch(PDO::FETCH_ASSOC);			
			if ($res4 != false){					
				$sql = "UPDATE SUPPLYRECORDPOOL set REQUEST_QUANTITY = ?, ALGOQTY = ?, REASON = ?,COST = ?,DECISION = ? 
					WHERE  USERID = ? AND PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($QUANTITY,$item["ALGOQTY"],($item["REASON"] ?? ""),trim($item["COST"],'$'),$item["DECISION"],$userid,$item["PRODUCTID"]));	
			}
			else
			{
				$sql = "INSERT INTO SUPPLYRECORDPOOL (PRODUCTID,ALGOQTY,REQUEST_QUANTITY,DISCOUNT,REASON,COST,DECISION,VAT,USERID) values (?,?,?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["ALGOQTY"],$QUANTITY,$item["DISCOUNT"],($item["REASON"] ?? ""),trim($item["COST"],'$'),$item["DECISION"],$item["VAT"],$userid));
			}
		}
	}
	if ($message != "")
		$data["message"] = $message;
	$data["result"] = "OK";				
	$response = $response->withJson($data);
	return $response;
});

$app->get('/supplyrecordpool/{userid}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$id = $request->getAttribute('userid');	
	$sql = "SELECT * FROM SUPPLYRECORDPOOL WHERE USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$newData = array();
	$errormsg = null;
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME,VENDNAME,PPSS_HAVE_EXTERNAL, PACKINGNOTE FROM ICPRODUCT,APVENDOR WHERE ICPRODUCT.VENDID = APVENDOR.VENDID AND ICPRODUCT.PRODUCTID =  ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res != false){
			$item["VENDNAME"] = $res["VENDNAME"] ?? "";
			$item["PACKING"] = $res["PACKINGNOTE"] ?? "";
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"] ?? "" ;
			$item["PPSS_HAVE_EXTERNAL"] = $res["PPSS_HAVE_EXTERNAL"] ?? "";
			array_push($newData,$item);	
		}else{
			$errormsg .= " ".$item["PRODUCTID"]." does not exist ";
		}	
	}
	if ($errormsg != null)
		$data["message"] = $errormsg;	
	$data["result"] = "OK";				
	$data["data"] = $newData;
	$response = $response->withJson($data);
	return $response;
});

$app->delete('/supplyrecordpool', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);	
	$productid = $json["PRODUCTID"];	
	$userid = $json["USERID"];	
	
	$sql = "DELETE FROM SUPPLYRECORDPOOL WHERE PRODUCTID = ? AND USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($productid,$userid));
	$data["result"] = "OK";	
	$response = $response->withJson($data);
	return $response;
});
// SUPPLYRECORDNPOPOOL
$app->post('/linkproducttovendor',function(Request $request,Response $response) {
	$db = getDatabase();
	
	$json = json_decode($request->getBody(),true);	
	
	$productid = $json["PRODUCTID"];
	$author = blueUser($json["AUTHOR"]);
	$today = date("Y-m-d");
	
	$inDB = getInternalDatabase();
	$sql = "SELECT PRODUCTID FROM SUPPLYRECORDNOPOPOOL";
	$req = $inDB->prepare($sql);
	$req->execute(array());

	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res == false){
		$data["result"] = "KO";	
		$data["message"] = "Unexpected error";
		$response = $response->withJson($data);
		return $response;
	}
	$firstItemID = $res["PRODUCTID"];

	$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($firstItemID));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$vendid = $res["VENDID"];

	//Rare Condition 
	$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$res = $req->execute(array($json["PRODUCTID"]));			
	if ($res["VENDID"] == "" || $res["VENDID"] == null){
		$sql = "UPDATE ICPRODUCT SET VENDID = ? WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($vendid,$json["PRODUCTID"]));
	}

	$sql = "INSERT INTO ICVENDOR (PRODUCTID,VENDID,VENDPARTNO,USERADD,DATEADD,USEREDIT,NOTES) VALUES (?,?,?,?,?,?,?)";
	$req = $db->prepare($sql);
	$params = array($productid,$vendid,$productid,$author,$today,$author,"");		
	$req->execute($params);

	$data["result"] = "OK";	
	$response = $response->withJson($data);
	return $response;
});

$app->post('/supplyrecordnopopool', function(Request $request,Response $response) {

	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$json = json_decode($request->getBody(),true);	
	
	$sql = "SELECT PRODUCTID FROM SUPPLYRECORDNOPOPOOL WHERE USERID = ? LIMIT 1";
	$req = $db->prepare($sql);
	$req->execute(array($json["USERID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$author = $json["AUTHOR"] ?? "SOVI";

	if (isset($json["EXPIRE"]))
		$expire = $json["EXPIRE"];
	else
		$expire = null;

	if ($res == false) // NO RECORD
	{
		$sql = "INSERT INTO SUPPLYRECORDNOPOPOOL (PRODUCTID,REQUEST_QUANTITY,USERID,DISCOUNT,COST,LOCID,TAX,EXPIRE) values (?,?,?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["USERID"],$json["DISCOUNT"],$json["COST"],$json["LOCID"],$json["TAX"],$expire));
	}
	else
	{
		$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?"; // TARGET ITEM
		$req = $dbBlue->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));
		$res2 = $req->fetch(PDO::FETCH_ASSOC);

		$sql = "SELECT VENDID FROM ICPRODUCT WHERE PRODUCTID = ?"; // FIRST ITEM
		$req = $dbBlue->prepare($sql);
		$req->execute(array($res["PRODUCTID"]));
		$res3 = $req->fetch(PDO::FETCH_ASSOC);
				
		if ($res2 != false && $res3 != false && $res2["VENDID"] != $res3["VENDID"])		
		{
			$sql = "SELECT * FROM ICVENDOR WHERE PRODUCTID = ? AND VENDID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($json["PRODUCTID"],$res2["VENDID"]));
			$res4 = $req->fetch(PDO::FETCH_ASSOC);

			if ($res4 == false){ // IF NOT PRESENT IN ICVENDOR AND DIFFERENT VENDID FROM FIRST ITEM
				$data["result"] = "KO1";	
				$data["message"] = "Product from different vendor";
				$response = $response->withJson($data);
				return $response;
			}			
		}


		$sql = "SELECT * FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["LOCID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res == false){		
		
			$sql = "INSERT INTO ICLOCATION(LOCID,PRODUCTID,VENDID,DATEADD,USERADD,TAXACC)
							VALUES(?,?,?,?,?,?)";
			$today = date("Y-m-d");
			$req = $dbBlue->prepare($sql);
			$req->execute(array($json["LOCID"],$json["PRODUCTID"],$res2["VENDID"],$today,$author,16100));
		}

		$sql = "SELECT PRODUCTID FROM SUPPLYRECORDNOPOPOOL WHERE PRODUCTID = ? AND USERID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["USERID"]));
		$res4 = $req->fetch(PDO::FETCH_ASSOC);
		if ($res4 != false){
			$data["result"] = "KO";	
			$data["message"] = "Product already in list";
			$response = $response->withJson($data);
			return $response;
		} 

		$sql = "SELECT LOCID FROM SUPPLYRECORDNOPOPOOL WHERE LOCID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["LOCID"]));
		$res5 = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($res5 == false){
			$data["result"] = "KO";	
			$data["message"] = "Cannot mix location in Receive";
			$response = $response->withJson($data);
			return $response;
		}

		$sql = "INSERT INTO SUPPLYRECORDNOPOPOOL (PRODUCTID,REQUEST_QUANTITY,USERID,DISCOUNT,COST,LOCID,TAX,EXPIRE) values (?,?,?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["USERID"],$json["DISCOUNT"],$json["COST"],$json["LOCID"],$json["TAX"],$json["EXPIRE"]));
	}
	$data["result"] = "OK";				
	$response = $response->withJson($data);
	return $response;
});

$app->put('/supplyrecordnopopool', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);	

	$userid = $json["USERID"];
	$PRODUCTID = $json["PRODUCTID"];	
	$COST = $json["COST"] ;
	$TAX = $json["TAX"];
	$REQUEST_QUANTITY = $json["REQUEST_QUANTITY"];
	$DISCOUNT = $json["DISCOUNT"];

	$sql = "UPDATE SUPPLYRECORDNOPOPOOL SET COST = ?,TAX = ?,REQUEST_QUANTITY = ?,DISCOUNT = ? WHERE PRODUCTID = ? AND USERID = ?";
	$req = $db->prepare($sql);	
	$req->execute(array($COST,$TAX,$REQUEST_QUANTITY,$DISCOUNT,$PRODUCTID,$userid));

	$data["result"] = "OK";				
	$response = $response->withJson($data);
	return $response;
});

$app->get('/supplyrecordnopopool/{userid}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	$id = $request->getAttribute('userid');	
	$sql = "SELECT * FROM SUPPLYRECORDNOPOPOOL WHERE USERID = ? ORDER BY CREATED DESC";	
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$newData = array();
	$amountexcludevat = 0;
	$amountvat = 0;
	$grandtotal = 0;
	$amountDiscount = 0;
	
	foreach($items as $item){
		if( !isset($item["TAX"]) || $item["TAX"] == "" || $item["TAX"] == null)
			$item["TAX"] = "0";
		
		$sql = "SELECT PRODUCTNAME,PRODUCTNAME1,VENDNAME, PACKINGNOTE,APVENDOR.TAX 
				FROM ICPRODUCT,APVENDOR 
				WHERE ICPRODUCT.VENDID = APVENDOR.VENDID AND ICPRODUCT.PRODUCTID =  ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));  
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res != false){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["PRODUCTNAME1"] = $res["PRODUCTNAME1"];			
			$item["VENDNAME"] = $res["VENDNAME"];
			$item["PACKING"] = $res["PACKINGNOTE"];
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["DISCOUNTCOST"] = (($item["DISCOUNT"] / 100) * $item["COST"]);			
			array_push($newData,$item);	

			$amountexcludevat += ($item["COST"] * $item["REQUEST_QUANTITY"]);	
			$amountvat += ($item["COST"] * ($item["TAX"] / 100)) * $item["REQUEST_QUANTITY"];			
			$grandtotal +=  ($item["COST"] * (1 + ($item["TAX"] / 100))) * $item["REQUEST_QUANTITY"];
			$amountDiscount += (($item["DISCOUNT"] / 100) * $item["COST"]);
		}		
	}
	$tmp = array();
	$tmp["ITEMS"] = $newData;
	$tmp["AMTEXCLVAT"] = round($amountexcludevat,2);
	$tmp["AMTVAT"] = round($amountvat,2);
	$tmp["AMTDISCOUNT"] = round($amountDiscount,2);
	$tmp["GRANDTOTAL"] = round($grandtotal,2) - $tmp["AMTDISCOUNT"];
	
	$data["result"] = "OK";				
	$data["data"] = $tmp;
	$response = $response->withJson($data);
	return $response;
});

$app->delete('/supplyrecordnopopool', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);	
	$productid = $json["PRODUCTID"];	
	$userid = $json["USERID"];	
	
	$sql = "DELETE FROM SUPPLYRECORDNOPOPOOL WHERE PRODUCTID = ? AND USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($productid,$userid));
	$data["result"] = "OK";	
	$response = $response->withJson($data);
	return $response;
});

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
		
			foreach($json["ITEMS"] as $key => $value)
			{
				$sql = "UPDATE PODETAIL SET  ORDER_QTY = ? ,PPSS_VALIDATED_QUANTITY = ? WHERE  PRODUCTID = ? AND PONUMBER = ? ";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($value["PPSS_VALIDATED_QUANTITY"],$value["PPSS_VALIDATED_QUANTITY"],$key,$json["PONUMBER"]));	 						

				$sql = "UPDATE PODETAIL SET EXTCOST = (ORDER_QTY * TRANCOST) WHERE  PRODUCTID = ? AND PONUMBER = ?";				
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($key,$json["PONUMBER"]) );	 						
			}
		}
		$data["result"] = "OK";

		sendPushToUser("SUPPLYRECORD", "SUPPY RECORD with ID ".$json["IDENTIFIER"]." was validated" ,7);
		sendPushToUser("SUPPLYRECORD", "SUPPY RECORD with ID ".$json["IDENTIFIER"]." was validated" ,9);
	}
	else if ($json["ACTIONTYPE"] == "DENY"){
		$sql = "UPDATE SUPPLY_RECORD SET PURCHASER_USER = :author ,STATUS = 'DENIED'  WHERE ID = :identifier";
		$req = $db->prepare($sql);			
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"VAL",$json["IDENTIFIER"]);		
		$data["result"] = "OK";	
		sendPushToUser("SUPPLYRECORD", "SUPPY RECORD with ID ".$json["IDENTIFIER"]." was denied" ,7);
		sendPushToUser("SUPPLYRECORD", "SUPPY RECORD with ID ".$json["IDENTIFIER"]." was denied" ,9);
	}
	else if ($json["ACTIONTYPE"] == "PCH"){ // PCH SET AS ORDERED			
		$sql = "UPDATE SUPPLY_RECORD SET PURCHASER_USER = :author ,STATUS = 'ORDERED'  WHERE ID = :identifier";
		$req = $db->prepare($sql);			
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"PCH",$json["IDENTIFIER"]);		
		$data["result"] = "OK";	
	}	
	else if ($json["ACTIONTYPE"] == "WH"){ // DELIVERY
		if (isset($json["INVOICEJSONDATA"]))
			$nbinvoices = count(json_decode($json["INVOICEJSONDATA"],true));					
		else 
			$nbinvoices = 1;	

		$sql = "SELECT LOCID FROM POHEADER WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($json["PONUMBER"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);		
		$LOCID = $res["LOCID"];
		
		if ($LOCID == "WH1")
			$status = "DELIVEREDFRESH";
		else 
			$status = "DELIVERED";

		$sql = "UPDATE SUPPLY_RECORD SET WAREHOUSE_USER = :author, STATUS = :status,NBINVOICES = :nbinvoices WHERE ID = :identifier";
		$req = $db->prepare($sql);									
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':status',$status,PDO::PARAM_STR);
		$req->bindParam(':nbinvoices',$nbinvoices,PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->execute();			

		if(isset($json["INVOICEJSONDATA"]))
			pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$json["IDENTIFIER"]);
		pictureRecord($json["SIGNATURE"],"WH",$json["IDENTIFIER"]);
		
		if (isset($json["ITEMS"]))
		{
		
			$sql = "SELECT VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$vendres = $req->fetch(PDO::FETCH_ASSOC);
			$vendid = $vendres["VENDID"];
			$vendname = $vendres["VENDNAME"];

			$isSplitCompany = true;
			//error_log("PONUMBER: ".$json["PONUMBER"]."|VENDID:".$vendid."|VENDNAME:".$vendname);

			$isSplitCompany = true;
			$absentitems = array();
			$HaveAnomaly = false;

			$AMT_WITH_VAT = 0;
			$SUM_VAT = 0;
			foreach($json["ITEMS"] as $key => $value) // TODO ITEM WITH NOT ENOUGH QTY
			{

				if ($value["PPSS_DELIVERED_QUANTITY"] == "0" || $value["PPSS_DELIVERED_QUANTITY"] == 0)
				{
						$value["ID"] = $key; 
						$value["REQUEST_QUANTITY"] = $value["PPSS_WAITING_QUANTITY"];
						$value["COST"] = $value["PPSS_WAITING_PRICE"];
						array_push($absentitems,$value);
				}												
				else 
				{
					$sql = "SELECT TRANCOST,TRANDISC,PPSS_WAITING_PRICE,PPSS_WAITING_QUANTITY FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID = ?";
					$req = $dbBLUE->prepare($sql);
					$req->execute(array($json["PONUMBER"],$key));
					$res = $req->fetch();
					$TRANDISC = $res["TRANDISC"];		

					if (floatval($value["PPSS_DELIVERED_PRICE"]) <> floatval($res["PPSS_WAITING_PRICE"])){						
						$sql2 = "SELECT PPSS_IS_FRESH FROM ICPRODUCT WHERE PRODUCTID = ?";
						$req2 = $dbBLUE->prepare($sql2);
						$req2->execute(array($key));						
						$isFresh = $req2->fetch(PDO::FETCH_ASSOC);
						if ($isFresh == null)
							$HaveAnomaly  = true;	
					}
										

					//if (!isset($value["PPSS_DELIVERED_QUANTITY"]) ||  $value["PPSS_DELIVERED_QUANTITY"] == null)				
					//	$value["PPSS_DELIVERED_QUANTITY"] = "0";

					//if (!is_numeric($value["PPSS_DELIVERED_QUANTITY"]))
					//	$value["PPSS_DELIVERED_QUANTITY"] = "0";
							
					//if ($TRANDISC != null && $TRANDISC != "0")
					//	$calculatedCost =  $value["PPSS_DELIVERED_PRICE"] - ($value["PPSS_DELIVERED_PRICE"] * ($TRANDISC / 100));
					//else 
					$calculatedCost =  $value["PPSS_DELIVERED_PRICE"];
					$extcost = $value["PPSS_DELIVERED_QUANTITY"] * ($value["PPSS_DELIVERED_PRICE"] - ($value["PPSS_DELIVERED_PRICE"] * ($TRANDISC / 100)) );
					 
					$sql = "UPDATE PODETAIL SET TRANCOST = ?, EXTCOST = ?, ORDER_QTY = ?,TRANDISC = ?,PPSS_DELIVERED_PRICE = ?, 
												PPSS_DELIVERED_QUANTITY = ?,PPSS_DELIVERED_EXPIRE = ?,PPSS_DELIVERED_DISCOUNT = ?,PPSS_DELIVERED_VAT = ?,VAT_PERCENT = ?
							WHERE  PRODUCTID = ? AND PONUMBER = ? ";
					$req = $dbBLUE->prepare($sql);

					if ($value["PPSS_DELIVERED_EXPIRE"] == "NO EXPIRE")
						$value["PPSS_DELIVERED_EXPIRE"] = null;

					$req->execute(array($calculatedCost,$extcost,$value["PPSS_DELIVERED_QUANTITY"] ,$value["PPSS_DELIVERED_DISCOUNT"] ,$value["PPSS_DELIVERED_PRICE"],
										$value["PPSS_DELIVERED_QUANTITY"],$value["PPSS_DELIVERED_EXPIRE"],$value["PPSS_DELIVERED_DISCOUNT"],$value["PPSS_DELIVERED_VAT"],$value["PPSS_DELIVERED_VAT"],
										$key,$json["PONUMBER"]) );
										
					$onelineVAT = ($value["PPSS_DELIVERED_PRICE"] * ($value["PPSS_DELIVERED_VAT"] / 100));
					$AMT_WITH_VAT += ($value["PPSS_DELIVERED_PRICE"] + $onelineVAT) * $value["PPSS_DELIVERED_QUANTITY"];
					$SUM_VAT += $onelineVAT * $value["PPSS_DELIVERED_QUANTITY"];
				}					 						
			}
			
			if ($HaveAnomaly){
				$sql = "UPDATE SUPPLY_RECORD SET ANOMALY_STATUS = 'ANOMALYUNSOLVED' WHERE ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($json["IDENTIFIER"]));				
			}

			if ($isSplitCompany  == true && count($absentitems) != 0){
				$sql = "SELECT VENDID,VENDNAME,USERADD FROM POHEADER WHERE PONUMBER = ?";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($json["PONUMBER"]));
				$res = $req->fetch(PDO::FETCH_ASSOC);
				$newVENDID = $res["VENDID"];
				$newVENDNAME = $res["VENDNAME"];
				$newPURCHASER = $res["USERADD"];
				$newponumber = splitPOWithItems($json["PONUMBER"],$absentitems,$newPURCHASER);

				$db->beginTransaction();    
				$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,?,?,?)";
				$req = $db->prepare($sql);
				$now = date("Y-m-d H:i:s");
				//error_log("new po number:".$newponumber);
				$req->execute(array($newponumber, $newPURCHASER,"Split: ".$newVENDID."|PO:".$newponumber, $newVENDNAME, $now,'ORDERED','PO','YES'));						
				$lastid = $db->lastInsertId();	
				$db->commit();    
				$data["message"] = "PO Splitted to number ".$newponumber;
				copySignatures($json["IDENTIFIER"],$lastid);							
			}				
			// CLEAN ALL ZERO : IMPORTANT DO AFTER SPLIT 
			foreach($absentitems as $item)
			{
				$sql = "DELETE PODETAIL  WHERE PRODUCTID = ? AND PONUMBER = ?";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($item["ID"],$json["PONUMBER"]));
			}

			// RECALCULATE AMOUNT ON POHEADER
			$sql = "SELECT sum(EXTCOST - (EXTCOST * (TRANDISC/100)) ) as SUM FROM PODETAIL WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

		
			$sql = "SELECT sum((EXTCOST - (EXTCOST * (TRANDISC/100))) * (VAT_PERCENT/100)) as SUMVAT FROM PODETAIL WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$res2 = $req->fetch(PDO::FETCH_ASSOC);
			$sumvat = round($res2["SUMVAT"],2);
		
			$sql = "UPDATE POHEADER SET PURCHASE_AMT = ?,CURRENCY_AMOUNT = ?,VAT_AMT = ?,CURRENCY_VATAMOUNT = ? WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$sum = round($res["SUM"] + $res2["SUMVAT"],2);
			$req->execute(array($sum, $sum,$sumvat,$sumvat,$json["PONUMBER"]));

		}
		$data["result"] = "OK";
	
	}
	else if ($json["ACTIONTYPE"] == "TR"){
		// AUTO TRANSFER ITEMS TO TRANSFERPOOL
		$sql = "SELECT PONUMBER,LINKEDPO FROM SUPPLY_RECORD WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["IDENTIFIER"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if (isset($res["PONUMBER"]))
			$ponumber = $res["PONUMBER"];
		else 
			$ponumber = $res["LINKEDPO"];

		$sql = "SELECT * FROM PORECEIVEDETAIL WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber));

		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item)
		{
			// NEW METHOD 
			
			$sql = "SELECT PRODUCTID FROM ITEMREQUESTUNGROUPEDROWRESTOCKPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false ){
				$sql = "SELECT LOCONHAND,STORBIN FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));				
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if ($res != false){
					$sql = "INSERT INTO ITEMREQUESTUNGROUPEDROWRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,STORBIN,COMMENT) VALUES (?,?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$res["LOCONHAND"],$res["STORBIN"],$ponumber));
				}else{
					error_log("Error with productid ".$item["PRODUCTID"]. " not found in ICLOCATION with WH1");
				}
			}
			
			// OLD METHOD 
			/*
			if(isset($json["USERID"]))
				$userid = $json["USERID"];
			else
				$userid = null;

			$sql = "SELECT *,count(*) as 'CNT' FROM ITEMREQUESTTRANSFERPOOL WHERE PRODUCTID = ? AND USERID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]),$userid);
			$res = $req->fetch(PDO::FETCH_ASSOC);		

			if ($res["CNT"] == 0){
				$sql = "INSERT INTO ITEMREQUESTTRANSFERPOOL (PRODUCTID,REQUEST_QUANTITY,USERID) VALUES (?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["TRANQTY"],$userid));		
			}else{
				$sql = "UPDATE ITEMREQUESTTRANSFERPOOL SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE USERID = ? AND  PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["TRANQTY"],$userid,$item["PRODUCTID"]));			
			}
			*/

		}	
	
		$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'RECEIVED', TRANSFERER_USER = :author 
				WHERE ID = :identifier";		
		//$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'TOCHECK', TRANSFERER_USER = :author 
		//			WHERE ID = :identifier";		
		$req = $db->prepare($sql);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);					
		$req->execute();
		
		pictureRecord($json["SIGNATURE"],"TR",$json["IDENTIFIER"]);
		$data["result"] = "OK";

	}
	else if ($json["ACTIONTYPE"] == "CHK"){
		$sql = "UPDATE SUPPLY_RECORD SET 
					   CHECKER_USER = :author,
					   STATUS = 'RECEIVED' 
					   WHERE ID = :identifier";	
		$req = $db->prepare($sql);
		$image = base64_decode($json["SIGNATURE"]);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);		
		$req->execute();
		pictureRecord($json["SIGNATURE"],"CHK",$json["IDENTIFIER"]);
		$data["result"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "TRF"){
		// AUTO TRANSFER ITEMS TO TRANSFERPOOL
		$sql = "SELECT PONUMBER,LINKEDPO FROM SUPPLY_RECORD WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["IDENTIFIER"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if (isset($res["PONUMBER"]))
			$ponumber = $res["PONUMBER"];
		else 
			$ponumber = $res["LINKEDPO"];

		if(isset($json["USERID"]))
			$userid = $json["USERID"];
		else
			$userid = null;

		$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber));

		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item)
		{
			// NEW METHOD
			$sql = "SELECT PRODUCTID FROM ITEMREQUESTUNGROUPEDROWRESTOCKPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false ){
				$sql = "SELECT LOCONHAND,STORBIN FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));				
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if ($res != false){
					$sql = "INSERT INTO ITEMREQUESTUNGROUPEDROWRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,STORBIN,COMMENT) VALUES (?,?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$res["LOCONHAND"],$res["STORBIN"],$ponumber));
				}else{
					error_log("Error with productid ".$item["PRODUCTID"]. " not found in ICLOCATION with WH1");
				}
			}
			// OLD METHOD
			/*
			$sql = "SELECT *,count(*) as 'CNT' FROM ITEMREQUESTTRANSFERFRESHPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);		

			if ($res["CNT"] == 0){
				$sql = "INSERT INTO ITEMREQUESTTRANSFERFRESHPOOL (PRODUCTID,REQUEST_QUANTITY,USERID) VALUES (?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["RECEIVE_QTY"],$userid));		
			}else{
				$sql = "UPDATE ITEMREQUESTTRANSFERFRESHPOOL SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE USERID = ?AND PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["RECEIVE_QTY"],$userid,$item["PRODUCTID"]));			
			}
			*/
		}	
	
		$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'RECEIVEDFRESH', TRANSFERER_USER = :author 
				WHERE ID = :identifier";			
		$req = $db->prepare($sql);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);					
		$req->execute();
		
		pictureRecord($json["SIGNATURE"],"TRF",$json["IDENTIFIER"]);
		$data["result"] = "OK";

	}	
	else if ($json["ACTIONTYPE"] == "WHE"){
		
		pictureRecord($json["SIGNATURE"],"WH",$json["IDENTIFIER"]);
		if (isset($json["ITEMS"]))
		{

			foreach($json["ITEMS"] as $key => $value) // TODO ITEM WITH NOT ENOUGH QTY
			{						
					$sql = "SELECT TRANCOST,TRANDISC FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID = ?";
					$req = $dbBLUE->prepare($sql);
					$req->execute(array($json["PONUMBER"],$key));
					$res = $req->fetch();
					$TRANDISC = $res["TRANDISC"];
		

					if (!isset($value["PPSS_DELIVERED_PRICE"]) ||  $value["PPSS_DELIVERED_PRICE"] == null)				
						$value["PPSS_DELIVERED_PRICE"] = "0";

					if (!is_numeric($value["PPSS_DELIVERED_PRICE"]))
						$value["PPSS_DELIVERED_PRICE"] = "0";
							
					if ($TRANDISC != null && $TRANDISC != "0")
						$calculatedCost =  $value["PPSS_DELIVERED_PRICE"] - ($value["PPSS_DELIVERED_PRICE"] * ($TRANDISC / 100));
					else 
						$calculatedCost =  $value["PPSS_DELIVERED_PRICE"];

					$extcost = $value["PPSS_DELIVERED_QUANTITY"] * $calculatedCost;
					 
					$sql = "UPDATE PODETAIL SET  EXTCOST = ?,ORDER_QTY = ?, PPSS_DELIVERED_QUANTITY = ?
							WHERE  PRODUCTID = ? AND PONUMBER = ? ";
					$req = $dbBLUE->prepare($sql);
					
					$req->execute(array($extcost,$value["PPSS_DELIVERED_QUANTITY"],$value["PPSS_DELIVERED_QUANTITY"],$key,$json["PONUMBER"]) );									 						
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
		$data["result"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "RCV"){
				
		$ponumber  = $json["PONUMBER"];		
		
		$sql = "SELECT LOCID FROM POHEADER WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber));
		$res = $req->fetch(PDO::FETCH_ASSOC);
			
		if ($res["LOCID"] == "WH1")
			$status = "RECEIVEDFRESH";	//$status = 'RECEIVEDFORTRANSFERFRESH';			
		else if ($res["LOCID"] == "WH2")
			$status = 'RECEIVEDFORTRANSFER';
		else 
			error_log("NO LOCID". $res["LOCID"]);

		$sql = "UPDATE SUPPLY_RECORD SET STATUS = :status, RECEIVER_USER = :author
		WHERE ID = :identifier";			
   		$req = $db->prepare($sql);			

		$req->bindParam(':status',$status,PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);	
		$req->execute();								
		pictureRecord($json["SIGNATURE"],"RCV",$json["IDENTIFIER"]);		
		error_log("RECEIVE PO DONE");
		if (isset($json["TAX"]))
			$TAX = $json["TAX"];
		else 
			$TAX = 0;

		if (isset($json["DISCOUNT"]))
			$DISCOUNT = $json["DISCOUNT"];
		else 
			$DISCOUNT = 0;
		updatePO($ponumber,$json["ITEMS"],$json["NOTES"]);
		error_log("UPDATE PO DONE\n");
		receivePO($ponumber,$json["AUTHOR"],$json["NOTES"],$TAX,$DISCOUNT);
		error_log("RECEIVE PO DONE\n");
		$data["result"] = "OK";
	}
	else if ($json["ACTIONTYPE"] == "RCVF"){
		$ponumber  = $json["PONUMBER"];		
		$sql = "SELECT LOCID FROM POHEADER WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber));
		$res = $req->fetch(PDO::FETCH_ASSOC);	
		$status = "RECEIVEDFRESH";	
		//$status = "RECEIVEDFORTRANSFERFRESH";
		$sql = "UPDATE SUPPLY_RECORD SET STATUS = :status, RECEIVER_USER = :author
		WHERE ID = :identifier";			
		   $req = $db->prepare($sql);			
		$req->bindParam(':status',$status,PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);	
		$req->execute();								
		pictureRecord($json["SIGNATURE"],"RCV",$json["IDENTIFIER"]);		
		if (isset($json["TAX"]))
			$TAX = $json["TAX"];
		else 
			$TAX = 0;
		if (isset($json["DISCOUNT"]))
			$DISCOUNT = $json["DISCOUNT"];
		else 
			$DISCOUNT = 0;	
		updatePO($ponumber,$json["ITEMS"],$json["NOTES"]);
		receivePO($ponumber,$json["AUTHOR"],$json["NOTES"],$TAX,$DISCOUNT);
		$data["result"] = "OK";	
	}
	else if ($json["ACTIONTYPE"] == "ACC"){
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
		$data["result"] = "OK";
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

		if (file_exists("./img/supplyrecords_signatures/ACC_".$json["IDENTIFIER"].".png"))
			unlink("./img/supplyrecords_signatures/WH_".$json["IDENTIFIER"].".png");

		// Cancel all validation
		error_log("DANGER CANCEL !!! ".$json["PONUMBER"]);
		$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_QUANTITY = '0',PPSS_DELIVERED_PRICE = '0',PPSS_WAITING_QUANTITY = '0', PPSS_NOTE = null,PPSS_DELIVERED_EXPIRE = null WHERE  PONUMBER = ? ";
		$req = $dbBLUE->prepare($sql);
		if (isset($json["PONUMBER"]))
			$req->execute(array($json["PONUMBER"]) );	

		$data["result"] = "OK";	 			
	}
	else if ($json["ACTIONTYPE"] == "PCHCANCEL"){
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
		$data["result"] = "OK";	
	}
	else{
		$data["result"] = "KO";
	}	
	$response = $response->withJson($data);
	return $response;
});

$app->delete('/supplyrecord/{id}',function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$id = $request->getAttribute('id');
	$json = json_decode($request->getBody(),true);	

	$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'ARCHIVED', ARCHIVER = ? WHERE ID = ?";
	$db = getInternalDatabase();
	$req = $db->prepare($sql);
	$req->execute(array($json["AUTHOR"],$id));
	$data["result"] = "OK";	
	$response = $response->withJson($data);
	return $response;
});

$app->get('/supplyrecorddetails/{id}', function(Request $request,Response $response) {
	$id = $request->getAttribute('id');

	$hidenoreceive =  $request->getParam('hidenorcv','NO');

	$db = getInternalDatabase();
	$db2 = getDatabase();

	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$rr = $req->fetch(PDO::FETCH_ASSOC);

	$rr["items"] = null;
	

	if ($hidenoreceive == 'YES')
	{
		$sql = "SELECT PRODUCTID,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as PRODUCTNAME,
					VENDNAME,VAT_PERCENT,ORDER_QTY,TRANCOST,TRANDISC,					
					(SELECT  TOP(1)(TRANCOST - (TRANCOST * TRANDISC/100))  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID ORDER BY COLID DESC) as 'RECEIVECOST',
					(SELECT  TOP(1) TRANQTY  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID ORDER BY COLID DESC) as 'RECEIVEQTY',	
					PPSS_WAITING_CALCULATED,		
				   TRANDISC,EXTCOST,
				   PPSS_WAITING_QUANTITY,PPSS_WAITING_PRICE,PPSS_WAITING_VAT,PPSS_WAITING_DISCOUNT,
				   PPSS_VALIDATED_QUANTITY,
				   PPSS_DELIVERED_QUANTITY,PPSS_DELIVERED_PRICE,PPSS_DELIVERED_VAT,PPSS_DELIVERED_DISCOUNT,PPSS_DELIVERED_EXPIRE,PPSS_NOTE
				   FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID IN (SELECT PRODUCTID FROM PORECEIVEDETAIL WHERE PONUMBER = ?)	 ORDER BY PRODUCTID ASC";	
	}
	else{
		$sql = "SELECT PRODUCTID,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as PRODUCTNAME,
					VENDNAME,VAT_PERCENT,ORDER_QTY,TRANCOST,TRANDISC,
					(SELECT  TOP(1)(TRANCOST - (TRANCOST * TRANDISC/100))  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID ORDER BY COLID DESC) as 'RECEIVECOST',
					(SELECT  TOP(1) TRANQTY  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID ORDER BY COLID DESC) as 'RECEIVEQTY',			
					PPSS_WAITING_CALCULATED,
					TRANDISC,EXTCOST,
				   PPSS_WAITING_QUANTITY,PPSS_WAITING_PRICE,PPSS_WAITING_VAT,PPSS_WAITING_DISCOUNT,
				   PPSS_VALIDATED_QUANTITY,
				   PPSS_DELIVERED_QUANTITY,PPSS_DELIVERED_PRICE,PPSS_DELIVERED_VAT,PPSS_DELIVERED_DISCOUNT,PPSS_DELIVERED_EXPIRE,PPSS_NOTE
				   FROM PODETAIL WHERE PONUMBER = ?  ORDER BY PRODUCTID ASC";
	}
		
	if ($rr["TYPE"] == "NOPO")
	{			
			$req = $db2->prepare($sql);
			if ($hidenoreceive == 'YES')
				$req->execute(array($rr["PONUMBER"],$rr["PONUMBER"],$rr["PONUMBER"],$rr["PONUMBER"]));	
			else
				$req->execute(array($rr["PONUMBER"],$rr["PONUMBER"],$rr["PONUMBER"]));
			$rr["items"] = $req->fetchAll(PDO::FETCH_ASSOC);			 		
	}
	else {		
		$req = $db2->prepare($sql);
		if ($hidenoreceive == 'YES')
			$req->execute(array($rr["PONUMBER"],$rr["PONUMBER"],$rr["PONUMBER"],$rr["PONUMBER"]));
		else
			$req->execute(array($rr["PONUMBER"],$rr["PONUMBER"],$rr["PONUMBER"]));
		$poitems  = $req->fetchAll(PDO::FETCH_ASSOC);
		$rr["items"] = $poitems;
	}

	$items = ($rr["items"] != null) ? $rr["items"] : array();

	$amountexcludevat = 0;
	$amountvat = 0;
	$grandtotal = 0;
	$amountDiscount = 0;
	$amtplt = 0;
	$tmpItems = array();
	
	foreach($items as $item){

		 $sql = "SELECT PRODUCTNAME,PRODUCTNAME1,VENDNAME,LASTCOST,PRICE,PACKINGNOTE,HAS_PLT,APVENDOR.TAX,SIZE,PPSS_IS_BLACKLIST,PPSS_IS_PRICEFIXED,
		 (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
		 FROM ICPRODUCT,APVENDOR 
		 WHERE ICPRODUCT.VENDID = APVENDOR.VENDID AND ICPRODUCT.PRODUCTID =  ?";
		 $req = $db2->prepare($sql);
		 $req->execute(array($item["PRODUCTID"]));
		 $res = $req->fetch(PDO::FETCH_ASSOC);
		
		if (!isset($item["LASTCOST"]))
			$item["LASTCOST"] = "0";

		 $amountexcludevat += ($res["LASTCOST"] * $item["ORDER_QTY"]);	
		 $amountvat += ($res["LASTCOST"] * ($res["TAX"] / 100)) * $item["ORDER_QTY"];					 		
		 if ($res["HAS_PLT"] == 'Y')
		 	$amtplt += ($item["LASTCOST"] * 0.03) ;
		$amountDiscount += (($item["TRANDISC"] / 100) * $res["LASTCOST"]);
		$grandtotal +=  ($res["LASTCOST"] * (1 + ($res["TAX"] / 100))) * $item["ORDER_QTY"];
		$item["WH1"] = $res["WH1"];
		$item["WH2"] = $res["WH2"];
		$item["SIZE"] = $res["SIZE"];
		$item["PRICE"] = $res["PRICE"];
		array_push($tmpItems, $item); 	
	}
	$dbBLUE = getDatabase();
	$sql = "SELECT VAT_PERCENT FROM POHEADER WHERE PONUMBER = ?";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($rr["PONUMBER"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	$extradata = array();
	if ($res != false)
		$extradata["VAT"] = round($res["VAT_PERCENT"],2);
	else 
		$extradata["VAT"] = "0";

	$extradata["AMTEXCVAT"] = round($amountexcludevat,2);
	$extradata["AMTVAT"] = round($amountvat,2);
	$extradata["AMTPLT"] = round($amtplt,2);
	$extradata["AMTDISC"] = round($amountDiscount,2);
	$extradata["GRANDTOTAL"] = round($grandtotal,2) - $extradata["AMTDISC"];
	$extradata["PONUMBER"] = $rr["PONUMBER"];
	$extradata["VENDID"] = $rr["VENDID"];
	$extradata["VENDNAME"] = $rr["VENDNAME"];
	$extradata["PODATE"] = $rr["PODATE"]; 
	$extradata["PURCHASER"] = $rr["PURCHASER_USER"];
	$extradata["VALIDATOR"] = $rr["VALIDATOR_USER"];
	$extradata["ID"] = $rr["ID"];

	$rr["items"] = $tmpItems;
	$rr["extradata"] = $extradata;

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $rr;
	$response = $response->withJson($resp);


	return $response;
});

$app->post('/supplyrecordadditem', function(Request $request,Response $response) {
	$json = json_decode($request->getBody(),true);	

	$dbBLUE = getDatabase();
	$PONUMBER = $json["PONUMBER"];
	$PRODUCTID = $json["PRODUCTID"];
	$author = $json["AUTHOR"];
	$TRANCOST = $json["COST"]; 	
	$TRANDISC = $json["DISCOUNT"];
	$QUANTITY = $json["REQUEST_QUANTITY"];
	$VAT_PERCENT = $json["VAT_PERCENT"];
	$now = date("Y-m-d H:i:s");


	$sql = "SELECT TOP(1) VENDID,VENDNAME,VENDNAME1,LOCID FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID = ? ORDER BY COLID DESC";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($PONUMBER,$PRODUCTID));
	$res = $req->fetch(PDO::FETCH_ASSOC);
		
	if ($res == false){
		$sql = "SELECT TOP(1) APVENDOR.VENDID,APVENDOR.VENDNAME,APVENDOR.VENDNAME1 
				FROM ICPRODUCT,APVENDOR WHERE PRODUCTID = ?
				AND APVENDOR.VENDID = ICPRODUCT.VENDID
				ORDER BY ICPRODUCT.COLID DESC
				";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($PRODUCTID));
		$res = $req->fetch(PDO::FETCH_ASSOC);
	}

	$VENDID = $res["VENDID"];
	$VENDNAME = $res["VENDNAME"];
	$VENDNAME1 = $res["VENDNAME1"];
	if (!isset($res["LOCID"]) || $res["LOCID"] == null)
		$LOCID = "WH2";
	else
		$LOCID = $res["LOCID"];
	
	// Insert Location if needed
	$sql = "SELECT * FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = ?";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($PRODUCTID,$LOCID));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res == false){
		$sql = "INSERT INTO ICLOCATION (PRODUCTID,LOCID,VENDID,USERADD,DATEADD,TAXACC) VALUES(?,?,?,?,?,?)";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($PRODUCTID,$LOCID,$VENDID,$author,$now,"16100"));
	} 
	
		$PURCHASE_DATE = $now;		
		$ORDER_QTY = $QUANTITY;
		$DATEADD = $now;

		$sql = "SELECT PRODUCTNAME,PRODUCTNAME1,COST,ONHAND 
						FROM ICPRODUCT  
						WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($PRODUCTID)); 
		$newitem = $req->fetch(PDO::FETCH_ASSOC);

		$PRODUCTNAME = $newitem["PRODUCTNAME"];
		$PRODUCTNAME1 = $newitem["PRODUCTNAME1"];
		$CURRENTONHAND = $newitem["ONHAND"];

		$CURRENCY_COST = floatval($TRANCOST); // *  floatval( (100 - $item["DISCOUNT"]) / 100);
		$CURRENCY_COST = round($CURRENCY_COST,2);

		$CURRENCY_AMOUNT = floatval($TRANCOST)  * floatval($QUANTITY);	
		$CURRENCY_AMOUNT = $CURRENCY_AMOUNT * ((100 - $TRANDISC) / 100); // REMOVE DISCOUNT
		$CURRENCY_AMOUNT = round($CURRENCY_AMOUNT,2);

		$STKFACTOR = "1.00000";
		$BASECURR_ID = "USD";
		$VATABLE = "Y";
		$TRANUNIT = "UNIT";
		$TRANFACTOR = "1.00000";
		$STKUNIT = "UNIT";
		$USERADD = blueUser($author);
		$CURRID = "USD";
		$CURR_RATE = "1";
		$WEIGHT = "1.00000";
		$OLDWEIGHT = "1.00000";
		$RECEIVE_QTY = "0.00000";
		
		$EXTCOST = round($CURRENCY_AMOUNT, 2);				
		$RECEIVE_QTY = "0.0000";
		$COMMENT = "";
		$POSTATUS = "";
		$COST_ADD = "0.0000";
		$DIMENSION = "0.0000";
		$FILEID = "";
		$COST_CENTER = "";
		$INVENTORYACC = "";
		$QTY_OVORORDER = "0.0000";
		$FREIGHT_SG = "0.0000";

		$sql = "SELECT COUNT(*) as CNT FROM PODETAIL WHERE PONUMBER = ?";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($PONUMBER));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$line = $res["CNT"] + 1;

	$sql = "INSERT INTO PODETAIL (
	PONUMBER,VENDID,VENDNAME,VENDNAME1,PURCHASE_DATE, 
	PRODUCTID,LOCID,PRODUCTNAME,PRODUCTNAME1,ORDER_QTY, 	
	TRANUNIT,TRANFACTOR,STKUNIT,STKFACTOR,TRANDISC,
	TRANCOST,EXTCOST,CURRENTONHAND,CURRID,CURR_RATE,	
	WEIGHT,OLDWEIGHT,USERADD,DATEADD,TRANLINE,
	VATABLE,VAT_PERCENT,BASECURR_ID,CURRENCY_AMOUNT,CURRENCY_COST,
	RECEIVE_QTY,COMMENT,POSTATUS,COST_ADD,DIMENSION,
	FILEID,COST_CENTER,INVENTORYACC,QTY_OVERORDER,FREIGHT_SG,
	PPSS_WAITING_CALCULATED, PPSS_WAITING_COMMENT,PPSS_WAITING_PRICE,PPSS_WAITING_QUANTITY,PPSS_WAITING_DISCOUNT,
	PPSS_WAITING_VAT) 
	VALUES (?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?,?,?,?,?,
			?)"; 		
	$req = $dbBLUE->prepare($sql);
	$params = array(
		$PONUMBER,$VENDID, $VENDNAME, $VENDNAME1, $PURCHASE_DATE,
		$PRODUCTID, $LOCID,$PRODUCTNAME,$PRODUCTNAME1, $ORDER_QTY, 
		$TRANUNIT, $TRANFACTOR, $STKUNIT, $STKFACTOR, $TRANDISC,
		$TRANCOST, $EXTCOST, $CURRENTONHAND, $CURRID, $CURR_RATE,
		$WEIGHT, $OLDWEIGHT, $USERADD, $DATEADD, $line, 
		$VATABLE, $VAT_PERCENT,$BASECURR_ID, $CURRENCY_AMOUNT,$CURRENCY_COST,
		$RECEIVE_QTY,$COMMENT,$POSTATUS,$COST_ADD,$DIMENSION, 
		$FILEID,$COST_CENTER,$INVENTORYACC,$QTY_OVORORDER,$FREIGHT_SG,
		"-1","-1","-1","-1","-1",
		$VAT_PERCENT);		

	$req->execute($params);		
	
	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/supplyrecordremoveitem', function(Request $request,Response $response) {
	
	$db = getDatabase();
	$json = json_decode($request->getBody(),true);		
	$PRODUCTID = $json["PRODUCTID"];
	$PONUMBER = $json["PONUMBER"];

	
	$sql = "DELETE FROM PODETAIL WHERE PRODUCTID = ? AND PONUMBER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($PRODUCTID,$PONUMBER));

	

	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/itemstatistics/{id}', function(Request $request,Response $response) {
	
	$id = $request->getAttribute('id');
	$start = $request->getParam('start','');
	$end = $request->getParam('end','');
	$stats = statisticsByItem($id,$start,$end);
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $stats;
	$response = $response->withJson($resp);
	return $response;
});


$app->get('/itemstats/{id}', function(Request $request,Response $response) {
	$id = $request->getAttribute('id');
  
	$stats = orderStatistics($id);
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $stats;
	$response = $response->withJson($resp);

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
				  WHERE ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST)";
	//$sql = "SELECT * FROM ITEMREQUESTACTION WHERE 1 = 1 ";

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
		array_push($params,$start." 00:00:00" ,$end." 23:59:59");	
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
	$sql .= " ORDER BY REQUEST_TIME DESC";		
	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);

	return $response;
});


$app->get('/transfer/{userid}',  function(Request $request,Response $response){
	$db = getInternalDatabase();
	$userid = $request->getAttribute('userid');
	
	$sql = "SELECT location FROM USER WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($userid));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res["location"] == "ALL"){
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND REQUESTEE IS NULL";
		$req = $db->prepare($sql);
		$req->execute();
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
	}else{
		$locations = $res["location"];
		$locations = explode('|',$locations);
		$data = array();	
		foreach($locations as $location){
			$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND ARG1 LIKE ? AND REQUESTEE IS NULL";
			$req = $db->prepare($sql);
			$req->execute(array('%'.$location.'%'));
			$actions = $req->fetchAll(PDO::FETCH_ASSOC);
			$data = array_merge($data,$actions);
		}
	}
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});




$app->get('/lastid', function(Request $request,Response $response) {
	$db = getDatabase();	
	$db->beginTransaction();    
	$sql = "INSERT INTO RS_MENU_QUEUE (IDENTIFIER,ARG1,ARG2,ARG3,ARG4) VALUES (?,?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array('1','1','2','3','4'));
	$lastid = $db->lastInsertId();	
	$db->commit();    
	$resp["ID"] = $lastid;
	$response = $response->withJson($resp);
	return $response;	
});

$app->get('/itemrequestaction/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();

	$type = $request->getAttribute('type');

	if ($type == "GROUPEDPURCHASE")
	{	
		GenerateGroupedPurchases();
	
		$days = array("MON","TUE","WED","THU","FRI","SAT");
		$data = array();
				foreach($days as $day)
				{
					$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2',
					(SELECT COUNT(ID) as CNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID) as 'ITEMCOUNT' 
					FROM ITEMREQUESTACTION 
					WHERE REQUESTEE IS NULL 
					AND ARG3 = ?
					AND TYPE = 'GROUPEDPURCHASE' AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_TIME DESC";				

					$req = $db->prepare($sql);
					$req->execute(array($day));
					$data[$day] =  $req->fetchAll(PDO::FETCH_ASSOC);						
				}			
		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $data;	
		$response = $response->withJson($resp);
		return $response;		
	}
	else if ($type == "GROUPEDRESTOCK" || $type == "vGROUPEDRESTOCK")
	{
		GenerateGroupedRestocks();			
		if ($type == "vGROUPEDRESTOCK")	{
			$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE NOT NULL AND REQUEST_TIME > date('now','-2 days') AND (TYPE = 'GROUPEDRESTOCK' OR TYPE = 'AUTOMATICRESTOCK' OR TYPE = 'AUTOMATICRESTOCKWH') AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_UPDATED DESC";
		}				
		else{
			$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND (TYPE = 'GROUPEDRESTOCK' OR TYPE = 'AUTOMATICRESTOCK' OR TYPE = 'AUTOMATICRESTOCKWH') AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_TIME DESC";								
		} 
		$req = $db->prepare($sql);
		$req->execute(array());
		$actions = $req->fetchAll(PDO::FETCH_ASSOC);		
		
		$newActions = array();
		foreach($actions as $action){
			$sql = "select count(*) as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($action["ID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false && $res["COUNT"] != 0 && $res["COUNT"] != "0"){
				
				$action["NBITEMS"] = $res["COUNT"];
				array_push($newActions,$action);
			}
			
		}

		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $newActions;	
		$response = $response->withJson($resp);
		return $response;		
	}
	else
	{
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
			$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_TIME DESC";								
		else if ($filter == "VALIDATED")
			$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE NOT NULL AND TYPE = ? AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_UPDATED DESC";
		else if ($filter == "SUBMITED")
			$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST)  ORDER BY REQUEST_UPDATED DESC";
		else if ($filter == "ALL")
			$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE 
				TYPE = ? AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_UPDATED DESC";		

		$req = $db->prepare($sql);
		$req->execute(array($type));
		$actions = $req->fetchAll(PDO::FETCH_ASSOC);		
		

		foreach($actions as $action){
			$sql = "select count(*) as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($action["ID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$action["NBITEMS"] = $res["COUNT"];						
		}


		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $actions;
		$response = $response->withJson($resp);
		return $response;
	}	
});

// 
$app->post('/itemrequestaction', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$json = json_decode($request->getBody(),true);	
	$items = json_decode($json["ITEMS"],true);

	$db->beginTransaction();    
	if($json["TYPE"] == "PURCHASE" || $json["TYPE"] == "RESTOCK") {		
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER,REQUESTEE) VALUES(?,?,'AUTO')";		
		$req = $db->prepare($sql);
		$req->execute(array($json["TYPE"],$json["REQUESTER"]));
	}	
	else if (substr($json["TYPE"],0,6) == "DEMAND")
	{
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER) VALUES(?,?)";
		$req = $db->prepare($sql);
		$req->execute(array("DEMAND",$json["REQUESTER"]));
	}
	else if ($json["TYPE"] == "TRANSFER"){
		/* 		
		$firstStoreBin = null;
		$firstProduct = null;
		foreach($items as $item){
				$sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
				$req = $dbBlue->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
				$data = $req->fetch(PDO::FETCH_ASSOC);				
				if ($data != false){

					$storebin = $data["STORBIN"];
					if ($firstProduct == null){
						$firstStoreBin = $storebin; 
						$firstProduct = $item["PRODUCTID"];					
					}else{
						if (!LocationSameTeam($firstStoreBin,$storebin)){
							$data["result"] = "KO";
							$data["message"] = "items with location mix: ".$firstProduct.":".$firstStoreBin."|".$item["PRODUCTID"].":".$storebin;
							$response = $response->withJson($data);
							return $response;
						}
					}
				}else{
					if ($firstProduct == null){
						$firstStoreBin = null;
						$firstProduct = $item["PRODUCTID"];
					}
				}												
		}
		*/
		
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER,ARG1) VALUES(?,?,?)";
		$req = $db->prepare($sql);
		if (isset($json["LOCATION"]))
			$location = $json["LOCATION"];
		else
			$location = "";		
		$req->execute(array("TRANSFER",$json["REQUESTER"],$location));

		$sql = "SELECT ID,fcmtoken,login from USER WHERE location LIKE ? OR location = 'ALL'";
		$req = $db->prepare($sql);
		$req->execute(array('%'.$location.'%'));
		$users = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($users as $user)
		{					
			if ($user["fcmtoken"] != "" && $user["fcmtoken"] != null)
				sendPush("TRANSFER READY", "Grab your items at warehouse for location " .$json["LOCATION"] ,$user["fcmtoken"]);
		}
	}
	else if ($json["TYPE"] == "TRANSFERBACK"){
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER) VALUES(?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["TYPE"],$json["REQUESTER"]));
		sendPushToUser("TRANSFERBACK", "Some items are transferred back to warehouse" ,18);
		sendPushToUser("TRANSFERBACK", "Some items are transferred back to warehouse" ,19);
		sendPushToUser("TRANSFERBACK", "Some items are transferred back to warehouse" ,20);
	}
	else {
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER) VALUES(?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["TYPE"],$json["REQUESTER"]));
	}		
	$lastID = $db->lastInsertId();
	$db->commit();  
	
	$imageData = base64_decode($json["REQUESTERSIGNATURE"]);
	file_put_contents("./img/requestaction/R" .$lastID.".png" , $imageData);

	

	if (count($items) == 0)
	{
		$data["result"] = "KO";
		$data["message"] = "no items";
		$response = $response->withJson($data);
		return $response->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
	}
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
	else if($json["TYPE"] == "TRANSFERFRESH") // WAREHOUSE CREATE TRANSFER REQUEST AND REMOVE FROM POOL
		$tableName = "ITEMREQUESTTRANSFERFRESHPOOL";	
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
		if ($item["PRODUCTID"] == null || $item["PRODUCTID"] == "")
			continue;
		if ($item["REQUEST_QUANTITY"] == 0 && $suffix == "")
			continue;
		$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,REQUESTTYPE,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],'MANUAL',$lastID));

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
					$res = $req->fetch(PDO::FETCH_ASSOC);
				} 
				$vendid = $res["VENDID"];
				
				if (isset($item["SPECIALQTY"]) && isset($item["REASON"])) // SPECIAL QTY AFTER SUBMIT FOR RESTOCK
				{
						$sql = "INSERT INTO ITEMSPECIALORDER (PRODUCTID,OLDQUANTITY,NEWQUANTITY,REASON,USER) VALUES (?,?,?,?,?)";
						$req = $db->prepare($sql);
						$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$item["SPECIALQTY"],$item["REASON"],$AUTHOR));						
						$theQty = $item["SPECIALQTY"];
				}				
				else
					$theQty = $item["REQUEST_QUANTITY"];

				if (intval($theQty) > 0)
				{
					$sql = "INSERT INTO ITEMREQUESTUNGROUPEDPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY,VENDID) VALUES (?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$theQty,$vendid));
				}	
				
			}
			else
			{
				$theQty = $item["REQUEST_QUANTITY"];
				if (intval($theQty) > 0)
				{
					$sql = "UPDATE ITEMREQUESTUNGROUPEDPURCHASEPOOL SET REQUEST_QUANTITY =  ? WHERE  PRODUCTID = ?";
					$req = $db->prepare($sql);
					$req->execute(array($theQty,$item["PRODUCTID"]));
				}
			}
		}
		else if ($json["TYPE"] == "RESTOCK")
		{
			$sql = "SELECT 1 FROM ITEMREQUESTUNGROUPEDRESTOCKPOOL WHERE PRODUCTID = ?";
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
					$res = $req->fetch(PDO::FETCH_ASSOC);
				} 
				$vendid = $res["VENDID"];			
				// 					"MAKRO CLICK"	"SOPHIE SOK"
				if ($vendid != "400-429" && $vendid != "400-463")
					$vendid = "OTHER";
				
				if(floatval($item["REQUEST_QUANTITY"]) > 0)
				{
					$sql = "INSERT INTO ITEMREQUESTUNGROUPEDRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,VENDID) VALUES (?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$vendid));	
				}				
			}
			else
			{
				if(intval($item["REQUEST_QUANTITY"]) > 0)
				{
					$sql = "UPDATE ITEMREQUESTUNGROUPEDRESTOCKPOOL SET REQUEST_QUANTITY = ? WHERE  PRODUCTID = ?";
					$req = $db->prepare($sql);
					$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"]));
				}
			}
		}		
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
	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
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
		if(isset($item["REQUEST_QUANTITY"]))
			$THEQUANTITY = $item["REQUEST_QUANTITY"];
		else if(isset($item["QUANTITY"]))
			$THEQUANTITY = $item["QUANTITY"];
		else
			$THEQUANTITY = "0";

		$psql = "SELECT LASTCOST FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $db->prepare($psql);
		$req->execute(array($item["PRODUCTID"]));	
		$cost = $req->fetch()["LASTCOST"];
		$TOTAL_AMT += $cost * $THEQUANTITY;

		if ($type == "TRANSFER")
			$location = "WH1";
		else 
			$location = "WH2";

		$sql = "UPDATE ICLOCATION SET LOCLASTCOST = ?, LOCCOST = ? WHERE LOCID = ? AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($cost,$cost,$location,$item["PRODUCTID"]));
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
	$message = "";
	foreach($items as $item)
	{
		if(isset($item["REQUEST_QUANTITY"]))
			$THEQUANTITY = $item["REQUEST_QUANTITY"];
		else if(isset($item["QUANTITY"]))
			$THEQUANTITY = $item["QUANTITY"];
		else
			$THEQUANTITY = "0";

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


		if ($type == "TRANSFER")
		{
			if ($THEQUANTITY > $ONHANDWH2){				
				$message .= " ".$item["PRODUCTID"];
				continue;
			}
		}
		else
		{
			if ($THEQUANTITY > $ONHANDWH1){				
				$message .= " ".$item["PRODUCTID"];
				continue;
			}
		}  

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
		$TRANQTY = $THEQUANTITY;
		$TRANUNIT = $itemDetails["SALEFACTOR"];
		$TRANFACTOR = $itemDetails["BIG_UNIT_FACTOR"];
		$STKFACTOR = $itemDetails["STKFACTOR"];
 		$TRANCOST = $itemDetails["COST"];
 		$TRANPRICE = $itemDetails["PRICE"];
		$PRICE_ORI = $itemDetails["PRICE"];
		$EXTPRICE = $itemDetails["PRICE"] * $THEQUANTITY;
		$EXTCOST = $itemDetails["COST"] * $THEQUANTITY;
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
		$locreq->execute(array($THEQUANTITY,$LOCID,$item["PRODUCTID"]));

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
		$locreq->execute(array($THEQUANTITY,$LOCID,$item["PRODUCTID"]));

		$count++;
	}
	$message = "DOCNO:" .$identifier. " ".$message;
	return $message;
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
$app->delete('/itemrequestactionitems',function(Request $request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$itemrequestactionid = $json["ITEMREQUESTACTION_ID"];
	if (isset($json["PRODUCTID"])){
		$productid = $json["PRODUCTID"];
		$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($productid,$itemrequestactionid));
	}
	else if (isset($json["PRODUCTIDS"])){
		$productids = $json["PRODUCTIDS"];
		foreach($productids as $productid){
			$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($productid,$itemrequestactionid));
		}
	}
	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->put('/itemrequestaction/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');
	if (isset($json["USERID"]))
		$userid = $json["USERID"];
	else 
		$userid = null;

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
		else if ($ira["TYPE"] == "RESTOCK" || $ira["TYPE"] == "GROUPEDRESTOCK" || $ira["TYPE"] == "AUTOMATICRESTOCK" || $ira["TYPE"] == "AUTOMATICRESTOCKWH")  // WAREHOUSE VALIDATE RESTOCK AND TO TRANFER POOL & PURCHASE POOL
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
						$sql1 = "INSERT INTO ITEMREQUESTTRANSFERPOOL (PRODUCTID,REQUEST_QUANTITY,USERID) values (?,?,?)";
						$req1 = $db->prepare($sql1);
						$req1->execute(array($item["PRODUCTID"],$item["TRANSFER_POOL_NEW"],$userid));
					}
					else{			
						$newQty = $cnt["REQUEST_QUANTITY"] + $item["TRANSFER_POOL_NEW"];
						$sql1 = "UPDATE ITEMREQUESTTRANSFERPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ? AND USERID = ?";
						$req1 = $db->prepare($sql1);
						$req1->execute(array($newQty,$item["PRODUCTID"],$userid));
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
						$sql2 = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY,USERID) values (?,?,?)";
						$req2 = $db->prepare($sql2);
						$req2->execute(array($item["PRODUCTID"],$item["PURCHASE_POOL_NEW"],$userid));	
					}
					else{
						$newQty = $cnt["REQUEST_QUANTITY"] + $item["PURCHASE_POOL_NEW"];
						$sql2 = "UPDATE ITEMREQUESTPURCHASEPOOL SET REQUEST_QUANTITY = ? WHERE PRODUCTID = ? AND USERID = ?";
						$req2 = $db->prepare($sql2);
						$req2->execute(array($newQty,$item["PRODUCTID"],$userid));
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
			$msg = transferItems($items,$ira["REQUESTER"],$ira["TYPE"]);
			if ($msg != "")
				$data["message"] = $msg;  	
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
			$msg = transferItems($items,$ira["REQUESTER"],$ira["TYPE"]);
			if ($msg != "")
				$data["message"] = $msg;			
		}
		else if ($ira["TYPE"] == "PURCHASE"){// NOTHING}																
		}		
		else if ($ira["TYPE"] == "GROUPEDPURCHASE"){ // CREATE PO
			$author = blueUser($json["AUTHOR"]);
			$ponumber = createPO($items,$author);
			$data["message"] = "PO Created with number ".$ponumber; 

			$sql = "SELECT VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($ponumber));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			
			$now = date("Y-m-d");
			if ($res != false){
				$vendorid = $res["VENDID"];
				$vendname = $res["VENDNAME"];
			}else{
				$vendorid = "";
				$vendname = "";
			}			
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,'WAITING','PO','NO')"; 
			$req = $db->prepare($sql);			

			$req->execute(array($ponumber,$json["AUTHOR"], $vendorid, $vendname, $now));
			$lastID = $db->lastInsertId();
			
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
	

	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;
});
		

$app->get('/groupedpurchasedetails/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	$id = $request->getAttribute('id');		
	$sql = "SELECT *
			FROM ITEMREQUEST 
			WHERE ITEMREQUESTACTION_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$mapA = array();
	foreach($items as $item){
		$mapA[$item["PRODUCTID"]] = $item;
	}


	$asql = "SELECT * FROM ITEMREQUESTACTION WHERE ID = ?";
	$req = $db->prepare($asql);
	$req->execute(array($id));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		$type = $res["TYPE"];
		$requester = $res["REQUESTER"];	
	}
		
	if (count($items) > 0){
		$inStr = "(";
		foreach($items as $item){
			$inStr .= "'".$item["PRODUCTID"]."',";
		}
		$inStr = substr($inStr,0,-1);
		$inStr .= ")";
	}else{
		$inStr = "('DECOY')";
	}	

	$sql = "SELECT PACKINGNOTE,TAX,PRODUCTNAME,PRODUCTID,
	replace(APVENDOR.VENDNAME,char(39),'') as 'VENDNAME',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STORE_QTY',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'WAREHOUSE_QTY',				
	(SELECT STORBIN FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STOREBIN1',				
	(SELECT STORBIN FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STOREBIN2'			
	FROM dbo.ICPRODUCT,APVENDOR
	WHERE ICPRODUCT.VENDID = APVENDOR.VENDID
	AND PRODUCTID in ".$inStr;
	
	$req=$dbBlue->prepare($sql);
	$req->execute(array());	
	$itemsA = $req->fetchAll(PDO::FETCH_ASSOC);
	$tax = $itemsA[0]["TAX"] ?? "0";	

	$sql = "SELECT distinct(PRODUCTID),
			(SELECT TOP(1) TRANDISC FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = PR.PRODUCTID ORDER BY COLID DESC) as 'TRANDISC',
			(SELECT TOP(1) TRANDATE FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = PR.PRODUCTID ORDER BY COLID DESC) as 'TRANDATE',
			(SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = PR.PRODUCTID ORDER BY COLID DESC) as 'TRANQTY',
			(SELECT TOP(1) VAT_PERCENT FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = PR.PRODUCTID ORDER BY COLID DESC) as 'VAT_PERCENT',
			(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = PR.PRODUCTID ORDER BY COLID DESC) as 'TRANCOST',
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = PR.PRODUCTID)*-1),0) as 'TOTALSALE',
			ISNULL((SELECT COUNT(*) FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = PR.PRODUCTID),0) as 'TOTALORDERTIME',
			ISNULL((SELECT SUM(RECEIVE_QTY) FROM PODETAIL WHERE POSTATUS = 'C' AND PRODUCTID = PR.PRODUCTID),0) as 'TOTALRECEIVE',
			(SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = PR.PRODUCTID AND POSDATE >= (SELECT TOP(1) TRANDATE FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = PR.PRODUCTID ORDER BY COLID DESC) AND POSDATE <=  GETDATE()) as 'SALESINCELASTRECEIVE'
			FROM PORECEIVEDETAIL as PR
			WHERE PRODUCTID IN ".$inStr;
	
	$req = $dbBlue->prepare($sql);	
	$req->execute(array());
	$itemsB = $req->fetchAll(PDO::FETCH_ASSOC);
	$map = array();
	foreach($itemsB as $item){
		$map[$item["PRODUCTID"]] = $item;
	}
	$newData = array();
	foreach($itemsA as $item){	
			$item["TYPE"] = $type;			
			$item["REQUESTER"] = $requester;	
			$item["VAT"] = $map[$item["PRODUCTID"]]["VAT_PERCENT"] ?? "0";
			$item["DISCOUNT"] = $map[$item["PRODUCTID"]]["TRANDISC"] ?? "";
			$item["COST"] = $map[$item["PRODUCTID"]]["TRANCOST"] ?? "0";
			$item["LASTRECEIVEDATE"] = $map[$item["PRODUCTID"]]["TRANDATE"] ?? "N/A";
			$item["LASTRECEIVEQUANTITY"] = $map[$item["PRODUCTID"]]["TRANQTY"] ?? "0";
			$item["TOTALSALE"] = $map[$item["PRODUCTID"]]["TOTALSALE"] ?? "0";
			$item["SALESINCELASTRECEIVE"] = $map[$item["PRODUCTID"]]["SALESINCELASTRECEIVE"] ?? "0";	
			$item["TOTALORDERTIME"] = $map[$item["PRODUCTID"]]["TOTALORDERTIME"] ?? "0";
			$item["TOTALRECEIVE"] = $map[$item["PRODUCTID"]]["TOTALRECEIVE"] ?? "0";				

			$item["REQUEST_QUANTITY"] = $mapA[$item["PRODUCTID"]]["REQUEST_QUANTITY"] ?? "";
			if ($item["DISCOUNT"] == "")
				$item["DISCOUNT"] = $mapA[$item["PRODUCTID"]]["DISCOUNT"] ?? "0";
			if ($item["COST"] == "")
			$item["COST"] = $mapA[$item["PRODUCTID"]]["COST"] ?? "0";
			$item["REQUESTTYPE"] = $mapA[$item["PRODUCTID"]]["REQUESTTYPE"] ?? "";	

			array_push($newData,$item);
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"]["items"] = $newData;
	$resp["data"]["tax"] = $tax;
	$resp["data"]["permadiscount"] = "0";
	$response = $response->withJson($resp);
	return $response;
});



$app->get('/groupedpurchasedetails3/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	$id = $request->getAttribute('id');		
	$sql = "SELECT *
			FROM ITEMREQUEST 
			WHERE ITEMREQUESTACTION_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$mapA = array();
	foreach($items as $item){
		$mapA[$item["PRODUCTID"]] = $item;
	}

	$asql = "SELECT * FROM ITEMREQUESTACTION WHERE ID = ?";
	$req = $db->prepare($asql);
	$req->execute(array($id));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		$type = $res["TYPE"];
		$requester = $res["REQUESTER"];	
	}
		
	if (count($items) > 0){
		$inStr = "(";
		foreach($items as $item){
			$inStr .= "'".$item["PRODUCTID"]."',";
		}
		$inStr = substr($inStr,0,-1);
		$inStr .= ")";
	}else{
		$inStr = "('DECOY')";
	}	

	$sql = "SELECT PACKINGNOTE,TAX,PRODUCTNAME,PRODUCTID,
	replace(APVENDOR.VENDNAME,char(39),'') as 'VENDNAME',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STORE_QTY',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'WAREHOUSE_QTY',				
	(SELECT STORBIN FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STOREBIN1',				
	(SELECT STORBIN FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STOREBIN2'			
	FROM dbo.ICPRODUCT,APVENDOR
	WHERE ICPRODUCT.VENDID = APVENDOR.VENDID
	AND PRODUCTID in ".$inStr;
	
	$req=$dbBlue->prepare($sql);
	$req->execute(array());	
	$itemsA = $req->fetchAll(PDO::FETCH_ASSOC);
	$tax = $itemsA[0]["TAX"] ?? "0";	

	$sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
	$req= $db->prepare($sql);	
	$req->execute(array($id));
	$newData = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"]["items"] = $newData;
	$resp["data"]["tax"] = $tax;
	$resp["data"]["permadiscount"] = "0";
	$response = $response->withJson($resp);
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
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		$type = $res["TYPE"];
		$requester = $res["REQUESTER"];	
	}	
	
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
				AND ITEMREQUESTACTION.TYPE = 'DEMAND'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["DEMAND_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["DEMAND_QTY"];
		
		// RESTOCK
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as RESTOCK_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND ITEMREQUESTACTION.TYPE = 'RESTOCK'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["RESTOCK_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["RESTOCK_QTY"];
		
		// TRANSFER
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as TRANSFER_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND ITEMREQUESTACTION.TYPE = 'TRANSFER'
				AND REQUESTEE IS NULL
				AND PRODUCTID = ?
				";
		$req = $db->prepare($sql);
		$req->execute(array($itemID));
		$item["TRANSFER_QTY"] = $req->fetch(PDO::FETCH_ASSOC)["TRANSFER_QTY"];
		
		// PURCHASE
		$sql = "SELECT IFNULL(sum(REQUEST_QUANTITY),0) as PURCHASE_QTY FROM ITEMREQUEST,ITEMREQUESTACTION 
				WHERE ITEMREQUEST.ITEMREQUESTACTION_ID = ITEMREQUESTACTION.ID
				AND ITEMREQUESTACTION.TYPE = 'PURCHASE'
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

		// WH Stock & Storebin
		$sql = "SELECT LOCONHAND,replace(replace(STORBIN,char(10),''),char(13),'') as 'LOC' FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));	
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false) 	{
			$item["STORE_QTY"] = floatval($res["LOCONHAND"]);		
			$item["STOREBIN1"] = $res["LOC"];	
		}
		

		// Store Stock		
		$sql = "SELECT LOCONHAND,replace(replace(STORBIN,char(10),''),char(13),'') as 'LOC' FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND PRODUCTID = ?";		
		$req=$dbBlue->prepare($sql);
		$req->execute(array($itemID));	
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["WAREHOUSE_QTY"] = floatval($res["LOCONHAND"]);		
			$item["STOREBIN2"] = $res["LOC"];	
		}	
		
				
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
		if ($res != false){
			$item["VENDNAME"] = $res["VENDNAME"];	
			$item["PACKINGNOTE"] = $res["PACKINGNOTE"];	
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];	
		} else{
			$item["VENDNAME"] = "";
			$item["PACKINGNOTE"] = "";
			$item["PRODUCTNAME"] = "";
		}							
		array_push($newData,$item);
	}	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();		
	$json = json_decode($request->getBody(),true);	

	$userid = $request->getParam('USERID',null);

	$type = $request->getAttribute('type');
	if ($type == "RESTOCK")
		$sql = "SELECT *,IFNULL((SELECT 'YES' FROM ITEMREQUESTDEBT WHERE ITEMREQUESTDEBT.PRODUCTID = ITEMREQUESTRESTOCKPOOL.PRODUCTID),'NO') as 'IS_DEBT' FROM ITEMREQUESTRESTOCKPOOL";
	else if ($type == "PURCHASE")
		$sql = "SELECT *,IFNULL((SELECT 'YES' FROM ITEMREQUESTDEBT WHERE ITEMREQUESTDEBT.PRODUCTID = ITEMREQUESTPURCHASEPOOL.PRODUCTID),'NO') as 'IS_DEBT' FROM ITEMREQUESTPURCHASEPOOL";
	else if ($type == "TRANSFER")
		$sql = "SELECT *,IFNULL((SELECT 'YES' FROM ITEMREQUESTDEBT WHERE ITEMREQUESTDEBT.PRODUCTID = ITEMREQUESTTRANSFERPOOL.PRODUCTID),'NO') as 'IS_DEBT' FROM ITEMREQUESTTRANSFERPOOL";	
	else if ($type == "TRANSFERFRESH")
		$sql = "SELECT *,IFNULL((SELECT 'YES' FROM ITEMREQUESTDEBT WHERE ITEMREQUESTDEBT.PRODUCTID = ITEMREQUESTTRANSFERFRESHPOOL.PRODUCTID),'NO') as 'IS_DEBT' FROM ITEMREQUESTTRANSFERFRESHPOOL";	
	else if ($type == "TRANSFERBACK")
		$sql = "SELECT * FROM ITEMREQUESTTRANSFERBACKPOOL";	
	else if ($type == "DEBT")
		$sql = "SELECT * FROM ITEMREQUESTDEBT";	
	
	if ($userid != null)
	{
		$sql .= " WHERE USERID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($userid));
	}
	else
	{		
		$req = $db->prepare($sql);
		$req->execute(array());
	}
	
	
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$IDS = extractIDS($items);

	$sql = "SELECT PACKINGNOTE,VENDNAME,BARCODE,
				(SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ICPRODUCT.PRODUCTID) as 'STOREBIN1',
				replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME' 
				FROM ICPRODUCT,APVENDOR 
				WHERE ICPRODUCT.VENDID = APVENDOR.VENDID
				AND BARCODE in ".$IDS;	
	$req = $dbBlue->prepare($sql);
	$req->execute(array());		
	$itemsWithDetails = $req->fetchAll(PDO::FETCH_ASSOC);	
	$INDEX = array();
	foreach($itemsWithDetails as $item2)
		$INDEX[$item2["BARCODE"]] = $item2;

	$itemsNEW = array();
	foreach($items as $newItem){
			if (!isset($INDEX[$newItem["PRODUCTID"]]))
				continue;
			$newItem["PACKINGNOTE"] = $INDEX[$newItem["PRODUCTID"]]["PACKINGNOTE"];
			$newItem["VENDNAME"] = $INDEX[$newItem["PRODUCTID"]]["VENDNAME"];
			$newItem["PRODUCTNAME"] = $INDEX[$newItem["PRODUCTID"]]["PRODUCTNAME"];		
			$newItem["STOREBIN1"] = $INDEX[$newItem["PRODUCTID"]]["STOREBIN1"];
			array_push($itemsNEW,$newItem);
	}	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $itemsNEW;
	$response = $response->withJson($resp);

	return $response;	
});

$app->post('/itemrequestitemspool/RESTOCK', function(Request $request,Response $response) {	

		$db = getInternalDatabase();
		$dbBlue = getDatabase();		
		$json = json_decode($request->getBody(),true);	
		$errors = array();
		$AUTHOR = "";
		$userid = $json["USERID"];
		if(isset($json["AUTHOR"]))
			$AUTHOR = $json["AUTHOR"];
		if (!isset($json["ITEMS"]))
		{
			$item["PRODUCTID"] = $json["PRODUCTID"];		
			$item["REQUEST_QUANTITY"] = $json["REQUEST_QUANTITY"];									
			$items = array($item);

		}else{			
			$items = $json["ITEMS"];
		}
		$message = "";
		foreach($items as $item)
		{		
			if ($item["PRODUCTID"] == null || $item["PRODUCTID"] == "")
				continue;		
			// TEST PRODUCT EXISTENCE		
			$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res == false){
				$message .= "\n".$item["PRODUCTID"]." Not Found";
				continue;
			} 						

			$sql = "DELETE FROM ITEMREQUESTRESTOCKPOOL where PRODUCTID =  ? AND LISTNAME = ?"; // to avoid double
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$json["LISTNAME"]));								

			$sql = "SELECT PACKINGNOTE,VENDNAME,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME' 
			FROM ICPRODUCT,APVENDOR 
			WHERE ICPRODUCT.VENDID = APVENDOR.VENDID
			AND BARCODE = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res == false){
				$vendname = $res["VENDNAME"];
				$packingnote = $res["PACKINGNOTE"];
			}
			else {				
				$vendname = "N/A";
				$packingnote = "N/A";
			}			
			$sql = "INSERT INTO ITEMREQUESTRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,VENDNAME,PACKINGNOTE,LISTNAME,USERID) values(?,?,?,?,?,?)";
			$req = $db->prepare($sql);				
			
			$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$vendname,$packingnote,$json["LISTNAME"],$userid));																						
		}	
	if($message != "")
		$data["message"] = $message;	
	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->post('/itemrequestitemspool/PURCHASE', function(Request $request,Response $response) {			
		$db = getInternalDatabase();
		$dbBlue = getDatabase();		
		$json = json_decode($request->getBody(),true);	
	
		$orderstats = orderStatistics($json["PRODUCTID"]);			
		$userid = $json["USERID"];
		$sql = "DELETE FROM ITEMREQUESTPURCHASEPOOL where PRODUCTID =  ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));								

		if(isset($json["SPECIALQTY"]) && isset($json["REASON"]))
		{
				$sql = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY,SPECIALQTY,REASON,USERID) values(?,?,?,?,?)";
				$req = $db->prepare($sql);				
				$req->execute(array($json["PRODUCTID"],$json["SPECIALQTY"],$json["SPECIALQTY"],$json["REASON"],$userid));
		}
		else{
				$sql = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY,USERID) values(?,?,?)";
				$req = $db->prepare($sql);				
				$req->execute(array($json["PRODUCTID"],$json["REQUEST_QUANTITY"],$userid));																	
		}	
		$data["result"] = "OK";
		$response = $response->withJson($data);
		return $response;

});

$app->post('/itemrequestitemspool/{type}', function(Request $request,Response $response) {	
	
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	



	$suffix = "";		
	if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($type == "TRANSFERBACK")
		$tableName = "ITEMREQUESTTRANSFERBACKPOOL";
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$tableName = "ITEMREQUESTDEMANDPOOL";
		$suffix = " AND USERID = ".$userid;
	}

	$sql = "DELETE FROM ".$tableName." WHERE PRODUCTID = ?".$suffix;
	$req = $db->prepare($sql);	
	$req->execute(array($json["PRODUCTID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);	

	if ($suffix == ""){
		if(isset($json["USERID"]))
			$userid = $json["USERID"];
		else
			$userid = null;
		$sql = "INSERT INTO ".$tableName." (PRODUCTID,REQUEST_QUANTITY,USERID) values(?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["REQUEST_QUANTITY"],$userid));		
	}
	else{
		$sql = "INSERT INTO ".$tableName." (PRODUCTID,REQUEST_QUANTITY,USERID) values(?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["REQUEST_QUANTITY"],$userid));		
	}	
	
	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

// DELETE ITEM

$app->delete('/itemrequestitemspool/{type}', function(Request $request,Response $response) {	
	$db = getInternalDatabase();
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	
	
	if (isset($json["USERID"]))
		$userid = $json["USERID"];
	else
		$userid = null;

	$suffix = "";
	if ($type == "RESTOCK")
		$tableName = "ITEMREQUESTRESTOCKPOOL";
	else if($type == "PURCHASE")
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($type == "TRANSFERFRESH")
		$tableName = "ITEMREQUESTTRANSFERFRESHPOOL";	
	else if($type == "TRANSFERBACK")
		$tableName = "ITEMREQUESTTRANSFERBACKPOOL";
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$tableName = "ITEMREQUESTDEMANDPOOL";	
		$suffix = " AND USERID = ".$userid;
	}

	if ($type == "RESTOCK")
	{
		$sql = "DELETE FROM ".$tableName." WHERE PRODUCTID = ? AND LISTNAME = ? AND USERID = ?";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["LISTNAME"],$userid));
	}
	else 
	{
		$sql = "DELETE FROM ".$tableName." WHERE USERID = ? AND PRODUCTID = ?".$suffix;	
		$req = $db->prepare($sql);
		$req->execute(array($userid,$json["PRODUCTID"]));	
	}
	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

$app->put('/itemrequestrestockpool/{id}', function(Request $request,Response $response) {
	
	$db = getInternalDatabase();	
	$id = $request->getAttribute('id');
	$json = json_decode($request->getBody(),true);	
	$listname = $json["LISTNAME"];

	if (isset($json["USERID"]))
		$userid = $json["USERID"];
	else
		$userid = null;

	$sql = "UPDATE ITEMREQUESTRESTOCKPOOL SET LISTNAME = ? WHERE ID = ? AND USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($listname,$id,$userid));

	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;
});

// UPDATE
$app->put('/itemrequestitemspool/{type}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$type = $request->getAttribute('type');
	$json = json_decode($request->getBody(),true);	
	$suffix = "";

	if (isset($json["USERID"]))
		$userid = $json["USERID"];
	else
		$userid = null;

	if ($type == "RESTOCK")
		$tableName = "ITEMREQUESTRESTOCKPOOL";
	else if($type == "PURCHASE")
		$tableName = "ITEMREQUESTPURCHASEPOOL";
	else if($type == "TRANSFER")
		$tableName = "ITEMREQUESTTRANSFERPOOL";
	else if($type == "TRANSFERFRESH")
		$tableName = "ITEMREQUESTTRANSFERFRESHPOOL";
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
			$data["result"] = "KO";
			$data["message"] = "Update Qty greather than onHand (" . $res["LOCONHAND"] . ")" ;
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
			$data["result"] = "KO";
			$data["message"] = "Update Qty greather than onHand (" . $res["LOCONHAND"] . ")" ;
			$response = $response->withJson($data);
			return $response;
		}
	}

	if ($type == "RESTOCK")
	{
		$sql = "UPDATE ITEMREQUESTRESTOCKPOOL SET REQUEST_QUANTITY = ?,COMMENT =  ? WHERE PRODUCTID = ? AND LISTNAME = ? AND USERID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["REQUEST_QUANTITY"],$json["COMMENT"],$json["PRODUCTID"],$json["LISTNAME"],$userid));	
	}
	else
	{
		$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ?,COMMENT = COMMENT || ' ' || ? WHERE USERID = ? AND PRODUCTID = ?".$suffix;
		$req = $db->prepare($sql);
		$req->execute(array($json["REQUEST_QUANTITY"],$userid,$json["PRODUCTID"],$json["COMMENT"]));	
	}
	
	$data["result"] = "OK";
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
	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $records;
	$response = $response->withJson($resp);

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
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',				
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
						
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;	
});

$app->get('/itemzerostock',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);
	
	$start = 0;
	$end = 100000;
	
	$sql = "SELECT PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',
			COST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
			COLOR,CATEGORYID,ONHAND,WH1,WH2,SALELAST30,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;	
}); 


$app->get('/itemnegative',function(Request $request,Response $response) {    	
	$conn=getDatabase();
	$today = date("Y-m-d");
	$timestamp = strtotime('-30 days');
	$day30before = date("Y-m-d",$timestamp);

	
	$start = 0;
	$end = 100000;

	$sql = "SELECT PRODUCTID,BARCODE,
			replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME',
			replace(replace(replace(PRODUCTNAME1,char(10),''),char(13),''),'\"','') as 'PRODUCTNAME1',
			COST,AVGCOST,PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,OTHER_ITEMCODE,
			COLOR,CATEGORYID,ONHAND,WH1,WH2,SALELAST30,PRICE,LASTRECEIVEDATE,LASTSALEDATE,DA
			FROM
			(SELECT ROW_NUMBER() OVER (ORDER BY PRODUCTID) as SEQ ,PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,
			(SELECT( sum(TRANCOST * TRANQTY) / sum(TRANQTY)) FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID )  as 'AVGCOST', 
			PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
			,(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANTYPE = 'R' ORDER BY ICTRANDETAIL.COLID DESC) as 'LASTCOST'
			
			,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE'
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE'			
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE DOCNUM LIKE 'IS%' AND TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0) as 'TOTALTHROWN'
			, (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID),0)) as 'PERCENTSALE'		
			,ISNULL((SELECT TOP(1) DISCOUNT_VALUE FROM dbo.ICNEWPROMOTION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY dbo.ICNEWPROMOTION.COLID DESC),0) as 'DISCPERCENT'
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newResult;
	$response = $response->withJson($resp);

	return $response;	
}); 
 
$app->get('/barcode/{categoryname}', function(Request $request, Response $response){

	$categoryname = $request->getAttribute('categoryname');		
	$generated =  GenerateCategoryNumberByName($categoryname,1);	
	if ($generated != "" && $generated != null){
		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $generated;
		$response = $response->withJson($resp);	
	}
	else{
		$resp = array();
		$resp["result"] = "KO";
		$resp["message"] = "Wrong category name";
		$response = $response->withJson($resp);	
	}	
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
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
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
	
	$data["SPENDING"] = $paidAMT;
	$data["SALE_AMT"] = $saleAMT;
	$data["MARGIN"] = $saleAMT - $paidAMT;

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
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
	
	$data["SPENDING"] = $paidAMT;
	$data["SALE_AMT"] = $saleAMT;
	$data["MARGIN"] = $saleAMT - $paidAMT;

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/bank', function(Request $request, Response $response){
	$db=getDatabase();
	$sql = "SELECT * FROM RPT_TRIALBALANCE WHERE TYPEENG = 'Bank'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result =$req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/sale/{date}',function(Request $request,Response $response) {   
	$conn=getDatabase();
	$date = $request->getAttribute('date'); 
	//$splitted = explode('/',$date);
	//$date = $splitted[1] . "/" . $splitted[0] . "/" . $splitted[2];
	$date = str_replace("-","/",$date);
	
	$sql = "SELECT isnull((SUM(TOTAL_AMT) - SUM(COST * QTY)),0) AS PROFIT, isnull(SUM(TOTAL_AMT),0) AS SALE
			FROM POSDETAIL 			
			WHERE POSDATE >= '".$date." 00:00:00.000' 
			AND POSDATE <= '".$date." 23:59:59.999'
			AND CUSTID NOT IN (".clientToExclude().");
			";	

	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetch(PDO::FETCH_ASSOC);	
	if ($result != false){
				
		$result["PROFIT"] = round($result["PROFIT"],4); 
		$result["SALE"] = round($result["SALE"],4); 
	
	}else{
		$result["PROFIT"] = "0";
		$result["SALE"] = "0";

	}
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;	
});

$app->get('/salereport',function(Request $request,Response $response) {   
	
	$db=getDatabase();	
	$date = $request->getParam('date','');
	$category = $request->getParam('category','ALL');
	
	$from = $date . ' 00:00:00.000';
	$to = $date . ' 23:59:59.999';
	$sql = "SELECT 
	POSDETAIL.PRODUCTID
	,POSDETAIL.PRODUCTNAME
	,POSDETAIL.PRODUCTNAME1
	,ICPRODUCT.PRICE
	, isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 4))   FROM PORECEIVEDETAIL WHERE PRODUCTID = POSDETAIL.PRODUCTID ORDER BY TRANDATE DESC),LASTCOST) as 'COST'
	,POSDETAIL.CATEGORYID
	,ICPRODUCT.COLOR	
	,(SELECT LOCONHAND FROM ICLOCATION  WHERE LOCID = 'WH1' AND ICLOCATION.PRODUCTID = POSDETAIL.PRODUCTID) as  'WH1'
	,(SELECT LOCONHAND FROM ICLOCATION  WHERE LOCID = 'WH2' AND ICLOCATION.PRODUCTID = POSDETAIL.PRODUCTID) as  'WH2'
	,VENDNAME
	,SUM(POSDETAIL.QTY) AS 'COUNT'
	FROM POSDETAIL,ICPRODUCT,APVENDOR
	WHERE POSDETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
	AND APVENDOR.VENDID = ICPRODUCT.VENDID
	AND POSDATE >=  ?
	AND POSDATE <= ?";
	if($category != 'ALL')
	{
		$sql .= " AND POSDETAIL.CATEGORYID = ?";
		$params = array($from,$to,$category);		
	}else{		
		$params = array($from,$to);
	}	
	$sql .=	" GROUP BY POSDETAIL.PRODUCTID,POSDETAIL.PRODUCTNAME,POSDETAIL.PRODUCTNAME1,ICPRODUCT.PRICE,APVENDOR.VENDNAME,POSDETAIL.CATEGORYID,ICPRODUCT.COLOR,ICPRODUCT.LASTCOST
			  ORDER BY COUNT DESC";

	$req = $db->prepare($sql);
	$req->execute($params);
	$items = $req->fetchAll(PDO::FETCH_ASSOC);		
	$result["ITEMS"] = $items;

	// SALE 
	
	if($category == 'ALL'){
		$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
					FROM POSDETAIL 			
					WHERE POSDATE >= ?
					AND POSDATE <= ?
					AND CUSTID NOT IN (".clientToExclude().")";	
		$req = $db->prepare($sql);
		$req->execute(array($from,$to));
	}else{
		$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
					FROM POSDETAIL 			
					WHERE POSDATE >= ?
					AND POSDATE <= ?
					AND CATEGORYID = ?
					AND CUSTID NOT IN (".clientToExclude().")";	
		$req = $db->prepare($sql);
		$req->execute(array($from,$to,$category));
	}
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res["PROFIT"] != 0 && $res["PROFIT"] != "0"){
		$left = explode('.',$res["PROFIT"])[0];
		$right = explode('.',$res["PROFIT"])[1];
		$profit = $left.".".substr($right, 0,2);
	}else{
		$profit = "N/A"; 
	}

	if ($res["SALE"] != 0 && $res["SALE"] != "0"){
		$left = explode('.',$res["SALE"])[0];
		$right = explode('.',$res["SALE"])[1];
		$sale = $left.".".substr($right, 0,2);
	}else{
		$sale = "N/A";
	}

	$result["PROFIT"] = $profit;
	$result["SALE"] = $sale;
	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	$sql = "SELECT ONHAND,PRODUCTNAME,PRODUCTNAME1,PRICE,LASTCOST,CATEGORYID,CLASSID  FROM dbo.ICPRODUCT WHERE BARCODE = ? ";
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
	$userBLUE = blueUser($author);
	
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
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $totalresp;
	$response = $response->withJson($resp);

	return $response;	
});

$app->get('/freshsales',function(Request $request,Response $response) {    	
	$conn=getDatabase();

	$day = $request->getParam('day','');
	if ($day == '')
		$day = date("Y-m-d");
		
	$sql =  "SELECT  PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,VENDNAME,
			ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
			ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
			
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE',
	ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE',
	ISNULL( (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH1' ) ,'N/A') 
	as 'STOREBIN1',
	ISNULL( (SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM ICLOCATION WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND LOCID = 'WH2' ) ,'N/A') 
	as 'STOREBIN2',
	(SELECT TOP(1) PPSS_DELIVERED_EXPIRE FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY RECEIVE_DATE DESC) as 'EXPIRATION',
	(SELECT VENDNAME FROM APVENDOR WHERE VENDID =  dbo.ICPRODUCT.VENDID) as 'VENDNAME'
  		
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

	$indb = 


	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
	$req = $conn->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;	
});


$app->get('/itemtest',function($request,Response $response) {
	$db=getDatabase();
	$sql = "
		SELECT TOP (100)
		 PRODUCTID
		,PRODUCTNAME
		,PRODUCTNAME1
		,PRICE
		,COST
		,CATEGORYID
		,COLOR
		FROM ICPRODUCT 
		";
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;	
});

// Best Seller Selection
$app->get('/selection',function($request,Response $response) {
	$db=getDatabase();
	$json = json_decode($request->getBody(),true);
	
	$sql = "
		SELECT TOP (100)
		 dbo.POSDETAIL.PRODUCTID
		,dbo.POSDETAIL.PRODUCTNAME
		,dbo.POSDETAIL.PRODUCTNAME1
		,dbo.POSDETAIL.PRICE
		,dbo.ICPRODUCT.COST
		,dbo.POSDETAIL.CATEGORYID
		,dbo.ICPRODUCT.COLOR
		,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE'
		,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE'
		, (select ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID) * -1),0)  * 100 / ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID),0)) as 'PERCENTSALE'		
		,(SELECT TOP(1) (PRICE_ORI - PRICE) FROM [PhnomPenhSuperStore2019].[dbo].ICPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID ORDER BY ICPROMOTION.COLID DESC) as 'DISCAMOUNT' 
		,(SELECT TOP(1) DISCOUNT_VALUE FROM [PhnomPenhSuperStore2019].[dbo].ICNEWPROMOTION WHERE PRODUCTID = dbo.POSDETAIL.PRODUCTID ORDER BY ICNEWPROMOTION.COLID DESC) as 'DISCPERCENT'
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
	$req = $db->prepare($sql);
	$req->execute(array());
	$result = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

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
		,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE'
		,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.POSDETAIL.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE'
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

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);

	return $response;	
});

$app->get('/info',function(Request $request,Response $response){
	phpinfo();	
});


$app->get('/depleteditems', function($request,Response $response) {
	$db=getDatabase();
	$sql = "SELECT ICPRODUCT.PRODUCTID,PRICE,
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
		AND ICLOCATION.ORDERPOINT > 0					
		AND PPSS_IS_BLACKLIST IS NULL
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRICE";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/depleteditemsbyvendor/{vendorid}', function($request,Response $response) {
	$vendorid = $request->getAttribute('vendorid');

	$db=getDatabase();	
	$sql = "SELECT ICPRODUCT.PRODUCTID,PRICE,
		replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'PRODUCTNAME', 
		ICLOCATION.ORDERPOINT,LASTCOST,LASTRECEIVEDATE,ICPRODUCT.TOTALSALE,
		ISNULL((SELECT TOP(1) TRANQTY FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = ICPRODUCT.PRODUCTID ORDER BY COLID DESC),0) as 'LASTRECEIVEQTY',		
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2',
		(SELECT replace(replace(VENDNAME,char(39),''),char(34),'') as 'VENDNAME' FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME'
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1
		AND LOCID = 'WH1'
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.ORDERPOINT > 0					
		AND PPSS_IS_BLACKLIST IS NULL
		AND ICPRODUCT.VENDID = ?
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRICE,LASTCOST,LASTRECEIVEDATE,ICPRODUCT.TOTALSALE";
	$req = $db->prepare($sql);
	$req->execute(array($vendorid));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);

	return $response;
});

$app->get('/penalty',function($request,Response $response) {
	$barcode  = $request->getParam('barcode','');
	$expiration = $request->getParam('expiration','');
	$data = calculatePenalty($barcode,$expiration);
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
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
									PROMOTION
									PROMOTION
									PROMOTION								
																				*/      
//
$app->get('/selfpromotionalert', function($request,Response $response) {
	$db = getInternalDatabase();	
	$blueDB = getDatabase();

	$userid = $request->getParam('USERID',null);		

	$sql = "SELECT * FROM SELFPROMOTIONITEM WHERE STATUS = 'STEP1' OR STATUS = 'STEP2' OR STATUS = 'STEP3' OR STATUS = 'STEP4'
			AND DATE() < EXPIRATION ";

	if ($userid != null){
		$sql2 = "SELECT location from USER WHERE ID = ?";
		$req = $db->prepare($sql2);
		$req->execute(array($userid));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$params = array();
		if ($res["location"] != 'ALL'){
			$locations = explode("|",$res["location"]);
			$count = 0;			
			foreach($locations as $location){
				if ($count == 0){
					$sql .= " AND (LOCATION LIKE ? ";	
					array_push($params,'%'.$location.'%');
				}else{
					$sql .= " OR LOCATION LIKE ? ";	
					array_push($params,'%'.$location.'%');
				}
				$count++;
			}
			$sql .= ")";			
		}	
		$req = $db->prepare($sql);
		$req->execute($params);
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
	}else{
		$req = $db->prepare($sql);
		$req->execute(array());
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
	}		
	

	$newItems = array();
	foreach($items as $item){		
		$imgfolder = "./img/promo_proofs/";					
		$nbproofs = 0;
		$count = 1;
		while(file_exists($imgfolder.$item["ID"]."_".$count.".png")){
			$nbproofs++;
			$count++;        	    
		}
		$item["NBPROOFS"] = $nbproofs;
		$sql = "SELECT PRODUCTNAME,STKUM,PRICE,LASTCOST, 
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'	
				FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["STKUM"] = $res["STKUM"];
			$item["PRICE"] = $res["PRICE"];	
			$item["COST"] = $res["LASTCOST"];
			$item["WH1"] = $res["WH1"];		
			$item["WH2"] = $res["WH2"];
		}		
	
		$now = date("Y-m-d");	

		$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ";
		$req = $blueDB->prepare($sql);
		if($item["STARTTIME2"] != null){
			$req->execute(array($item["PRODUCTID"],$item["STARTTIME1"],$item["STARTTIME2"]));							
		}else{
			$req->execute(array($item["PRODUCTID"],$item["STARTTIME1"],$now));							
		}
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$item["SOLDINPERIOD1"] = $res["QTY"];
		if ($item["SOLDINPERIOD1"] == null)
			$item["SOLDINPERIOD1"] = "0";

		if($item["STARTTIME2"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ";
			$req = $blueDB->prepare($sql);
			if($item["STARTTIME3"] != null)
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME2"],$item["STARTTIME3"]));						
			else
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME2"],$now));						
			
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["SOLDINPERIOD2"] = $res["QTY"];
			if ($item["SOLDINPERIOD2"] == null)
				$item["SOLDINPERIOD2"] = "0";
		}else{
			$item["SOLDINPERIOD2"] = "N/A";
		}

		if($item["STARTTIME3"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ";
			$req = $blueDB->prepare($sql);

			if($item["STARTTIME4"] != null)
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME3"],$item["STARTTIME4"]));		
			else
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME3"],$now));		
			$res = $req->fetch(PDO::FETCH_ASSOC);			
			$item["SOLDINPERIOD3"] = $res["QTY"];
			if ($item["SOLDINPERIOD3"] == null)
				$item["SOLDINPERIOD3"] = "0";
		}else{
			$item["SOLDINPERIOD3"] = "N/A";
		}

		if($item["STARTTIME4"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ";
			$req = $blueDB->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["STARTTIME4"],$item["EXPIRATION"]));			
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["SOLDINPERIOD4"] = $res["QTY"];
			if ($item["SOLDINPERIOD4"] == null)
				$item["SOLDINPERIOD4"] = "0";
		}else{
			$item["SOLDINPERIOD4"] = "N/A";
		}
		array_push($newItems,$item);
	}

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newItems;
	$response = $response->withJson($resp);
	return $response;
});


$app->get('/selfpromotionitemstats',function(Request $request,Response $response) {    
	$conn=getDatabase();	 
	
	$item = null;
	$barcode = $request->getParam('barcode','');		
	$expiration = $request->getParam('expiration','');
	$type = $request->getParam('type','');
	

	$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,COLOR,SIZE,VENDID	
		  FROM dbo.ICPRODUCT  
	      WHERE BARCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($barcode));
	$item =$req->fetch(PDO::FETCH_ASSOC);
		
	$resp = array();
	if($item != false)
	{		
		if(isset($item["COST"]))
			$item["COST"] = sprintf("%.4f",$item["COST"]);
		else 
			$item["COST"] = "0";
		
			$sql="
		SELECT LOCONHAND,STORBIN,ORDERQTY 
		FROM dbo.ICLOCATION  
		WHERE LOCID = 'WH1' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item1=$req->fetch();

		if ($item1 != false){
			$item["WH1"] = $item1["LOCONHAND"];
			$item["STOREBIN1"] = $item1["STORBIN"];
			
		}else{
			$item["WH1"] = "";
			$item["STOREBIN1"] = "";			
		}
		$sql="SELECT LOCONHAND,STORBIN 
			  FROM dbo.ICLOCATION  
			  WHERE LOCID = 'WH2' AND PRODUCTID = ?";
		$params = array($barcode);
		$req=$conn->prepare($sql);
		$req->execute($params);
		$item2=$req->fetch();

		if ($item2 != false){
			$item["WH2"] = $item2["LOCONHAND"];
			$item["STOREBIN2"] = $item2["STORBIN"];	
		}else{
			$item["WH2"] = "";
			$item["STOREBIN2"] = "";	
		}	
		$item["OCCUPANCY"] = getProductOccupancy($barcode);		
	}
	else
	{
		$packInfo = packLookup($barcode);
		if ($packInfo != null) // IS  A PACK
		{			
			$packcode = $barcode;		
			$result = itemLookup($packInfo["PRODUCTID"]);
			$result["BARCODE"] = $packcode;			
			$result["PICTURE"] = base64_encode($packInfo["PICTURE"]);
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];
			$result["EXPIRED_DATE"] = $packInfo["EXPIRED_DATE"];
			$result["DISC"] = $packInfo["DISC"];
			$result["PRODUCTNAME"] = $packInfo["DESCRIPTION1"];
			$result["PRODUCTNAME1"] = $packInfo["DESCRIPTION2"];
			$result["PRICE"] = $packInfo["SALEPRICE"];	
			$result["SALEFACTOR"] = $packInfo["SALEFACTOR"];	
			// PICTURE PACK
			$result["ISPACK"] = "PACK";
			// OCCUPANCY
			$item["OCCUPANCY"] = getProductOccupancy($packInfo["PRODUCTID"]);	
			$item = $result; 

			$resp["result"] = "OK";
			$resp["data"] = $item;
		}
		else{
			$resp["message"] = "Code not found";
			$resp["result"] = "KO";
			$response = $response->withJson($resp);
			return $response;
		}						
	}	


	if ($item != null)
	{		
		$stats = calculatePenalty($barcode,$expiration,$type);
		$item["STATUS"] = $stats["status"];
		$item["PERCENTPENALTY"] = $stats["percentpenalty"];	
		$item["PERCENTPROMO"] = $stats["percentpromo"];	
		$item["START"] = $stats["start"];
		$item["END"] = $stats["end"];
		$item["POLICY"]	= $stats["policy"];
		$item["COST"] = round($stats["cost"],4);					
		$resp["result"] = "OK";
		$resp["data"] = $item;
	}	

	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/selfpromotion/{id}', function($request,Response $response) {
	$db = getInternalDatabase();	
	$id = $request->getAttribute('id');
	$sql = "DELETE FROM SELFPROMOTIONITEM WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/selfpromotion', function($request,Response $response) {
	$status =  $request->getParam('status','');
	$type =  $request->getParam('type','');
	$userid = $request->getParam('USERID',null);
	
	$db = getInternalDatabase();	
	$blueDB = getDatabase();
	$params = array();	
	$sql = "";

	$sql = "SELECT *,(JULIANDAY(EXPIRATION) - JULIANDAY(STARTTIME1)) as 'DELAYTOEXPIRE1',  
					 (JULIANDAY(EXPIRATION) - JULIANDAY(STARTTIME2)) as 'DELAYTOEXPIRE2',  
					 (JULIANDAY(EXPIRATION) - JULIANDAY(STARTTIME3)) as 'DELAYTOEXPIRE3',  
					 (JULIANDAY(EXPIRATION) - JULIANDAY(STARTTIME4)) as 'DELAYTOEXPIRE4'
					 FROM SELFPROMOTIONITEM
					 WHERE 1 = 1 ";  					 
		
	if ($status != ''){
		$sql .= " AND status = ?";
		array_push($params ,$status);
	}	
	if ($type != ''){
		$sql .= " AND type = ?";
		array_push($params ,$type);
	}
	$sql .= " AND CREATED > date('now','-45 day')";

	if ($userid != null){
		$sql2 = "SELECT location from USER WHERE ID = ?";
		$req = $db->prepare($sql2);
		$req->execute(array($userid));
		$res = $req->fetch(PDO::FETCH_ASSOC);				
		if ($res["location"] != 'ALL' && $userid != "66" && $userid != "10")
		{
			$locations = explode("|",$res["location"]);
			$count = 0;			
			foreach($locations as $location){
				if ($count == 0){
					$sql .= " AND (LOCATION LIKE ? ";	
					array_push($params,'%'.$location.'%');
				}else{
					$sql .= " OR LOCATION LIKE ? ";	
					array_push($params,'%'.$location.'%');
				}
				$count++;
			}
			$sql .= ")";			
		}
		$req = $db->prepare($sql);
		$req->execute($params);
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
	}
	else
	{
		$req = $db->prepare($sql);
		$req->execute($params);
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
	}
		
	$newItems = array();
	foreach($items as $item){		
		$imgfolder = "./img/promo_proofs/";					
		$nbproofs = 0;
		$count = 1;
		while(file_exists($imgfolder.$item["ID"]."_".$count.".png")){
			$nbproofs++;
			$count++;        	    
		}
		$item["NBPROOFS"] = $nbproofs;
		$sql = "SELECT PRODUCTNAME,STKUM,PRICE,LASTCOST, 
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'	
				FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["STKUM"] = $res["STKUM"];
			$item["PRICE"] = $res["PRICE"];	
			$item["COST"] = $res["LASTCOST"];
			$item["WH1"] = $res["WH1"];		
			$item["WH2"] = $res["WH2"];
		}		
	
		if($item["DELAYTOEXPIRE1"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ORDER BY POSDATE ASC";
			$req = $blueDB->prepare($sql);
			if ($item["STARTTIME2"] != $item["EXPIRATION"])
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME1"],$item["STARTTIME2"]));
			else 
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME1"],$item["EXPIRATION"]));
				
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["SOLDINPERIOD1"] = $res["QTY"];
		}

		if($item["DELAYTOEXPIRE2"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ORDER BY POSDATE ASC";
			$req = $blueDB->prepare($sql);
			if ($item["STARTTIME2"] != $item["EXPIRATION"])
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME2"],$item["STARTTIME3"]));
			else 
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME2"],$item["EXPIRATION"]));				
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["SOLDINPERIOD2"] = $res["QTY"];
		}

		if($item["DELAYTOEXPIRE3"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ORDER BY POSDATE ASC";
			$req = $blueDB->prepare($sql);
			if ($item["STARTTIME3"] != $item["EXPIRATION"])
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME3"],$item["STARTTIME4"]));
			else 
				$req->execute(array($item["PRODUCTID"],$item["STARTTIME3"],$item["EXPIRATION"]));				
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["SOLDINPERIOD3"] = $res["QTY"];
		}

		if($item["DELAYTOEXPIRE4"] != null){
			$sql = "SELECT SUM(QTY) as QTY FROM POSDETAIL WHERE PRODUCTID = ? AND POSDATE >=  ? AND POSDATE <= ? ORDER BY POSDATE ASC";
			$req = $blueDB->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["STARTTIME4"],$item["EXPIRATION"]));			
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["SOLDINPERIOD4"] = $res["QTY"];
		}
		$item["OCCUPANCY"] = getProductOccupancy($item["PRODUCTID"]);
		array_push($newItems,$item);
	}

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newItems;
	$response = $response->withJson($resp);
	return $response;
});



$app->post('/selfpromotionitems', function($request,Response $response) {

	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();	

	$author = $json["AUTHOR"];
	$items = $json["ITEMS"];
	$userid = $json["USERID"];
	$now = date("Y-m-d");	
	foreach($items as $item){
	
		$db->beginTransaction();    
		
		$sql = "INSERT INTO SELFPROMOTIONITEM (PRODUCTID,QUANTITY1,EXPIRATION,STARTTIME1,LINKTYPE1,
		PERCENTPENALTY,PERCENTPROMO1,TYPE,CREATOR,STATUS,
		LOCATION) 
		VALUES (?,?,?,?,?,
				?,?,?,?,?,
				?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["QUANTITY"],$item["EXPIRATION"],$now,$item["LINKTYPE"],
		$item["PERCENTPENALTY"],$item["PERCENTPROMO"],$item["TYPE"],$author,'CREATED',
		($item["LOCATION"]??"") ));

		$lastId = $db->lastInsertId();
		$db->commit();    
		$count = 1;		
		$startnb = countOccurence("PROMO",$lastId) + 1;	
		while(file_exists("./img/promopool_proofs/".$item["ID"]."_".$count.".png"))
	  	{	        		       
		 rename("./img/promopool_proofs/".$item["ID"]."_".$count.".png",
				  "./img/promo_proofs/".$lastId."_".$startnb.".png");		          
		 $startnb++;	      	      	        
		 $count++;        
	  	}				
	}
	sendPushToUser("SELFPROMOTION","New promotion to validate",66);	

	$sql = "DELETE FROM SELFPROMOTIONITEMPOOL WHERE USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($userid));

	$resp["result"] = "OK";
	$response = $response->withJson($resp);	
	return $response;
});

$app->put('/selfpromotionstatus', function($request,Response $response) {
	
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$id = $json["ID"];
	$status = $json["STATUS"];
	$author = $json["AUTHOR"];
	$today = date("Y-m-d");
	
	$sql = "SELECT * FROM SELFPROMOTIONITEM WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id)); 
	$item = $req->fetch(PDO::FETCH_ASSOC);	

	$sql = "SELECT * FROM USER WHERE LOCATION LIKE ?"; 
	$req = $db->prepare($sql);
	$req->execute(array("%".($item["LOCATION"] ?? "")."%"));
	$userstopush = $req->fetchAll(PDO::FETCH_ASSOC);

	if ($status == "VALIDATED"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'VALIDATED',VALIDATOR = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));

		foreach($userstopush as $user){
			sendPushToUser("PROMOTION","Promotion with id ".$id." was validated",$user["ID"]);
		}
	}
	else if ($status == "VALIDATEDWITHUPDATE"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'VALIDATED',VALIDATOR = ?,PERCENTPROMO1 = ?  WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$json["NEWPERCENT"],$id));

		foreach($userstopush as $user){
			sendPushToUser("PROMOTION","Promotion with id ".$id." was validated with update",$user["ID"]);
		}
	}
	else if ($status == "DENIED"){		
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'DENIED',VALIDATOR = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));	

		foreach($userstopush as $user){
			sendPushToUser("PROMOTION","Promotion with id ".$id." was denied",$user["ID"]);
		}	
	}
	else if ($status == "PROMOTED"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'STEP1' WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));
		$in30days = strtotime('+30 days');
		$in30days = date("Y-m-d",$in30days);
		if ($item["LINKTYPE1"] == "SYSTEM")
			attachPromotion($item["PRODUCTID"],$item["PERCENTPROMO1"],$today,$in30days,$author);	
	}else if ($status == "FINISHED"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'FINISHED' WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));
		endPromotion($item["PRODUCTID"]);
	}
	$resp = array();
	$resp["result"] = "OK";
	$response = $response->withJson($resp);		
	return $response;
});


// Declare next step 
$app->put('/selfpromotionitemstep', function($request,Response $response) {
	
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	$id = $json["ID"];
	$author = $json["AUTHOR"];	
	$step = $json["STEP"];

	$today = date("Y-m-d");
	$in30days = strtotime('+30 days');
	$in30days = date("Y-m-d",$in30days);

	$QUANTITY = $json["QUANTITY"];
	$LINKTYPE = $json["LINKTYPE"];
	$PRODUCTID = $json["PRODUCTID"];	
	$PERCENTPROMO = $json["PERCENTPROMO"];

	$sql = "SELECT EXPIRATION FROM SELFPROMOTIONITEM WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$EXPIRE = $res["EXPIRATION"];

	if ($step == "2"){
		$sql = "UPDATE SELFPROMOTIONITEM SET QUANTITY2 = ?,LINKTYPE2 = ?,
		STARTTIME2 = date('now'), PERCENTPROMO2 = ?,STATUS = 'STEP2' WHERE ID = ?";		
	}else if($step == "3"){
		$sql = "UPDATE SELFPROMOTIONITEM SET QUANTITY3 = ?,LINKTYPE3 = ?,
		STARTTIME3 = date('now'),  PERCENTPROMO3 = ?,STATUS = 'STEP3' WHERE ID = ?";		
	}else if($step == "4"){
		$sql = "UPDATE SELFPROMOTIONITEM SET QUANTITY4 = ?,LINKTYPE4 = ?,
		STARTTIME4 = date('now'),  PERCENTPROMO4 = ?,STATUS = 'STEP4' WHERE ID = ?";		
	}
	$req = $db->prepare($sql);
	$req->execute(array($QUANTITY,$LINKTYPE,$PERCENTPROMO,$id)); 
	if ($LINKTYPE == "SYSTEM"){
		attachPromotion($PRODUCTID,$PERCENTPROMO,$today,$EXPIRE,$author);	
	}
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;																			 
});

$app->get('/selfpromotionitempool/{userid}', function($request,Response $response){
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	$userid = $request->getAttribute('userid');
	$sql = "SELECT * FROM SELFPROMOTIONITEMPOOL WHERE USERID = ?";	
	$req = $db->prepare($sql);
	$req->execute(array($userid));

	$pool = $req->fetchAll(PDO::FETCH_ASSOC);
	$newItems = array();
	foreach($pool as $item){
		$nbproofs = 0;
		$count = 1;
		while(file_exists("./img/promopool_proofs/".$item["ID"]."_".$count.".png")){       							     
	      $nbproofs++;
	      $count++;        	    
	  }
	  $item["NBPROOFS"] = $nbproofs;
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null)
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($newItems,$item);
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newItems;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/selfpromotionitempool', function($request,Response $response){
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	// TODO : On OLd items, retrieve all info 
	$sql = "SELECT TYPE FROM SELFPROMOTIONITEMPOOL WHERE USERID = ? LIMIT 1  ";
	$req = $db->prepare($sql);
	$req->execute(array($json["USERID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res != false)
	{		
		if($res["TYPE"] != $json["TYPE"])
			$ok = false;					
		else if ($res["TYPE"] == $json["TYPE"])
			$ok = true;	
	}
	else {
		$ok = true;
	}
	if ($ok == true){

		$sql = "SELECT STORBIN FROM ICLOCATION WHERE PRODUCTID = ? AND LOCID = 'WH1'";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$storbin = $res["STORBIN"] ?? "";

		$db->beginTransaction();    
		$now = date("Y-m-d");
		$sql = "INSERT INTO SELFPROMOTIONITEMPOOL (PRODUCTID,QUANTITY,EXPIRATION,STARTTIME,LINKTYPE,
													TYPE,PERCENTPROMO,PERCENTPENALTY,STATUS,USERID,
													LOCATION) 
													VALUES (?,?,?,?,?,
															?,?,?,?,?,
															?)";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["EXPIRATION"],$now,$json["LINKTYPE"],
		$json["TYPE"],$json["PERCENTPROMO"],$json["PERCENTPENALTY"],$json["STATUS"],$json["USERID"],
		$storbin));	
		$result["result"] = "OK";
		$lastId = $db->lastInsertId();
		$db->commit();    
		if (isset($json["PROOFS"]))
			pictureRecord($json["PROOFS"],"PROMOPOOLPROOFS",$lastId);
	}
	else{
		$result["message"] = "Different promotion type";
		$result["result"] = "KO";
	}
	$response = $response->withJson($result);
	return $response;
});

$app->delete('/selfpromotionitempool/{id}', function($request,Response $response){	
	$id = $request->getAttribute('id');
	$json = json_decode($request->getBody(),true);

 	$db = getInternalDatabase();		
	$sql = "DELETE FROM SELFPROMOTIONITEMPOOL WHERE ID = ? AND USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id,$json["USERID"]));	

	foreach( glob("./img/promopool_proofs/".$id."_*") as $file ){		
		unlink($file);
	}   
    	
  	
	$result["result"] = "OK";
	$response = $response->withJson($result);

	return $response;
});



// WASTE // 
$app->get('/waste', function($request,Response $response) {
	$type = $request->getParam('type','');
	$status =  $request->getParam('status','');
	$db = getInternalDatabase();	
	$params = array();	
	$sql = "SELECT * FROM WASTE WHERE 1 = 1 ";
	if ($type != '')
	{
		$sql .= " AND TYPE = ?";			
		array_push($params,$type);		
	}
	if ($status != ''){		
		$sql .= "AND STATUS = ? ";
		array_push($params,$status);
	}
	$sql .= " ORDER BY CREATED DESC";
	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/wastedetails/{id}',function($request,Response $response) {
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	$id = $request->getAttribute('id');
	$sql = "SELECT * FROM WASTEITEM WHERE WASTE_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));																			     
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$newItems = array();
	foreach($items as $item)
	{
		$imgfolder = "./img/waste_proofs/";		
		$nbproofs = 0;
		$count = 1;
		while(file_exists($imgfolder.$item["ID"]."_".$count.".png")){
  		$nbproofs++;
  		$count++;        	    
		}
		$item["NBPROOFS"] = $nbproofs;
			$sql = "SELECT PRODUCTNAME,STKUM,PRICE,
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
			isnull((SELECT TOP(1) CAST((TRANCOST - (TRANCOST * (TRANDISC/100))) AS decimal(7, 2))   
			FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC),LASTCOST) as 'LASTCOST'
		FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null){
			error_log("-".$res["WH1"]."-");
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["STKUM"] = $res["STKUM"];
			$item["PRICE"] = $res["PRICE"];	
			$item["LASTCOST"] = $res["LASTCOST"];	
			$item["WH1"] = $res["WH1"] != null  ? $res["WH1"] : "0"  ;
			$item["WH2"] = $res["WH2"] != null  ? $res["WH2"] : "0"  ;
		}else{
			$item["PRODUCTNAME"] = "ITEM NEVER RECEIVED";
			$item["WH1"] = "0";
			$item["WH2"] = "0";
		}	
		array_push($newItems,$item);
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newItems;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/waste', function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	$items = $json["ITEMS"];
	$type = $json["TYPE"];	
	$author = $json["AUTHOR"];
	$userid = $json["USERID"];
	$db->beginTransaction();    
	$sql = "INSERT INTO WASTE (TYPE,CREATOR,STATUS) VALUES (?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($type,$author,"CREATED"));
	$lastId = $db->lastInsertId();
	$db->commit(); 
	if (isset($json["SIGNATURE"]))   
		pictureRecord($json["SIGNATURE"],"WASTE_CREATOR",$lastId);

	foreach($items as $item)
	{			
		$sql = "SELECT * FROM WASTEITEM WHERE EXPIRATION = ? AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["EXPIRATION"],$item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$PRODUCTID = $item["PRODUCTID"];
		$EXPIRATION = isset($item["EXPIRATION"]) ?  $item["EXPIRATION"] : "";
		$QUANTITY = isset($item["QUANTITY"]) ? $item["QUANTITY"] : "";		

		if ($res == false)
		{	
			$db->beginTransaction();    
			$sql = "INSERT INTO WASTEITEM (PRODUCTID,QUANTITY,EXPIRATION,TYPE,WASTE_ID) 
							VALUES (?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($PRODUCTID,$QUANTITY,$EXPIRATION,$item["TYPE"],$lastId));			
			$depreciationItemId =  $db->lastInsertId();
			$db->commit();    
		}
		else
		{			
			$sql = "UPDATE WASTEITEM 
						SET QUANTITY = ?,
							WASTE_ID  = ? 							  
						WHERE PRODUCTID = ? AND EXPIRATION = ?";
			$req = $db->prepare($sql);
			$req->execute(array($QUANTITY,$lastId,$PRODUCTID,$EXPIRATION));		
			$depreciationItemId =  $res["ID"];
		}
		movePicture($depreciationItemId,$item["ID"],"WASTE");					
	}
	sendPushToUser("WASTE","Waste created",18);
	$resp = array();		
	$sql = "DELETE FROM WASTEPOOL where USERID = ?";			
	$req = $db->prepare($sql);
	$req->execute(array($userid));	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/waste', function($request,Response $response) {
			
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();
	$id = $json["ID"];
	$status = $json["STATUS"];
	$author = $json["AUTHOR"];	
	$notes = $json["NOTES"] ?? "";	
	$resp = array();
	$data = array();
	if(isset($json["LOCID"]))
		$locid = $json["LOCID"];
	else
		$locid = "";
	if ($status == "VALIDATED"){
		$sql = "UPDATE WASTE SET STATUS = 'VALIDATED', VALIDATOR = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));
		if (isset($json["SIGNATURE"]))
			pictureRecord($json["SIGNATURE"],"WASTE_VALIDATOR",$id);
		$data["DULL"] = "1";	
		sendPushToUser("WASTE","Waste ready to clear",1);
	}
	else if ($status == "CLEARED"){
		
		$sql = "UPDATE WASTE SET STATUS = 'CLEARED', CLEARER = ? WHERE ID = ?";
		if (isset($json["SIGNATURE"]))
			pictureRecord($json["SIGNATURE"],"WASTE_CLEARER",$id);
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));

		$sql = "SELECT * FROM WASTEITEM WHERE WASTE_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);		
		$docnum = issueStocks($items,$author,$notes,$locid);
		$data["ISSUEID"] = $docnum;		

		if (isset($json["ITEMS"])){
			$items = $json["ITEMS"];
			foreach($items as $item){
				$sql = "UPDATE WASTEITEM SET STATUS = 'CLEARED', QUANTITY = ? WHERE PRODUCTID = ? AND WASTE_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["QUANTITY"],$item["PRODUCTID"],$id));
			}
		}

	}		
	$resp["data"] = $data;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;	
});

$app->get('/wastepool/{userid}', function($request,Response $response){
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	$userid = $request->getAttribute('userid');
	$sql = "SELECT * FROM WASTEPOOL WHERE USERID = ?";		

	$req = $db->prepare($sql);
	$req->execute(array($userid));

	$pool = $req->fetchAll(PDO::FETCH_ASSOC);
	$newItems = array();
	foreach($pool as $item){
		$nbproofs = 0;
		$count = 1;
		while(file_exists("./img/wastepool_proofs/".$item["ID"]."_".$count.".png")){       							     
	      $nbproofs++;
	      $count++;        	    
	  }
	  $item["NBPROOFS"] = $nbproofs;
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null)
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($newItems,$item);
	}

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newItems;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/wastepool', function($request,Response $response){
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	$sql = "SELECT TYPE FROM WASTEPOOL WHERE USERID = ? LIMIT 1 ";

	$req = $db->prepare($sql);
	$req->execute(array($json["USERID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res != false){
		if($res["TYPE"] != $json["TYPE"])
			$ok = false;					
		else if ($res["TYPE"] == $json["TYPE"])
			$ok = true;	
	}
	else 
		$ok = true;

	if ($ok == true){
		$db->beginTransaction();
		$sql = "INSERT INTO WASTEPOOL (PRODUCTID,QUANTITY,EXPIRATION,TYPE,USERID) VALUES (?,?,?,?,?)";	
			$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["EXPIRATION"],$json["TYPE"],$json["USERID"]));	
		$result["result"] = "OK";
		$lastId = $db->lastInsertId();
		$db->commit();    
		if (isset($json["PROOFS"]))
			pictureRecord($json["PROOFS"],"WASTEPOOLPROOFS",$lastId);
	}
	else{
		$result["message"] = "Waste needs to be of same type";
		$result["result"] = "KO";
	}
	
	$response = $response->withJson($result);
	return $response;
});

$app->delete('/wastepool/{id}', function($request,Response $response){	
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();

	$sql = "DELETE FROM WASTEPOOL WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	
		foreach( glob("./img/wastepool_proofs/".$id."_*") as $file )   
    	unlink($file);

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->get('/wastesearch',function($request,Response $response) {
	$db = getInternalDatabase();
	$start = $request->getParam('start','');
	$end =  $request->getParam('end','');
	$type = $request->getParam('type','');
	$status = $request->getParam('status','');
	$productid = $request->getParam('productid','');
	$params = array();

	$sql = "SELECT * FROM WASTE WHERE 1 = 1";
	$params = array();
	if ($start != '' && $end != ''){
		$sql .= " AND CREATED between ? AND ?";
		array_push($params,$start." 00:00:00.000" ,$end." 23:59:59.999");	
	}

	if ($type == '')
	{
		$sql .= " AND (TYPE = ? OR TYPE = ?)";		
			array_push($params,'DAMAGEWASTE');		
			array_push($params,'EXPIREWASTE');		
	}
	else{
		$sql .= " AND TYPE = ?";		
		array_push($params,$type);		
	}
	
	if ($status == '')
	{
		$sql .= " AND (STATUS = ? OR STATUS = ? OR STATUS = ?)";
			array_push($params,'CREATED');		
			array_push($params,'VALIDATED');
			array_push($params,'CLEARED');		
			
	}else
	{
		$sql .= " AND STATUS = ?";
		array_push($params,$status);		
	}


	if ($productid != ''){
		$sql1 = "SELECT * FROM WASTEITEM WHERE PRODUCTID = ?";
		$req = $db->prepare($sql1);
		$req->execute(array($productid));
		$dis = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($dis != false)
		{
			$sql .= " AND ID in (";
			foreach($dis as $di)
			{
				$sql .= "?,";
				array_push($params,$di["WASTE_ID"]);
			}	
			$sql = substr($sql,0,-1);
			$sql .= " )";
		}else {
			$sql .= " AND ID in ('IMPOSSIBLE CODE') ";
		}
	}

	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});



// EXPIRATION SYSTEM
$app->get('/expiresearch',function($request,Response $response) {
	$db = getDatabase();

	$type = $request->getParam('type','NR'); // NR or R 
	$vendorname = $request->getParam('vendorname','');
	$vendid = $request->getParam('vendid','');
	$storebin1 = $request->getParam('storebin1','');
	$storebin2 = $request->getParam('storebin2','');
	$category = $request->getParam('category','ALL');

	if ($type == "NR"){
		$sql = "SELECT ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PPSS_DELIVERED_EXPIRE,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,2) = 'NR'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(SUBSTRING(SIZE,3,3) as int) + 5)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0					
					";	
	}else if ($type == "R"){
			$sql = "SELECT ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PPSS_DELIVERED_EXPIRE,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,1) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(SUBSTRING(SIZE,2,3) as int) + 5)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0	
					AND SIZE NOT IN ('N/A','NO','NOEXPIRATION','NOEXPIRE','NR','REF:8557','RETURN')				
					";	
	}		

	$params = array();
	if($storebin1 != ''){
		$sql .= " AND PODETAIL.PRODUCTID IN (SELECT PRODUCTID FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND STORBIN LIKE ?)";
		array_push($params,"%".$storebin1."%");
	}
	if($storebin2 != ''){
		$sql .= " AND PODETAIL.PRODUCTID IN (SELECT PRODUCTID FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND STORBIN LIKE ?)";
		array_push($params,"%".$storebin2."%");
	}

	if($vendorname != ''){
		$sql .=	" AND PODETAIL.VENDNAME LIKE ?" ;	 
		array_push($params,"%".$vendorname."%");
	}
		
	if($vendid != ''){
		$sql .=	" AND ICPRODUCT.VENDID = ?" ;	 
		array_push($params,$vendid);
	}
		
	if ($category != 'ALL'){
		$sql .=	" AND CATEGORYID = ?" ;	 
		array_push($params,$category);	
	}
	$sql .= " GROUP BY ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PPSS_DELIVERED_EXPIRE,PODETAIL.VENDNAME,ONHAND,SIZE";	
	$req = $db->prepare($sql);
	$req->execute($params);
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$indb = getInternalDatabase();
	$newData = array();
	foreach($items as $item)
	{
		$sql = "SELECT * FROM DEPRECIATIONITEM 
						WHERE PRODUCTID = ? 
						AND TYPE <> 'EXPIREWASTE' 
						AND TYPE <> 'DAMAGEWASTE' 
						ORDER BY CREATED DESC LIMIT 1
						";

		$req = $indb->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$promo = $req->fetch(PDO::FETCH_ASSOC);
		if ($promo != false)
		{
			if ($promo["QUANTITY4"] != null){
				$item["LASTPROMOQTY"] = $promo["QUANTITY4"];		
				$item["LASTPROMOPERCENT"] = $promo["PERCENTPROMO4"];			
			}
			else if ($promo["QUANTITY3"] != null){
				$item["LASTPROMOQTY"] = $promo["QUANTITY3"];		
				$item["LASTPROMOPERCENT"] = $promo["PERCENTPROMO3"];			
			}
			else if ($promo["QUANTITY2"] != null){
				$item["LASTPROMOQTY"] = $promo["QUANTITY2"];		
				$item["LASTPROMOPERCENT"] = $promo["PERCENTPROMO2"];			
			}
			else if ($promo["QUANTITY1"] != null){
				$item["LASTPROMOQTY"] = $promo["QUANTITY1"];		
				$item["LASTPROMOPERCENT"] = $promo["PERCENTPROMO1"];			
			}
			$item["LASTPROMOEXPIRATION"] = $promo["EXPIRATION"];
			$item["LASTPROMODATE"] = $promo["STARTTIME1"];

			if ($item["LASTPROMODATE"] != "" && $item["LASTPROMODATE"] != null)
			{
			
				$from = $item["LASTPROMODATE"]. " 00:00:00.000";
				$to = date("Y-m-d"). " 23:59:59.999";
				$sql = "SELECT (SUM(TRANQTY)*-1) as 'SALE' FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = ? AND TRANDATE between ? AND ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$from,$to));
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if ($res != false){
					if ($res["SALE"] != null)
						$item["SALEFROMPROMODATE"] = $res["SALE"];
					else 
						$item["SALEFROMPROMODATE"] = "0";
				}
				else
					$item["SALEFROMPROMODATE"] = "N/A";	
			}
		}
		else
		{
			$item["LASTPROMOQTY"] = "N/A"; 
			$item["LASTPROMOPERCENT"] = "N/A"; 
			$item["LASTPROMOEXPIRATION"] = "N/A";
			$item["LASTPROMODATE"] = "N/A";	
			$item["SALEFROMPROMODATE"] = "N/A";
		}
		array_push($newData,$item);
	}

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);
	return $response;
});


$app->post('/expirepromoted',function ($request,Response $response){
	$json = json_decode($request->getBody(),true);
	if (str_contains($json["EXPIREDATE"],"/")){

		$temp = explode(" ",$json["EXPIREDATE"])[0];
		$temp2 = explode("/",$temp);
		$year = $temp2[2];
		$month = $temp2[0];
		$day = $temp2[1];

		$EXPIREDATE = $year."-".$month."-".$day." 00:00:00.000";
	}else{
		$EXPIREDATE = $json["EXPIREDATE"];
	}	

	$db = getInternalDatabase();
	
	$sql = "INSERT INTO EXPIREPROMOTED (PRODUCTID,EXPIREDATE,TYPE,PRODUCTNAME,AUTHOR) values (?,?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"],$EXPIREDATE,$json["TYPE"],$json["PRODUCTNAME"],$json["AUTHOR"]));
	$resp = array();
	$resp["result"] = "OK";		
	$response = $response->withJson($resp);
	return $response;

});

$app->get('/expirealert',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$location = $request->getParam('location','');
	// RETURN,NORETURN,RETURNWH,NORETURNWH
	$type = $request->getParam('type','');
	$userid = $request->getParam('userid','');
	
	if ($userid != ''){
		$sql = "SELECT location FROM USER WHERE ID = ?";
		$req = $db->prepare($sql); 	
		$req->execute(array($userid));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			if ($res["location"] == "ALL"){
				$locations = array();
			}else{
				$locations = $res["location"];		
				$locations = explode('|',$locations);
			}	
		}
	}	
	else
		$locations = array();

	$data = array();
	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'RETURN' AND CREATED > DATETIME('now', '-12 month') ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$data["PROMOTED"] = $items;

	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	
	$params = array();
	$sql = "SELECT ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PPSS_DELIVERED_EXPIRE,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(SUBSTRING(SIZE,3,3) as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	if (count($locations) != 0){
		$sql .= " AND PODETAIL.PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?";
		$count = 0;
		foreach($locations as $location){								
			if ($count > 0){
				$sql .= " OR STORBIN LIKE ?";
			}
			array_push($params,'%'.$location.'%');
			$count++;
		}
		$sql .= ")";
	}
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);

	$filtered = array();						
	foreach($allitems as $item){
		$sql = "SELECT EXPIREDATE FROM EXPIREPROMOTED WHERE PRODUCTID = ? ORDER BY EXPIREDATE DESC";
		$req = $db->prepare($sql);				
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if($res == false){
			array_push($filtered,$item);
		}
		else{
			if($item["PPSS_DELIVERED_EXPIRE"] > $res["EXPIREDATE"])
			array_push($filtered,$item);
		}
	}
	$data["ALERT"] = $filtered;

	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/expirepromoted/{id}', function ($request,Response $response){
	$db = getInternalDatabase();
	$id = $request->getAttribute('id');
	$sql = "DELETE FROM EXPIREPROMOTED WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);	
	return $response;
});

$app->get('/expirereturnalert/ALL',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$data = array();
	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'RETURN' AND CREATED > DATETIME('now', '-12 month') ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$data["PROMOTED"] = $items;

	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	
	
	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);

	$filtered = array();						
	foreach($allitems as $item){
		$sql = "SELECT EXPIREDATE FROM EXPIREPROMOTED WHERE PRODUCTID = ? ORDER BY EXPIREDATE DESC";
		$req = $db->prepare($sql);				
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if($res == false){
			array_push($filtered,$item);
		}
		else{
			
			$tmp = explode(' ',$res["EXPIREDATE"])[0];
			$tmp2 = explode('/',$tmp);
			if (count($tmp2) > 1){
				$expireTT = $tmp[2].$tmp2[0].$tmp[1];
				if($item["EXPIRETT"] != $expireTT)
					array_push($filtered,$item);
			}
		
		}
	}
	$data["ALERT"] = $filtered;
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/expirenoreturnalert/ALL',function ($request,Response $response){
	
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$data = array();
	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'NORETURN' AND CREATED > DATETIME('now', '-12 month') ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["PROMOTED"] = $items;
	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";

	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,2) = 'NR'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);
	$filtered = array();						
	foreach($allitems as $item){
		$sql = "SELECT EXPIREDATE FROM EXPIREPROMOTED WHERE PRODUCTID = ? ORDER BY EXPIREDATE DESC";
		$req = $db->prepare($sql);				
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if($res == false){
			array_push($filtered,$item);
		}
		else{
			if($item["PPSS_DELIVERED_EXPIRE"] > $res["EXPIREDATE"])
			array_push($filtered,$item);
		}
	}
	$data["ALERT"] = $filtered;	
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/expirereturnalertfiltered/{userid}',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$userid = $request->getAttribute('userid');
	$sql = "SELECT location FROM USER WHERE ID = ?";
	$req = $db->prepare($sql); 	
	$req->execute(array($userid));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		if ($res["location"] == "ALL"){
			$locations = array();
		}else{
			$locations = $res["location"];		
			$locations = explode('|',$locations);
		}	
	}
	else
		$locations = array();

	$data = array();
	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'RETURN' AND CREATED > DATETIME('now', '-12 month') ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$data["PROMOTED"] = $items;

	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	
	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(SUBSTRING(SIZE,3,3) as int) + 5)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					";
	if (count($locations) != 0){
		$sql .= " AND PODETAIL.PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?";
		$count = 0;
		foreach($locations as $location){								
			if ($count > 0){
				$sql .= " OR STORBIN LIKE ?";
			}
			array_push($params,'%'.$location.'%');
			$count++;
		}
		$sql .= ")";
	}
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);

	$filtered = array();						
	foreach($allitems as $item){
		$sql = "SELECT EXPIREDATE FROM EXPIREPROMOTED WHERE PRODUCTID = ? ORDER BY EXPIREDATE DESC";
		$req = $db->prepare($sql);				
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if($res == false){
			array_push($filtered,$item);
		}
		else{			
			$tmp = explode(' ',$res["EXPIREDATE"])[0];
			$tmp2 = explode('/',$tmp);
			if (count($tmp2) > 1){
				$expireTT = $tmp2[2].$tmp2[0].$tmp2[1];
				error_log($item["EXPIRETT"]."|".$expireTT);
				if($item["EXPIRETT"] != $expireTT)
					array_push($filtered,$item);
			}			
		}
	}
	$data["ALERT"] = $filtered;

	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/expirenoreturnalertfiltered/{userid}',function ($request,Response $response){
	
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$userid = $request->getAttribute('userid');
	$sql = "SELECT location FROM USER WHERE ID = ?";
	$req = $db->prepare($sql); 
	$req->execute(array($userid));	
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res != false){
		if ($res["location"] == "ALL"){
			$locations = array();
		}else{
			$locations = $res["location"];		
			$locations = explode('|',$locations);
		}	
	}
	else
		$locations = array();
	


	$data = array();

	$sql = "SELECT ID,PRODUCTID,PRODUCTNAME,EXPIREDATE,CREATED FROM EXPIREPROMOTED WHERE TYPE = 'NORETURN' AND CREATED > DATETIME('now', '-12 month') ";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$data["PROMOTED"] = $items;

	$excludeIDs = "('XXX',";
	foreach($items as $item){
		$excludeIDs .= "'".$item["EXPIREDATE"].$item["PRODUCTID"]."',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";

	$params = array();
	$sql = "SELECT  distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SUBSTRING(SIZE,1,2) = 'NR'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(SUBSTRING(SIZE,3,3) as int) + 5)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND ((PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
							 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	
    if (count($locations) != 0){
		$sql .= " AND PODETAIL.PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?";
		$count = 0;
		foreach($locations as $location){								
			if ($count > 0){
				$sql .= " OR STORBIN LIKE ?";
			}
			array_push($params,'%'.$location.'%');
			$count++;
		}
		$sql .= ")";
	}
	

	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$filtered = array();						
	foreach($allitems as $item){
		$sql = "SELECT EXPIREDATE FROM EXPIREPROMOTED WHERE PRODUCTID = ? ORDER BY EXPIREDATE DESC";
		$req = $db->prepare($sql);				
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if($res == false){
			array_push($filtered,$item);
		}
		else{
			$tmp = explode(' ',$res["EXPIREDATE"])[0];
			$tmp2 = explode('/',$tmp);
			if (count($tmp2) > 1){
				$expireTT = $tmp2[2].$tmp2[0].$tmp2[1];
				error_log($item["EXPIRETT"]."|".$expireTT);
				if($item["EXPIRETT"] != $expireTT)
					array_push($filtered,$item);	
			}
		}
	}
	$data["ALERT"] = $filtered;	
	

	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});


$app->put('/expire',function($request,Response $response) {
	$dbBlue = getDatabase();
	$json = json_decode($request->getBody(),true);
	$PRODUCTID = $json["PRODUCTID"];
	$EXPIRE = $json["EXPIRATION"];

	$sql = "SELECT TOP(1)PONUMBER FROM PODETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
	$req = $dbBlue->prepare($sql);
	$req->execute(array($PRODUCTID));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		$PONUMBER = $res["PONUMBER"];
		$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_EXPIRE = ? WHERE PONUMBER = ? AND PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($EXPIRE,$PONUMBER,$PRODUCTID));
	}
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/expirereturnalertwh',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	
	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'R'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID)  > 0;
					";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp["result"] = "OK";
	$resp["data"] = $allitems;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/expirenoreturnalertwh',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	
	
	$params = array();
	$sql = "SELECT distinct(PPSS_DELIVERED_EXPIRE),ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME,PODETAIL.VENDNAME,ONHAND,SIZE,datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) as 'DIFF',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID) as 'WH2',
					convert(varchar(10),year(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),month(PPSS_DELIVERED_EXPIRE)) + convert(varchar(10),day(PPSS_DELIVERED_EXPIRE)) as 'EXPIRETT',
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'') FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN1',	
					(SELECT replace(replace(STORBIN,char(10),''),char(13),'')  FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'STOREBIN2'	
					FROM PODETAIL,ICPRODUCT
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND SIZE IS NOT NULL 
					AND SIZE <> ''
					AND SUBSTRING(SIZE,1,1) = 'NR'
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(REPLACE(REPLACE(SIZE,'NR',''),'R','') as int) + 10)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID)  > 0;
					";
	$req = $dbBlue->prepare($sql);
	$req->execute($params);
	$allitems = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp["result"] = "OK";
	$resp["data"] = $allitems;
	$response = $response->withJson($resp);
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

// *************************//
// *** RETURN ITEM *** //
// *************************//
//[POST] ReturnRecord // Item list by vendor 
//[GET] ReturnItem/{status} // 

//[PUT] ReturnItem/{ID} 
//			-> Credit Note 
//			-> Receive Back
//[GET] SearchReturnItem


$app->post('/returnrecord',function($request,Response $response) {
	
	$db=getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$VENDID = $json["VENDID"];
	$VENDNAME = $json["VENDNAME"];
	$AUTHOR = $json["AUTHOR"];
	$USERID = $json["USERID"];
	$TYPE = $json["TYPE"];
	$NOTE = $json["NOTE"];

	$db->beginTransaction();
	$sql = "INSERT INTO RETURNRECORD (VENDID,VENDNAME,STATUS,TYPE,CREATOR,NOTE) VALUES (?,?,?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($VENDID,$VENDNAME,'WAITING',$TYPE,$AUTHOR,$NOTE));
	$lastId = $db->lastInsertId();
	$db->commit();   
	
	pictureRecord($json["SIGNATURE"],"RRCRE",$lastId);
	
	$items = $json["ITEMS"];
	foreach($items as $item){
		
		$sql = "INSERT INTO RETURNRECORDITEM (PRODUCTID,QUANTITY,EXPIRATION,STATUS,VAT,COST,DISCOUNT,RETURNRECORD_ID) VALUES (?,?,?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["QUANTITY"],$item["EXPIRATION"],'REQUESTED',$item["VAT"],$item["COST"],$item["DISCOUNT"],$lastId));
	}

	$sql = "DELETE FROM RETURNRECORDPOOL WHERE USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($USERID));

	sendPushToUser("RETURNRECORD","RETURNRECORD created",1);

	$resp = array();
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;

});

// WAITING VALIDATED TOTRANSFER TRANSFERED CLEARED 
$app->get('/returnrecord/{status}',function($request,Response $response) {
	$db=getInternalDatabase();
	
	$status = $request->getAttribute('status');
	$sql = "SELECT * FROM RETURNRECORD WHERE STATUS = ?";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/returnrecord',function($request,Response $response) {
	// CREATE CREDIT NOTE AND RETURN ID 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	$dbBLUE=getDatabase();
	
	$id = $json["ID"];
	$STATUS = $json["STATUS"];
	$author = $json["AUTHOR"];
	$items = $json["ITEMS"];

	$resp = array();
	$data = array();
	//VALIDATED,TOTRANSFER,TRANSFERED,CLEARED
	if ($STATUS == "VALIDATED")
	{
		$sql = "UPDATE RETURNRECORD SET STATUS = 'VALIDATED',VALIDATOR = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));		
		pictureRecord($json["SIGNATURE"],"RRVAL",$author,$id);		
		$data["DULL"] = "1";

		foreach($items as $item){
			$sql = "UPDATE RETURNRECORDITEM SET QUANTITY = ?,COST = ?,VAT = ?,DISCOUNT = ? WHERE PRODUCTID = ? AND RETURNRECORD_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["QUANTITY"],$item["COST"],$item["VAT"],$item["DISCOUNT"],$item["PRODUCTID"],$id));
		}
		sendPushToUser("RETURNRECORD","RETURNRECORD with ID ".$id." was validated",21);
		sendPushToUser("RETURNRECORD","RETURNRECORD with ID ".$id." was validated",49);
		sendPushToUser("RETURNRECORD","RETURNRECORD with ID ".$id." was validated",58);		
	}
	else if ($STATUS == "TOTRANSFER"){
		$sql = "UPDATE RETURNRECORD SET STATUS = 'TOTRANSFER',TRANSFERER = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));
		pictureRecord($json["SIGNATURE"],"RRTTR",$id);
		$data["DULL"] = "1";
		sendPushToUser("RETURNRECORD","RETURNRECORD with ID ".$id." ready to transfer",18);		
	}else if ($STATUS == "TRANSFERED"){
		$sql = "UPDATE RETURNRECORD SET STATUS = 'TRANSFERED',TRANSFEREE = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));
		pictureRecord($json["SIGNATURE"],"RRTRA",$id);

		foreach($items as $item){
			$sql = "UPDATE RETURNRECORDITEM SET QUANTITY = ?,COST = ?,VAT = ?,DISCOUNT = ? WHERE PRODUCTID = ? AND RETURNRECORD_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["QUANTITY"],$item["COST"],$item["VAT"],$item["DISCOUNT"],$item["PRODUCTID"],$id));
		}

		$sql = "SELECT * FROM RETURNRECORDITEM WHERE RETURNRECORD_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);		
		
		transferItems($items, $author,"TRANSFERBACK");
		$data["DULL"] = "1";
	}
	else if ($STATUS == "CLEARED")
	{
		$sql = "UPDATE RETURNRECORD SET STATUS = 'CLEARED',CLEARER = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));			
		pictureRecord($json["SIGNATURE"],"RRCLR",$id);

		foreach($items as $item){
			$sql = "UPDATE RETURNRECORDITEM SET STATUS = 'CLEARED', QUANTITY = ?,COST = ?,VAT = ?,DISCOUNT = ? WHERE PRODUCTID = ? AND RETURNRECORD_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["QUANTITY"],$item["COST"],$item["VAT"],$item["DISCOUNT"],$item["PRODUCTID"],$id));
		}

		$items = $json["ITEMS"];
		$locid = $json["LOCID"];
		$note = $json["NOTE"];	
		
		$toexchange = array();
		$tocreditnote = array();

		foreach($items as $item){			
			if ($item["RETURNQTY"] > 0){
				$item["QUANTITY"] = $item["RETURNQTY"];
				array_push($tocreditnote,$item);
			}			
			if ($item["EXCHANGEQTY"] > 0)
				array_push($toexchange,$item);
		}	
		if (count($toexchange) > 0){	
						
			foreach($toexchange as $exchangedItem)
			{
				$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_EXPIRE = ? WHERE PRODUCTID = ? AND PPSS_DELIVERED_EXPIRE = ?";
				$req = $dbBLUE->prepare($sql);
				$req->execute(array($exchangedItem["NEWEXPIRATION"],$exchangedItem["PRODUCTID"],$exchangedItem["EXPIRATION"]));

				$sql = "UPDATE RETURNRECORDITEM SET NEWEXPIRATION = ? WHERE RETURNRECORD_ID = ? AND PRODUCTID = ?";				
				$req = $db->prepare($sql);
				$req->execute(array($exchangedItem["NEWEXPIRATION"],$id,$exchangedItem["PRODUCTID"]));


				$sql = "INSERT INTO EXCHANGEDITEM (PRODUCTID,OLDEXPIRATION,NEWEXPIRATION,QUANTITY) VALUES (?,?,?,?)";
				$req = $db->prepare($sql); 
				$req->execute(array($exchangedItem["PRODUCTID"],$exchangedItem["EXPIRATION"],$exchangedItem["NEWEXPIRATION"],$exchangedItem["EXCHANGEQTY"]));

				$data["EXCHANGED"] = "1";
			}			
		}		
		if (count($tocreditnote) ){						
			$creditnoteID = createCreditNote($tocreditnote,blueUser($author),$locid,$note);			
			$data["CREDITNOTEID"] = $creditnoteID;			
		}					
	}	
	$resp["data"] = $data;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});


$app->delete('/returnrecorditems/{id}', function($request,Response $response){	
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();

	$sql = "DELETE FROM RETURNRECORDITEM WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


$app->get('/returnrecordsearch',function($request,Response $response) {
	$db = getInternalDatabase();
	$start = $request->getParam('start','');
	$end =  $request->getParam('end','');
	$status = $request->getParam('status','');
	$type = $request->getParam('type','');
	$productid = $request->getParam('productid','');
	$vendid = $request->getParam('vendid','');
	$vendorname = $request->getParam('vendorname','');
 	$params = array();

	$sql = "SELECT * FROM RETURNRECORD WHERE 1 = 1";
	$params = array();
	
	if ($start != '' && $end != ''){
		$sql .= " AND CREATED between ? AND ?";
		array_push($params,$start." 00:00:00.000" ,$end." 23:59:59.999");	
	}
	
	
	if ($status != ''){
		$sql .= " AND STATUS = ?";
		array_push($params,$status);		
	}else{
		$sql .= " AND (STATUS = 'WAITING' OR STATUS = 'VALIDATED' OR STATUS = 'TOTRANSFER' OR STATUS = 'TRANSFERED' OR STATUS = 'CLEARED')";		
	}
	

	
	if ($type != '')
	{
		$sql .= " AND TYPE = ?";
		array_push($params,$type);		
	}else{
		$sql .= " AND (TYPE = 'RETURN' OR TYPE = 'EXCHANGE')";
	}
	
	
	if ($vendid != ''){
		$sql .= " AND VENDID = ?";
		array_push($params, $vendid);
	}

	if ($vendorname != ''){
		$sql .= " AND VENDORNAME = ?";
		array_push($params,$vendorname); 
	}
	
	if ($productid != ''){
		$sql1 = "SELECT * FROM RETURNRECORDITEM WHERE PRODUCTID = ?";
		$req = $db->prepare($sql1);
		$req->execute(array($productid));
		$dis = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($dis != false)
		{
			$sql .= " AND ID in (";
			foreach($dis as $di)
			{
				$sql .= "?,";
				array_push($params,$di["RETURNRECORD_ID"]);
			}	
			$sql = substr($sql,0,-1);
			$sql .= " )";
		}else {
			$sql .= " AND ID in ('IMPOSSIBLE CODE') ";
		}
	}	


	$req = $db->prepare($sql);
	$req->execute($params);
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);

	return $response;
});

// DETAIL VIEW 
$app->get('/returnrecorddetails/{id}',function($request,Response $response) {
		$db = getInternalDatabase();
		$dbBlue = getDatabase();

		$id = $request->getAttribute('id');

		$sql = "SELECT TYPE FROM RETURNRECORD WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$type = $res["TYPE"] ?? "";


		$sql = "SELECT * FROM RETURNRECORDITEM WHERE RETURNRECORD_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);		

		$data = array();
		foreach($items as $item){

			$sql = "SELECT TOP(1)PRODUCTNAME,
					(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2'		
					FROM ICPRODUCT WHERE PRODUCTID = ? ORDER BY COLID DESC";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"] ?? "";	
			$item["WH1"] = $res["WH1"];
			$item["WH2"] = $res["WH2"];
			$item["TYPE"] = $type;
			array_push($data,$item);
		}

		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $data;
		$response = $response->withJson($resp);
		return $response;
});

$app->get('/returnrecordpool', function($request,Response $response){
	$db = getInternalDatabase();
	$userid = $request->getParam('USERID',null);	
	$sql = "SELECT * FROM RETURNRECORDPOOL WHERE USERID = ?";	
	$req = $db->prepare($sql);
	$req->execute(array($userid));

	$pool = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $pool;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/returnrecordpool', function($request,Response $response){
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	// IF POOL EMPTY
	$sql = "SELECT * FROM RETURNRECORDPOOL WHERE USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["USERID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res == false)
	{
		$sql = "INSERT INTO RETURNRECORDPOOL (PRODUCTID,PRODUCTNAME,QUANTITY,EXPIRATION,VENDID,VENDNAME,USERID,COST,VAT,DISCOUNT) VALUES (?,?,?,?,?,?,?,?,?,?)";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["PRODUCTNAME"],$json["QUANTITY"],$json["EXPIRATION"],$json["VENDID"],
							$json["VENDNAME"],$json["USERID"],$json["COST"],$json["VAT"],$json["DISCOUNT"]));
		$result["result"] = "OK";
	}
	else
	{
		$sql = "SELECT * FROM RETURNRECORDPOOL WHERE USERID = ? AND VENDID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["USERID"],$json["VENDID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$sql = "SELECT * FROM RETURNRECORDPOOL WHERE USERID = ? AND PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($json["USERID"],$json["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false){
				$sql = "UPDATE RETURNRECORDPOOL SET QUANTITY = ?,EXPIRATION = ?,COST = ?,VAT = ?,DISCOUNT = ? WHERE USERID = ? AND PRODUCTID = ?";	
				$req = $db->prepare($sql);
				$req->execute(array($json["QUANTITY"],$json["EXPIRATION"],$json["COST"],$json["VAT"],$json["DISCOUNT"],			
									$json["USERID"],$json["PRODUCTID"]));
			}
			else{
				$sql = "INSERT INTO RETURNRECORDPOOL (PRODUCTID,PRODUCTNAME,QUANTITY,EXPIRATION,VENDID,VENDNAME,USERID,COST,VAT,DISCOUNT) VALUES (?,?,?,?,?,?,?,?,?,?)";	
				$req = $db->prepare($sql);
				$req->execute(array($json["PRODUCTID"],$json["PRODUCTNAME"],$json["QUANTITY"],$json["EXPIRATION"],$json["VENDID"],
									$json["VENDNAME"],$json["USERID"],$json["COST"],$json["VAT"],$json["DISCOUNT"]));
			}
			$result["result"] = "OK";
		}else{
			$result["result"] = "KO";
			$result["message"] = "Cannot mix products from different vendors";
		}
	}
	$response = $response->withJson($result);
	return $response;
});

$app->put('/returnrecordpool', function($request,Response $response){
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	$sql = "UPDATE RETURNRECORDPOOL SET QUANTITY = ?, EXPIRATION =? WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["QUANTITY"],$json["EXPIRATION"],$json["PRODUCTID"]));

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->delete('/returnrecordpool/{id}', function($request,Response $response){	
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();

	$sql = "DELETE FROM RETURNRECORDPOOL WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});


$app->get('/orderstats/{barcode}',function($request,Response $response) {
	$barcode = $request->getAttribute('barcode');

	$stats = orderStatistics($barcode);
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $stats;
	$response = $response->withJson($resp);
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
							         EXTERNAL 						 		  						 	 
*/      
//
$app->post('/newitem',function($request,Response $response){
	
	$db = getDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE PRODUCTID = ? OR BARCODE = ? OR OTHER_ITEMCODE = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["BARCODE"],$json["BARCODE"],$json["BARCODE"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res != false){
		$result["result"] = "KO";
		$result["message"] = "Item already exists";
		$response = $response->withJson($result);
		return $response;	
	}
	
	if (isset($json["PICTURE"]))
		writePicture($json["BARCODE"],$json["PICTURE"]);

	$barcode = $json["BARCODE"];
	$nameen = $json["NAMEEN"];
	$namekh = $json["NAMEKH"];
	$category = $json["CATEGORY"];
	$price = $json["PRICE"];
	$cost = $json["COST"];
	$policy = $json["POLICY"];
	$author = $json["AUTHOR"];
	$vat = $json["VAT"];
	$vendid = $json["VENDID"];
	$picture = $json["PICTURE"];
	$plt = $json["PLT"];

	$res = createProduct($barcode,$nameen,$namekh,$category,$price,$cost,$author,$policy,$vat ,$vendid,$picture,$plt);
	if ($res == true){
		$result["result"] = "OK";			
	}else{
		$result["result"] = "KO";
		$result["message"] = "Item already exists";
	}
	
	$response = $response->withJson($result);
	return $response;
});

$app->get('/vendor', function($request,Response $response){ // VENDOR LIST
	$db = getDatabase();
	$sql = "select VENDNAME,VENDID 		  
			FROM APVENDOR
			ORDER BY VENDNAME ASC";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$pool = $req->fetchAll(PDO::FETCH_ASSOC);	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $pool;
	$response = $response->withJson($resp);
	return $response;
});



$app->get('/externalvendor', function($request,Response $response){ // VENDOR LIST
	$db = getInternalDatabase();
	$sql = "select ID,NAMEEN,NAMEKH,PHONE1,(select count(PRODUCTID) 
			FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = EXTERNALVENDOR.ID ) as 'ITEMCOUNT'  
			FROM EXTERNALVENDOR
			ORDER BY NAMEEN ASC";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$pool = $req->fetchAll(PDO::FETCH_ASSOC);	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $pool;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalvendordetails/{id}', function($request,Response $response){ // VENDOR PRODUCT LIST
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$id = $request->getAttribute('id');
	$sql = "SELECT *  
			FROM  EXTERNALCOST 
			WHERE EXTERNALVENDOR_ID = ?";	
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$newitems = array();
	foreach($items as $item){		
					
		$sql = "SELECT ICPRODUCT.PRODUCTID,PRICE,
				replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
				PRODUCTNAME1 as 'NAMEKH',LASTCOST, 		
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2'		
		FROM ICPRODUCT 
		WHERE ACTIVE = 1				
		AND ICPRODUCT.PRODUCTID = ?";		
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$onedata = $req->fetch(PDO::FETCH_ASSOC);


		$sql = "SELECT TOP(1) VENDNAME,CURRENCY_COST,TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$onedata["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$onedata["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$onedata["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALORDER	WHERE PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));

		$lastorder = $req->fetch(PDO::FETCH_ASSOC);
		$onedata["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$onedata["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$onedata["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALCOST,EXTERNALVENDOR 
				WHERE EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID
				AND PRODUCTID = ? ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$onedata["VENDOR1"] = "";	  
		$onedata["COST1"] = "";	  
		$onedata["VENDOR2"] = "";	  
		$onedata["COST2"] = "";	  
		$onedata["VENDOR3"] = "";	  
		$onedata["COST3"] = "";	  
		$onedata["VENDOR4"] = "";	  
		$onedata["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$onedata["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$onedata["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}		
		$sql = "SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2)) as 'SUPPLIERCOST',VENDNAME as 'SUPPLIERNAME'
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				AND VENDID <> ? 
				AND VENDID <> ?
				ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"],'400-463','400-106'));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$onedata["SUPPLIERCOST"] = $res["SUPPLIERCOST"]; 
			$onedata["SUPPLIERNAME"] = $res["SUPPLIERNAME"];
		}else{
			$onedata["SUPPLIERCOST"] = "N/A";
			$onedata["SUPPLIERNAME"] = "N/A";
		}
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res["VENDID"] == "400-463" || $res["VENDID"] == "400-106")
			$onedata["LASTORDERSTATUS"] = "EXTERNAL";
		else
			$onedata["LASTORDERSTATUS"] = "SUPPLIER";

		array_push($newitems, $onedata); 
	}

	$data = array();
	$data["items"] = $newitems;

	$sql = "SELECT *,(select count(PRODUCTID) FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = EXTERNALVENDOR.ID ) as 'ITEMCOUNT'  FROM EXTERNALVENDOR WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$vendor = $req->fetch(PDO::FETCH_ASSOC);
	$data["vendor"] = $vendor;
	
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;

	
});

$app->post('/externalvendor', function($request,Response $response){ // CREATE VENDOR
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "INSERT INTO EXTERNALVENDOR 
	(NAMEEN,NAMEKH,PHONE1,PHONE2,PHONE3,
	 PHONE4,ADDRESS1,ADDRESS2,COMMUNICATIONTYPE1,COMMUNICATIONHANDLE1,
	 COMMUNICATIONTYPE2,COMMUNICATIONHANDLE2,COMMENT) 
	 values (?,?,?,?,?,
	 		?,?,?,?,?,
			?,?,?)";	 
	$req = $db->prepare($sql);

	$req->execute(array($json["NAMEEN"],$json["NAMEKH"],$json["PHONE1"],$json["PHONE2"],$json["PHONE3"],
	$json["PHONE4"],$json["ADDRESS1"],$json["ADDRESS2"],$json["COMMUNICATIONTYPE1"],$json["COMMUNICATIONHANDLE1"],
	$json["COMMUNICATIONTYPE2"],$json["COMMUNICATIONHANDLE2"],$json["COMMENT"]));
	
	$resp = array();	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/externalvendor', function($request,Response $response){ // UPDATE VENDOR
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$sql = "UPDATE EXTERNALVENDOR SET 
	NAMEEN = ?, 
	NAMEKH = ?,
	PHONE1 = ?,
	PHONE2 = ?,
	PHONE3 = ?, 
	PHONE4 = ?,
	ADDRESS1 = ?, 
	ADDRESS2 =  ?, 
	COMMUNICATIONTYPE1 = ?, 
	COMMUNICATIONHANDLE1 = ?,
	COMMUNICATIONTYPE2 = ?, 
	COMMUNICATIONHANDLE2 = ?,
	COMMENT = ? 
	WHERE ID = ?";	
	$req = $db->prepare($sql);

	$req->execute(array($json["NAMEEN"],$json["NAMEKH"],$json["PHONE1"],$json["PHONE2"],$json["PHONE3"],
	$json["PHONE4"],$json["ADDRESS1"],$json["ADDRESS2"],
	$json["COMMUNICATIONTYPE1"],$json["COMMUNICATIONHANDLE1"],
	$json["COMMUNICATIONTYPE2"],$json["COMMUNICATIONHANDLE2"],
	$json["COMMENT"] ));
	$pool = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$resp = array();	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/externalvendor/{id}', function($request,Response $response){ // DELETE VENDOR
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();

	$sql = "DELETE FROM EXTERNALVENDOR WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->post('/externalitem', function($request,Response $response){ // Add item with vendor
	$db = getInternalDatabase();

	$json = json_decode($request->getBody(),true);

	if (isset($json["PICTURE"]))
		writePicture($json["BARCODE"],$json["PICTURE"]);

	$barcode = $json["BARCODE"];
	$nameen = $json["NAMEEN"];
	$namekh = $json["NAMEKH"];
	$category = $json["CATEGORY"];
	$price = $json["PRICE"];
	$cost = $json["COST"];
	$author = $json["AUTHOR"];
	$vat = $json["VAT"];
	$vendid = $json["VENDID"];
	$picture = $json["PICTURE"];
	$policy = $json["POLICY"];
	createProduct($barcode,$nameen,$namekh,$category,$price,$cost,$author,$policy,$vat ,$vendid,$picture,'N');
	
	$sql = "SELECT ID FROM EXTERNALVENDOR WHERE NAMEEN = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["EXTERNALVENDNAME"]));
	$res = $req->fecth(PDO::FETCH_ASSOC);
	$EXTVENDORID = $res["ID"];

	$sql = "SELECT * FROM EXTERNALCOST WHERE PRODUCTID = ? AND EXTERNALVENDOR_ID = ?"; 			
	$req = $db->prepare($sql);		
	$res = $req->execute(array($barcode,$EXTVENDORID));

	if ($res == false){
		$sql = "INSERT INTO EXTERNALCOST (PRODUCTID, EXTERNALVENDOR_ID,COST) values (?,?,?)";
		$req =  $db->prepare($sql);
		$req->execute(array($barcode,$EXTVENDORID,$cost));
		$result["result"] = "OK";
	}		
	else{
		$result["result"] = "KO";
		$result["message"] = "Item already exist with external vendor";
	}
	$sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'Y' WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($barcode));

	$response = $response->withJson($result);
	return $response;	
});

$app->get('/externalitemsearch', function($request,Response $response){ 
	$productname = $request->getParam('productname','');	
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$sql = "SELECT ICPRODUCT.PRODUCTID,PRICE,LASTCOST,replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
					PRODUCTNAME1 as 'NAMEKH', 		
					(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
					(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2'		
		FROM ICPRODUCT 
		WHERE ACTIVE = 1
		AND PPSS_HAVE_EXTERNAL = 'Y'
		AND PRODUCTNAME LIKE ? OR PRODUCTNAME1 LIKE ?";		
	$req =  $dbBlue->prepare($sql);
	$req->execute(array('%'.$productname.'%','%'.$productname.'%'));	
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$newitems = array();
	
	foreach($items as $item){
		$productid = $item["PRODUCTID"];
		
		$sql = "SELECT TOP(1) VENDNAME,CURRENCY_COST,TRANDATE,TRANQTY 
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($productid));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$item["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$item["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$item["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALORDER,EXTERNALVENDOR 
						WHERE EXTERNALORDER.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID  
						AND PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastorder = $req->fetch(PDO::FETCH_ASSOC);
		$item["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$item["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$item["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALCOST,EXTERNALVENDOR 
						 WHERE  EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID  
						 AND PRODUCTID = ? 
						 ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$item["VENDOR1"] = "";	  
		$item["COST1"] = "";	  
		$item["VENDOR2"] = "";	  
		$item["COST2"] = "";	  
		$item["VENDOR3"] = "";	  
		$item["COST3"] = "";	  
		$item["VENDOR4"] = "";	  
		$item["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$item["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$item["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}		
		array_push($newitems, $item); 
	}
	
	$result["data"] = $newitems;
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->get('/externalsupplier', function($request,Response $response){
	$dbBlue = getDatabase();	
	$sql = "select distinct(ICPRODUCT.VENDID),VENDNAME 
			FROM ICPRODUCT,APVENDOR 
			WHERE PPSS_HAVE_EXTERNAL = 'Y'
			AND APVENDOR.VENDID = ICPRODUCT.VENDID
			ORDER BY VENDNAME ASC";
	$req = $dbBlue->prepare($sql);
	$req->execute(array()); 			
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	$result["data"] = $data;
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;

});


$app->get('/externalitemalertbyvendor/{id}', function($request,Response $response){ 

	$id = $request->getAttribute('id');
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT PRODUCTID FROM EXTERNALORDER WHERE STATUS = 'ORDERED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$ids = $req->fetchAll(PDO::FETCH_ASSOC);

	$excludeIDs = "('XXX',";
	foreach($ids as $theid){
		$excludeIDs .= "'".$theid["PRODUCTID"] . "',";
	}
	
	$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	
	
	$sql = "SELECT PRODUCTID FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$ids = $req->fetchAll(PDO::FETCH_ASSOC);
	$includeIDs = "(";
	
	if ($ids == false){
		$resp["result"] = "OK";
		$resp["data"] = array();
		$response = $response->withJson($resp);
		return $response;
	}

	foreach($ids as $theid){
		$includeIDs .= "'".$theid["PRODUCTID"] . "',";
	}
	$includeIDs = substr($includeIDs,0,-1);
	$includeIDs .= ")";


	$sql = "SELECT TOP(30) ICPRODUCT.PRODUCTID,PRICE,
		replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
		PRODUCTNAME1 as 'NAMEKH',LASTCOST, 
		ICLOCATION.ORDERPOINT, ORDERQTY,
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2',
		(SELECT replace(replace(VENDNAME,char(39),''),char(34),'') as 'VENDNAME' FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME'
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1
		AND LOCID = 'WH1'
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.ORDERPOINT > 0		
		AND PPSS_HAVE_EXTERNAL = 'Y'
		AND ICPRODUCT.PRODUCTID NOT IN $excludeIDs
		AND ICPRODUCT.PRODUCTID IN $includeIDs
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRODUCTNAME1,LASTCOST,PRICE";				
		$req = $dbBlue->prepare($sql);		
		$req->execute(array());
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		$data = array();

	foreach($items as $item){		

		$stats = externalAlertStats($item["PRODUCTID"]);
		//$item["QTYLESS30"] = $stats["QTYLESS30"];
		$item["QTYLASTRCV"] = $stats["QTYLASTRCV"];
		$item["QTYPROMOTION"] = $stats["QTYPROMOTION"];
		$item["NBTHROWN"] = $stats["NBTHROWN"];
		$item["LASTRECEIVEDATE"] = $stats["LASTRECEIVEDATE"];
		//$item["DAYS30BACK"] = $stats["DAYS30BACK"];
		

		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$item["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$item["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$item["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALORDER 						
						 WHERE PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastorder = $req->fetch(PDO::FETCH_ASSOC);

		$item["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$item["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$item["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALCOST,EXTERNALVENDOR 
						 WHERE  EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID  
						 AND PRODUCTID = ? 
						 ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$item["VENDOR1"] = "";	  
		$item["COST1"] = "";	  
		$item["VENDOR2"] = "";	  
		$item["COST2"] = "";	  
		$item["VENDOR3"] = "";	  
		$item["COST3"] = "";	  
		$item["VENDOR4"] = "";	  
		$item["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$item["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$item["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}
		$sql = "SELECT * FROM EXTERNALORDER WHERE PRODUCTID  = ? AND STATUS <> 'DELIVERED'";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false){
			$item["STATUS"] = "NONE";
		}else{
			$item["STATUS"] = "Last order :" . $res["CREATED"];
		}
			
		$sql = "SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2)) as 'SUPPLIERCOST',VENDNAME as 'SUPPLIERNAME'
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				AND VENDID <> ? 
				AND VENDID <> ?
				ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"],'400-463','400-106'));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["SUPPLIERCOST"] = $res["SUPPLIERCOST"]; 
			$item["SUPPLIERNAME"] = $res["SUPPLIERNAME"];
		}else{
			$item["SUPPLIERCOST"] = "N/A";
			$item["SUPPLIERNAME"] = "N/A";
		}
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res["VENDID"] == "400-463" || $res["VENDID"] == "400-106")
			$item["LASTORDERSTATUS"] = "EXTERNAL";
		else
			$item["LASTORDERSTATUS"] = "SUPPLIER";



		array_push($data, $item); 
	}
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalitemalert', function($request,Response $response){ 
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT PRODUCTID FROM EXTERNALORDER WHERE STATUS = 'ORDERED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$ids = $req->fetchAll(PDO::FETCH_ASSOC);

	$excludeIDs = "('XXX',";
	foreach($ids as $theid){
		$excludeIDs .= "'".$theid["PRODUCTID"] . "',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	

	$sql = "SELECT TOP(30) ICPRODUCT.PRODUCTID,PRICE,
		replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
		PRODUCTNAME1 as 'NAMEKH',LASTCOST, 
		ICLOCATION.ORDERPOINT, ORDERQTY,
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2',
		(SELECT replace(replace(VENDNAME,char(39),''),char(34),'') as 'VENDNAME' FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME'
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1
		AND LOCID = 'WH1'
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.ORDERPOINT > 0		
		AND PPSS_HAVE_EXTERNAL = 'Y'
		AND ICPRODUCT.PRODUCTID NOT IN $excludeIDs
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRODUCTNAME1,LASTCOST,PRICE";				
		$req = $dbBlue->prepare($sql);
		$req->execute(array($excludeIDs));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		$data = array();

	foreach($items as $item){		

		/*
		$stats = externalAlertStats($item["PRODUCTID"]);
		$item["QTYLESS30"] = $stats["QTYLESS30"];
		$item["QTYLASTRCV"] = $stats["QTYLASTRCV"];
		$item["QTYPROMOTION"] = $stats["QTYPROMOTION"];
		$item["NBTHROWN"] = $stats["NBTHROWN"];
		$item["LASTRECEIVEDATE"] = $stats["LASTRECEIVEDATE"];
		$item["DAYS30BACK"] = $stats["DAYS30BACK"];
		*/

		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$item["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$item["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$item["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALORDER 						
						 WHERE PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastorder = $req->fetch(PDO::FETCH_ASSOC);

		$item["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$item["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$item["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALCOST,EXTERNALVENDOR 
						 WHERE  EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID  
						 AND PRODUCTID = ? 
						 ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$item["VENDOR1"] = "";	  
		$item["COST1"] = "";	  
		$item["VENDOR2"] = "";	  
		$item["COST2"] = "";	  
		$item["VENDOR3"] = "";	  
		$item["COST3"] = "";	  
		$item["VENDOR4"] = "";	  
		$item["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$item["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$item["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}
		$sql = "SELECT * FROM EXTERNALORDER WHERE PRODUCTID  = ? AND STATUS <> 'DELIVERED'";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false){
			$item["STATUS"] = "NONE";
		}else{
			$item["STATUS"] = "Last order :" . $res["CREATED"];
		}
			
		$sql = "SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2)) as 'SUPPLIERCOST',VENDNAME as 'SUPPLIERNAME'
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				AND VENDID <> ? 
				AND VENDID <> ?
				ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"],'400-463','400-106'));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["SUPPLIERCOST"] = $res["SUPPLIERCOST"]; 
			$item["SUPPLIERNAME"] = $res["SUPPLIERNAME"];
		}else{
			$item["SUPPLIERCOST"] = "N/A";
			$item["SUPPLIERNAME"] = "N/A";
		}
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res["VENDID"] == "400-463" || $res["VENDID"] == "400-106")
			$item["LASTORDERSTATUS"] = "EXTERNAL";
		else
			$item["LASTORDERSTATUS"] = "SUPPLIER";

		array_push($data, $item); 
	}
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externalorder', function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	if (isset($json["ITEMS"]))
	{
		$items = json_decode($json["ITEMS"],true);
		foreach($items as $item){
			$sql = "DELETE FROM EXTERNALORDER WHERE PRODUCTID = ? AND STATUS = 'ORDERED'";
			$req = $db->prepare($sql);
			$req->execute(array( ) );

			$sql = "INSERT INTO EXTERNALORDER (PRODUCTID,AUTHOR,COST,QUANTITY,TYPE,VENDORNAME,STATUS) 
			values (?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$json["AUTHOR"],$item["COST"],$item["QUANTITY"],'EXTERNAL',$item["VENDORNAME"],'ORDERED'));
		}
	}
	else {
		$PRODUCTID = $json["PRODUCTID"];
		$AUTHOR = $json["AUTHOR"];
		$COST = $json["COST"];
		$TYPE = $json["TYPE"];
		$QUANTITY = $json["QUANTITY"];
		$VENDORNAME = $json["VENDORNAME"];
		$sql = "INSERT INTO EXTERNALORDER (PRODUCTID,AUTHOR,COST,QUANTITY,TYPE,VENDORNAME,STATUS) 
						values (?,?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($PRODUCTID,$AUTHOR,$COST,$QUANTITY,$TYPE,$VENDORNAME,'ORDERED'));
	}

	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalorder', function($request,Response $response){
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();
	$ORDERS = array();
	
	$sql = "SELECT ID,PRODUCTID,QUANTITY,COST,TYPE,
					AUTHOR,VENDORNAME,EXTERNALORDER.CREATED					
					FROM EXTERNALORDER					
					WHERE STATUS = 'ORDERED' 
					AND TYPE = 'EXTERNAL'
					ORDER BY CREATED DESC";					
	$req = $db->prepare($sql);					
	$req->execute(array());
	$ordered = $req->fetchAll(PDO::FETCH_ASSOC);	
	$newData = array();
	foreach($ordered as $order){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($order["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$order["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($newData,$order);
	}
	$ORDERS["ORDERED"] = $newData;

	$sql = "SELECT  ID,PRODUCTID,QUANTITY,COST,TYPE,VENDORNAME,EXTERNALORDER.CREATED,
					DELIVERYDATE, DELIVERYQTY,DELIVERYPRICE
					FROM EXTERNALORDER					
					WHERE STATUS = 'DELIVERED' 
					AND TYPE = 'EXTERNAL'
					ORDER BY CREATED DESC";					
	$req = $db->prepare($sql);					
	$req->execute(array());
	$delivered = $req->fetchAll(PDO::FETCH_ASSOC);	
	$newData = array();
	foreach($delivered as $order){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($order["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$order["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($newData,$order);
	}
	$ORDERS["DELIVERED"] = $newData;

	$resp["result"] = "OK";
	$resp["data"] = $ORDERS;
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/externalorder',function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$ID = $json["ID"];
	$status = $json["STATUS"];
	if ($status ==  "DELIVERED"){
		$deliveryvendorid = $json["DELIVERYVENDORID_ID"];
		$deliveryqty = $json["DELIVERYQTY"];
		$deliveryprice = $json["DELIVERYPRICE"];
		
		$sql = "UPDATE EXTERNALORDER SET STATUS = ?,
							DELIVERYVENDORID_ID = ?,
				  					DELIVERYQTY = ?,
				  				  DELIVERYPRICE = ?,
					 DELIVERYDATE = DateTime('now'),
					WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($status,$deliveryvendorid,$deliveryqty,$deliveryprice,$ID));					
	}
	else if ($status == "ORDERED")
	{
		$sql = "UPDATE EXTERNALORDER SET STATUS = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($status,$ID));
	}	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externalorderToNOPOPool', function($request,Response $response){
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();

	$json = json_decode($request->getBody(),true);	
	$items =  json_decode($json["ITEMS"],true);	
	$today = date("Y-m-d");

	// Check if same vendor 
	$sql = "DELETE FROM SUPPLYRECORDNOPOPOOL WHERE USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["USERID"]));

	foreach($items as $item){
	
		$sql = "UPDATE EXTERNALORDER 
				SET STATUS = 'DELIVERED', 
			  DELIVERYDATE = ?, 
			   DELIVERYQTY = ?, 
			 DELIVERYPRICE = ?
				WHERE ID = ?";
		$req = $db->prepare($sql);		
		$req->execute(array($today, $item["DELIVERYQTY"],$item["DELIVERYPRICE"],$item["ID"]));
						
		$sql = "INSERT INTO SUPPLYRECORDNOPOPOOL (PRODUCTID,QUANTITY,USERID,DISCOUNT,COST,LOCID) values (?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["DELIVERYQTY"],$json["USERID"],0,$item["DELIVERYPRICE"],"WH2"));
	}
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});





$app->post('/externalcost', function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "DELETE FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
	$req =  $db->prepare($sql);
	$req->execute(array($json["EXTERNALVENDOR_ID"],$json["PRODUCTID"])); 

	$sql = "INSERT INTO EXTERNALCOST (EXTERNALVENDOR_ID,PRODUCTID,COST) values (?,?,?)";	
	$req = $db->prepare($sql);
	$req->execute(array($json["EXTERNALVENDOR_ID"],$json["PRODUCTID"],$json["COST"]));
	
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;

});

$app->delete('/externalcost', function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$sql = "DELETE FROM EXTERNALCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
	$req = $db->prepare($sql);	
	$req->execute(array($json["EXTERNALVENDOR_ID"],$json["PRODUCTID"]));

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;

});

$app->get('/externalcost/{productid}', function($request,Response $response){
	$db = getInternalDatabase();
	$id = $request->getAttribute('productid');
	$sql = "SELECT EXTERNALCOST.COST,EXTERNALVENDOR.NAMEEN as 'VENDORNAME',EXTERNALCOST.EXTERNALVENDOR_ID FROM EXTERNALCOST,EXTERNALVENDOR
			WHERE EXTERNALVENDOR.ID = EXTERNALCOST.EXTERNALVENDOR_ID 
			AND EXTERNALCOST.PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$result["data"] = $data;
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
							         EXTERNALFRUIT 						 		  						 	 
*/  

$app->get('/externalfruitvendor', function($request,Response $response){ // VENDOR LIST
	$db = getInternalDatabase();
	$sql = "select ID,NAMEEN,NAMEKH,PHONE1,
			(select count(PRODUCTID) FROM EXTERNALFRUITCOST WHERE EXTERNALVENDOR_ID = EXTERNALFRUITVENDOR.ID ) as 'ITEMCOUNT'  
			FROM EXTERNALFRUITVENDOR
			ORDER BY NAMEEN ASC";	
	$req = $db->prepare($sql);
	$req->execute(array());
	$pool = $req->fetchAll(PDO::FETCH_ASSOC);	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $pool;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalfruitvendordetails/{id}', function($request,Response $response){ // VENDOR PRODUCT LIST
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$id = $request->getAttribute('id');
	$sql = "SELECT *  
			FROM  EXTERNALFRUITCOST 
			WHERE EXTERNALVENDOR_ID = ?";	
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$newitems = array();
	foreach($items as $item){		
					
		$sql = "SELECT ICPRODUCT.PRODUCTID,PRICE,
				replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
				PRODUCTNAME1 as 'NAMEKH',LASTCOST, 		
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2'		
		FROM ICPRODUCT 
		WHERE ACTIVE = 1				
		AND ICPRODUCT.PRODUCTID = ?";		
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$onedata = $req->fetch(PDO::FETCH_ASSOC);


		$sql = "SELECT TOP(1) VENDNAME,CURRENCY_COST,TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$onedata["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$onedata["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$onedata["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALORDER	WHERE PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));

		$lastorder = $req->fetch(PDO::FETCH_ASSOC);
		$onedata["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$onedata["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$onedata["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALFRUITCOST,EXTERNALFRUITVENDOR 
				WHERE EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID
				AND PRODUCTID = ? ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$onedata["VENDOR1"] = "";	  
		$onedata["COST1"] = "";	  
		$onedata["VENDOR2"] = "";	  
		$onedata["COST2"] = "";	  
		$onedata["VENDOR3"] = "";	  
		$onedata["COST3"] = "";	  
		$onedata["VENDOR4"] = "";	  
		$onedata["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$onedata["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$onedata["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}		
		$sql = "SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2)) as 'SUPPLIERCOST',VENDNAME as 'SUPPLIERNAME'
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				AND VENDID <> ? 
				AND VENDID <> ?
				ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"],'400-463','400-106'));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$onedata["SUPPLIERCOST"] = $res["SUPPLIERCOST"]; 
			$onedata["SUPPLIERNAME"] = $res["SUPPLIERNAME"];
		}else{
			$onedata["SUPPLIERCOST"] = "N/A";
			$onedata["SUPPLIERNAME"] = "N/A";
		}
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res["VENDID"] == "400-463" || $res["VENDID"] == "400-106")
			$onedata["LASTORDERSTATUS"] = "EXTERNAL";
		else
			$onedata["LASTORDERSTATUS"] = "SUPPLIER";

		array_push($newitems, $onedata); 
	}

	$data = array();
	$data["items"] = $newitems;

	$sql = "SELECT *,(select count(PRODUCTID) FROM EXTERNALFRUITCOST WHERE EXTERNALVENDOR_ID = EXTERNALVENDOR.ID ) as 'ITEMCOUNT'  FROM EXTERNALFRUITVENDOR WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$vendor = $req->fetch(PDO::FETCH_ASSOC);
	$data["vendor"] = $vendor;
	
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;

	
});

$app->post('/externalfruitvendor', function($request,Response $response){ // CREATE VENDOR
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "INSERT INTO EXTERNALVENDOR 
	(NAMEEN,NAMEKH,PHONE1,PHONE2,PHONE3,
	 PHONE4,ADDRESS1,ADDRESS2,COMMUNICATIONTYPE1,COMMUNICATIONHANDLE1,
	 COMMUNICATIONTYPE2,COMMUNICATIONHANDLE2,COMMENT) 
	 values (?,?,?,?,?,
	 		?,?,?,?,?,
			?,?,?)";	 
	$req = $db->prepare($sql);

	$req->execute(array($json["NAMEEN"],$json["NAMEKH"],$json["PHONE1"],$json["PHONE2"],$json["PHONE3"],
	$json["PHONE4"],$json["ADDRESS1"],$json["ADDRESS2"],$json["COMMUNICATIONTYPE1"],$json["COMMUNICATIONHANDLE1"],
	$json["COMMUNICATIONTYPE2"],$json["COMMUNICATIONHANDLE2"],$json["COMMENT"]));
	
	$resp = array();	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/externalfruitvendor', function($request,Response $response){ // UPDATE VENDOR
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$sql = "UPDATE EXTERNALVENDOR SET 
	NAMEEN = ?, 
	NAMEKH = ?,
	PHONE1 = ?,
	PHONE2 = ?,
	PHONE3 = ?, 
	PHONE4 = ?,
	ADDRESS1 = ?, 
	ADDRESS2 =  ?, 
	COMMUNICATIONTYPE1 = ?, 
	COMMUNICATIONHANDLE1 = ?,
	COMMUNICATIONTYPE2 = ?, 
	COMMUNICATIONHANDLE2 = ?,
	COMMENT = ? 
	WHERE ID = ?";	
	$req = $db->prepare($sql);

	$req->execute(array($json["NAMEEN"],$json["NAMEKH"],$json["PHONE1"],$json["PHONE2"],$json["PHONE3"],
	$json["PHONE4"],$json["ADDRESS1"],$json["ADDRESS2"],
	$json["COMMUNICATIONTYPE1"],$json["COMMUNICATIONHANDLE1"],
	$json["COMMUNICATIONTYPE2"],$json["COMMUNICATIONHANDLE2"],
	$json["COMMENT"] ));
	$pool = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$resp = array();	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/externalfruitvendor/{id}', function($request,Response $response){ // DELETE VENDOR
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();

	$sql = "DELETE FROM EXTERNALFRUITVENDOR WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;
});

$app->post('/externalfruititem', function($request,Response $response){ // Add item with vendor
	$db = getInternalDatabase();

	$json = json_decode($request->getBody(),true);

	if (isset($json["PICTURE"]))
		writePicture($json["BARCODE"],$json["PICTURE"]);

	$barcode = $json["BARCODE"];
	$nameen = $json["NAMEEN"];
	$namekh = $json["NAMEKH"];
	$category = $json["CATEGORY"];
	$price = $json["PRICE"];
	$cost = $json["COST"];
	$author = $json["AUTHOR"];
	$vat = $json["VAT"];
	$vendid = $json["VENDID"];
	$picture = $json["PICTURE"];
	$policy = $json["POLICY"];
	createProduct($barcode,$nameen,$namekh,$category,$price,$cost,$author,$policy,$vat ,$vendid,$picture,'N');
	
	$sql = "SELECT ID FROM EXTERNALFRUITVENDOR WHERE NAMEEN = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["EXTERNALVENDNAME"]));
	$res = $req->fecth(PDO::FETCH_ASSOC);
	$EXTVENDORID = $res["ID"];

	$sql = "SELECT * FROM EXTERNALFRUITCOST WHERE PRODUCTID = ? AND EXTERNALVENDOR_ID = ?"; 			
	$req = $db->prepare($sql);		
	$res = $req->execute(array($barcode,$EXTVENDORID));

	if ($res == false){
		$sql = "INSERT INTO EXTERNALFRUITCOST (PRODUCTID, EXTERNALVENDOR_ID,COST) values (?,?,?)";
		$req =  $db->prepare($sql);
		$req->execute(array($barcode,$EXTVENDORID,$cost));
		$result["result"] = "OK";
	}		
	else{
		$result["result"] = "KO";
		$result["message"] = "Item already exist with external vendor";
	}
	$sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'F' WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($barcode));

	$response = $response->withJson($result);
	return $response;	
});

$app->get('/externalfruitsupplier', function($request,Response $response){
	$dbBlue = getDatabase();	
	$sql = "select distinct(ICPRODUCT.VENDID),VENDNAME 
			FROM ICPRODUCT,APVENDOR 
			WHERE PPSS_HAVE_EXTERNAL = 'F'
			AND APVENDOR.VENDID = ICPRODUCT.VENDID
			ORDER BY VENDNAME ASC";
	$req = $dbBlue->prepare($sql);
	$req->execute(array()); 			
	$data = $req->fetchAll(PDO::FETCH_ASSOC);
	$result["data"] = $data;
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;

});

$app->get('/externalfruititemalertbyvendor/{id}', function($request,Response $response){ 

	$id = $request->getAttribute('id');
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT PRODUCTID FROM EXTERNALFRUITORDER WHERE STATUS = 'ORDERED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$ids = $req->fetchAll(PDO::FETCH_ASSOC);

	$excludeIDs = "('XXX',";
	foreach($ids as $theid){
		$excludeIDs .= "'".$theid["PRODUCTID"] . "',";
	}
	
	$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	
	
	$sql = "SELECT PRODUCTID FROM EXTERNALFRUITCOST WHERE EXTERNALVENDOR_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$ids = $req->fetchAll(PDO::FETCH_ASSOC);
	$includeIDs = "(";
	
	if ($ids == false){
		$resp["result"] = "OK";
		$resp["data"] = array();
		$response = $response->withJson($resp);
		return $response;
	}

	foreach($ids as $theid){
		$includeIDs .= "'".$theid["PRODUCTID"] . "',";
	}
	$includeIDs = substr($includeIDs,0,-1);
	$includeIDs .= ")";


	$sql = "SELECT ICPRODUCT.PRODUCTID,PRICE,
		replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
		PRODUCTNAME1 as 'NAMEKH',LASTCOST, 
		ICLOCATION.ORDERPOINT, ORDERQTY,
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2',
		(SELECT replace(replace(VENDNAME,char(39),''),char(34),'') as 'VENDNAME' FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME'
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1
		AND LOCID = 'WH1'
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.ORDERPOINT > 0		
		AND ICPRODUCT.PRODUCTID NOT IN $excludeIDs
		AND ICPRODUCT.PRODUCTID IN $includeIDs
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRODUCTNAME1,LASTCOST,PRICE";				
		$req = $dbBlue->prepare($sql);
		$req->execute(array());
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		$data = array();


	foreach($items as $item){		

		$stats = externalAlertStats($item["PRODUCTID"]);
		$item["QTYLESS30"] = $stats["QTYLESS30"];
		$item["QTYLASTRCV"] = $stats["QTYLASTRCV"];
		$item["QTYPROMOTION"] = $stats["QTYPROMOTION"];
		$item["NBTHROWN"] = $stats["NBTHROWN"];
		$item["LASTRECEIVEDATE"] = $stats["LASTRECEIVEDATE"];
		$item["DAYS30BACK"] = $stats["DAYS30BACK"];
		

		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$item["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$item["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$item["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALORDER 						
						 WHERE PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastorder = $req->fetch(PDO::FETCH_ASSOC);

		$item["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$item["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$item["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALCOST,EXTERNALVENDOR 
						 WHERE  EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID  
						 AND PRODUCTID = ? 
						 ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$item["VENDOR1"] = "";	  
		$item["COST1"] = "";	  
		$item["VENDOR2"] = "";	  
		$item["COST2"] = "";	  
		$item["VENDOR3"] = "";	  
		$item["COST3"] = "";	  
		$item["VENDOR4"] = "";	  
		$item["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$item["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$item["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}
		$sql = "SELECT * FROM EXTERNALORDER WHERE PRODUCTID  = ? AND STATUS <> 'DELIVERED'";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false){
			$item["STATUS"] = "NONE";
		}else{
			$item["STATUS"] = "Last order :" . $res["CREATED"];
		}
			
		$sql = "SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2)) as 'SUPPLIERCOST',VENDNAME as 'SUPPLIERNAME'
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				AND VENDID <> ? 
				AND VENDID <> ?
				ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"],'400-463','400-106'));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["SUPPLIERCOST"] = $res["SUPPLIERCOST"]; 
			$item["SUPPLIERNAME"] = $res["SUPPLIERNAME"];
		}else{
			$item["SUPPLIERCOST"] = "N/A";
			$item["SUPPLIERNAME"] = "N/A";
		}
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res["VENDID"] == "400-463" || $res["VENDID"] == "400-106")
			$item["LASTORDERSTATUS"] = "EXTERNAL";
		else
			$item["LASTORDERSTATUS"] = "SUPPLIER";

		array_push($data, $item); 
	}
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalfruititemalert', function($request,Response $response){ 
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT PRODUCTID FROM EXTERNALFRUITORDER WHERE STATUS = 'ORDERED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$ids = $req->fetchAll(PDO::FETCH_ASSOC);

	$excludeIDs = "('XXX',";
	foreach($ids as $theid){
		$excludeIDs .= "'".$theid["PRODUCTID"] . "',";
	}
	if ($excludeIDs != "(")
		$excludeIDs = substr($excludeIDs,0,-1);
	$excludeIDs .= ")";
	

	$sql = "SELECT TOP(1) ICPRODUCT.PRODUCTID,PRICE,
		replace(replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"',''),char(39),'') as 'NAMEEN',
		PRODUCTNAME1 as 'NAMEKH',LASTCOST, 
		ICLOCATION.ORDERPOINT, ORDERQTY,
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as  'WH2',
		(SELECT replace(replace(VENDNAME,char(39),''),char(34),'') as 'VENDNAME' FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID ) as 'VENDNAME'
		FROM ICLOCATION,ICPRODUCT 
		WHERE ICLOCATION.PRODUCTID = ICPRODUCT.PRODUCTID
		AND ACTIVE = 1
		AND LOCID = 'WH1'
		AND ONHAND < ICLOCATION.ORDERPOINT 
		AND ICLOCATION.ORDERPOINT > 0		
		AND PPSS_HAVE_EXTERNAL = 'F'
		AND ICPRODUCT.PRODUCTID NOT IN $excludeIDs
		GROUP BY ICPRODUCT.VENDID,ICPRODUCT.PRODUCTID,PRODUCTNAME,ICLOCATION.ORDERPOINT,ORDERQTY,PRODUCTNAME1,LASTCOST,PRICE";				
		$req = $dbBlue->prepare($sql);
		$req->execute(array($excludeIDs));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		$data = array();

	foreach($items as $item){		

		$stats = externalAlertStats($item["PRODUCTID"]);
		$item["QTYLESS30"] = $stats["QTYLESS30"];
		$item["QTYLASTRCV"] = $stats["QTYLASTRCV"];
		$item["QTYPROMOTION"] = $stats["QTYPROMOTION"];
		$item["NBTHROWN"] = $stats["NBTHROWN"];
		$item["LASTRECEIVEDATE"] = $stats["LASTRECEIVEDATE"];
		$item["DAYS30BACK"] = $stats["DAYS30BACK"];


		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastreceive = $req->fetch(PDO::FETCH_ASSOC);
		$item["LASTRECEIVEVENDOR"] = $lastreceive["VENDNAME"] ?? "N/A";
		$item["LASTRECEIVEQTY"] =  $lastreceive["TRANQTY"] ?? "N/A";
		$item["LASTRECEIVECOST"] = $lastreceive["CURRENCY_COST"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALFRUITORDER 						
						 WHERE PRODUCTID = ? ORDER BY CREATED DESC";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$lastorder = $req->fetch(PDO::FETCH_ASSOC);

		$item["LASTORDERVENDOR"] = $lastorder["NAMEEN"] ?? "N/A";
		$item["LASTORDERQTY"] = $lastorder["QUANTITY"] ?? "N/A";
		$item["LASTORDERCOST"] = $lastorder["PRICE"] ?? "N/A";

		$sql = "SELECT * FROM EXTERNALFRUITCOST,EXTERNALFRUITVENDOR 
						 WHERE  EXTERNALCOST.EXTERNALVENDOR_ID = EXTERNALVENDOR.ID  
						 AND PRODUCTID = ? 
						 ORDER BY COST ASC";
	  	$req = $db->prepare($sql);
	  	$req->execute(array($item["PRODUCTID"]));
	  	$prices = $req->fetchAll(PDO::FETCH_ASSOC);
	  	$count = 1;
	  	$item["VENDOR1"] = "";	  
		$item["COST1"] = "";	  
		$item["VENDOR2"] = "";	  
		$item["COST2"] = "";	  
		$item["VENDOR3"] = "";	  
		$item["COST3"] = "";	  
		$item["VENDOR4"] = "";	  
		$item["COST4"] = "";	  	
		for($i = 0;isset($prices[$i]); $i++)
		{
		  	if ($i == 4)
		  		break;
		  	$item["VENDOR" . ($i + 1)] = $prices[$i]["NAMEEN"];	  
		  	$item["COST" . ($i + 1)] = $prices[$i]["COST"];	   
		}
		$sql = "SELECT * FROM EXTERNALFRUITORDER WHERE PRODUCTID  = ? AND STATUS <> 'DELIVERED'";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res == false){
			$item["STATUS"] = "NONE";
		}else{
			$item["STATUS"] = "Last order :" . $res["CREATED"];
		}
			
		$sql = "SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2)) as 'SUPPLIERCOST',VENDNAME as 'SUPPLIERNAME'
				FROM PORECEIVEDETAIL 
				WHERE PRODUCTID = ? 
				AND VENDID <> ? 
				AND VENDID <> ?
				ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"],'400-463','400-106'));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["SUPPLIERCOST"] = $res["SUPPLIERCOST"]; 
			$item["SUPPLIERNAME"] = $res["SUPPLIERNAME"];
		}else{
			$item["SUPPLIERCOST"] = "N/A";
			$item["SUPPLIERNAME"] = "N/A";
		}
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY COLID DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res["VENDID"] == "400-463" || $res["VENDID"] == "400-106")
			$item["LASTORDERSTATUS"] = "EXTERNAL";
		else
			$item["LASTORDERSTATUS"] = "SUPPLIER";

		array_push($data, $item); 
	}
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externalfruitorder', function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	if (isset($json["ITEMS"]))
	{
		$items = json_decode($json["ITEMS"],true);
		foreach($items as $item){
			$sql = "DELETE FROM EXTERNALFRUITORDER WHERE PRODUCTID = ? AND STATUS = 'ORDERED'";
			$req = $db->prepare($sql);
			$req->execute(array( ) );

			$sql = "INSERT INTO EXTERNALFRUITORDER (PRODUCTID,AUTHOR,COST,QUANTITY,TYPE,VENDORNAME,STATUS) 
			values (?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$json["AUTHOR"],$item["COST"],$item["QUANTITY"],'EXTERNAL',$item["VENDORNAME"],'ORDERED'));
		}
	}
	else {
		$PRODUCTID = $json["PRODUCTID"];
		$AUTHOR = $json["AUTHOR"];
		$COST = $json["COST"];
		$TYPE = $json["TYPE"];
		$QUANTITY = $json["QUANTITY"];
		$VENDORNAME = $json["VENDORNAME"];
		$sql = "INSERT INTO EXTERNALFRUITORDER (PRODUCTID,AUTHOR,COST,QUANTITY,TYPE,VENDORNAME,STATUS) 
						values (?,?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($PRODUCTID,$AUTHOR,$COST,$QUANTITY,$TYPE,$VENDORNAME,'ORDERED'));
	}

	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalfruitorder', function($request,Response $response){
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();
	$ORDERS = array();
	
	$sql = "SELECT ID,PRODUCTID,QUANTITY,COST,TYPE,
					AUTHOR,VENDORNAME,EXTERNALORDER.CREATED					
					FROM EXTERNALORDER					
					WHERE STATUS = 'ORDERED' 
					AND TYPE = 'EXTERNAL'
					ORDER BY CREATED DESC";					
	$req = $db->prepare($sql);					
	$req->execute(array());
	$ordered = $req->fetchAll(PDO::FETCH_ASSOC);	
	$newData = array();
	foreach($ordered as $order){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($order["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$order["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($newData,$order);
	}
	$ORDERS["ORDERED"] = $newData;

	$sql = "SELECT  ID,PRODUCTID,QUANTITY,COST,TYPE,VENDORNAME,EXTERNALORDER.CREATED,
					DELIVERYDATE, DELIVERYQTY,DELIVERYPRICE
					FROM EXTERNALORDER					
					WHERE STATUS = 'DELIVERED' 
					AND TYPE = 'EXTERNAL'
					ORDER BY CREATED DESC";					
	$req = $db->prepare($sql);					
	$req->execute(array());
	$delivered = $req->fetchAll(PDO::FETCH_ASSOC);	
	$newData = array();
	foreach($delivered as $order){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($order["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$order["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($newData,$order);
	}
	$ORDERS["DELIVERED"] = $newData;

	$resp["result"] = "OK";
	$resp["data"] = $ORDERS;
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/externalfruitorder',function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$ID = $json["ID"];
	$status = $json["STATUS"];
	if ($status ==  "DELIVERED"){
		$deliveryvendorid = $json["DELIVERYVENDORID_ID"];
		$deliveryqty = $json["DELIVERYQTY"];
		$deliveryprice = $json["DELIVERYPRICE"];
		
		$sql = "UPDATE EXTERNALFRUITORDER SET STATUS = ?,
							DELIVERYVENDORID_ID = ?,
				  					DELIVERYQTY = ?,
				  				  DELIVERYPRICE = ?,
					 DELIVERYDATE = DateTime('now'),
					WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($status,$deliveryvendorid,$deliveryqty,$deliveryprice,$ID));					
	}
	else if ($status == "ORDERED")
	{
		$sql = "UPDATE EXTERNALFRUITORDER SET STATUS = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($status,$ID));
	}	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externalfruitorderToNOPOPool', function($request,Response $response){
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();

	$json = json_decode($request->getBody(),true);	
	$items =  json_decode($json["ITEMS"],true);	
	$today = date("Y-m-d");

	// Check if same vendor 
	$sql = "DELETE FROM SUPPLYRECORDNOPOPOOL WHERE USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["USERID"]));

	foreach($items as $item){
	
		$sql = "UPDATE EXTERNALFRUITORDER 
				SET STATUS = 'DELIVERED', 
			  DELIVERYDATE = ?, 
			   DELIVERYQTY = ?, 
			 DELIVERYPRICE = ?
				WHERE ID = ?";
		$req = $db->prepare($sql);		
		$req->execute(array($today, $item["DELIVERYQTY"],$item["DELIVERYPRICE"],$item["ID"]));
				
		$sql = "INSERT INTO SUPPLYRECORDNOPOPOOL (PRODUCTID,QUANTITY,USERID,DISCOUNT,COST,LOCID) values (?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["DELIVERYQTY"],$json["USERID"],0,$item["DELIVERYPRICE"],"WH2"));
	}
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externalfruitcost', function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "DELETE FROM EXTERNALFRUITCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
	$req =  $db->prepare($sql);
	$req->execute(array($json["EXTERNALVENDOR_ID"],$json["PRODUCTID"])); 

	$sql = "INSERT INTO EXTERNALFRUITCOST (EXTERNALVENDOR_ID,PRODUCTID,COST) values (?,?,?)";	
	$req = $db->prepare($sql);
	$req->execute(array($json["EXTERNALVENDOR_ID"],$json["PRODUCTID"],$json["COST"]));
	
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;

});

$app->delete('/externalfruitcost', function($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$sql = "DELETE FROM EXTERNALFRUITCOST WHERE EXTERNALVENDOR_ID = ? AND PRODUCTID = ?";
	$req = $db->prepare($sql);	
	$req->execute(array($json["EXTERNALVENDOR_ID"],$json["PRODUCTID"]));

	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response;

});

$app->get('/externalfruitcost/{productid}', function($request,Response $response){
	$db = getInternalDatabase();
	$id = $request->getAttribute('productid');
	$sql = "SELECT EXTERNALFRUITCOST.COST,EXTERNALFRUITVENDOR.NAMEEN as 'VENDORNAME',EXTERNALFRUITCOST.EXTERNALVENDOR_ID 
			FROM EXTERNALFRUITCOST,EXTERNALFRUITVENDOR
			WHERE EXTERNALFRUITVENDOR.ID = EXTERNALFRUITCOST.EXTERNALVENDOR_ID 
			AND EXTERNALCOST.PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$result["data"] = $data;
	$result["result"] = "OK";
	$response = $response->withJson($result);
	return $response; 
});



// PROBLEMS 
$app->get('/needmoveitems',function($request,Response $response) {
	$db = getDatabase();
	$sql = "SELECT PRODUCTNAME,PRODUCTID,COST,PRICE,
		(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
		(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
		FROM ICPRODUCT 
		WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH1' AND LOCONHAND <= 0)
		AND PRODUCTID IN  (SELECT PRODUCTID FROM ICLOCATION WHERE LOCID = 'WH2' AND LOCONHAND > 0)";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);
	return $response;		
});

// ACCOUNTING 

$app->get('/aplist',function ($request,Response $response){
	$dbBlue = getDatabase();
	$sql = "SELECT VENDID FROM APVENDOR";
	$begin = $request->getParam('begin','1970-01-01');
	$end = $request->getParam('end','2050-01-01');

	$req = $dbBlue->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);

	$begin = $begin . " 00:00:00.000";
	$end = $end . " 23:59:59.000"; 

	$data = array();
	foreach($vendors as $vendor){
		$sql = "SELECT VENDID,BALANCE,replace(replace(replace(VENDNAME,char(10),''),char(13),''),'\"','') as 'VENDNAME', 
				(INV_AMT - VAT_AMT) as 'BEFORE_VAT',
				VAT_AMT,INV_AMT, PONUMBER,
				replace(replace(replace(SUPPLIER_INVOICE,char(10),''),char(13),''),'\"','') as 'SUPPLIER_INVOICE',
				CONVERT(DATE, TRANDATE, 101) as 'TRANDATE'  
				FROM APHEADER 
				WHERE VENDID = ? AND BALANCE < 0 
				AND APSTATUS <> 'V' 
				AND TRANDATE BETWEEN ? AND ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($vendor["VENDID"],$begin,$end));
		$aplist = $req->fetchAll(PDO::FETCH_ASSOC);		
		$data = array_merge($data,$aplist);

		$sql = "SELECT VENDID,BALANCE,replace(replace(replace(VENDNAME,char(10),''),char(13),''),'\"','') as 'VENDNAME', 
				(INV_AMT - VAT_AMT) as 'BEFORE_VAT',
				VAT_AMT,INV_AMT, PONUMBER,
				replace(replace(replace(SUPPLIER_INVOICE,char(10),''),char(13),''),'\"','') as 'SUPPLIER_INVOICE',
				CONVERT(DATE, TRANDATE, 101) as 'TRANDATE' 
				FROM APHEADER 
				WHERE VENDID = ? 
				AND BALANCE > 0 
				AND APSTATUS <> 'V'
				AND TRANDATE BETWEEN ? AND ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($vendor["VENDID"],$begin,$end));
		$aplist = $req->fetchAll(PDO::FETCH_ASSOC);		
		$data = array_merge($data,$aplist);		
	}

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;

});

$app->get('/discountsumlist',function ($request,Response $response){

	$dbBlue = getDatabase();
	$sql = "SELECT VENDID,replace(replace(replace(VENDNAME,char(10),''),char(13),''),'\"','') as 'VENDNAME'
			FROM APVENDOR";
	$begin = $request->getParam('begin','1970-01-01');
	$end = $request->getParam('end','2050-01-01');
	$begin = $begin . " 00:00:00.000";
	$end = $end . " 23:59:59.000"; 

	$req = $dbBlue->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	foreach($vendors as $vendor)
	{	
		$sql = "SELECT sum(CURRENCY_AMOUNT * (TRANDISC/100))  as 'DISCOUNT' 
				FROM PORECEIVEDETAIL 
				WHERE VENDID = ? 
				AND TRANDATE BETWEEN ? AND ?";

		$req = $dbBlue->prepare($sql);
		$req->execute(array($vendor["VENDID"],$begin,$end));

		$discount = $req->fetch(PDO::FETCH_ASSOC);
		if ($discount == null || $discount["DISCOUNT"] == null || $discount["DISCOUNT"] == 0.0)
			continue;

		$onedata["DISCOUNT"] = $discount["DISCOUNT"];
		$onedata["VENDNAME"] = $vendor["VENDNAME"];		
		$onedata["VENDID"] = $vendor["VENDID"];   
		array_push($data,$onedata);	
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/blacklist',function ($request,Response $response){
	$db = getDatabase();
	$indb = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	if (isset($json["PRODUCTID"])){
		$sql = "UPDATE ICPRODUCT SET PPSS_IS_BLACKLIST = 'Y' WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));
	
		$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ?";
		$req = $indb->prepare($sql);     
		$req->execute(array($json["PRODUCTID"]));
	}else if (isset($json["PRODUCTIDS"])){
		$productids = $json["PRODUCTIDS"];
		foreach($productids as $productid){
			$sql = "UPDATE ICPRODUCT SET PPSS_IS_BLACKLIST = 'Y' WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($productid));
			$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ?";
			$req = $indb->prepare($sql);     
			$req->execute(array($productid));
		}
	}


	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externallist',function ($request,Response $response){
	$db = getDatabase();
	$indb = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	
	if (isset($json["PRODUCTID"])){
		$sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'Y' WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));

		$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ?";
		$req = $indb->prepare($sql);     
		$req->execute(array($json["PRODUCTID"]));
	}else if ($json["PRODUCTIDS"]){
		$productids = $json["PRODUCTIDS"];
		foreach($productids as $productid){
			$sql = "UPDATE ICPRODUCT SET PPSS_HAVE_EXTERNAL = 'Y' WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($productid));

			$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ?";
			$req = $indb->prepare($sql);     
			$req->execute(array($productid));
		}
	}
	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});



// ChangePrice
$app->post('/pricechange',function ($request,Response $response){
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "DELETE FROM PRICECHANGE WHERE PRODUCTID = ?";;
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));	

	$sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER) values(?,?,?,?,?)";	
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"], $json["OLDPRICE"], $json["NEWPRICE"],'CREATED',$json["AUTHOR"]));	
	
	
	$sql = "SELECT STORBIN FROM ICLOCATION WHERE LOCID = 'WH1' AND PRODUCTID = ?";
	$req = $dbBLUE->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$STORBIN = $res["STORBIN"] ?? "";
	$STORBIN = explode('-',$STORBIN)[0];

	$sql = "SELECT * FROM USER WHERE LOCATION LIKE ?"; 
	$req = $db->prepare($sql);
	$req->execute(array($STORBIN));
	$userstopush = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($userstopush as $user){
		sendPushToUser("PRICE CHANGE","Price change requested for product ".$json["PRODUCTID"],$user["ID"]);
	}


	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/pricechange',function ($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "UPDATE PRICECHANGE SET STATUS = 'VALIDATED', REQUESTEE = ? WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["AUTHOR"],$json["ID"]));

	$sql = "SELECT NEWPRICE,PRODUCTID FROM PRICECHANGE WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["ID"]));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	$dbBlue = getDatabase();
	$sql = "UPDATE ICPRODUCT SET PRICE = ?,OTHER_PRICE = ? WHERE PRODUCTID = ?";
	$req = $dbBlue->prepare($sql);
	$req->execute(array($res["NEWPRICE"],$res["NEWPRICE"],$res["PRODUCTID"]));

	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/pricechange',function ($request,Response $response){	
	$db = getInternalDatabase();	
	$dbBlue = getDatabase();	

	$sql = "SELECT * FROM PRICECHANGE WHERE STATUS = 'CREATED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$created = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if($res != false){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			array_push($created,$item);
		}
	}
	$sql = "SELECT * FROM PRICECHANGE WHERE STATUS = 'VALIDATED' AND CREATED > date('now','-2 days')";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$validated = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($validated,$item);
	}
	$items["CREATED"] = $created;
	$items["VALIDATED"] = $validated;
	$resp = array();
	$resp["data"] = $items;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/pricechangefiltered/{userid}',function ($request,Response $response){	
	$db = getInternalDatabase();	
	$dbBlue = getDatabase();	

	$userid = $request->getAttribute('userid');
	$sql = "SELECT location FROM USER WHERE ID = ?";
	$req = $db->prepare($sql); 	
	$req->execute(array($userid));
	$res = $req->fetch(PDO::FETCH_ASSOC);

	if ($res != false)
	{		
		if ($res["location"] == "ALL"){
			$locations = array();
			$ALL = true;
		}else{
			$locations = $res["location"];		
			$locations = explode('|',$locations);
			$ALL = false;
		}
	}
	else
		$locations = array();

	$sql = "SELECT * FROM PRICECHANGE WHERE STATUS = 'CREATED'";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	

	$created = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"] ?? "";
			array_push($created,$item);
		}		
	}	
	$sql = "SELECT * FROM PRICECHANGE WHERE STATUS = 'VALIDATED' AND CREATED > date('now','-2 days')";
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$validated = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($validated,$item);
	}
	$items["CREATED"] = $created;
	$items["VALIDATED"] = $validated;

	if ($ALL == false){
		$tmpCreated = array();
		foreach($items["CREATED"] as $oneitem)
		{				
			foreach($locations as $location){			
				$sql = "SELECT PRODUCTID,STORBIN FROM ICLOCATION WHERE STORBIN LIKE ? AND PRODUCTID = ?";
				$req = $dbBlue->prepare($sql);
				$req->execute(array('%'.$location.'%',$oneitem["PRODUCTID"]));
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if ($res != false){
					$oneitem["STORBIN"] = $res["STORBIN"];
					array_push($tmpCreated,$oneitem);
				}			
			}				
		}
		$items["CREATED"] = $tmpCreated;
	}
	
	$tmpValidated = array();
	foreach($items["VALIDATED"] as $oneitem)
	{
		foreach($locations as $location){
			$sql = "SELECT PRODUCTID,STORBIN FROM ICLOCATION WHERE STORBIN LIKE ? AND PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array('%'.$location.'%',$oneitem["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false){
				$oneitem["STORBIN"] = $res["STORBIN"];
				array_push($tmpValidated,$oneitem);
			}				
		}				
	}
	$items["VALIDATED"] = $tmpValidated;

	$resp = array();
	$resp["data"] = $items;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/pricechange/{id}',function ($request,Response $response){
	$db = getInternalDatabase();
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM PRICECHANGE WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	
	$resp = array();	
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/externalpayment/{status}', function ($request, Response $response) {	
	$db = getInternalDatabase();
	$status = $request->getAttribute('status');	

	$sql = "SELECT * FROM EXTERNALPAYMENT where STATUS = ?";
	$req = $db->prepare($sql);
	$req->execute(array($status));
	$payments = $req->fetchAll(PDO::FETCH_ASSOC);

	$newpayments = array();
	foreach($payments as $payment){		
		$imgfolder = "./img/externalpayment_proofs/";					
		$nbproofs = 0;
		$count = 1;
		while(file_exists($imgfolder.$payment["ID"]."_".$count.".png")){
			$nbproofs++;
			$count++;        	    
		}
		$payment["NBPROOFS"] = $nbproofs;	

	
		// COUNT INVOICES
		$count = 1;
		$nbinvoices = 0;
		do
		{       
			if (file_exists("./img/supplyrecords_invoices/INV_".$payment["SUPPLY_RECORD_ID"]."_".$count.".png"))
			$nbinvoices++;                
			$count++;        
			$go = file_exists("./img/supplyrecords_invoices/INV_".$payment["SUPPLY_RECORD_ID"]."_".$count.".png");
		}while($go);		
		$payment["NBINVOICES"] = $nbinvoices;

		array_push($newpayments,$payment);	
	}

	


	$resp = array();	
	$resp["result"] = "OK";	
	$resp["data"] = $newpayments;

	$response = $response->withJson($resp);
	return $response;
});

$app->post('/externalpayment', function ($request, Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "INSERT INTO EXTERNALPAYMENT (SUPPLY_RECORD_ID,STATUS,AMOUNT,REQUESTER) VALUES (?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($json["SUPPLLY_RECORD_ID"],"WAITING",$json["AMOUNT"],$json["AUTHOR"]));
	
	$resp = array();	
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/externalpayment', function ($request, Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	
	$now = date("Y-m-d");
	$sql = "UPDATE EXTERNALPAYMENT SET STATUS = 'PAID',PAYER = ?,PAID = ? WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["AUTHOR"],$json["ID"]));
	if(isset($json["INVOICEJSONDATA"]))
		pictureRecord($json["INVOICEJSONDATA"],"EXTERNALPAYMENT",$json["ID"]);
	pictureRecord($json["SIGNATURE"],"EXTPAYMENTPAY",$json["ID"]);

	$resp = array();	
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->delete('/externalpayment/{id}', function ($request, Response $response) {
	$db = getInternalDatabase();
	$id = $request->getAttribute('id');

	$sql = "DELETE FROM PRICECHANGE WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	
	$resp = array();	
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/writekhmer',function ($request,Response $response) {
	$db = getDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "INSERT INTO ICPRODUCT (PRODUCTID,PRODUCTNAME,USERADD) VALUES (?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($json["WORD"],$json["WORD"],"TEST"));

	$resp = array();	
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/purchaseamounts', function(Request $request,Response $response) {
	$db = getDatabase();

	$json = json_decode($request->getBody(),true);

	$start =  $request->getParam('start','2000-1-1');
	$end =  $request->getParam('end','2050-1-1');

	$sql = "SELECT VENDID,VENDNAME FROM APVENDOR";
	$req = $db->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);	
	$data = array();
	foreach($vendors as $vendor){
		$sql = "SELECT sum(INV_AMT) as SUM FROM PORECEIVEHEADER WHERE RECEIVEDATE BETWEEN ? AND ? AND VENDID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($start,$end,$vendor["VENDID"]));		
		$res = $req->fetch(PDO::FETCH_ASSOC);

		$obj = array();
		$obj["VENDID"] =  $vendor["VENDID"];
		$obj["VENDNAME"] =  $vendor["VENDNAME"];		
		$obj["AMOUNT"] = $res["SUM"] ?? "0";
		array_push($data,$obj);		
	}
	$resp["result"] = "OK";
	$resp["data"] = $data;	
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/pushall/{message}',function(Request $request,Response $response){
	$message = $request->getAttribute('message');
	$db=getInternalDatabase(); 
	$sql = "SELECT fcmtoken FROM USER WHERE fcmtoken IS NOT NULL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$tokens = $req->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($tokens as $token){
		sendPush("Title",$message,$token);		
	}
	$resp = array();	
	$resp["result"] = "OK";	
	$resp["message"] = $result;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/pushone/{userid}',function(Request $request,Response $response){
	$userid = $request->getAttribute('userid');
	$result = sendPushToUser("Title","Test",$userid);					
	$resp = array();	
	$resp["result"] = "OK";		
	$resp["message"] = $result;
	$response = $response->withJson($resp);
	return $response;
});




$app->delete('/promotion/{productid}',function(Request $request,Response $response){
	$db = getDatabase();
	$id = $request->getAttribute('productid');

	endPromotion($id);
	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});


function calculateLastDay($year,$month)
{	 
	if ($year % 400 == 0)
		$leapyear = true;
	else if ($year % 100 == 0)
		$leapyear = true;
	else if ($year % 4 == 0)
		$leapyear = true;
	else
		$leapyear = false;

	if ($month == "1")
		return "31";	
	else if ($month == "2")
	{
		if ($leapyear == true)
			return "29";
		else
			return "28";	
	}
	else if($month == "3")
		return "31";
	else if ($month == "4")
		return "30";
	else if ($month == "5")
		return "31";
	else if ($month == "6")
		return "30";
	else if ($month == "7")
		return "31";
	else if ($month == "8")
		return "31";
	else if ($month == "9")
		return "30";
	else if ($month == "10")
		return "31";
	else if ($month == "11")
		return "30";
	else if ($month == "12")
		return "31";

}

// We always compare with previous month
$app->get('/grade',function(Request $request,Response $response){
	
	$db = getInternalDatabase();
	$dbBLUE=getDatabase();	
	$userid = $request->getParam('USERID','');
	$month = $request->getParam('MONTH','');
	$year = $request->getParam('YEAR','');
	$prevyear = $year;
	$team = $request->getParam('TEAM','');

	if ($month == "1"){
		$prevmonth = 12;
		$prevyear = intval($year) - 1;		
	}		
	else
		$prevmonth = sprintf("%02d",intval($month) -1);		
	$month = sprintf("%02d",intval($month));		

	$startLast = $prevyear."-".$prevmonth."-01". " 00:00:00.000";
	$endLast = $year."-".$prevmonth."-".calculateLastDay($prevyear,$prevmonth)." 23:59:59.999";

	$startCurrent = $year."-".$month."-01"." 00:00:00.000";
	$endCurrent = $year."-".$month."-".calculateLastDay($year,$month)." 23:59:59.999";

	$users = array();
	if ($team != ''){
		if ($team == "RAT")
			array_push($users,"201","202");	
		else if ($team == "OX")
			array_push($users,"203","204");	
		else if ($team == "TIGER")
			array_push($users,"205","206");	
		else if ($team == "HARE")
			array_push($users,"207","208");	
		else if ($team == "DRAGON")
			array_push($users,"209","210");		
		else if ($team == "SNAKE")
			array_push($users,"211","212");	
		else if ($team == "HORSE")
			array_push($users,"213","214");	
		else if ($team == "GOAT")
			array_push($users,"215","216");	
	}else{
		array_push($users,$userid);
	}
	$LASTMONTHSALE = 0;
	$CURRENTMONTHSALE = 0;
	$LASTMONTHPRICECHANGE = 0;
	$CURRENTMONTHPRICECHANGE = 0;
	$LASTMONTHPROMOTION = 0;
	$CURRENTMONTHPROMOTION = 0;
	$LASTMONTHTRANSFERS = 0;
	$CURRENTMONTHTRANSFERS = 0;	

	foreach($users as $userid)
	{	
		$sql = "SELECT * FROM USER WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($userid));
		$user = $req->fetch(PDO::FETCH_ASSOC);		
		$locations = explode('|',$user["sololocation"]);
	
		foreach($locations as $location)
		{					
			$sql = "SELECT SUM(dbo.POSDETAIL.QTY) AS 'COUNT'
			FROM dbo.POSDETAIL 
			WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?) 
			AND POSDATE BETWEEN ? AND ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array('%'.$location.'%',$startLast,$endLast));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$LASTMONTHSALE += $res["COUNT"] ?? "0";
	
			$sql = "SELECT SUM(dbo.POSDETAIL.QTY) AS 'COUNT'
			FROM dbo.POSDETAIL 
			WHERE PRODUCTID IN (SELECT PRODUCTID FROM ICLOCATION WHERE STORBIN LIKE ?)
			AND POSDATE BETWEEN ? AND ?";		
			$req = $dbBLUE->prepare($sql);
			$req->execute(array('%'.$location.'%',$startCurrent,$endCurrent));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$CURRENTMONTHSALE += $res["COUNT"] ?? "0";
		}
		$sql = "SELECT COUNT(*) as 'COUNT' FROM PRICECHANGE WHERE REQUESTEE = ? AND CREATED BETWEEN ? AND  ?";
		$req = $db->prepare($sql);
		$req->execute(array($user["login"],$startLast,$endLast));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$LASTMONTHPRICECHANGE += $res["COUNT"] ?? "0";
				
		$sql = "SELECT COUNT(*) as 'COUNT' FROM PRICECHANGE WHERE REQUESTEE = ? AND CREATED BETWEEN ? AND ?";
		//$sql = "SELECT COUNT(*) as 'COUNT' FROM PRICECHANGE WHERE REQUESTEE = ?";
		$req = $db->prepare($sql);		
		$req->execute(array($user["login"],$startCurrent,$endCurrent));
		//$req->execute(array($user["login"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$CURRENTMONTHPRICECHANGE += $res["COUNT"] ?? "0";

		$sql = "SELECT COUNT(*) as 'COUNT' FROM SELFPROMOTIONITEM WHERE CREATOR = ? AND CREATED > ? AND CREATED < ?";
		$req = $db->prepare($sql);
		$req->execute(array($user["login"] ?? "",$startLast,$endLast));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$LASTMONTHPROMOTION += $res["COUNT"] ?? "0";

		$sql = "SELECT COUNT(*) as 'COUNT' FROM SELFPROMOTIONITEM WHERE CREATOR = ? AND CREATED > ? AND CREATED < ?";
		$req = $db->prepare($sql);
		$req->execute(array($user["login"] ?? "",$startCurrent,$endCurrent));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$CURRENTMONTHPROMOTION += $res["COUNT"] ?? "0";
		
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND  REQUESTEE = ? AND REQUEST_UPDATED BETWEEN ? AND ?";
		$req = $db->prepare($sql);
		$req->execute(array($user["login"],$startLast,$endLast));
		$actions = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($actions as $action){
			$sql = "SELECT SUM(REQUEST_QUANTITY)  as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($action["ID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$LASTMONTHTRANSFERS  += $res["COUNT"] ?? "0";
		}

		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'TRANSFER' AND  REQUESTEE = ? AND REQUEST_UPDATED BETWEEN ? AND ?";
		$req = $db->prepare($sql);
		$req->execute(array($user["login"],$startCurrent,$endCurrent));
		$actions = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($actions as $action){
			$sql = "SELECT SUM(REQUEST_QUANTITY)  as COUNT FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($action["ID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$CURRENTMONTHTRANSFERS  += $res["COUNT"] ?? "0";		
		}	
	}	
	//- Number of itemCode Transfered
	$data["LOCATIONS"] = $user["location"] ?? "";
	
	$data["LASTMONTHSALE"] = $LASTMONTHSALE;
	$data["CURRENTMONTHSALE"] = $CURRENTMONTHSALE;

	$data["LASTMONTHPRICECHANGE"] = $LASTMONTHPRICECHANGE;
	$data["CURRENTMONTHPRICECHANGE"] = $CURRENTMONTHPRICECHANGE;
	
	$data["LASTMONTHPROMOTION"] = $LASTMONTHPROMOTION;
	$data["CURRENTMONTHPROMOTION"] = $CURRENTMONTHPROMOTION;
	
	$data["LASTMONTHTRANSFERS"] = $LASTMONTHTRANSFERS;
	$data["CURRENTMONTHTRANSFERS"] = $CURRENTMONTHTRANSFERS;

	$resp["result"] = "OK";
	$resp["data"] = $data;	
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/salespeed',function(Request $request,Response $response){
	$db = getDatabase();
	$indb = getInternalDatabase();

	$team = $request->getParam('TEAM','');
	$row = $request->getParam('ROW','');
	
	if ($team == "RAT"){
		$locs = "G01A|G01B|G02A|G02B|G03A|G03B";
	}else if ($team == "OX"){
		$locs = "G04A|G04B|G05A|G05B|GSOF";
	}else if ($team == "TIGER"){
		$locs = "G06A|G06B|G07A|G07B|GMIL";
	}
	else if ($team == "HARE"){
		$locs = "N08A|N08B|N09A|N09B|N10A|N10B|N11A|N11B|N12A|N12B|NCHA";
	}
	else if ($team == "DRAGON"){
		$locs = "N13A|N13B|N14A|N14B|N15A|N15B|N16A|N16B|N17A|N17B|NRAC";
	}
	else if ($team == "SNAKE"){
		$locs = "N18A|N18B|N19A|N19B|N20A|N20B|N21A|N21B|N22A|N22B";
	}
	else if ($team == "HORSE"){
		$locs = "NBAB|GWIN";
	}
	else if ($team == "GOAT"){
		$locs = "CHIL|FROZ";
	}	
	if ($team == ''){				
			$locs = $row;
	}	
	$params = array();
	$locs = explode('|',$locs);
	
	$sql = "SELECT PRODUCTID FROM ICLOCATION WHERE ";
	foreach($locs as $loc){
		$sql .= ' STORBIN LIKE ? OR';
		array_push($params, '%'.$loc.'%' );
	}
	$sql = substr($sql,0,-2);	
	$req = $db->prepare($sql);				
	$req->execute($params);
	$items = $req->fetchAll(PDO::FETCH_ASSOC);



	$str = "(";
	foreach($items as $item){
		$str .= "'".$item["PRODUCTID"]."',";
	}
	$str = substr($str,0,-1);
	$str .= ")";
	$sql = "SELECT TOP(200) PRODUCTID,PRODUCTNAME,LASTSALEDATE,
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
				(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
				ISNULL((SELECT SUM(QTY) FROM POSDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND POSDATE >= dbo.ICPRODUCT.LASTRECEIVEDATE AND POSDATE <=  GETDATE()),0) as 'SALESINCELASTRCV',
				(SELECT TOP(1) TRANDATE FROM PORECEIVEDETAIL WHERE PORECEIVEDETAIL.PRODUCTID = ICPRODUCT.PRODUCTID ORDER BY COLID DESC) as 'LASTRECEIVEDATE',
				ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = ICPRODUCT.PRODUCTID)*-1),0) as 'TOTALSALE'
				FROM ICPRODUCT 
				WHERE ONHAND > 0
				AND PRODUCTID IN ".$str."
				ORDER BY SALESINCELASTRCV ASC";					
	$req = $db->prepare($sql);	
	$req->execute(array());
	$data = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["data"] = $data;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			

});



$app->get('/storeschedule',function(Request $request,Response $response){
	$db = getInternalDatabase();
	$sql = "SELECT lastname,firstname,dayoff,starttime1,endtime1,starttime2,endtime2,location,sololocation 
				FROM USER WHERE role_id in ('18','21','5','7','13','17','21','22','19','4')";
	$req = $db->prepare($sql);
	$req->execute(array());
	$schedules = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["data"] = $schedules;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/officeschedule',function(Request $request,Response $response){
	$db = getInternalDatabase();
	$sql = "SELECT lastname,firstname,dayoff,starttime1,endtime1,starttime2,endtime2,location,sololocation 
				FROM USER WHERE role_id not in ('18','21','5','7','13','17','21','22','19','4')";
	$req = $db->prepare($sql);
	$req->execute(array());
	$schedules = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["data"] = $schedules;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});


$app->put('/schedule/{userid}',function(Request $request,Response $response){

	$userid = $request->getAttribute('userid');
	$json = json_decode($request->getBody(),true);

	$db = getInternalDatabase();
	$sql = "UPDATE USER set dayoff = ?, 
						starttime1 = ?,
						  endtime1 = ?, 
						starttime2 = ?,
						  endtime2 = ?,
						  location = ?, 
					  sololocation = ?
						WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array(
			$json["DAYOFF"],
			$json["STARTTIME1"],
			$json["ENDTIME1"],
			$json["STARTTIME2"],
			$json["ENDTIME2"],
			$json["LOCATION"],
			$json["SOLOCATION"],
	));

	$resp = array();
	$resp["data"] = $data;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/team',function(Request $request,Response $response){
	$db = getInternalDatabase();
	$sql = "SELECT * FROM TEAM";
	$req = $db->prepare($sql);
	$req->execute(array());
	$teams = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["data"] = $teams;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});

$app->put('/team/{id}',function(Request $request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');

	$sql = "UPDATE TEAM SET LOCATIONS = ? WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["LOCATIONS"],$id));

	$resp = array();
	$resp["data"] = $teams;
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});


// PROMOTION
$app->get('/promotion',function(Request $request,Response $response){
	$json = json_decode($request->getBody(),true);	
	$db=getDatabase();


	$sql = "SELECT DATEFROM,DATETO,ICNEWPROMOTION.PRODUCTID,DISCOUNT_VALUE,ICNEWPROMOTION.USERADD,
			(SELECT TOP(1) PPSS_DELIVERED_EXPIRE FROM PODETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY RECEIVE_DATE DESC) as 'EXPIRATION',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
			(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2'
			FROM ICNEWPROMOTION,ICPRODUCT
			WHERE ICNEWPROMOTION.PRODUCTID  = ICPRODUCT.PRODUCTID";		
	$req = $db->prepare($sql);

	$req->execute(array());
	$promotions = $req->fetchAll(PDO::FETCH_ASSOC);	
	$newData = array();
	foreach($promotions as $promotion){
		$packs = array();
		$sql = "SELECT SALEFACTOR,SALEPRICE,PACK_CODE  FROM ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($promotion["PRODUCTID"]));	
		$promotion["PACKS"] = $req->fetchAll(PDO::FETCH_ASSOC);
		array_push($newData, $promotion);
	}

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);
	return $response;
});

$app->post('/promotion',function(Request $request,Response $response){
	$json = json_decode($request->getBody(),true);
	$indb = getInternalDatabase();
	$db = getDatabase();

	// ATTACH ITEM PROMOTION 
	$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));
	$productname = $req->fetch(PDO::FETCH_ASSOC)["PRODUCTNAME"];
	$params = array(
		$json["START"],$json["END"],$json["PRODUCTID"],$productname,$json["AUTHOR"]
	);
	$sql = "INSERT INTO ICNEWPROMOTION (DATEFROM,DATETO,PRO_TYPE,PRODUCTID,PRO_DESCRIPTION,SALE_QTY,DISCOUNT_TYPE,PCNAME,USERADD,DATEADD ) 
										VALUES (?,?,'Per Item',?,?,'1.0','DISCOUNT(%)','APPLICATION',?,GETDATE()) ";

	$req = $db->prepare($sql);
	$req->execute($params);
	
	// LOOP ON PACK
	$sql = "SELECT * ICPRODUCT_SALEUNIT WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));
	$packs = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($packs as $pack){

		$sql = "INSERT INTO PACKPROMO (PACKCODE,ENDPROMO) VALUES (?,?)";
		$req = $indb->prepare($sql);
		$req->execute(array($pack["PACK_CODE"],$json["END"]));
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);
});

$app->delete('/promotion',function(Request $request,Response $response){
	$json = json_decode($request->getBody(),true);
	$sql = "DELETE FROM ICNEWPROMOTION WHERE PRODUCTID = ? AND DATEFROM = ? AND DATETO = ?";
	$req = $db->prepare($sql);	
	$req->execute(array($json["PRODUCTID"]),$json["START"],$json["END"]);
	$resp = array();
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});


$app->post('/amountpromotion',function(Request $request,Response $response){
	$db = getDatabase();
	$json = json_decode($request->getBody(),true);

	$productid = $json["PRODUCTID"];
	$value = $json["VALUE"];
	$start = 	$json["START"];
	$end = 	$json["END"];
	
	$author = $json["AUTHOR"];		
	attachAmountPromotion($productid,$value,$start,$end,$author);	
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/promotion/{productid}', function(Request $request,Response $response){
	$db = getDatabase();
	$productid = $request->getAttribute('productid');
	$data = array();

	$sql="SELECT PRODUCTNAME,
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH1',
	(SELECT LOCONHAND FROM dbo.ICLOCATION WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.ICPRODUCT.PRODUCTID) as 'WH2',
	COST,PRICE
	FROM dbo.ICPRODUCT  
	WHERE BARCODE = ? OR OTHERCODE = ?";
	$req = $db->prepare($sql);
	$req->execute(array($productid,$productid));
	$item = $req->fetch(PDO::FETCH_ASSOC);
	if ($item != false){
		$data["PRODUCTNAME"] = $item["PRODUCTNAME"];
		$data["WH1"] = $item["WH1"];
		$data["WH2"] = $item["WH2"];
		$data["COST"] = $item["COST"];
		$data["PRICE"] = $item["PRICE"];

	}
	$db = getDatabase();
	$sql = "SELECT PROSTARTDATE,PROENDDATE,PROPRICE, FROM ICGROUPPRICE WHERE PRODUCTID = ? AND PROENDDATE > GETDATE() ";
	$req = $db->prepare($sql);
	$res = $req->execute(array($productid));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	
	if ($res != false)
	{
		$data["TYPE"] = "AMOUNT";
		$data["START"] = $res["PROSTARTDATE"];
		$data["END"] = $res["PROENDDATE"];
		$data["VALUE"] = $item["PRICE"] - $res["PROPRICE"];
	}
	else{
		$sql = "SELECT TOP(1)DISCOUNT_VALUE,DATEFROM,DATETO  FROM ICNEWPROMOTION WHERE DISCOUNT_TYPE = 'DISCOUNT(%)' AND PRODUCTID = ? AND DATETO > GETDATE() ORDER BY DATETO DESC";  
		$req = $db->prepare($sql);		
		$req->execute(array($productid));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$data["TYPE"] = "PERCENT";
			$data["START"] = $res["DATEFROM"];
			$data["END"] = $res["DATETO"];
			$data["VALUE"] = "DISCOUNT_VALUE";

		}else{
			$data["TYPE"] = "N/A";
			$data["START"] = "N/A";
			$data["END"] = "N/A";
			$data["VALUE"] = "N/A";
		}
	}		
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;			
});

// CREATED, APPROVED, DENIED
$app->get('/restrequest/{status}', function(Request $request,Response $response){
	$indb = getInternalDatabase();
	$status = $request->getAttribute('status');
	
	$sql = "SELECT * FROM RESTREQUEST WHERE STATUS = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($status));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	if ($status == "CREATED"){
		$newData = array();
		foreach($items as $item){
			$item["WORKING"] = getworkingemployees($item["date"]);
			array_push($newData,$item);
		}
		$items = $newData;
	}

	$resp["data"] = $items;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/officerestrequest/{status}', function(Request $request,Response $response){
	$indb = getInternalDatabase();
	$status = $request->getAttribute('status');
	
	$sql = "SELECT * FROM RESTREQUEST WHERE STATUS = ?
			AND user_id not in (SELECT ID FROM USER WHERE role_id in ('18','21','5','7','13','17','21','22','19','4'));
			";
	$req = $indb->prepare($sql);
	$req->execute(array($status));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	if ($status == "CREATED"){
		$newData = array();
		foreach($items as $item){
			$item["WORKING"] = getworkingemployees($item["date"]);
			array_push($newData,$item);
		}
		$items = $newData;
	}

	$resp["data"] = $items;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/storerestrequest/{status}', function(Request $request,Response $response){
	$indb = getInternalDatabase();
	$status = $request->getAttribute('status');
	
	$sql = "SELECT * FROM RESTREQUEST WHERE STATUS = ?
			AND user_id not in (SELECT ID FROM USER WHERE role_id in ('18','21','5','7','13','17','21','22','19','4'));
			";
	$req = $indb->prepare($sql);
	$req->execute(array($status));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	if ($status == "CREATED"){
		$newData = array();
		foreach($items as $item){
			$item["WORKING"] = getworkingemployees($item["date"]);
			array_push($newData,$item);
		}
		$items = $newData;
	}

	$resp["data"] = $items;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;			
});

$app->get('/restrequestmine/{creator}', function(Request $request,Response $response){
	$indb = getInternalDatabase();
	$creator = $request->getAttribute('creator');
	$sql = "SELECT * FROM RESTREQUEST WHERE CREATOR = ? ORDER BY created DESC";
	$req = $indb->prepare($sql);
	$req->execute(array($creator));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);	
	
	$resp["data"] = $items;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;			
});

// PRE-CHECK
$app->get('/getworkingemployee/{date}',function(Request $request,Response $response){
	$date = $request->getAttribute('date');
	$employees = getworkingemployees($date);

	$resp["data"] = $employees;
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;			

});

// THEN DO REST REQUESt
$app->post('/restrequest', function(Request $request,Response $response){
	$indb = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$sql = "INSERT INTO RESTREQUEST (moment,reason,status,creator) VALUES (?,?,?,?)";
	$req = $indb->prepare($sql);
	$req->execute($json["MOMENT"],$json["REASON"],'CREATOR',$json["CREATOR"]);
	
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;			
});

$app->put('/restrequest/{id}', function(Request $request,Response $response){
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');
	$indb = getInternalDatabase();
	$sql = "UPDATE RESTREQUEST set STATUS = ?  WHERE ID = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($json["STATUS"],$id));

	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;				
});

$app->get('/vendorautoitem/{id}', function(Request $request,Response $response){
	$id = $request->getAttribute('id');
	$db = getDatabase();
	$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE VENDID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	foreach($items as $item){
		$stats = orderStatistics($item["PRODUCTID"]);
		array_push($data,$stats);		
	}	
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;				
});


function extractEmployeeByHour($hour,$employees)
{
	$data = array();
	foreach($employees as $employee){
		if ( ($employee["starttime1"] >= strtotime($hour) &&  strtotime($hour) < $employee["endtime1"]) ||
			 ($employee["starttime2"] >= strtotime($hour) &&  strtotime($hour) < $employee["endtime2"]) 
		   ){
			array_push($data,$employee);		
		   }	   
	}
	return $data;
}
$app->get('/storeschedulebyday/{date}', function(Request $request,Response $response){

	$indb = getInternalDatabase();
	$date = $request->getAttribute('date');
	$employees = getStoreWorkingEmployees($date);
	
	$data["7:00"]  = extractEmployeeByHour("7:00",$employees);
	$data["7:30"]  = extractEmployeeByHour("7:30",$employees);
	$data["8:00"]  = extractEmployeeByHour("8:00",$employees);
	
	$data["8:30"]  = extractEmployeeByHour("8:30",$employees);
	$data["9:00"]  = extractEmployeeByHour("9:00",$employees);
	$data["9:30"]  = extractEmployeeByHour("9:30",$employees);
	$data["10:00"] = extractEmployeeByHour("10:00",$employees);
	$data["10:30"] = extractEmployeeByHour("10:30",$employees);
	$data["11:00"] = extractEmployeeByHour("11:00",$employees);
	$data["11:30"] = extractEmployeeByHour("11:30",$employees);
	$data["12:00"] = extractEmployeeByHour("12:00",$employees);
	$data["12:30"] = extractEmployeeByHour("12:30",$employees);
	$data["13:00"] = extractEmployeeByHour("13:00",$employees);
	$data["13:30"] = extractEmployeeByHour("13:30",$employees);
	$data["14:00"] = extractEmployeeByHour("14:00",$employees);
	$data["14:30"] = extractEmployeeByHour("14:30",$employees);
	$data["15:00"] = extractEmployeeByHour("15:30",$employees);
	$data["15:30"] = extractEmployeeByHour("15:30",$employees);
	$data["16:00"] = extractEmployeeByHour("16:00",$employees);
	$data["16:30"] = extractEmployeeByHour("16:30",$employees);
	$data["17:00"] = extractEmployeeByHour("17:00",$employees);
	$data["17:30"] = extractEmployeeByHour("17:30",$employees);
	$data["18:00"] = extractEmployeeByHour("18:00",$employees);
	$data["18:30"] = extractEmployeeByHour("18:30",$employees);
	$data["19:00"] = extractEmployeeByHour("19:00",$employees);
	$data["19:30"] = extractEmployeeByHour("19:30",$employees);
	$data["20:00"] = extractEmployeeByHour("20:00",$employees);
	$data["20:30"] = extractEmployeeByHour("20:30",$employees);
	$data["21:00"] = extractEmployeeByHour("21:00",$employees);
	$data["21:30"] = extractEmployeeByHour("21:30",$employees);
	
	// Remove Day off 
	$sql = "SELECT * FROM RESTREQUEST where date = ?";
	$req = $indb->prepare($sql);
	$req->execute(array($date));
	$excludes = $req->fetchAll(PDO::FETCH_ASSOC);	
	if (count($excludes) > 0)
	{
		foreach($data as $key => $value)
		{
			$newData = array();			
			// Each 30 minute
			foreach($value as $oneEmp)
			{			
				foreach($excludes as $exclude)
				{
					if ($exclude["id"] == $oneEmp["id"] && $key >= $exclude["start"] && $key <= $exclude["end"]){
							echo "We don't add";
							exit;
					}	
					else{
						array_push($newData,$oneEmp);				
					}						
					
				}
			}
			$data[$key] = $newData;		
		}
	}
	$resp["result"] = "OK";
	$resp["data"] = $data;
	$response = $response->withJson($resp);
	return $response;				
});

$app->get('/maincode/{code}', function(Request $request,Response $response){
	$db = getDatabase();
	$code = $request->getAttribute('code');
	$sql = "SELECT PRODUCTID FROM ICPRODUCT WHERE OTHERCODE = ?";
	$req = $db->prepare($sql);
	$req->execute(array($code));
	$data = $req->fetch(PDO::FETCH_ASSOC);
	if ($data != false)
		$resp["data"] = $data["PRODUCTID"];
	else 
		$resp["data"] = "N/A";
	$resp["result"] = "OK";
	
	$response = $response->withJson($resp);
	return $response;			
});

ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();