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
require_once 'receivepo.php';


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

	
$app->post('/login',function(Request $request,Response $response) { 

	$json = json_decode($request->getBody(),true);
	$username = $json["username"];
	$password = $json["password"];

	
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
	$sql = "SELECT PRODUCTID,SALEPRICE,DESCRIPTION1,DESCRIPTION2,SALEUNIT,DISC,EXPIRED_DATE,SALEFACTOR FROM ICPRODUCT_SALEUNIT WHERE PACK_CODE = ?"; 	
	$req = $conn->prepare($sql);
	$req->execute($params);
	$item=$req->fetch(PDO::FETCH_ASSOC);	
			
	if ($item != false)			{
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
				if (file_exists("img/packs/".$packcode.".jpg"))
					$result["PICTURE"] = base64_encode(file_get_contents("img/packs/".$packcode.".jpg"));
				else
					$oneItem["productImg"] = $packInfo["PICTURE"];
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

	


	if ($item != false)
	{
		if ($withImage == true)
			$oneItem["productImg"] = loadPicture($barcode,150,true);

		if ($item["OTHERCODE"] != null)
			$item["BARCODE"] = $item["OTHERCODE"]; 
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

		if ($percent != 100)
		{
			$percent  /= 100;
			$newPrice = $percent * $oldPrice; 				
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
		;

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
			
			$oneItem["dollarPrice"] =  truncateDollarPrice($newPrice);										
			$oneItem["rielPrice"] = generateRielPrice(truncateDollarPrice($newPrice));
			$oneItem["PRICE"] = $packInfo["SALEPRICE"];								
			$oneItem["ISPACK"] = "YES";
			$oneItem["nameEN"] = $packInfo["DESCRIPTION1"]." (".$packInfo["SALEUNIT"].")";

			array_push($result,$oneItem);
		}
		else {
			
			if (isset($percentages[$count]) && $percentages[$count] != ""){			
				$oneItem = itemLookupLabel($barcode,true,$percentages[$count]);
			}				
			else
				$oneItem = itemLookupLabel($barcode,true);
			
			$oneItem["packing"] = "";
			$oneItem["ISPACK"] = "NO";	
			array_push($result,$oneItem);
							
		}
		$count++;				
			
	}	
	$resp["result"] = "OK";
	$resp["data"] = $result;
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
	
	$sql="SELECT PRODUCTID,OTHERCODE,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,PPSS_IS_BLACKLIST,
	(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'COST',
	isnull((SELECT TOP(1) CAST(TRANCOST AS decimal(7, 2))   FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC),LASTCOST) as 'LASTCOST'
	,PRICE,ONHAND,PACKINGNOTE,COLOR,SIZE,
	(SELECT VENDNAME FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID) as 'VENDNAME',
	(SELECT TAX FROM APVENDOR WHERE VENDID = dbo.ICPRODUCT.VENDID) as 'TAX',
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
		$item["LASTCOST"] = round($item["LASTCOST"],2);
	else
		$item["LASTCOST"] = "0";
	if (isset($item["COST"]))
		$item["COST"] = round($item["COST"],2);
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
			//$resp["result"] = "KO";
			$resp["message"] = "WH1 Location missing"; 
			//$response = $response->withJson($resp);
			//return $response;
		}
		else if ($res2 < 1){
			//$resp["result"] = "KO";
			$resp["message"] = "WH2 Location missing"; 	
			//$response = $response->withJson($resp);
			//return $response;
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



$app->get('/itemwithstats',function(Request $request,Response $response) {    
	$conn=getDatabase();	 
	
	$item = null;
	$barcode = $request->getParam('barcode','');
	$type = $request->getParam('type','');
	$expiration = $request->getParam('expiration','');
	$depreciationtype = $request->getParam('depreciationtype','');

	$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,CATEGORYID,COST,PRICE,ONHAND,PACKINGNOTE,COLOR,SIZE,VENDID,
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
			$item["ORDERQTY"] = $stats["FINALQTY"];		
			$item["DECISION"] = $stats["DECISION"];
			if(isset($stats["RCVQTY"]))
				$item["LASTRCVQTY"] = $stats["RCVQTY"];
			else 
				$item["LASTRCVQTY"] = "0";

			$sql = "SELECT TOP(1)TRANDISC,TRANCOST,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE";		
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
			$item["ORDERQTY"] = $stats["FINALQTY"];		
			$item["DECISION"] = $stats["DECISION"];	
			$item["LASTRCVQTY"] = $stats["RCVQTY"];	
		}else if ($type == "PROMOSTATS"){
			$stats = calculatePenalty($barcode,$expiration,$depreciationtype);
			$item["STATUS"] = $stats["status"];
			$item["PERCENTPENALTY"] = $stats["percentpenalty"];	
			$item["PERCENTPROMO"] = $stats["percentpromo"];	
			$item["START"] = $stats["start"];
			$item["END"] = $stats["end"];
			$item["POLICY"]	= $stats["policy"];
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
	return "'1111','200-100','200-101','2222','6666','L0026'";
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
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOSTX',
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
		(SELECT TOP(1) TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID ORDER BY TRANDATE DESC) as 'LASTCOST',
	
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
			(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = [ICPRODUCT].PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'COST',
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
	$cvUser = CVUserByLogin($login);

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


/*                                   
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
				// HERE WAITING WILL BECOME VALIDATED
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
*/

function markAnomalies()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$sql = "SELECT * FROM SUPPLY_RECORD WHERE ANOMALY_STATUS is null and PONUMBER is not null";
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

			if ( floatval($item["PPSS_WAITING_CALCULATED"]) != floatval($item["PPSS_WAITING_QUANTITY"]))
			{
				$status = "ANOMALYUNSOLVED";				
				break;
			} 						

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
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE ANOMALY_STATUS = ? ORDER BY LAST_UPDATED DESC";
		$params = array($status);
	}	
	else if ($status == "ORDERED")
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND STATUS = ? AND CREATED > date('now','-45 day') ORDER BY LAST_UPDATED DESC";	
	else if ($status == "RECEIVEDBOTH"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND (STATUS = 'RECEIVED' OR STATUS = 'RECEIVEDFRESH')  ORDER BY LAST_UPDATED DESC";	
		$params = array();
	}
	else if ($status == "RECEIVEDFORTRANSFERBOTH"){
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND (STATUS = 'RECEIVEDFORTRANSFER' OR STATUS = 'RECEIVEDFORTRANSFERFRESH')  ORDER BY LAST_UPDATED DESC";	
		$params = array();
	}			
	else 
		$sql = "SELECT * FROM SUPPLY_RECORD WHERE TYPE = 'PO' AND STATUS = ? ORDER BY LAST_UPDATED DESC LIMIT 200";			

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
			$now = date("Y-m-d H:i:s");

			$sql = "SELECT ICPRODUCT.VENDID,VENDNAME FROM ICPRODUCT,APVENDOR WHERE APVENDOR.VENDID = ICPRODUCT.VENDID AND PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($items[0]["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			
			$vendorid = $res["VENDID"];
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
										PPSS_DELIVERED_DISCOUNT = PPSS_WAITING_DISCOUNT,										
										WHERE PONUMBER = ?";

			// Set Expire
			foreach($items as $item)
			{
				if ($item["EXPIRE"] != "NO EXPIRE"){
					$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_EXPIRE = ? WHERE PONUMBER = ? AND PRODUCTID = ?"; 
					$req = $db->prepare($sql);				
					$req->execute(array($item["EXPIRE"]));	
				}
				
			}										
			$req = $db->prepare($sql);
			$req->execute(array($ponumber));										

			if ($items[0]["LOCID"] == "WH1")
				$status = "RECEIVEDFORTRANSFERFRESH";
			else 
				$status = "RECEIVEDFORTRANSFER";

			$resp["message"] = "Po created and received with number ".$ponumber;
			
			
			$db->beginTransaction();
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,?,'NOPO','YES')"; // LEAVE NBINVOICES TO ZERO
			$req = $db->prepare($sql);
			$req->execute(array($ponumber, $author, $vendorid, $vendname, $now,$status));
			$supplyrecordid = $db->lastInsertId();
			$db->commit(); 

			if ($json["TYPE"] ==  "NOPOPOOL"){
				$sql = "DELETE FROM SUPPLYRECORDNOPOPOOL WHERE USERID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($json["USERID"]));	
			}
					
			// NEW CODE FOR PAYMENT
			$sql = "INSERT INTO EXTERNALPAYMENT (SUPPLY_RECORD_ID,STATUS,PAYMENTAMOUNT,REQUESTER,PAYMENTTYPE,PAYMENTNUMBER,PAYMENTNAME,REQUESTER) VALUES (?,?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($supplyrecordid,"WAITING",$json["PAYMENTAMOUNT"],$json["AUTHOR"],$json["PAYMENTTYPE"],$json["PAYMENTNUMBER"],$json["PAYMENTNAME"],$author));	
			
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
		$item["REASON"] = $json["REASON"];
		$item["VAT"] = $json["VAT"];
		$items = array();
		array_push($items,$item);
	}else{ // EXCEL
		$items = json_decode($json["ITEMS"],true);	
	}
	
	$message = "";
	foreach($items as $item)
	{
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

		$stats = orderStatistics($item["PRODUCTID"]);
		if ( ($stats["DECISION"] == "NEVER RECEIVED" || $stats["DECISION"] == "TOOEARLY" ) && ($item["SPECIALQTY"] == "" || $item["SPECIALQTY"] == null) ){
			$message .= "\n".$item["PRODUCTID"]." Not Added";
			continue;
		}
		$item["ALGOQTY"] = $stats["FINALQTY"];

		$sql = "SELECT TOP(1) TRANCOST,VAT_PERCENT FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE";
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

		if(!isset($item["VAT"]))
		{
			if ($res != false)
				$item["VAT"] = $res["VAT_PERCENT"];
			else
				$item["VAT"] = "0";				
		}


		$item["DECISION"] = $stats["DECISION"];

		if (isset($item["SPECIALQTY"]) && $item["SPECIALQTY"] != "" &&  $item["SPECIALQTY"] != "0")
			$QUANTITY = $item["SPECIALQTY"];
		else
			$QUANTITY = $item["ALGOQTY"];


		
		if ($firstItem == false) // NO RECORD
		{			
			$sql = "INSERT INTO SUPPLYRECORDPOOL (PRODUCTID,ALGOQTY,REQUEST_QUANTITY,DISCOUNT,REASON,COST,DECISION,VAT,USERID) values (?,?,?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["ALGOQTY"],$QUANTITY,$item["DISCOUNT"],$item["REASON"],$item["COST"],$item["DECISION"],$item["VAT"],$userid));
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
				$req->execute(array($QUANTITY,$item["ALGOQTY"],$item["REASON"],$item["COST"],$item["DECISION"],$userid,$item["PRODUCTID"]));	
			}
			else
			{
				$sql = "INSERT INTO SUPPLYRECORDPOOL (PRODUCTID,ALGOQTY,REQUEST_QUANTITY,DISCOUNT,REASON,COST,DECISION,VAT,USERID) values (?,?,?,?,?,?,?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"],$item["ALGOQTY"],$QUANTITY,$item["DISCOUNT"],$item["REASON"],$item["COST"],$item["DECISION"],$item["VAT"],$userid));
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
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME,VENDNAME,PPSS_HAVE_EXTERNAL, PACKINGNOTE FROM ICPRODUCT,APVENDOR WHERE ICPRODUCT.VENDID = APVENDOR.VENDID AND ICPRODUCT.PRODUCTID =  ?";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		$item["VENDNAME"] = $res["VENDNAME"];
		$item["PACKING"] = $res["PACKINGNOTE"];
		$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		$item["PPSS_HAVE_EXTERNAL"] = $res["PPSS_HAVE_EXTERNAL"];
		array_push($newData,$item);	

	}
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
			$req = $db->prepare($sql);
			$req->execute(array($json["LOCID"],$json["PRODUCTID"],$today,$author,16100));
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
		$sql = "UPDATE SUPPLY_RECORD SET WAREHOUSE_USER = :author, STATUS = 'DELIVERED',NBINVOICES = :nbinvoices WHERE ID = :identifier";
		$req = $db->prepare($sql);							
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':nbinvoices',$nbinvoices,PDO::PARAM_STR);
		$req->execute();			

		if(isset($json["INVOICEJSONDATA"]))
			pictureRecord($json["INVOICEJSONDATA"],"INVOICES",$json["IDENTIFIER"]);
		pictureRecord($json["SIGNATURE"],"WH",$json["IDENTIFIER"]);
		
		if (isset($json["ITEMS"]))
		{
		
			$sql = "SELECT VENDID,VENDNAME FROM POHEADER WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$vendres = $req->fetch();
			$vendid = $vendres["VENDID"];
			$vendname = $vendres["VENDNAME"];

			$isSplitCompany = false;

			if ($vendid == "100-003" || $vendid == "100-050" || $vendid == "100-135" || $vendid = "100-010" || $vendid == "100-135" ||  
				$vendid == "100-328" || $vendid == "100-053" || $vendid == "100-065" || $vendid == "100-022" || $vendid == "100-140" || 
				$vendid == "100-015" || $vendid == "400-037" ||	$vendid == "100-108" || $vendid == "100-150" || $vendid == "100-999" || 
				$vendid == "100-103" || $vendid == "100-009" ||
				$vendid == "100-059" || $vendid == "100-123"){
				$isSplitCompany = true;
			}
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

					if (floatval($value["PPSS_DELIVERED_PRICE"]) > floatval($res["PPSS_WAITING_PRICE"]))
						$HaveAnomaly  = true;					

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
				$sql = "UPDATE SUPPLY_RECORD SET ANOMALY_STATUS = 'Y' WHERE ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($json["IDENTIFIER"]));				
			}

			if ($isSplitCompany  == true){
				$ponumber = splitPOWithItems($json["PONUMBER"],$absentitems,$json["AUTHOR"]);
				$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,'ORDERED','PO','YES')";
				$req = $db->prepare($sql);
				$now = date("Y-m-d H:i:s");
				$req->execute(array($ponumber, $json["AUTHOR"], $vendid, $vendname, $now));						

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



			// RECALCULATE AMOUNT ON POHEADER
			/*
			$sql = "SELECT EXTCOST FROM PODETAIL WHERE PONUMBER = ? ";
			$req = $dbBLUE->prepare($sql);
			$req->execute(array($json["PONUMBER"]));
			$details = $req->fetchAll();
			$totalAMT = 0;
			$totalVAT = 0;
			foreach($details as $detail)			
				$totalAMT += $detail["EXTCOST"];
				$totalVAT += $detail["VAT"]

			$sql = "UPDATE POHEADER SET PURCHASE_AMT = ? WHERE PONUMBER = ?";
			$req = $dbBLUE->prepare($sql);			
			$req->execute(array($totalAMT,$json["PONUMBER"]));
			*/

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
			$sql = "SELECT *,count(*) as 'CNT' FROM ITEMREQUESTTRANSFERPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);		

			if ($res["CNT"] == 0){
				$sql = "INSERT INTO ITEMREQUESTTRANSFERPOOL (PRODUCTID,REQUEST_QUANTITY) VALUES (?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["TRANQTY"]));		
			}else{
				$sql = "UPDATE ITEMREQUESTTRANSFERPOOL SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["TRANQTY"],$item["PRODUCTID"]));			
			}
		}	
	
		$sql = "UPDATE SUPPLY_RECORD SET STATUS = 'RECEIVED', TRANSFERER_USER = :author 
				WHERE ID = :identifier";			
		$req = $db->prepare($sql);
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);					
		$req->execute();
		
		pictureRecord($json["SIGNATURE"],"TR",$json["IDENTIFIER"]);
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

		$sql = "SELECT * FROM PODETAIL WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber));

		$items = $req->fetchAll(PDO::FETCH_ASSOC);
		foreach($items as $item)
		{
			$sql = "SELECT *,count(*) as 'CNT' FROM ITEMREQUESTTRANSFERFRESHPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);		

			if ($res["CNT"] == 0){
				$sql = "INSERT INTO ITEMREQUESTTRANSFERFRESHPOOL (PRODUCTID,REQUEST_QUANTITY) VALUES (?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["RECEIVE_QTY"]));		
			}else{
				$sql = "UPDATE ITEMREQUESTTRANSFERFRESHPOOL SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["RECEIVE_QTY"],$item["PRODUCTID"]));			
			}
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
			$status = 'RECEIVEDFORTRANSFERFRESH';
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
	/*
	else if ($json["ACTIONTYPE"] == "RCV"){
		if (isset($json["LINKEDPO"]) && $json["LINKEDPO"] != "")		
			$ponumber  = $json["LINKEDPO"];				
		else
			$ponumber  = $json["PONUMBER"];

		$sql = "SELECT LOCID FROM PORECEIVEHEADER WHERE PONUMBER = ?";
		$req = $dbBLUE->prepare($sql);
		$req->execute(array($ponumber));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		
		if ($res == false)
			$status = 'RECEIVEDFORTRANSFER';
		else 
		{
			if ($res["LOCID"] == "WH1")
				$status = 'RECEIVEDFORTRANSFERFRESH';
			else if ($res["LOCID"] == "WH2")
				$status = 'RECEIVEDFORTRANSFER';
		}
		
		if (isset($json["LINKEDPO"]) && $json["LINKEDPO"] != "")		
		{
			$sql = "UPDATE SUPPLY_RECORD SET STATUS = :status, RECEIVER_USER = :author, 
				LINKEDPO = :linkedpo WHERE ID = :identifier";			
			$req = $db->prepare($sql);			
			$req->bindParam(':linkedpo',$json["LINKEDPO"],PDO::PARAM_STR);								
		}
		else{
			$sql = "UPDATE SUPPLY_RECORD SET STATUS = :status, RECEIVER_USER = :author 
				 WHERE ID = :identifier";			
			$req = $db->prepare($sql);			
		}
		$req->bindParam(':status',$status,PDO::PARAM_STR);
		$req->bindParam(':identifier',$json["IDENTIFIER"],PDO::PARAM_STR);	
		$req->bindParam(':author',$json["AUTHOR"],PDO::PARAM_STR);
		$req->execute();						
		pictureRecord($json["SIGNATURE"],"RCV",$json["IDENTIFIER"]);
		$data["result"] = "OK";
	}*/
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
		error_log("DANGER CANCEL !!!");
		$sql = "UPDATE PODETAIL SET PPSS_DELIVERED_QUANTITY = '0',PPSS_DELIVERED_PRICE = '0',PPSS_WAITING_QUANTITY = '0', PPSS_NOTE = null,PPSS_DELIVERED_EXPIRE = null WHERE  PONUMBER = ? ";
		$req = $dbBLUE->prepare($sql);
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
					(SELECT  TOP(1)(TRANCOST - (TRANCOST * TRANDISC/100))  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID) as 'RECEIVECOST',
					(SELECT  TOP(1) TRANQTY  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID) as 'RECEIVEQTY',	
					PPSS_WAITING_CALCULATED,		
				   TRANDISC,EXTCOST,
				   PPSS_WAITING_QUANTITY,PPSS_WAITING_PRICE,PPSS_WAITING_VAT,PPSS_WAITING_DISCOUNT,
				   PPSS_VALIDATED_QUANTITY,
				   PPSS_DELIVERED_QUANTITY,PPSS_DELIVERED_PRICE,PPSS_DELIVERED_VAT,PPSS_DELIVERED_DISCOUNT,PPSS_DELIVERED_EXPIRE
				   PPSS_NOTE
				   FROM PODETAIL WHERE PONUMBER = ? AND PRODUCTID IN (SELECT PRODUCTID FROM PORECEIVEDETAIL WHERE PONUMBER = ?)	 ORDER BY PRODUCTID ASC";	
	}
	else{
		$sql = "SELECT PRODUCTID,replace(replace(replace(PRODUCTNAME,char(10),''),char(13),''),'\"','') as PRODUCTNAME,
					VENDNAME,VAT_PERCENT,ORDER_QTY,TRANCOST,TRANDISC,
					(SELECT  TOP(1)(TRANCOST - (TRANCOST * TRANDISC/100))  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID) as 'RECEIVECOST',
					(SELECT  TOP(1) TRANQTY  FROM PORECEIVEDETAIL WHERE PONUMBER = ?  AND PRODUCTID = PODETAIL.PRODUCTID) as 'RECEIVEQTY',			
				   TRANDISC,EXTCOST,
				   PPSS_WAITING_QUANTITY,PPSS_WAITING_PRICE,PPSS_WAITING_VAT,PPSS_WAITING_DISCOUNT,
				   PPSS_VALIDATED_QUANTITY,
				   PPSS_DELIVERED_QUANTITY,PPSS_DELIVERED_PRICE,PPSS_DELIVERED_VAT,PPSS_DELIVERED_DISCOUNT,PPSS_DELIVERED_EXPIRE
				   PPSS_NOTE
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

		 $sql = "SELECT PRODUCTNAME,PRODUCTNAME1,VENDNAME,LASTCOST,PRICE,PACKINGNOTE,HAS_PLT,APVENDOR.TAX,PPSS_IS_BLACKLIST,PPSS_IS_PRICEFIXED
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
		
		$item["PRICE"] = $res["PRICE"];
		array_push($tmpItems, $item); 	
	}

	$extradata = array();
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
	$extradata["ID"] = $rr["ID"];

	$rr["items"] = $tmpItems;
	$rr["extradata"] = $extradata;

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $rr;
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


function createGroupedRestocks()
{
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	/*
	$sql = "SELECT DISTINCT(VENDID) FROM ITEMREQUESTUNGROUPEDRESTOCKPOOL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);
	*/

	$OTHER = array("VENDID" =>  "OTHER", "VENDNAME" => "OTHER");
	$SOPHIESOK = array("VENDID" =>  "400-463", "VENDNAME" => "SOPHIE SOK");
	$MAKROCLICK = array("VENDID" => "400-429", "VENDNAME" => "MAKRO CLICK");
	$vendors = array($SOPHIESOK,$MAKROCLICK,$OTHER);
	$maxItem = 30;

	foreach($vendors as $vendor)
	{				
			$sql = "SELECT * FROM ITEMREQUESTUNGROUPEDRESTOCKPOOL WHERE VENDID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$items = $req->fetchAll(PDO::FETCH_ASSOC);

			foreach($items as $item)
			{
				//itemIsInGroupedRestock
				$sql = "SELECT ITEMREQUESTACTION_ID,count(*) as 'CNT' FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID IN 
				 (SELECT ID FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDRESTOCK' AND REQUESTEE IS NULL)"; 
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if ($res['CNT'] == 0)
					$irID =  false;
				else	
					$irID = $res["ITEMREQUESTACTION_ID"];	

				
				if ($irID != false)// JUST UPDATE
				{						
						$sql = "UPDATE ITEMREQUEST SET REQUEST_QUANTITY = REQUEST_QUANTITY + ? WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
						$req = $db->prepare($sql);
						$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$irID));
				}
				else 
				{
					$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDRESTOCK' AND ARG1 = ? AND REQUESTEE IS NULL"; 
					$req = $db->prepare($sql);
					$req->execute(array($vendor["VENDID"]));
					$irs = $req->fetchAll(PDO::FETCH_ASSOC);

					$theID = null;
					// ID SEARCHING
					if (count($irs) == 0)// NEW 
					{
						$db->beginTransaction();
						$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2) VALUES ('GROUPEDRESTOCK','AUTO',?,?)";
						$req = $db->prepare($sql);
						$req->execute(array($vendor["VENDID"],$vendor["VENDNAME"]));	
						$theID = $db->lastInsertId(); // ID FROM NEW
						$db->commit();
					}
					else
					{
						foreach($irs as $ir){
							$sql = "SELECT COUNT(*) as 'CNT' FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
							$req = $db->prepare($sql);
							$req->execute(array($ir["ID"]));
							$requests = $req->fetch(PDO::FETCH_ASSOC); 
							if ($requests['CNT'] < $maxItem){ // 
								$theID = $ir["ID"]; // ID FROM OLD WITH ROOM
								break;
							}
						}
						if ($theID == null){ // ALL FULL			
							$db->beginTransaction();			
							$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2) VALUES ('GROUPEDRESTOCK','AUTO',?,?)";
							$req = $db->prepare($sql);
							$req->execute(array($vendor["VENDID"],$vendor["VENDNAME"]));	
							$theID = $db->lastInsertId(); // ID FROM NEW
							$db->commit();
						}										
					}						
					$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,ITEMREQUESTACTION_ID) VALUES (?,?,?)";
					$req = $db->prepare($sql);
					$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$theID));
				}
				// TREATED
				$sql = "DELETE FROM ITEMREQUESTUNGROUPEDRESTOCKPOOL WHERE PRODUCTID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"]));
		  }
	}
}
// ADD TO DEBT


function patchGroupedPurchases()
{
	$db = getInternalDatabase();	

	$dbBlue = getDatabase();
	$sql = "SELECT * FROM ITEMREQUESTACTION WHERE ARG3 IS NULL AND TYPE = 'GROUPEDPURCHASE'";
	$req = $db->prepare($sql);
	$req->execute();
	$actions = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach($actions as $action)
	{		
		$sql = "SELECT orderday FROM SUPPLIER WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($action["ARG1"]));	
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false)
			$orderday = $res["orderday"];
		else 
			$orderday = null;		
		$sql = "UPDATE ITEMREQUESTACTION SET ARG3 = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($orderday,$action["ID"]));

		$sql = "SELECT * FROM ITEMREQUEST WHERE ITEMREQUESTACTION_ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($action["ID"]));
		$items = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($items as $item){
			$sql = "SELECT TRANDISC,TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ?";
			$req = $dbBlue->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res != false){
				$sql = "UPDATE ITEMREQUEST SET DISCOUNT = ?, COST = ?,ORDER_QTY = REQUEST_QUANTITY";
				$req = $db->prepare($sql);
				$req->execute(array($res["TRANDISC"],$res["TRANCOST"]));
			}

			
		}
	}
}



function createGroupedPurchases()
{
	//patchGroupedPurchases();
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$sql = "SELECT DISTINCT(VENDID) FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$vendors = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($vendors as $vendor)
	{
		$sql = "SELECT * FROM ITEMREQUESTACTION WHERE TYPE = 'GROUPEDPURCHASE' AND ARG1 = ? AND REQUESTEE IS null"; 
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

			$sql = "SELECT orderday FROM SUPPLIER WHERE ID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if ($res != false)
				$orderday = $res["orderday"];
			else 
				$orderday = false;

			$db->beginTransaction();
			$sql = "INSERT INTO ITEMREQUESTACTION (TYPE,REQUESTER,ARG1,ARG2,ARG3) VALUES ('GROUPEDPURCHASE','AUTO',?,?,?)";
			$req = $db->prepare($sql);
			$req->execute(array($vendor["VENDID"],$vendorname,$orderday));
			$theID = $db->lastInsertId();
			$db->commit();
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

			$sql = "SELECT TOP(1)TRANCOST,TRANDISC FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";			
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
			$res = $req->fetch(PDO::FETCH_ASSOC);

			if ($res == false){
				$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,COST,DISCOUNT,ITEMREQUESTACTION_ID) VALUES (?,?,?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"], $res["TRANCOST"],$res["TRANDISC"] ,$theID));
			}
			else{
				$sql = "UPDATE ITEMREQUEST SET REQUEST_QUANTITY = REQUEST_QUANTITY + ?, 
						COST = ?,
						DISCOUNT = ?
						WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
				$req = $db->prepare($sql);
				$req->execute(array($item["REQUEST_QUANTITY"],$item["PRODUCTID"],$res["TRANCOST"],$res["TRANDISC"],$theID));
			}
			$sql = "DELETE FROM ITEMREQUESTUNGROUPEDPURCHASEPOOL WHERE PRODUCTID = ?";
			$req = $db->prepare($sql);
			$req->execute(array($item["PRODUCTID"]));
		}

	}	
}

$app->get('/patch', function(Request $request,Response $response) {
	patchGroupedPurchases();
	$resp["RES"] = "OK";
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
		createGroupedPurchases();
	
		$days = array("MON","TUE","WED","THU","FRI","SAT");
		$data = array();
				foreach($days as $day)
				{
					$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' 
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
	else
	{
		if ($type == "GROUPEDRESTOCK")
		createGroupedRestocks();

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
		{		
				$sql = "SELECT 	ID,TYPE,REQUESTER,REQUESTEE,REQUEST_TIME,REQUEST_UPDATED,ARG1,replace(ARG2,char(39),'') as 'ARG2' FROM ITEMREQUESTACTION WHERE REQUESTEE IS NULL AND TYPE = ? AND ID IN (SELECT ITEMREQUESTACTION_ID FROM ITEMREQUEST) ORDER BY REQUEST_TIME DESC";			
			
		}
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
		

		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $actions;
		$response = $response->withJson($resp);
		return $response;
	}	
});

$app->post('/itemrequestaction', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();
	$json = json_decode($request->getBody(),true);	

	$db->beginTransaction();    
	if($json["TYPE"] == "PURCHASE" || $json["TYPE"] == "RESTOCK") 
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER,REQUESTEE) VALUES(?,?,'AUTO')";
	else 
		$sql = "INSERT INTO ITEMREQUESTACTION (TYPE, REQUESTER) VALUES(?,?)";
	$req = $db->prepare($sql);

	if (substr($json["TYPE"],0,6) == "DEMAND")
		$req->execute(array("DEMAND",$json["REQUESTER"]));
	else 
		$req->execute(array($json["TYPE"],$json["REQUESTER"]));
	$lastID = $db->lastInsertId();
	$db->commit();    

	$imageData = base64_decode($json["REQUESTERSIGNATURE"]);
	file_put_contents("./img/requestaction/R" .$lastID.".png" , $imageData);

	$items = json_decode($json["ITEMS"],true);

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
		$sql = "INSERT INTO ITEMREQUEST (PRODUCTID,REQUEST_QUANTITY,LOCATION,ITEMREQUESTACTION_ID) VALUES (?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],
					(isset($item["LOCATION"]) ? $item["LOCATION"] : null),$lastID));

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

$app->put('/itemrequest/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$id = $request->getAttribute('id');

	$qty = $json["SPECIALQTY"];
	$reason = $json["REASON"];
	$author = $json["AUTHOR"];

	if (isset($json["SPECIALQTY"]) && isset($json["REASON"]))
	{
		$sql = "SELECT * FROM ITEMREQUEST WHERE ID = ?";
		$req = $db->prepare($sql);
		$res = $req->execute(array($id));


		$oldqty = $res["REQUEST_QUANTITY"];
		$qtychangehistory = $res["QTYCHANGEHISTORY"] . "|" . $oldqty ;
		$qtychangereason = $res["QTYCHANGEREASON"] . "|" . $author . " " . $reason;

		$sql = "UPDATE ITEMREQUEST SET REQUEST_QUANTITY = ?, QTYCHANGE_REASON = ?, QTYCHANGE_HISTORY = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($qty,$qtychangehistory,$qtychangereason,$id));
	}
	$data["result"] = "OK";
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
	$message = "";
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


		if ($type == "TRANSFER")
		{
			if ($item["REQUEST_QUANTITY"] > $ONHANDWH2){				
				$message .= " ".$item["PRODUCTID"];
				continue;
			}
		}
		else
		{
			if ($item["REQUEST_QUANTITY"] > $ONHANDWH1){				
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
	$productid = $json["PRODUCTID"];

	$sql = "DELETE FROM ITEMREQUEST WHERE PRODUCTID = ? AND ITEMREQUESTACTION_ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($productid,$itemrequestactionid));

	$data["result"] = "OK";
	$response = $response->withJson($data);
	return $response;

});

$app->put('/itemrequestaction/{id}', function(Request $request,Response $response) {
	$db = getInternalDatabase();
	$dbBLUE = getDatabase();
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
		else if ($ira["TYPE"] == "RESTOCK" || $ira["TYPE"] == "GROUPEDRESTOCK")  // WAREHOUSE VALIDATE RESTOCK AND TO TRANFER POOL & PURCHASE POOL
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
			$req = $db->prepare($sql);
			$req->execute(array($ponumber));
			$res = $req->fetch(PDO::FETCH_ASSOC);
			
			$now = date("Y-m-d");
			if ($res != false){
				$vendorid = $res["VENDID"];
				$vendid = $res["VENDNAME"];
			}else{
				$vendorid = "";
				$vendid = "";
			}			
			$sql = "INSERT INTO SUPPLY_RECORD (PONUMBER,PURCHASER_USER, VENDID,VENDNAME, PODATE , STATUS,TYPE, AUTOVALIDATED) VALUES (?,?,?,?,?,?,'PO','NO')"; 
			$req = $db->prepare($sql);			

			$req->execute(array($ponumber,$json["AUTHOR"], $vendorid, $vendname, $now,));
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
	
	$tax = "";
	$newData = array();
	foreach($items as $item){
		$itemID = $item["PRODUCTID"];

		// TYPE
		$item["TYPE"] = $type;
		$item["REQUESTER"] = $requester;
	
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
		// VENDNAME
		$sql = "SELECT PRODUCTNAME,replace(VENDNAME,char(39),'') as 'VENDNAME' ,PACKINGNOTE,TAX
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
			if ($tax == "") // Do it once
				$tax = $res["TAX"];
		} else{
			$item["VENDNAME"] = "";
			$item["PACKINGNOTE"] = "";
			$item["PRODUCTNAME"] = "";
		}	
		
		
		$sql = "SELECT TOP(1) TRANDISC, VAT_PERCENT,TRANCOST FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
		$req = $dbBlue->prepare($sql);
		$req->execute(array($itemID));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != false){
			$item["VAT"] = $res["VAT_PERCENT"];
			$item["DISCOUNT"] = $res["TRANDISC"];
			$item["COST"] = $res["TRANCOST"];
		}else{
			$item["VAT"] = "0";
			$item["DISCOUNT"] = "0";
			$item["COST"] = "0";
		}

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
	else if (substr($type,0,6) == "DEMAND"){		
		$userid = substr($type,7);
		$sql = "SELECT *,IFNULL((SELECT 'YES' FROM ITEMREQUESTDEBT WHERE ITEMREQUESTDEBT.PRODUCTID = ITEMREQUESTDEMANDPOOL.PRODUCTID),'NO') as 'IS_DEBT' FROM  ITEMREQUESTDEMANDPOOL WHERE USERID = ".$userid;
	}
	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$IDS = extractIDS($items);

	$sql = "SELECT PACKINGNOTE,VENDNAME,BARCODE,
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
			$sql = "INSERT INTO ITEMREQUESTRESTOCKPOOL (PRODUCTID,REQUEST_QUANTITY,VENDNAME,PACKINGNOTE,LISTNAME) values(?,?,?,?,?)";
			$req = $db->prepare($sql);				
			
			$req->execute(array($item["PRODUCTID"],$item["REQUEST_QUANTITY"],$vendname,$packingnote,$json["LISTNAME"]));																						
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
		
		$sql = "DELETE FROM ITEMREQUESTPURCHASEPOOL where PRODUCTID =  ?";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"]));								

		if(isset($json["SPECIALQTY"]) && isset($json["REASON"]))
		{
				$sql = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY,SPECIALQTY,REASON) values(?,?,?,?)";
				$req = $db->prepare($sql);				
				$req->execute(array($json["PRODUCTID"],$json["SPECIALQTY"],$json["SPECIALQTY"],$json["REASON"]));
		}
		else{
				$sql = "INSERT INTO ITEMREQUESTPURCHASEPOOL (PRODUCTID,REQUEST_QUANTITY) values(?,?)";
				$req = $db->prepare($sql);				
				$req->execute(array($json["PRODUCTID"],$json["REQUEST_QUANTITY"]));																	
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
		$sql = "INSERT INTO ".$tableName." (PRODUCTID,REQUEST_QUANTITY) values(?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["REQUEST_QUANTITY"]));		
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
	$data["result"] = "OK";
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
		$sql = "UPDATE ITEMREQUESTRESTOCKPOOL SET REQUEST_QUANTITY = ?,COMMENT =  ? WHERE PRODUCTID = ? AND LISTNAME = ? ";
		$req = $db->prepare($sql);
		$req->execute(array($json["REQUEST_QUANTITY"],$json["COMMENT"],$json["PRODUCTID"],$json["LISTNAME"]));	
	}
	else
	{
		$sql = "UPDATE ".$tableName." SET REQUEST_QUANTITY = ?,COMMENT = COMMENT || ' ' || ? WHERE PRODUCTID = ?".$suffix;
		$req = $db->prepare($sql);
		$req->execute(array($json["REQUEST_QUANTITY"],$json["PRODUCTID"],$json["COMMENT"]));	
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
			,(select TOP(1) TRANCOST from ICTRANDETAIL WHERE PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANTYPE = 'R' ORDER BY TRANDATE DESC) as 'LASTCOST'
			
			,ISNULL(((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'I' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019') * -1),0) as 'TOTALSALE'
			,ISNULL((SELECT SUM(TRANQTY) FROM ICTRANDETAIL WHERE TRANTYPE = 'R' AND PRODUCTID = dbo.ICPRODUCT.PRODUCTID AND TRANDATE > '11-1-2019'),0) as 'TOTALRECEIVE'			
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
	
	$sql = "SELECT (SUM(TOTAL_AMT) - SUM(COST * QTY)) AS PROFIT, SUM(TOTAL_AMT) AS SALE
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
	dbo.POSDETAIL.PRODUCTID
	,dbo.POSDETAIL.PRODUCTNAME
	,dbo.POSDETAIL.PRODUCTNAME1
	,dbo.POSDETAIL.PRICE
	,dbo.ICPRODUCT.COST
	,dbo.POSDETAIL.CATEGORYID
	,dbo.ICPRODUCT.COLOR	
	,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH1' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH1'
	,(SELECT LOCONHAND FROM dbo.ICLOCATION  WHERE LOCID = 'WH2' AND dbo.ICLOCATION.PRODUCTID = dbo.POSDETAIL.PRODUCTID) as  'WH2'
	,VENDNAME
	,COUNT(dbo.POSDETAIL.PRODUCTID) AS 'COUNT'
	FROM dbo.POSDETAIL,dbo.ICPRODUCT,dbo.APVENDOR
	WHERE dbo.POSDETAIL.PRODUCTID = dbo.ICPRODUCT.PRODUCTID
	AND dbo.APVENDOR.VENDID = dbo.ICPRODUCT.VENDID
	AND POSDATE >=  ?
	AND POSDATE <= ?";
	if($category != 'ALL')
	{
		$sql .= " AND dbo.POSDETAIL.CATEGORYID = ?";
		$params = array($from,$to,$category);		
	}else{		
		$params = array($from,$to);
	}	
	$sql .=	" GROUP BY dbo.POSDETAIL.PRODUCTID,dbo.POSDETAIL.PRODUCTNAME,dbo.POSDETAIL.PRODUCTNAME1,dbo.POSDETAIL.PRICE,VENDNAME,TOTALSALE,TOTALRECEIVE,dbo.POSDETAIL.CATEGORYID,dbo.ICPRODUCT.COLOR,dbo.ICPRODUCT.COST
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

	$left = explode('.',$res["PROFIT"])[0];
	$right = explode('.',$res["PROFIT"])[1];
	$profit = $left.".".substr($right, 0,2);

	$left = explode('.',$res["SALE"])[0];
	$right = explode('.',$res["SALE"])[1];
	$sale = $left.".".substr($right, 0,2);

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
$app->get('/selfpromotionitemstats',function(Request $request,Response $response) {    
	$conn=getDatabase();	 
	
	$item = null;
	$barcode = $request->getParam('barcode','');		
	$expiration = $request->getParam('expiration','');
	$type = $request->getParam('type','');
	

	$sql="SELECT PRODUCTID,BARCODE,PRODUCTNAME,PRODUCTNAME1,COST,PRICE,COLOR,SIZE,VENDID,	
		  FROM dbo.ICPRODUCT  
	      WHERE BARCODE = ?";
	$req=$conn->prepare($sql);
	$req->execute(array($barcode));
	$item =$req->fetch(PDO::FETCH_ASSOC);
	if(isset($item["COST"]))
		$item["COST"] = sprintf("%.4f",$item["COST"]);
	else 
		$item["COST"] = "0";
	
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

$app->get('/selfpromotion', function($request,Response $response) {
	$status =  $request->getParam('status','');
	$type =  $request->getParam('type','');
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

	$req = $db->prepare($sql);
	$req->execute($params);
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

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
		$sql = "SELECT PRODUCTNAME,STKUM,PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["STKUM"] = $res["STKUM"];
			$item["PRICE"] = $res["PRICE"];			
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

	foreach($items as $item){
		$sql = "INSERT INTO SELFPROMOTIONITEM (PRODUCTID,QUANTITY1,EXPIRATION,STARTTIME1,LINKTYPE1,
		PERCENTPENALTY1,PERCENTPROMO1,TYPE,CREATOR,STATUS) 
		VALUES (?,?,?,date('now'),?,?,?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["QUANTITY"],$item["EXPIRATION"],$item["LINKTYPE"],
		$item["PERCENTPROMO"],$item["TYPE"],$author,'CREATED'));			
	}

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
	$in30days = strtotime('+30 days');
	$in30days = date("Y-m-d",$in30days);

	$sql = "SELECT * FROM SELFPROMOTIONITEM WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id)); 
	$item = $req->fetch(PDO::FETCH_ASSOC);

	if ($status == "VALIDATED"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'VALIDATED',VALIDATOR = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id,$author));
	}else if ($status == "PROMOTED"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'STEP1' WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($id));

		if ($item["LINKTYPE"] == "SYSTEM")
			attachPromotion($item["PRODUCTID"],$item["PERCENTPROMO1"],$today,$in30days,$author);	
	}else if ($status == "FINISHED"){
		$sql = "UPDATE SELFPROMOTIONITEM SET STATUS = 'FINISHED' WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array());
		endPromotion($item["PRODUCTID"]);
	}
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
		attachPromotion($PRODUCTID,$PERCENTPROMO,$today,$in30days,$author);	
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
		$db->beginTransaction();    
		$sql = "INSERT INTO SELFPROMOTIONITEMPOOL (PRODUCTID,QUANTITY,EXPIRATION,STARTTIME,ENDTIME,
													LINKTYPE,TYPE,PERCENTPROMO,PERCENTPENALTY,STATUS,
													USERID) 
													VALUES (?,?,?,?,?,
															?,?,?,?,?,
															?)";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["EXPIRATION"],$json["STARTTIME"],$json["ENDTIME"],
		$json["LINKTYPE"],$json["TYPE"],$json["PERCENTPROMO"],$json["PERCENTPENALTY"],$json["STATUS"],
		$json["USERID"]));	
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


//CLEARANCETOOMUCH,CLEARANCELOWSELL,CLEARANCEDAMAGED, EXPIREPROMOTION, DAMAGEWASTE EXPIREWASTE
$app->get('/depreciation', function($request,Response $response) {

	$type = $request->getParam('type','');
	$status =  $request->getParam('status','');

	$db = getInternalDatabase();	
	$params = array();	
	$sql = "SELECT * FROM DEPRECIATION WHERE 1 = 1 ";

	if ($type != '')
	{
		if ($type == "WASTE"){
			$sql .= " AND (TYPE = ? OR TYPE = ?)";
			array_push($params,"EXPIREWASTE");
			array_push($params,"DAMAGEWASTE");
		}else if ($type == "PROMOTION"){
			$sql .= " AND (TYPE = ? OR TYPE = ? OR TYPE = ? OR TYPE = ?)";
			array_push($params,"EXPIREPROMOTION");
			array_push($params,"CLEARANCEMEDIUMDAMAGEDPROMOTION");
			array_push($params,"CLEARANCEHIGHDAMAGEDPROMOTION");
			array_push($params,"CLEARANCELOWSELLPROMOTION");
		}				
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

$app->get('/depreciationdetails/{id}',function($request,Response $response) {
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	$id = $request->getAttribute('id');
	$sql = "SELECT * FROM DEPRECIATIONITEM WHERE   DEPRECIATION_ID1 = ? OR DEPRECIATION_ID2 = ? 
																				    OR   DEPRECIATION_ID3 = ? OR DEPRECIATION_ID4 = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id,$id,$id,$id));																			     
	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$newItems = array();
	foreach($items as $item){
				if($item["TYPE"] == "EXPIREWASTE" || $item["TYPE"] == "DAMAGEWASTE")
			$imgfolder = "./img/waste_proofs/";		
		else
			$imgfolder = "./img/promo_proofs/";		
		$nbproofs = 0;
		$count = 1;
		while(file_exists($imgfolder.$item["ID"]."_".$count.".png")){
	      $nbproofs++;
	      $count++;        	    
	  }
	  $item["NBPROOFS"] = $nbproofs;
		$sql = "SELECT PRODUCTNAME,STKUM,PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->execute(array($item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		if ($res != null){
			$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
			$item["STKUM"] = $res["STKUM"];
			$item["PRICE"] = $res["PRICE"];			
		}
			
		array_push($newItems,$item);
	}


	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newItems;
	$response = $response->withJson($resp);

	return $response;
});

$app->post('/depreciation', function($request,Response $response) {
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	$items = $json["ITEMS"];
	$type = $json["TYPE"];	
	$author = $json["AUTHOR"];
	$userid = $json["USERID"];

	$db->beginTransaction();    
	$sql = "INSERT INTO DEPRECIATION (TYPE,CREATOR,STATUS) VALUES (?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($type,$author,"CREATED"));
	$lastId = $db->lastInsertId();
	$db->commit();    
	pictureRecord($json["CREATORSIGNATUREIMAGE"],"DEPRECIATION_CREATOR",$lastId);

	foreach($items as $item)
	{			
		$sql = "SELECT * FROM DEPRECIATIONITEM WHERE EXPIRATION = ? AND PRODUCTID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["EXPIRATION"],$item["PRODUCTID"]));
		$res = $req->fetch(PDO::FETCH_ASSOC);

		$PRODUCTID = $item["PRODUCTID"];
		$EXPIRATION = isset($item["EXPIRATION"]) ?  $item["EXPIRATION"] : ""; 		
		$QUANTITY = isset($item["QUANTITY"]) ? $item["QUANTITY"] : "";		
		
		
		$NEEDLABEL = isset($item["NEEDLABEL"]) ? $item["NEEDLABEL"] : "";

		$LINKTYPE = isset($item["LINKTYPE"]) ? $item["LINKTYPE"] : ""; // IF SYSTEM LINK BLUE		
		$STARTTIME = isset($item["STARTTIME"]) ? $item["STARTTIME"] : ""; // CALCULATED IN APP PHASE 2
		$ENDTIME = isset($item["ENDTIME"]) ? $item["ENDTIME"] : ""; // CALCULATED IN APP PHASE 2

	
		$PERCENTPENALTY = isset($item["PERCENTPENALTY"]) ? $item["PERCENTPENALTY"] : "";
		$PERCENTPROMO = isset($item["PERCENTPROMO"]) ? $item["PERCENTPROMO"] : "";

		if(intval($PERCENTPENALTY) != 0)
			$status = 'UNSOLVED';
		else
			$status = 'NOPENALTY';


		if ($res == false)
		{	
				$db->beginTransaction();    
				$sql = "INSERT INTO DEPRECIATIONITEM (PRODUCTID,QUANTITY1,EXPIRATION,NEEDLABEL,STARTTIME1,ENDTIME1,LINKTYPE1,PERCENTPENALTY1,PERCENTPROMO1,TYPE,DEPRECIATION_ID1,STATUS1) 
							  VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
				$req = $db->prepare($sql);
				$req->execute(array($PRODUCTID,$QUANTITY,$EXPIRATION,$NEEDLABEL,$STARTTIME,$ENDTIME,$LINKTYPE,$PERCENTPENALTY,$PERCENTPROMO,$item["TYPE"],$lastId,$status));			
				$depreciationItemId =  $db->lastInsertId();
				$db->commit();    
		}
		else
		{
			// IF PRECEDENT IS ZERO OR N/A THEN 0
			if ($res["DEPRECIATION_ID3"] != ""){
				//$last = $res["PERCENTPENALTY2"];
				$cnt = "4";				
			}
			else if($res["DEPRECIATION_ID2"] != ""){
				//$last = $res["PERCENTPENALTY1"];
				$cnt = "3";				
			}
			else if($res["DEPRECIATION_ID1"] != ""){
				$cnt = "2";
			}			
			
			$sql = "UPDATE DEPRECIATIONITEM SET QUANTITY".$cnt." = ?, STARTTIME".$cnt." = ?, ENDTIME".$cnt." = ?, DEPRECIATION_ID".$cnt." = ?,  
							LINKTYPE".$cnt." = ?, PERCENTPENALTY".$cnt." = ?, PERCENTPROMO".$cnt." = ?, STATUS".$cnt." = ?  
							WHERE PRODUCTID = ? AND EXPIRATION = ?";
			$req = $db->prepare($sql);
			$req->execute(array($QUANTITY,$STARTTIME,$ENDTIME,$lastId,$LINKTYPE,$PERCENTPENALTY,$PERCENTPROMO,$status,$PRODUCTID,$EXPIRATION));		
			$depreciationItemId =  $res["ID"];
		}
		if($item["TYPE"] == "DAMAGEWASTE" || $item["TYPE"] == "EXPIREWASTE")
			movePicture($depreciationItemId,$item["ID"],"WASTE");			
		else
			movePicture($depreciationItemId,$item["ID"],"PROMO");					
	}
	$resp = array();	
	if ($type == "DAMAGEWASTE" || $type == "EXPIREWASTE")
		$sql = "DELETE FROM DEPRECIATIONWASTEPOOL where USERID = ?";		
	else
		$sql = "DELETE FROM DEPRECIATIONPROMOPOOL where USERID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($userid));	

	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;
});
 
$app->put('/depreciation', function($request,Response $response) {
		
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();
	$id = $json["ID"];
	$status = $json["STATUS"];
	$author = $json["AUTHOR"];	
	if ($status == "VALIDATED"){
		$sql = "UPDATE DEPRECIATION SET STATUS = 'VALIDATED', VALIDATOR = ? WHERE ID = ?";
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));
		pictureRecord($json["VALIDATORSIGNATUREIMAGE"],"DEPRECIATION_VALIDATOR",$id);
	  	pictureRecord($json["WITNESSSIGNATUREIMAGE"],"DEPRECIATION_WITNESS",$id);
	}
	else if ($status == "CLEARED"){
		$sql = "UPDATE DEPRECIATION SET STATUS = 'CLEARED', CLEARER = ? WHERE ID = ?";
		pictureRecord($json["CLEARERSIGNATUREIMAGE"],"DEPRECIATION_CLEARER",$id);
		$req = $db->prepare($sql);
		$req->execute(array($author,$id));
	}		

	$sql = "SELECT * FROM DEPRECIATIONITEM WHERE DEPRECIATION_ID1 = ? OR DEPRECIATION_ID2 = ? OR DEPRECIATION_ID3 = ? OR DEPRECIATION_ID4 = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	foreach ($items as $item) {
			if ($item["DEPRECIATION_ID1"] == $id  && $item["LINKTYPE1"] == "SYSTEMLINK" && $item["STARTTIME1"] != null  && $item["ENDTIME1"] != null){				
				attachPromotion($item["PRODUCTID"],$item["PERCENTPROMO1"],$item["STARTTIME1"],$item["ENDTIME1"],$author);
			}									
			if ($item["DEPRECIATION_ID2"] == $id  && $item["LINKTYPE2"] == "SYSTEMLINK" && $item["STARTTIME2"] != null  && $item["ENDTIME2"] != null)									attachPromotion($item["PRODUCTID"],$item["PERCENTPROMO2"],$item["STARTTIME2"],$item["ENDTIME2"],$author);
			if ($item["DEPRECIATION_ID3"] == $id  && $item["LINKTYPE3"] == "SYSTEMLINK" && $item["STARTTIME3"] != null  && $item["ENDTIME3"] != null)									attachPromotion($item["PRODUCTID"],$item["PERCENTPROMO3"],$item["STARTTIME3"],$item["ENDTIME3"],$author);
			if ($item["DEPRECIATION_ID4"] == $id  && $item["LINKTYPE4"] == "SYSTEMLINK" && $item["STARTTIME4"] != null  && $item["ENDTIME4"] != null)									attachPromotion($item["PRODUCTID"],$item["PERCENTPROMO4"],$item["STARTTIME4"],$item["ENDTIME4"],$author);
		
			
	}	
	$req = $db->prepare($sql);
	$req->execute(array($status,$author,$id));		

	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;																			 
});


$app->get('/depreciationalert',function($request,Response $response) {

	$db = getInternalDatabase();
	$sql = "SELECT * FROM DEPRECIATIONITEM 
					WHERE
					( 
					((JULIANDAY(ENDTIME1) - DATETIME('now')) < 2 AND STARTTIME2 = '')
					OR 
					((JULIANDAY(ENDTIME2) - DATETIME('now')) < 2 AND STARTTIME3 = '')
					OR 	
					((JULIANDAY(ENDTIME3) - DATETIME('now')) < 2 AND STARTTIME4 = '')
					)
					AND PRODUCTID NOT IN (SELECT PRODUCTID FROM DEPRECIATIONPROMOPOOL)";

	$req = $db->prepare($sql);
	$req->execute(array());
	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);
	return $response;
});


// CREATED
$app->get('/depreciationlabelneed', function($request,Response $response) {  
	$db = getInternalDatabase();	
	$blueDB = getDatabase();

	$sql = "SELECT * FROM DEPRECIATIONITEM WHERE NEEDLABEL <> 'NO'";
	$req = $db->prepare($sql);

	$items = $req->fetchAll(PDO::FETCH_ASSOC);
	$tmp = array();
	foreach($items as $item){
		$sql = "SELECT PRODUCTNAME FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $blueDB->prepare($sql);
		$req->prepare($req);
		$res = $req->fetch(PDO::FETCH_ASSOC);		
		$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($tmp,$item);
	} 

	$resp["result"] = "OK";
	$resp["data"] = $tmp;
	$response = $response->withJson($resp);
	return $response;

});

$app->put('/depreciationlabelneed/{id}', function($request,Response $response) {  
	$db = getInternalDatabase();	
	$sql = "UPDATE DEPRECIATIONITEM SET NEEDLABEL = 'NO' WHERE ID = ?";
	$req = $db->prepare($sql);

	$resp["result"] = "OK";	
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
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);
	$sql = "INSERT INTO EXPIREPROMOTED (PRODUCTID,EXPIREDATE,TYPE,PRODUCTNAME,AUTHOR) values (?,?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"],$json["EXPIREDATE"],$json["TYPE"],$json["PRODUCTNAME"],$json["AUTHOR"]));
	$resp = array();
	$resp["result"] = "OK";		
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

$app->get('/expirereturnalert',function ($request,Response $response){
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
					AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) <= ( cast(SUBSTRING(SIZE,3,3) as int) + 5)
				  	AND datediff(day,getdate(), PPSS_DELIVERED_EXPIRE) > 0
					AND PPSS_DELIVERED_EXPIRE <> '1900-01-01'
					AND PPSS_DELIVERED_EXPIRE <> '2001-01-01'
					AND (
						 (PPSS_DELIVERED_EXPIRE = (SELECT MAX(PPSS_DELIVERED_EXPIRE) FROM PODETAIL WHERE PRODUCTID = ICPRODUCT.PRODUCTID)) OR 
						 (PPSS_DELIVERED_EXPIRE = (SELECT PPSS_DELIVERED_EXPIRE FROM (SELECT PPSS_DELIVERED_EXPIRE, ROW_NUMBER() OVER (ORDER BY PPSS_DELIVERED_EXPIRE DESC) AS Seq FROM  PODETAIL WHERE PRODUCTID =  ICPRODUCT.PRODUCTID)t WHERE Seq BETWEEN 2 AND 2)))
					AND ONHAND > 0		
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);
	$req->execute(array());
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

$app->get('/expirenoreturnalert',function ($request,Response $response){
	
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
					AND (convert(varchar,PPSS_DELIVERED_EXPIRE) + ICPRODUCT.PRODUCTID) not in $excludeIDs";
	$req = $dbBlue->prepare($sql);
	$req->execute(array($item["PRODUCTID"]));
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




$app->get('/depreciationsearch',function($request,Response $response) {
	$db = getInternalDatabase();
	$start = $request->getParam('start','');
	$end =  $request->getParam('end','');
	$type = $request->getParam('type','');
	$status = $request->getParam('status','');
	$productid = $request->getParam('productid','');
	$params = array();

	$sql = "SELECT * FROM DEPRECIATION WHERE 1 = 1";
	$params = array();
	if ($start != '' && $end != ''){
		$sql .= " AND CREATED between ? AND ?";
		array_push($params,$start." 00:00:00.000" ,$end." 23:59:59.999");	
	}

	if ($type != ''){
		$sql .= " AND TYPE = ?";		
		array_push($params,$type);		
	}

	if ($status != ''){
		$sql .= " AND STATUS = ?";
		array_push($params,$status);		
	}

	if ($productid != ''){
		$sql1 = "SELECT * FROM DEPRECIATIONITEM WHERE PRODUCTID = ?";
		$req = $db->prepare($sql1);
		$req->execute(array($productid));
		$dis = $req->fetchAll(PDO::FETCH_ASSOC);
		if ($dis != false)
		{
			$sql .= " AND ID in (";
			foreach($dis as $di)
			{
				$sql .= "?,";
				array_push($params,$di["DEPRECIATION_ID"]);
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

$app->get('/depreciationwastepool/{userid}', function($request,Response $response){
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	$userid = $request->getAttribute('userid');
	$sql = "SELECT * FROM DEPRECIATIONWASTEPOOL WHERE USERID = ?";		

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

$app->get('/depreciationpromopool/{userid}', function($request,Response $response){
	$db = getInternalDatabase();
	$blueDB = getDatabase();
	$userid = $request->getAttribute('userid');
	$sql = "SELECT * FROM DEPRECIATIONPROMOPOOL WHERE USERID = ?";	
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

$app->post('/depreciationpromopool', function($request,Response $response){
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();
	// TODO : On OLd items, retrieve all info 
	$sql = "SELECT TYPE FROM DEPRECIATIONPROMOPOOL WHERE USERID = ? LIMIT 1  ";
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
		$db->beginTransaction();    
		$sql = "INSERT INTO DEPRECIATIONPROMOPOOL (PRODUCTID,QUANTITY,EXPIRATION,STARTTIME,ENDTIME,LINKTYPE,NEEDLABEL,TYPE,PERCENTPROMO,PERCENTPENALTY,STATUS,USERID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["EXPIRATION"],$json["STARTTIME"],
		$json["ENDTIME"],$json["LINKTYPE"],$json["NEEDLABEL"],$json["TYPE"],$json["PERCENTPROMO"],$json["PERCENTPENALTY"],$json["STATUS"],$json["USERID"]));	
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


$app->post('/depreciationwastepool', function($request,Response $response){
	$json = json_decode($request->getBody(),true);
	$db = getInternalDatabase();

	$sql = "SELECT TYPE FROM DEPRECIATIONWASTEPOOL WHERE USERID = ? LIMIT 1 ";

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
		$sql = "INSERT INTO DEPRECIATIONWASTEPOOL (PRODUCTID,QUANTITY,EXPIRATION,TYPE,USERID) VALUES (?,?,?,?,?)";	
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

$app->delete('/depreciationpromopool/{id}', function($request,Response $response){	
	$id = $request->getAttribute('id');

 	$db = getInternalDatabase();

	$sql = "DELETE FROM DEPRECIATIONPROMOPOOL WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	

	foreach( glob("./img/promopool_proofs/".$id."_*") as $file ){		
		unlink($file);
	}   
    	
  	
	$result["result"] = "OK";
	$response = $response->withJson($result);

	return $response;
});

$app->delete('/depreciationwastepool/{id}', function($request,Response $response){	
	$id = $request->getAttribute('id');
	$db = getInternalDatabase();

	$sql = "DELETE FROM DEPRECIATIONWASTEPOOL WHERE ID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($id));	
		foreach( glob("./img/wastepool_proofs/".$id."_*") as $file )   
    	unlink($file);

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

	$db->beginTransaction();
	$sql = "INSERT INTO RETURNRECORD (VENDID,VENDNAME,STATUS,CREATOR) VALUES (?,?,?,?)";
	$req = $db->prepare($sql);
	$req->execute(array($VENDID,$VENDNAME,'CREATED',$AUTHOR));
	$lastId = $db->lastInsertId();
	$db->commit();    

	$items = $json["ITEMS"];
	foreach($items as $item){

		$penalty = calculatePenalty($item["PRODUCTID"],$item["EXPIRATION"]);
		if($penalty["status"] == "OK")
			$penaltypercent = 0;
		else 
			$penaltypercent = $penalty["percent"];

		$sql = "INSERT INTO RETURNRECORDITEM (PRODUCTID,QUANTITY,EXPIRATION,STATUS,PENALTYPERCENT,RETURNRECORD_ID) VALUES (?,?,?,?)";
		$req = $db->prepare($sql);
		$req->execute(array($item["PRODUCTID"],$item["QUANTITY"],$item["EXPIRATION"],'REQUESTED',$penaltypercent,$lastId));
	}

	$resp = array();
	$resp["result"] = "OK";
	$response = $response->withJson($resp);
	return $response;

});

// CREATED VALIDATED CLEARED 
$app->get('/returnrecord/{status}',function($request,Response $response) {
	$db=getInternalDatabase();
	
	$status = $request->getAttribute('status');
	$sql = "SELECT * FROM RETURNRECORD WHERE STATUS = ?";
	$req = $db->prepare($sql);

	$items = $req->fetchAll(PDO::FETCH_ASSOC);

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $items;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/returnrecordsearch',function($request,Response $response) {
	$db = getInternalDatabase();
	$start = $request->getParam('start','');
	$end =  $request->getParam('end','');
	$status = $request->getParam('status','');
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
		$id = $request->getAttribute('id');
		$sql = "SELECT * FROM RETURNRECORDITEM WHERE RETUTNRECORD_ID = ?";
		$req = $db->prepare($sql);
		$items = $req->fetchAll(PDO::FETCH_ASSOC);		

		$resp = array();
		$resp["result"] = "OK";
		$resp["data"] = $items;
		$response = $response->withJson($resp);
		return $response;
});

$app->get('/returnrecordalert',function($request,Response $response) {
	$db = getInternalDatabase();

	$sql = "SELECT ICPRODUCT.PRODUCTID,ICPRODUCT.PRODUCTNAME ,PPSS_DELIVERED_EXPIRE as 'EXPIRATION',ONHAND as 'QUANTITY'
					FROM PODETAIL,ICPRODUCT 
					WHERE PODETAIL.PRODUCTID = ICPRODUCT.PRODUCTID				
					AND SIZE IS NOT NULL
					AND PPSS_DELIVERED_EXPIRE IS NOT NULL
					AND DATEDIFF(day,GETDATE(), PPSS_DELIVERED_EXPIRE) > substring(SIZE,1,3) )";
	$req = $db->prepare($sql);
	$req->execute(array());				  				 
	$result = $req->fetchAll(PDO::FETCH_ASSOC);
	
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $result;
	$response = $response->withJson($resp);
	return $response;
});

$app->get('/returnrecordpool', function($request,Response $response){
	$db = getInternalDatabase();
	$sql = "SELECT * FROM RETURNRECORDPOOL";	
	$req = $db->prepare($sql);
	$req->execute(array());
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

	$sql = "SELECT VENDID FROM RETURNRECORDPOOL";
	$req = $db->prepare($sql);
	$req->execute(array());
	$res = $req->fetch(PDO::FETCH_ASSOC);
	$ok = false;

	if ($res == false)
		$ok = true; 
	if (isset($res["VENDID"]) && $res["VENDID"] == $json["VENDID"] ) 
		$ok = true;

	if ($ok == true){
		$sql = "INSERT INTO RETURNRECORDPOOL (PRODUCTID,QUANTITY,EXPIRATION,VENDID,VENDORNAME) VALUES (?,?,?,?,?)";	
		$req = $db->prepare($sql);
		$req->execute(array($json["PRODUCTID"],$json["QUANTITY"],$json["EXPIRATION"],$json["VENDID"],$json["VENDORNAME"]));
		$result["result"] = "OK";
	}
	else{
		$result["result"] = "KO";
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

function receiveItems($items){
}

$app->put('/returnrecord',function($request,Response $response) {
		// CREATE CREDIT NOTE AND RETURN ID 
	$json = json_decode($request->getBody(),true);
	$db=getInternalDatabase();
	

	$id = $json["ID"];
	$items = $json["items"];
	$author = $json["author"];
	$toexchange = array();
	$tocreditnote = array();
	foreach($items as $item)
	{
		$sql = "UPDATE RETURNRECORDITEM SET = STATUS = ? WHERE PRODUCTID = ? AND EXPIRATION = ?";
		$req = $db->prepare($sql);
		$req->execute(array($item["STATUS"],$item["PRODUCTID"],$item["EXPIRATION"]));
		if ($item["STATUS"] == "CREDITNOTE")
			array_push($tocreditnote,$item);
		else if($item["STATUS"] == "EXCHANGE")
			array_push($toexchange,$item);
	}

	$creditNoteId = createCreditNote($tocreditnote);
	exchangeItems($toexchange);
	$data["CREDITNOTE"] = $creditNoteId;

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $data;

	$response = $response->withJson($resp);
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


		$sql = "SELECT TOP(1) VENDNAME,CURRENCY_COST,TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				ORDER BY TRANDATE DESC";
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
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
		$item["QTYLESS30"] = $stats["QTYLESS30"];
		$item["QTYLASTRCV"] = $stats["QTYLASTRCV"];
		$item["QTYPROMOTION"] = $stats["QTYPROMOTION"];
		$item["NBTHROWN"] = $stats["NBTHROWN"];
		$item["LASTRECEIVEDATE"] = $stats["LASTRECEIVEDATE"];
		$item["DAYS30BACK"] = $stats["DAYS30BACK"];
		

		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				ORDER BY TRANDATE DESC";
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
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
	

	$sql = "SELECT TOP(500) ICPRODUCT.PRODUCTID,PRICE,
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

		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				ORDER BY TRANDATE DESC";
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
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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


		$sql = "SELECT TOP(1) VENDNAME,CURRENCY_COST,TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				ORDER BY TRANDATE DESC";
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
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
		

		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				ORDER BY TRANDATE DESC";
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
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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


		$sql = "SELECT TOP(1) VENDNAME,round(CURRENCY_COST,2),TRANDATE,TRANQTY FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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
				ORDER BY TRANDATE DESC";
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
		$sql = "SELECT TOP(1) VENDID FROM PORECEIVEDETAIL WHERE PRODUCTID = ? ORDER BY TRANDATE DESC";
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


// Penalty

$app->get('/penalty/{status}',function($request,Response $response) {
	$db = getInternalDatabase();
	$dbBlue = getDatabase();

	$status = $request->getAttribute('status');
	$data = array();

	$sql = "SELECT PRODUCTID,QUANTITY1,EXPIRATION,PERCENTPENALTY1 FROM DEPRECIATIONITEM  WHERE STATUS1 = ?";
	$req = $db->prepare($sql);
	$req->execute(array($status));		
	$data = array_merge($data,$req->fetchAll(PDO::FETCH_ASSOC));

	$sql = "SELECT PRODUCTID,QUANTITY2,EXPIRATION,PERCENTPENALTY2 FROM DEPRECIATIONITEM  WHERE STATUS2 = ?";
	$req = $db->prepare($sql);
	$req->execute(array($status));	
	$data = array_merge($data,$req->fetchAll(PDO::FETCH_ASSOC));

	$sql = "SELECT PRODUCTID,QUANTITY3,EXPIRATION,PERCENTPENALTY3 FROM DEPRECIATIONITEM  WHERE STATUS3 = ?";
	$req = $db->prepare($sql);
	$req->execute(array($status));	
	$data = array_merge($data,$req->fetchAll(PDO::FETCH_ASSOC));

	$sql = "SELECT PRODUCTID,QUANTITY4,EXPIRATION,PERCENTPENALTY4 FROM DEPRECIATIONITEM  WHERE STATUS4 = ?";
	$req = $db->prepare($sql);
	$req->execute(array($status));	
	$data = array_merge($data,$req->fetchAll(PDO::FETCH_ASSOC));

	$newData = array();
	foreach($data as $item){
		$sql = "SELECT PRICE FROM ICPRODUCT WHERE PRODUCTID = ?";
		$req = $dbBlue->prepare($sql);		
		$req->execute(array($item["PRODUCTID"])); 
		$res = $req->fetch(PDO::FETCH_ASSOC);

		if ($res != false)
			$item["PRICE"] = $res["PRICE"];
		array_push($newData,$item);
	}
	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);
	return $response;
});

$app->put('/penalty/{id}',function($request,Response $response) {
	$db = getInternalDatabase();
	$data = array();

	$json = json_decode($request->getBody(),true);
	$field = $json["FIELD"];
	$productid = $json["PRODUCTID"];
	$expiration = $json["EXPIRATION"];
	
	$sql = "UPDATE DEPRECIATIONITEN SET ? = 'SOLVED' WHERE PRODUCTID = ? AND EXPIRATION = ?";
	$req = $db->prepare($sql);
	$req->execute(array($field,$productid,$expiration));

	$resp = array();
	$resp["result"] = "OK";
	$resp["data"] = $newData;
	$response = $response->withJson($resp);
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
	$json = json_decode($request->getBody(),true);

	$sql = "UPDATE ICPRODUCT SET PPSS_IS_BLACKLIST = 'Y' WHERE PRODUCTID = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));

	$resp = array();
	$resp["result"] = "OK";	
	$response = $response->withJson($resp);
	return $response;
});

// ChangePrice
$app->post('/pricechange',function ($request,Response $response){
	$db = getInternalDatabase();
	$json = json_decode($request->getBody(),true);

	$sql = "DELETE FROM PRICECHANGE WHERE PRODUCTID = ?";;
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"]));	

	$sql = "INSERT INTO PRICECHANGE (PRODUCTID,OLDPRICE,NEWPRICE,STATUS,REQUESTER) values(?,?,?,?,?)";	
	$req = $db->prepare($sql);
	$req->execute(array($json["PRODUCTID"], $json["OLDPRICE"], $json["NEWPRICE"],'CREATED',$json["AUTHOR"]));	

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
	$sql = "UPDATE ICPRODUCT SET PRICE = ? WHERE PRODUCTID = ?";
	$req = $dbBlue->prepare($sql);
	$req->execute(array($res["NEWPRICE"],$res["PRODUCTID"]));

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

		$item["PRODUCTNAME"] = $res["PRODUCTNAME"];
		array_push($created,$item);
	}

	$sql = "SELECT * FROM PRICECHANGE WHERE STATUS = 'VALIDATED'";
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

	$resp = array();	
	$resp["result"] = "OK";	
	$resp["data"] = $payments;

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

	$sql = "UPDATE EXTERNALPAYMENT SET STATUS = 'PAID',PAYER = ?";
	$req = $db->prepare($sql);
	$req->execute(array($json["AUTHOR"]));

	
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


ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');
$app->run();