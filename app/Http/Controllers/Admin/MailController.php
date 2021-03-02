<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
     



     private function sendmail($useremail, $data ){      
        
        $mail = new PHPMailer(true);

        try {
        
          $mail->SMTPDebug = 0;                                       
          $mail->isSMTP();                                            
          $mail->Host       = 'server304.hostgo.com';  
          $mail->SMTPAuth   = true;                                    
          $mail->Username   = 'no-reply@laboratoriodigitalbogota.com';
          $mail->Password   = 'ncqi2glbhf9i';
          $mail->SMTPSecure = 'ssl';                                  
          $mail->Port       = 465;                                    
          
          $mail->setFrom('no-reply@laboratoriodigitalbogota.com', 'No-Reply');       
          $mail->addAddress($useremail, 'Usuario');     
                
          $mail->isHTML(true);                                  
          $mail->Subject = 'Reset Password';
          $mail->Body    = 'Contraseña nueva: '.$randompwd;
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        
            } 

            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
}
