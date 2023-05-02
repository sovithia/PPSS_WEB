<?php 

require 'vendor/autoload.php';

class RestEngine
{
	static function GET($uri,$headers = array())
	{												
		$response = \Httpful\Request::get($uri)
				->expectsJson()
				->addHeaders($headers)
				->send();	
		$json = json_decode(json_encode($response->body), TRUE);					
		if (isset($json["data"]))
			return $json["data"];
		else
			return null;
	}

	static function POST($uri, $data, $headers = array())
	{					
		$response = \Httpful\Request::post($uri)
				->sendsJson()
				->body($data)
				->expectsJson()
				->addHeaders($headers)
				->send();									
				$json = json_decode(json_encode($response->body), TRUE);				
		return $json;
	}

	static function PUT($uri, $data, $headers = array())
	{						
		$response = \Httpful\Request::put($uri)
				->sendsJson()
				->body($data)
				->expectsJson()
				->addHeaders($headers)
				->send();		
		$json = json_decode(json_encode($response->body), TRUE);
		return $json;
	}

	static function DELETE($uri,$headers = array())
	{		
		$response = \Httpful\Request::delete($uri)
				->sendsJson()
				->body($data)
				->expectsJson()
				->addHeaders($headers)
				->send();			
		$json = json_decode(json_encode($response->body), TRUE);
		return $json;
	}
}


?>