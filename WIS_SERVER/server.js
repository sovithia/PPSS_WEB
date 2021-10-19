var http = require('http');
//var db = new sqlite3.Database('wis.sqlite');
var express = require('express');
var app = express();
var bodyParser = require('body-parser');
app.use(bodyParser.json({limit:'50mb'}));
app.use(bodyParser.urlencoded({limit: '50mb',extended: true}));
var Buffer = require('buffer').Buffer;
const fs = require('fs');
var api = require('./node_modules/clicksend/api.js');


function sendSMS(from,to,message)
{
	var smsMessage = new api.SmsMessage();

	smsMessage.from = from;
	smsMessage.to = to
	smsMessage.body = message;

	var smsApi = new api.SMSApi("sen.sov@gmail.com", "4F028EC4-0E7F-619F-7672-75080E643B71");
	var smsCollection = new api.SmsMessageCollection();
	smsCollection.messages = [smsMessage];

	smsApi.smsSendPost(smsCollection).then(function(response) {
		console.log(response.body);
	}).catch(function(err){
		console.error(err.body);
	});
}

function hashString(str)
{
	var crypto = require('crypto');
	var name = str;
	var hash = crypto.createHash('md5').update(name).digest('hex');
	return hash;	
}

function getDatabase()
{
	var mysql      = require('mysql');
	var connection = mysql.createConnection({
  host     : 'security.westec.com',
  user     : 'dbtest',
  password : 'Sug@dyup',
  database : 'ssams_db',
  port : 8990
	});
	connection.connect();
	return connection;
}

/*
db.query = function (sql, params) {
  var that = this;
  return new Promise(function (resolve, reject) {
    that.all(sql, params, function (error, rows) {
      if (error)
        reject(error);
      else
        resolve({ rows: rows });
    });
  });
};
*/

function canSignup(type,identifier,phone,birthdate,callback)
{
	db = getDatabase();
	params = [identifier,phone,birthdate];	

	db.query("SELECT * FROM app_user WHERE login = ? AND usertype = ?" , [phone,type], function (error, results, fields) {
			if (error) 
				throw error;
			if(results.length > 0){			
				callback("ALREADY");				
			}
			else
			{
				if (type == "STUDENT")
				{		
					db.query("SELECT * FROM students \
										where sid = ? \
										and REPLACE(phone_1, ' ', '') = ? \
										and  dob = ?",params, 
					function (error, results, fields) {	
						if (error) throw error;
						db.end();												
						if (results.length == 0){
							callback("KO");							
						}
						else{							
							callback("OK");													
						}
					});
				}
				else if (type == "PARENT")
				{
					db.query("SELECT * from students,student_contacts \
										where students.uuid = student_contacts.student_uuid \
										and students.uuid = ? \
										and REPLACE(student_contacts.phone_1, ' ', '')  = ? \
										and students.dob = ?",params,
						function (error, results, fields) {
							if (error) throw error;
							db.end();
							if (results.length == 0)
								callback("KO");
							else
								callback("OK");
					});
				}
				else if (type == "TEACHER")
				{
						db.query("SELECT * FROM staffs,staffs_profile \
											WHERE staffs.staff_profile_id = staffs_profile.id \
						 					AND staffs.id in ((select distinct(staff_id) from staffs_subject))  \
						 					and employee_number = ? \
						 					and REPLACE(phone_1, ' ', '') = ? \
						 					and dob = ?",params,
						function (error, results, fields) {
							if (error) throw error;
							db.end();
							if (results.length == 0)
									callback("KO");
								else
									callback("OK");
						}); 
				}
				else if (type == "REGISTRAR")
				{
						db.query("SELECT * FROM staffs,staffs_profile \
						 					where staffs.id not in (select distinct(staff_id) from staffs_subject) \
						 				  and employee_number = ? \
						 				  and REPLACE(phone_1, ' ', '') = ? \
						 				  and dob = ?", params,
						function (error, results, fields) {
							if (error) throw error;
							db.end();							
							if (results.length == 0)
								callback("KO");
							else
								callback("OK");
						}); 
				}	
			}				
		});
};

function generateAccessToken(){
	return Math.random().toString(36).substr(2, 9);
}
function UserFromToken(token,callback){
	db = getDatabase();
	db.query("SELECT * FROM app_user WHERE access_token = ?",[token],function (error, results, fields){   		
		db.end();
		if(results.length == 0 || results[0].token_expiration < Date.now())
			return null;	
		else {
			if(results[0].usertype == "PARENT"){
				db.query("SELECT sid FROM students app_user WHERE access_token = ?",[token],function (error, results, fields){   		
					db.end();
					callback(results[0].sid);
				});
			}			
		}
	});	
}

// forget password
app.get('/info', function(req,res){
	res.json({"result" : "OK"});		
});


// forget password
app.post('/forgetpassword', function(req,res){
	type = req.body["phone"];

	db = getDatabase();			
	db.query("SELECT password from app_user where login = ?",[req.body["phone"]],function (error, results, fields) {
		if (results.length > 0){
			res.json({"result" : "OK"});	

			targetPhone = "+855" + results[0]["password"].substring(1);		
			sendSMS("WIS",targetPhone,"Password for account " + phone + "is " + results[0]["password"]);
		}else{
			res.json({"result" : "KO"});			
		}
	});	
});

// presignup 
app.post('/presignup', function(req,res){

	type = req.body["type"];
	identifier = req.body["identifier"];
	phone = req.body["phone"];
	phone = phone.replace(/\s+/g, ' ').trim();
	birthdate = req.body["birthdate"];

	params = [identifier,phone,birthdate];		
	canSignup(type,identifier,phone,birthdate, (result) =>{	
		if (result == "ALREADY")
			res.json({"result" : "KO","message" : "account already registered"});
		else if (result == "KO")
			res.json({"result" : "KO","message" : "invalid information"});
		else if (result == "OK")
			res.json({"result" : "OK","message" : "signup valid"});
		});
});

function isAuthorizedRegistrar(id)
{
	if (id == "13177" || id == "201674" || id == "01028")
		return true;
	return false;
}

// signup 
app.post('/signup', function(req,res){
	type = req.body["type"];
	identifier = req.body["identifier"];
	phone = req.body["phone"];
	phone = phone.replace(/\s+/g, ' ').trim();
	birthdate = req.body["birthdate"];
	password = req.body["password"];

	result = canSignup(type,identifier,phone,birthdate, (result) =>{
		if (result == "ALREADY")
			res.json({"result" : "KO","message" : "account already registered"});
		else if (result == "KO")
			res.json({"result" : "KO","message" : "invalid information"});
		else if (result == "OK"){
			db = getDatabase();			
		if(type == "PARENT")
		{
			db.query("SELECT students_contact.id as contactID FROM students_contact,students where students_contact.student_uuid = students.uuid and  phone_1 = ? and students.sid = ?",[phone,identifier],
				function (error, results, fields){   	
					if (error) throw error;
					db.end();					

					db.query("INSERT INTO app_user (identifier,login,password,usertype,activated,linked_identifier) values (?,?,?,?,?,?)",
					[results[0].contactID,req.body["phone"],password,req.body["type"],"YES",req.body["identifier"]],
					function (error, results, fields){   	
						if (error) throw error;
						db.end();						
						res.json({"result" : "OK"});				
					});		
			});
		}
		else 
		{
			if (type == "REGISTRAR" && isAuthorizedRegistrar() == false){
					res.json({"result" : "KO","message" : "unauthorized signup"});	
			}else{
				db.query("INSERT INTO app_user (identifier,login,password,usertype,activated) values (?,?,?,?,?)",
				[req.body["identifier"],req.body["phone"],password,req.body["type"],"YES"],
				function (error, results, fields){   	
					db.end();
					if (error) throw error;
					res.json({"result" : "OK"});				
			});			
			}
			
		}	
	}
	});
	
});


// login identifier from different type should not clash
app.post('/login', function(req, res){	
		db = getDatabase();
    db.query("SELECT * FROM app_user WHERE login = ? and password = ?",[req.body["phone"],req.body["password"]],function (error, results, fields){
			if (results.length > 0)
			{
				console.log(results[0]["usertype"]);
				expiration = Date.now() + 86400;
				token = generateAccessToken();
				usertype = results[0]["usertype"];
				identifier = results[0]["identifier"];
				db.query("UPDATE app_user SET access_token = ?, token_expiration = ? WHERE login = ?",[token,expiration,req.body["phone"]] ,function (error2, results2, fields2){
					if (usertype == "STUDENT"){
							db.query("SELECT firstname,lastname,dob,gender,credit,enrollment_date,phone_1,address_1 FROM students where sid = ?",[identifier],function (error3, results3, fields3){
							console.log(JSON.stringify(results3)); 
							results3[0]["token"] = token;
							results3[0]["usertype"] = usertype;
							res.json({"result" : "OK", "data" : results3[0]});			
						});
					}
					else if (usertype == "PARENT"){
						db.query("SELECT firstname,lastname,relation,gender, phone_1,address_1 FROM students_contact,students \
							where students_contact.student_uuid = students.uuid \
							and students_contact.uuid = ?",[identifier],function (error3, results3, fields3){
							console.log(JSON.stringify(results3)); 
							results3[0]["token"] = token;
							results3[0]["usertype"] = usertype;
							res.json({"result" : "OK", "data" : results3[0]});			
						});
					}
					else if (usertype == "TEACHER" || usertype == "REGISTRAR") {
						db.query("SELECT firstname,lastname,sex,phone_1 FROM staffs,staffs_profile where staffs.staff_profile_id = staffs_profile.id  and staffs.employee_number = ?",
							[identifier],function (error3, results3, fields3){
							console.log(JSON.stringify(results3)); 
							results3[0]["token"] = token;
							results3[0]["usertype"] = usertype;
							res.json({"result" : "OK", "data" : results3[0]});			
						});
					}		
				});											
			}
			else{			
				res.json({"result" : "KO", "message" : "wrong credentials"});
			}
    });
});

//***************************************//
//*** 						Invoices						***//
//***************************************//

app.get('/invoice',function(req, res){	 
		UserFromToken(req.headers["token"],(user) => {
			db = getDatabase();	
			if (user == null){
					res.json({"result" : "KO","message" : "session expired or unauthorized request"});										;			
			}else
			{
				if (user["type"] == "PARENT")
				{				
					db.query("SELECT id,invoice_number,invoice_date FROM invoice where sid = ? and is_paid = 0",[user["linked_identifier"]],function (error, results, fields){	 
						if (error) throw error;
							res.json({"result" : "OK", "data" : results});															
					});				  										
				}
				else if (user["type"] == "REGISTRAR") // TODO FILTER BY CAMPUS AND OTHER CRITERIA
				{
					db.query("SELECT id,invoice_number,invoice_date FROM invoice where is_paid = 2",[],function (error, results, fields){	 
						if (error) throw error;
							res.json({"result" : "OK", "data" : results});															
					});				  										
				} 
				else
					res.json({"result" : "KO","message" : "Unauthorized request"});										
			}		
		});	
});


app.get('/invoicedetails/:id',function(req, res){	 
	
	UserFromToken(req.headers["token"], (user) => {
		db = getDatabase();		
		if (user == null){
			res.json({"result" : "KO","message" : "session expired or unauthorized request"});										
		}	
		else{
			id = req.params["id"];
			var proof = "";
			var sigparent = "";
			var sigregistrar = "";
			if (fs.existsSync('images/proofs/'+id+'.png'))
				proof = fs.readFileSync('images/proofs/'+id+'.png', {encoding: 'base64'});
			if (fs.existsSync('images/signatures/invoice/p_'+id+'.png'))
				sigparent = fs.readFileSync('images/signatures/invoice/p_'+id+'.png', {encoding: 'base64'});
			if (fs.existsSync('images/signatures/invoice/r_'+id+'.png'))
				sigregistrar = fs.readFileSync('images/signatures/invoice/r_'+id+'.png', {encoding: 'base64'});
			
			db.query("SELECT id,uuid,invoice_number,invoice_date FROM invoice where id = ?",[id],function (error, results, fields){	 
					if (error) throw error;
					invoice = results[0];					
					db.query("SELECT description, amount, FROM invoice_fees where invoice_uuid = ? and void_at is null " ,[results[0].uuid],function (error, results, fields){	 
						fees = results;
						data["invoice"] = invoice;
						data["fees"] = fees;
						data["proof"] = proof;
						data["sigparent"] = sigparent
						data["sigregistrar"] = sigregistrar;

						res.json({"result" : "OK",  "data" : data});															
					});				 					
				});				  										
		}
	});
});


// invoices 
app.get('/invoicehistory',function(req, res){	 

	UserFromToken(req.headers["token"], (user) => {
		db = getDatabase();	
		if (user == null){
				res.json({"result" : "KO","message" : "session expired or unauthorized request"});										;			
		}else
		{
			if (user["type"] == "PARENT")
			{				
				db.query("SELECT id,invoice_number,invoice_date FROM invoice where sid = ? and is_paid = 1",[user["linked_identifier"]],function (error, results, fields){	 
					if (error) throw error;
						res.json({"result" : "OK", "data" : results});															
				});				  										
			}
			else if (user["type"] == "REGISTRAR") // TODO FILTER BY CAMPUS AND OTHER CRITERIA
			{
				db.query("SELECT id,invoice_number,invoice_date FROM invoice where is_paid = 1",[],function (error, results, fields){	 
					if (error) throw error;
						res.json({"result" : "OK", "data" : results});															
				});				  										
			} 
			else
				res.json({"result" : "KO","message" : "Unauthorized request"});										
		}		
	});			
});



app.put('/invoice/:id',function(req, res){	 
	UserFromToken(req.headers["token"], (user) => {
		if (user == null){
			res.json({"result" : "KO","message" : "session expired or unauthorized request"});										  		
		}
		else{
			if (user["type"] == "PARENT")
			{		
				let sig = Buffer.from(req.body["signature"], 'base64');
				fs.writeFileSync('images/signatures/invoice/p_'+req.params["id"] + '.png', sig,{flag :'a+'});
				
				let proof = Buffer.from(req.body["proof"], 'base64'); 
				fs.writeFileSync('images/proofs/'+req.params["id"] + '.png', proof,{flag :'a+'});
				
				db.query("UPDATE invoice SET is_paid = 2 where id = ? ", [req.params["id"]],function (error, results, fields){	 
					db.end();
					if (error) throw error;
					res.json({"result" : "OK"});			
				});			
			}
			else if (user["type"] == "REGISTRAR"){
				let sig = Buffer.from(req.body["signature"], 'base64');
				fs.writeFileSync('images/signatures/invoice/r_'+req.params["id"] + '.png', buff,{flag : 'a+'});
				

				db.query("UPDATE invoice SET is_paid = 1 where id = ? ", [req.params["id"]],function (error, results, fields){	 
					db.end();
					if (error) throw error;
					res.json({"result" : "OK"});			
				});							
			}											
		}	
	});		
});
	

//***************************************//
//*** TODO : WAITING FOR AVAILABILITY ***//
//***************************************//

app.get('/attendancedetails/:id', function(req,res){
	UserFromToken(req.headers["token"],(user) => {
		if(user != null)
		{
			id = req.params["id"];
			db.query("SELECT ATTENDANCE.ID,ATTENDANCE.start,ATTENDANCE.end, SCHEDULELINE.coursename,\
						 (SELECT firstname || ' ' || lastname FROM USER WHERE ID = SCHEDULELINE.teacher_id) as 'teacher',\
					   (SELECT firstname || ' ' || lastname from USER where ID = ATTENDANCE.student_id) as 'student'\
					    FROM ATTENDANCE,SCHEDULELINE  WHERE ATTENDANCE.scheduleline_id = SCHEDULELINE.ID AND ATTENDANCE.ID = ?",[id],function (error, results, fields){    	    					
						res.json({"result" : "OK", "data" : row});			
			});	
		}else{
			res.json({"result" : "KO","message" : "session expired or unauthorized request"});	
		}
	});	
});

app.get('/attendancehistory', function(req, res){	 
	UserFromToken(req.headers["token"],(user) => {	
			if(user == null){
				res.json({"result" : "KO","message" : "session expired or unauthorized request"});										
			}
			else
			{
				if (user["type"] == "PARENT"){
					var ids = "(";
					user["children"].forEach(element => {
						ids = ids + element["ID"] + ",";
					});	
					ids = ids.substring(0,ids.length -1);
					ids += ")";
				//console.log(JSON.stringify(ids)); 
					db.all("SELECT *,(select firstname || ' ' || lastname from USER where ID = ATTENDANCE.student_id) as 'student' FROM ATTENDANCE WHERE status = 'VIEWED' AND  student_id IN " + ids ,[],function (error, results, fields){    	    					
						res.json({"result" : "OK", "data" : rows});										
		    	});		
				} 
				else{
					res.json({"result" : "KO","message" : "Unauthorized request"});	
				}		
		}
	});
});

app.get('/attendance', function(req, res){	 
	UserFromToken(req.headers["token"],(user) => {	
			if(user == null){
				res.json({"result" : "KO","message" : "session expired or unauthorized request"});										
			}
			else
			{
				if (user["type"] == "PARENT"){
					var ids = "(";
					user["children"].forEach(element => {
						ids = ids + element["ID"] + ",";
					});	
					ids = ids.substring(0,ids.length -1);
					ids += ")";
				//console.log(JSON.stringify(ids)); 
					db.all("SELECT *,(select firstname || ' ' || lastname from USER where ID = ATTENDANCE.student_id) as 'student' FROM ATTENDANCE WHERE status = 'CREATED' AND  student_id IN " + ids ,[],function (error, results, fields){    	    					
						res.json({"result" : "OK", "data" : rows});										
		    	});		
				} 
				else{
					res.json({"result" : "KO","message" : "Unauthorized request"});	
				}		
		}
	});
});

// PARENT SIGN AND VALIDATE ABSENCE (DEPRECATED)
app.put('/attendance/:id', function(req, res){	 
	
	UserFromToken(req.headers["token"],(user) => {	
		if(user != null)
		{		
			var stmt = db.prepare("UPDATE ATTENDANCE SET status = 'VIEWED' where ID = ? ");
			stmt.run([req.params["id"]]);
			stmt.finalize();	
			res.json({"result" : "OK"});			
		}
		else{
			res.json({"result" : "KO","message" : "session expired or unauthorized request"});										
		}
	});
});

app.get('/schedule', function(req, res){	 
	UserFromToken(req.headers["token"],(user) => {	
		db.get("SELECT * FROM SCHEDULE; WHERE startdate < strftime('%s', 'now') AND enddate > strftime('%s', 'now')",[],function(err,row){			
			if (user == null){
				res.json({"result" : "KO"});			
			}else{
				if (user["type"] == "TEACHER")
				{
					db.all("SELECT starthour,endhour,coursename,day,(SELECT firstname || ' ' || lastname FROM USER WHERE ID = SCHEDULELINE.teacher_id) as 'teachername',(SELECT name from CLASS WHERE CLASS.ID = SCHEDULELINE.class_id) as 'classname' FROM SCHEDULELINE WHERE SCHEDULELINE.teacher_id = ?",[user["ID"]],function (error, results, fields){    	    					
					  row["courses"] = rows;
					  res.json({"result" : "OK", "data" : row});										
					});				
					
				}
				else if (user["type"] == "STUDENT") 
				{
					db.all("SELECT starthour,endhour,coursename,day,(SELECT firstname || ' ' || lastname FROM USER WHERE ID = SCHEDULELINE.teacher_id) as 'teachername',(SELECT name from CLASS WHERE CLASS.ID = SCHEDULELINE.class_id) as 'classname' FROM SCHEDULELINE WHERE SCHEDULELINE.class_id = ?",[user["class_id"]],function (error, results, fields){    	    					
					  row["courses"] = rows;
					  res.json({"result" : "OK", "data" : row});
					});		
				}		
			}
		});		
	});
});

//***************************************//
//*** TODO : WAITING FOR AVAILABILITY ***//
//***************************************//

// VALIDATE INVOICE
// SUBMIT INVOICE WITH PICTURE
app.listen(3000);



