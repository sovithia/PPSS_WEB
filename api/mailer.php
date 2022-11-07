<?php 

require_once("../intra/export.php");

function reportMissingItemList($items){
     $fields = ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE",
                "PRICE","COST","VENDNAME",
                "CNT","WH1","WH2","CATEGORYID","COLOR"];
    generateExcel($items,$fields);    
    sendEmailWithAttachment("sen.sov@gmail.com","bot@phnompenhsuperstore.com","Bot PPSS","Items ordered " + date("Y/m/d"),"data.xlsx");
}

function sendEmailWithAttachment($to,$from,$fromName,$subject,$filepath){
 
    // Email body content 
    $htmlContent = ' 
        <h3>Phnom Penh Superstore</h3>         
    '; 
    
    // Header for sender info 
    $headers = "From: $fromName"." <".$from.">"; 
    
    // Boundary  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
    
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    
    // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
    
    // Preparing attachment 
    if(!empty($file) > 0){ 
        if(is_file($file)){ 
            $message .= "--{$mime_boundary}\n"; 
            $fp =    @fopen($file,"rb"); 
            $data =  @fread($fp,filesize($file)); 
    
            @fclose($fp); 
            $data = chunk_split(base64_encode($data)); 
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
            "Content-Description: ".basename($file)."\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
        } 
    } 
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 
    
    // Send email 
    $mail = @mail($to, $subject, $message, $headers, $returnpath);  
    
    // Email sending status 
    echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; 
}

 

?>