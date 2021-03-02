<?php
namespace App\Traits;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


trait MailTrait


{

    public function WelcomeNewuser($client)
    {
        
        $view =  \View::make('partials.mail1',compact('client'))->render();
        // $template = file_get_contents('template1.php');              
        
        $mail = new PHPMailer(true);
        
        try {
        
          $mail->SMTPDebug = 0;                                       
          $mail->isSMTP();                                            
          $mail->Host       = 'smtp.gmail.com';  
          $mail->SMTPAuth   = true;                                    
          $mail->Username   = 'no-reply@oneconexxion.com';
          $mail->Password   = '10B+49630#63@';
          $mail->SMTPSecure = 'tls';                                  
          $mail->Port       = 587;                                
          
         $mail->setFrom('no-reply@oneconexxion.com', 'No-Reply');    
          $mail->addAddress($client->email, 'Usuario');     
                
          $mail->Subject = $client->subject;
          $mail->MsgHTML($view);
          $mail->IsHTML(true); 
          $mail->CharSet="utf-8";
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();
        
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
    }


    public function Sendresetpassword($client)
    {

        $view =  \View::make('partials.mail3',compact('client'))->render();


        $mail = new PHPMailer(true);
        try {
        
          $mail->SMTPDebug = 0;                                       
          $mail->isSMTP();                                            
          $mail->Host       = 'smtp.gmail.com';  
          $mail->SMTPAuth   = true;                                    
          $mail->Username   = 'no-reply@oneconexxion.com';
          $mail->Password   = '10B+49630#63@';
          $mail->SMTPSecure = 'tls';                                  
          $mail->Port       = 587;                                
          
          $mail->setFrom('no-reply@oneconexxion.com', 'No-Reply');      
          $mail->addAddress($client->to, 'Usuario');     
                
          $mail->Subject = $client->subject;
          $mail->MsgHTML($view);
          $mail->IsHTML(true); 
          $mail->CharSet="utf-8";
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();
          

            } 


            catch (Exception $e) {
                return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

         
    }
}
