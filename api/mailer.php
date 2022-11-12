<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require_once('./vendor/PHPMailer/src/phpmailer.php');	

function generateExcel($items,$fields,$setQuantity = false,$skipNullProduct = true)
{
    $alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->getColumnDimension('A')->setWidth(18);
    $sheet->getColumnDimension('B')->setWidth(15);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(8);
    $sheet->getColumnDimension('F')->setWidth(8);
    $sheet->getColumnDimension('G')->setWidth(30);
    $sheet->getColumnDimension('H')->setWidth(8);
    $sheet->getColumnDimension('I')->setWidth(8);
    $sheet->getColumnDimension('J')->setWidth(8);
    $sheet->getColumnDimension('K')->setWidth(8);
    $sheet->getColumnDimension('L')->setWidth(8);
    $sheet->getColumnDimension('M')->setWidth(10);
    $sheet->getColumnDimension('N')->setWidth(10);
    $sheet->getColumnDimension('O')->setWidth(10);
    $sheet->getColumnDimension('P')->setWidth(10);
    $sheet->getColumnDimension('Q')->setWidth(10);
    $sheet->getColumnDimension('R')->setWidth(10);
    $sheet->getColumnDimension('S')->setWidth(10);
    $sheet->getColumnDimension('T')->setWidth(10);
    $sheet->getColumnDimension('U')->setWidth(10);
    $sheet->getColumnDimension('V')->setWidth(10);
    $sheet->getColumnDimension('W')->setWidth(10);
    $sheet->getColumnDimension('X')->setWidth(10);
    $sheet->getColumnDimension('Y')->setWidth(10);
    $sheet->getColumnDimension('Z')->setWidth(10);
    
    $alphacount = 0;

   
    foreach($fields as $field)
    {
        $sheet->setCellValue($alphabet[$alphacount].'1', $field); 
        $alphacount++;     
    }
 
    $count = 2;    
    foreach($items as $item)    
    {  

        if($skipNullProduct == true)
        {
            if (!isset($item["PRODUCTID"]))
            continue;
            if ($item["PRODUCTID"] == "153020") // MYSTERY
                continue;                
        }
        $sheet->getRowDimension($count)->setRowHeight(100); 
         
        if ($setQuantity == true)
        {            
            if ($_POST["qty".$item["PRODUCTID"]] == "0" || 
                $_POST["qty".$item["PRODUCTID"]] == 0)
                continue;
        }           
        $alphacount = 0;
        foreach($fields as $field )
        {            
            if ($field == "IMAGE")
            {
                
                $path = "http://phnompenhsuperstore.com/api/picture.php?barcode=".$item["PRODUCTID"];
                //$data = file_get_contents($path);       
                $ch = curl_init(); //curl handler init
                curl_setopt($ch,CURLOPT_URL,$path);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);// set optional params
                curl_setopt($ch,CURLOPT_HEADER, false); 
                $data=curl_exec($ch); 
                curl_close($ch);
 

                if ($data != null && $data != false)
                {                    
                    file_put_contents("images/products/".$item["PRODUCTID"].".png", $data);
                    if (file_exists('./images/products/'.$item["PRODUCTID"].'.png'))
                    {
                        $sheeti = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                        $sheeti->setName('name');
                        $sheeti->setDescription('description');
                        $sheeti->setPath('./images/products/'.$item["PRODUCTID"].'.png');
                        $sheeti->setHeight(90); 
                        $sheeti->setCoordinates("A".$count);
                        $sheeti->setOffsetX(10);
                        $sheeti->setOffsetY(1);
                        $sheeti->setWorksheet($sheet);
                    }
                    
                }               
            }
            else if ($field == "QTY")            
                $sheet->setCellValue($alphabet[$alphacount].$count, $_POST["qty".$item["PRODUCTID"]]);                                   
            else
            {            
                if (isset($item[$field])){
                    $item[$field] = str_replace("<hr>","\n",$item[$field]);
                    $sheet->setCellValue($alphabet[$alphacount].$count, $item[$field]);                       
                }
            }
           $alphacount++;
        }
        $count++;             
    }
    $writer = new Xlsx($spreadsheet);
    $writer->save('data.xlsx');
    
    $files = glob('images/products/*');     
}


function reportMissingItemList($items){
     $fields = ["IMAGE","PRODUCTID","PRODUCTNAME","PRODUCTNAME1","PACKINGNOTE",
                "PRICE","COST","VENDNAME",
                "CNT","WH1","WH2","CATEGORYID","COLOR"];
    generateExcel($items,$fields);    
    sendEmailWithAttachment("sen.sov@gmail.com","bot@phnompenhsuperstore.com","Bot PPSS","Items ordered " + date("Y/m/d"),"data.xlsx");
}

function sendEmailWithAttachment($to,$from,$filepath){
    $name="BOT PPSS";
    $sender_email="sovi@phnompenhsuperstore.com";
    $send_to= $to;
    $subject="Item Split";
    $message="<h3>Phnom Penh Superstore</h3><br> Items split sent at :".date('l jS \of F Y h:i:s A');
       
       
    
    $send_mail = new PHPMailer();
    $send_mail->From = $sender_email;
    $send_mail->FromName = $name;
    $send_mail->Subject = $subject;
    $send_mail->Body = $message;
    $send_mail->AddAddress($send_to);
   
    $attach_file = $folder."".$file_name;
    $send_mail->AddAttachment($filepath);
   
    return $send_mail->Send();
}

function sendEmailWithAttachment2($to,$from,$filepath){
 
    // Email body content 
    $htmlContent = "
        <h3>Phnom Penh Superstore</h3><br>".
        "Items split sent at :".date('l jS \of F Y h:i:s A'); 
    
    // Header for sender info 
    $headers = "Bot PPSS"." <".$from.">"; 
    
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
    $mail = mail($to, "Item Split" ,$message, $headers, $returnpath);  
    var_dump($mail); 
    // Email sending status 
    echo @$mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; 
}

sendEmailWithAttachment("sen.sov@gmail.com","sovi@phnompenhsuperstore.com","/Users/sovi/Desktop/text.txt");

?>