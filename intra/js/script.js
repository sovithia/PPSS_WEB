
var zkSignature = (function () {

		var empty = true;

		return {
		//public functions
		capture: function (){				
				var parent = document.getElementById("canvas");
				parent.childNodes[0].nodeValue = "";

				var canvasArea = document.createElement("canvas");
				canvasArea.setAttribute("id", "newSignature");
				parent.appendChild(canvasArea);

				var canvas = document.getElementById("newSignature");
				var context = canvas.getContext("2d");

				if (!context) {
					throw new Error("Failed to get canvas' 2d context");
				}

				screenwidth = screen.width;

				if (screenwidth < 480) {
					canvas.width = screenwidth - 8;
					canvas.height = (screenwidth * 0.33);
				} else {
					canvas.width = 464;
					canvas.height = 204;
				}

				context.fillStyle = "#fff";
				context.strokeStyle = "#444";
				context.lineWidth = 1.2;
				context.lineCap = "round";

				context.fillRect(0, 0, canvas.width, canvas.height);

				context.fillStyle = "#3a87ad";
				context.strokeStyle = "#3a87ad";
				context.lineWidth = 1;
				context.moveTo((canvas.width * 0.042), (canvas.height * 0.7));
				context.lineTo((canvas.width * 0.958), (canvas.height * 0.7));
				context.stroke();

				context.fillStyle = "#fff";
				context.strokeStyle = "#444";

				var disableSave = true;
				var pixels = [];
				var cpixels = [];
				var xyLast = {};
				var xyAddLast = {};
				var calculate = false;
				//functions
				{
					function remove_event_listeners() {
						canvas.removeEventListener('mousemove', on_mousemove, false);
						canvas.removeEventListener('mouseup', on_mouseup, false);
						canvas.removeEventListener('touchmove', on_mousemove, false);
						canvas.removeEventListener('touchend', on_mouseup, false);

						document.body.removeEventListener('mouseup', on_mouseup, false);
						document.body.removeEventListener('touchend', on_mouseup, false);
					}

					function get_board_coords(e) {
						var x, y;

						if (e.changedTouches && e.changedTouches[0]) {
							var offsety = canvas.offsetTop || 0;
							var offsetx = canvas.offsetLeft || 0;

							x = e.changedTouches[0].pageX - offsetx;
							y = e.changedTouches[0].pageY - offsety;
						} else if (e.layerX || 0 == e.layerX) {
							x = e.layerX;
							y = e.layerY;
						} else if (e.offsetX || 0 == e.offsetX) {
							x = e.offsetX;
							y = e.offsetY;
						}

						return {
							x : x,
							y : y
						};
					};

					function on_mousedown(e) {
						e.preventDefault();
						e.stopPropagation();

						canvas.addEventListener('mousemove', on_mousemove, false);
						canvas.addEventListener('mouseup', on_mouseup, false);
						canvas.addEventListener('touchmove', on_mousemove, false);
						canvas.addEventListener('touchend', on_mouseup, false);

						document.body.addEventListener('mouseup', on_mouseup, false);
						document.body.addEventListener('touchend', on_mouseup, false);

						empty = false;
						var xy = get_board_coords(e);
						context.beginPath();
						pixels.push('moveStart');
						context.moveTo(xy.x, xy.y);
						pixels.push(xy.x, xy.y);
						xyLast = xy;
					};

					function on_mousemove(e, finish) {
						e.preventDefault();
						e.stopPropagation();

						var xy = get_board_coords(e);
						var xyAdd = {
							x : (xyLast.x + xy.x) / 2,
							y : (xyLast.y + xy.y) / 2
						};

						if (calculate) {
							var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
							var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
							pixels.push(xLast, yLast);
						} else {
							calculate = true;
						}

						context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
						pixels.push(xyAdd.x, xyAdd.y);
						context.stroke();
						context.beginPath();
						context.moveTo(xyAdd.x, xyAdd.y);
						xyAddLast = xyAdd;
						xyLast = xy;

					};

					function on_mouseup(e) {
						remove_event_listeners();
						disableSave = false;
						context.stroke();
						pixels.push('e');
						calculate = false;
					};

				}

				canvas.addEventListener('mousedown', on_mousedown, false);
				canvas.addEventListener('touchstart', on_mousedown, false);

		}
		,
		save : function(){

				var canvas = document.getElementById("newSignature");
				// save canvas image as data url (png format by default)
				var dataURL = canvas.toDataURL("image/png");
				document.getElementById("saveSignature").src = dataURL;

		}
		,
		clear : function(){

				var parent = document.getElementById("canvas");
				var child = document.getElementById("newSignature");
				parent.removeChild(child);
				empty = true;
				this.capture();

		}
		,
		send : function(){

				if (empty == false)
				{
				
					
		         let opt = { scale : 1,
		         			 };
		         html2canvas(document.getElementById('canvas'),opt).then(function(canvas) {	
						                      			
						
						var type = document.getElementById('detailtype').value;					
						var author = document.getElementById('author').value;												
						var name = '';						
						
						if (type == "ITEMREQUEST")
						{							
							var status = document.getElementById('status').value;
	   					 	var fields = document.getElementById('myform').getElementsByTagName('input');  
              				var allItems = {};
		            		for(var i=0;i<fields.length;i++)
		              		{  
				                if (fields[i].type == 'hidden')
				                {
				                  var oneItem = {};
				                  oneItem['ID'] = fields[i].value;                  
				                  oneItem['TRANSFER_POOL_NEW'] = document.getElementById('transfer_' + fields[i].value).value;
				                  oneItem['PURCHASE_POOL_NEW'] = document.getElementById('purchase_' + fields[i].value).value;					                  
				                  allItems[fields[i].value] = oneItem; 
				                }
		             		}  
			             	ItemJSON = {  "REQUESTEE" : author,
	   					 				  "REQUESTEESIGNATURE" :  b64,	   					 					  
	   					 				  "ITEMS" : allItems,
	   					 	  			  "STATUS" : status }; 
							var	URL = 'http://phnompenhsuperstore.com/api/api.php/itemrequestaction/' + identifier; 
	   						var xmlhttp = new XMLHttpRequest();	    						    					
	    					xmlhttp.onreadystatechange = function () {
			                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			                       
			                        alert('ItemRequest updated changed')
			                      }
			                 }
	    					xmlhttp.open("PUT", URL,false);
	    					xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
	    					xmlhttp.send(JSON.stringify(ItemJSON)); 				
						}
						else 
						{
							var identifier = document.getElementById('identifier').value;
							if (type == 'RCV')
							{																													
								linkedponumber = "";
								if (document.getElementById('linkedponumber') != null){
									var linkedponumber = document.getElementById('linkedponumber').value;
									if (linkedponumber == null || linkedponumber == "")
									{
										alert('Please input PO Number');
										return;
									}	
								}						
								
							}


							var b64 = canvas.toDataURL("image/png").split("data:image/png;base64,")[1];
							var ItemJSON = "";

	   					 	if (type == 'RCV'){
	   					 		ItemJSON = {"IDENTIFIER" :  identifier,
	   					 					 "AUTHOR" : author,
	   					 					  "SIGNATURE" :  b64,
	   					 					  "LINKEDPO" :  linkedponumber,
	   					 					 "ACTIONTYPE" : type };
	   					 	}
	   					 	else if (type == "VAL" || type == "WH")
	   					 	{
	   					 		var ponumber = document.getElementById('ponumber').value;
	   					 		var fields = document.getElementById('myform').getElementsByTagName('input');  
              					var allItems = {};
			            		for(var i=0;i<fields.length;i++)
			              		{  
					                if (fields[i].type == 'hidden')
					                {
					                  var oneItem = {};
					                  oneItem['ID'] = fields[i].value;                  
					                  oneItem['PPSS_VALIDATION_QTY'] = document.getElementById('validationqty_' + fields[i].value).value;
					                  oneItem['PPSS_RECEPTION_QTY'] = document.getElementById('receptionqty_' + fields[i].value).value;
					                  oneItem['PPSS_NOTE'] = document.getElementById('note_' + fields[i].value).value;
					                  allItems[fields[i].value] = oneItem; 
					                }
			             		}  
			             		ItemJSON = {"IDENTIFIER" :  identifier,
	   					 					 "AUTHOR" : author,
	   					 					  "SIGNATURE" :  b64,
	   					 					  "PONUMBER" : ponumber,
	   					 					  "ITEMS" : allItems,
	   					 					 "ACTIONTYPE" : type }; 	    
	   					 	}
	   					 	else 
	   					 	{
	   					 		ItemJSON = {"IDENTIFIER" :  identifier,
	   					 					 "AUTHOR" : author,
	   					 					  "SIGNATURE" :  b64,	   					 					  
	   					 					 "ACTIONTYPE" : type }; 	
	   					 	}   					 	    				      				    
	   						var	URL = 'http://phnompenhsuperstore.com/api/api_dev.php/supplyrecord'; 
	   						var xmlhttp = new XMLHttpRequest();
	    					xmlhttp.onreadystatechange = callbackFunction(xmlhttp);
	    					xmlhttp.open("PUT", URL,false);
	    					xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
	    					xmlhttp.send(JSON.stringify(ItemJSON)); 
							}
						
    					
					},
		            
		        );
			    

				}
				else
				{
					alert('missing signature');
				}
			}

		}

})()

function callbackFunction2(xmlhttp) 
{
    alert("Items Submitted");
}

function callbackFunction(xmlhttp) 
{
    alert("Signature submitted");
}
var zkSignature;

