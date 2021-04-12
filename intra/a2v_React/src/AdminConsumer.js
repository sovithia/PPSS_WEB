var rest = require('restler');
var Client = require('node-rest-client').Client;
var client = new Client();


class AdminConsumer{
	//static BaseURL = "http://appdevisite.fr/api/admin.php"; 
	static BaseURL = "http://127.0.0.1/A2V/api/admin.php"; 					  	

	static loginForApps(login,password,callback){
		//alert(login);
		//alert(password);
		var jsonData = { 
						"login" : "Sovi",
						"password" : "pied2porc"					
				   };
		rest.postJson(AdminConsumer.BaseURL + "/login",jsonData
		).on('complete',function(data, response){   		            							       			
	       	alert(JSON.stringify(data));
	       	alert(JSON.stringify(response));
	        //callback(data);
	    });   
	}		

	static loginForApps3(login,password,callback){
		var args = {
					data: { test: "hello" },
					headers: { "Content-Type": "application/json" }
					};
		client.get("http://127.0.0.1/A2V/api/admin.php/login", args, function (data, response) {
		
			alert(data);	
			alert(response);
		});
	}

	static createApp(app,callback){
		rest.postJson(AdminConsumer.BaseURL + "/app",{
			data : {
					"title": app.title,
					"pro_login": app.pro_login,
					"pro_password" : app.pro_password,
					"status" : app.status,
					"identifier" : app.identifier,
					"short_description" : app.short_description,
					"long_description" : app.long_description,
					"keyword_ios" : app.keyword_ios,
					"ios_pem" : app.ios_pem,
					"googlemap_api_key" : app.googlemap_api_key,
					"firebase_api_key" : app.firebase_api_key,
					"icon_1024" : app.icon_1024,
					"promo_1024x500" : app.promo_1024x500,
					"creator_id" : app.creator_id 
					},
			headers : AdminConsumer.headers		
		}).on('complete',function(result, response){
			callback(response["rawEncoded"]);
		});			
	}

	static updateApp(app,callback){
		rest.putJson(AdminConsumer.BaseURL + "/app",{
			data : {	
			   		"title": app.title,
					"pro_login": app.pro_login,
					"pro_password" : app.pro_password,
					"status" : app.status,
					"identifier" : app.identifier,
					"short_description" : app.short_description,
					"long_description" : app.long_description,
					"keyword_ios" : app.keyword_ios,
					"ios_pem" : app.ios_pem,
					"googlemap_api_key" : app.googlemap_api_key,
					"firebase_api_key" : app.firebase_api_key,
					"icon_1024" : app.icon_1024,
					"promo_1024x500" : app.promo_1024x500,
					"creator_id" : app.creator_id 
					},
				headers : AdminConsumer.headers
			}).on('complete',function (result,response){
			  callback(response["rawEncoded"]);
		});
	}

	static deleteApp(app,callback){
		rest.delete(AdminConsumer.BaseURL + "/app/" + app.ID)
			   .on('complete',function (response){
			   		callback(response["rawEncoded"]);
			   })
	}	
}

export default AdminConsumer;