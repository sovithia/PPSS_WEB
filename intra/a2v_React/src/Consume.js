//var request = require('request');
//var Client = require('node-rest-client').Client;
var rest = require('restler');

class ProConsumer{
	static test(callback){	
		//var url = 'http://appdevisite.fr/api/pro.php/test';
	    var url = 'http://127.0.0.1/A2V/api/pro.php/test'; 
	    rest.get(url)    
	      .on('complete',function(result, response){               
	        alert(JSON.stringify(response["rawEncoded"]));
	      });            				
	}
}

export default ProConsumer;

