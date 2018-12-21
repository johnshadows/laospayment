<?php
if($_POST){

    require('../mailer/PHPMailer/PHPMailerAutoload.php');
    /**
     * This example shows making an SMTP connection with authentication.
     */
    //  move_uploaded_file($file_dir,$local_dir.$file_name);
    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Asia/Bangkok');
    
     $res = '';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    
    $mail->CharSet = 'UTF-8';
    //Set the hostname of the mail server
    $mail->Host = "smtp.gmail.com";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "aidenorg485@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "i>love>you";
    //Set who the message is to be sent from
    $mail->setFrom('aidenorg485@gmail.com', 'Support forexcity');
    //Set who the message is to be sent to
    $mail->addAddress('johnshadows26@gmail.com', 'เจ้าหน้าที่ฝ่ายตรวจสอบ');

    if($_FILES['f_attachment']['name'] != ''){

        $file_name = $_FILES['f_attachment']['name'];
        $allowed_ext = array("jpg","png","pdf");
        $tmps = explode('.',$file_name);
        $ext = end($tmps);

        if(in_array($ext,$allowed_ext)){
            if($_FILES['f_attachment']['size']<2000000){
                $new_name = md5(rand()).'.'.$ext;
                $path = 'uploads/'.$new_name;
                move_uploaded_file($_FILES['f_attachment']['tmp_name'],$path);
                $mail->addAttachment($path);
            
                $mail->isHTML(true);
                //Set the subject line
                $mail->Subject = 'LaoExchange หลักฐานการโอนเงิน';
                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
                $postData = $_POST;
                $mail->Body   = '<div style="text-align:center">
                                <table>
                                    <thead>
                                        <tr style="border:1px solid black;">
                                            <th style="border:1px solid black;">เลข MT4</th>
                                            <th style="border:1px solid black;">ชื่อ</th>
                                            <th style="border:1px solid black;">Email</th>
                                            <th style="border:1px solid black;">จำนวนเงิน'.$_POST['f_currency'].'</th>
                                            <th style="border:1px solid black;">วันที่ ปี/เดือน/วัน</th>
                                            <th style="border:1px solid black;">ข้อความ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="border:1px solid black;">
                                            <td style="border:1px solid black; text-align: center;">'.$_POST['f_mt4'].'</td>
                                            <td style="border:1px solid black; text-align: center;">'.$_POST['f_name'].'</td>
                                            <td style="border:1px solid black; text-align: center;">'.$_POST['f_emal'].'</td>
                                            <td style="border:1px solid black; text-align: center;">'.$_POST['f_amount'].'</td>
                                            <td style="border:1px solid black; text-align: center;">'.$_POST['f_date'].'</td>
                                            <td style="border:1px solid black; text-align: center;">'.$_POST['f_message'].'</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                ';

                                                
                    if(!$mail->send()) {
                        echo $output = json_encode(array('success' => false));
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo $output = json_encode(array('success' => true));
                    }
            }
            else {
                echo $output = json_encode(array('success' => 'big'));
            }
        }else{
            echo $output = json_encode(array('success' => 'type'));
        }
    }



}
