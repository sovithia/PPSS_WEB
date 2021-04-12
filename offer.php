


<!DOCTYPE html>
<!--Header-->
<html lang="en">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OFFER | Phnom Penh Superstore</title>
    <!-- Bootstrap -->
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' id='redux-google-fonts-css'  href='http://fonts.googleapis.com/css?family=Roboto%3A400%2C700%2C500&#038;ver=1422437441' type='text/css' media='all' />
    <link href="assets/css/main_style.css" rel="stylesheet">
    <link href="assets/css/options.css" rel="stylesheet">   
    <link rel="shortcut icon" href="assets/images/favicon.ico">


  </head>
  <body class="page">
   <div class="oi_head_holder">
        <div class="container">
        	<div class="row">
            	<div class="col-md-3 col-sm-3 io_xs">	

                    <a href="index.html"><img src="assets/images/logo.png"  width="100px"></a>                
                </div>
                <div class="col-md-9 col-sm-9 io_xs">
                	
                </div>
            </div>           
        </div>
    </div>
    <div class="clearfix"></div>
    <!--Header-->
    <!--Content-->
    <div class="this_page">
    <div class="container">
    	  <div class="row vc_custom_f">    
         	<div class="col-sm-12">
                <h1>&nbsp;</h1>
            </div>             
        </div>

        <div class="row vc_custom_f">    
         	<div class="col-sm-12">
         		<h1>ការផ្សព្វផ្សាយ 15% នៅថ្ងៃពុធ | 10% ថ្ងៃផ្សេងទៀតទាំងអស់ (មានតែជាមួយ PiPay)</h1>
                <h1>15% Promotion on Wednesday | 10% all others days (Only with PiPay) </h1>

            </div>    

            <div class="col-sm-12" >            	
				<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://player.vimeo.com/video/325107891?autoplay=1&muted=1' frameborder='0'  webkitAllowFullScreen mozallowfullscreen allowFullScreen ></iframe></div>       
            </div>
        </div>
        <div class="row vc_custom_s m0">
            <div class="col-sm-3" align="center">
                <h1>VIP</h1>
                <h6>Join our VIP club to by entering your email to informed about our exclusive promotion</h6>
                <h6>ចូលរួមក្លឹប VIP របស់យើងដោយបញ្ចូលអ៊ីម៉ែលរបស់អ្នកដើម្បីជូនដំណឹងអំពីការផ្សព្វផ្សាយផ្តាច់មុខរបស់យើង</h6>
               
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
	            <div id="note"></div>
                <div class="wpcf7" id="fields">
                    <form action="offer.php" method="post" >
                        <div class="row">
                            <div class="col-md-12" align='center'>
                                <p>EMAIL
                                    <br />
                                    <input style="text-align:center;" type="text" name="email" value="" size="40" aria-required="true" aria-invalid="false" /> </p>
                            </div>
                            
                            <div class="col-md-12">
                                <p>
                                    <input type="submit" value="JOIN THE VIP CLUB"  />
                                </p>
                            </div>
                        </div>
                       
                    </form>
                </div>
			</div>
        </div>
    </div>
   
    <!--Footer-->
    <div class="container">
        <div class="oi_footer">
            <div class="row">
                <div class="col-md-12">
                    Copyright © 2019.Phnom Penh Superstore                
                </div>
            </div>
        </div>
    </div>
   	<script src="assets/js/jquery-1.11.2.min.js"></script>   
    
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script type='text/javascript' src='assets/js/SmoothScroll.js'></script>
	<script type='text/javascript' src='assets/js/jquery.waitforimages.js'></script>
    <script type='text/javascript' src='assets/js/isotope.pkgd.min.js'></script>
    <script type='text/javascript' src='assets/js/lightbox.min.js'></script>
    <script type='text/javascript' src='assets/FlexSlider/jquery.flexslider-min.js'></script>
    <script type='text/javascript' src='assets/js/imagesloaded.js'></script>
    <script type='text/javascript' src='assets/js/gmap3.min.js'></script>
    <script type='text/javascript' src='assets/js/custom.js'></script>
    <!--Footer-->
  </body>
</html>

<?php 
function getDatabase()
{
    try{
        $db = new PDO('sqlite:'.dirname(__FILE__).'/ppss.sqlite');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch(Exception $e) {
        die ("Cannot open database : ".$e->getMessage());    
    }
    return $db;
}

function recordEmail($email)
{
	$db = getDatabase();
	$stmt = $db->prepare("INSERT INTO CAPTURE values (null,:email)");    	    
	$stmt->bindValue(':email',$email,PDO::PARAM_STR);
	$result = $stmt->execute();	
	echo "<script>alert('Email OK')</script>";
}

if (isset($_POST["email"]) && strlen($_POST["email"]) > 0)
{
	recordEmail($_POST["email"]);
}

?>