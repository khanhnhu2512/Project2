
<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($sendTo, $mailTitle, $mailBody)
{
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    // try {
        //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'luongkhanhnhu2512@gmail.com'; // SMTP username
        $mail->Password = 'Khanhnhu2512'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port lớn connect to
        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('luongkhanhnhu2512@gmail.com', 'Admin');
        $mail->addAddress($sendTo); // Name is optional
        $mail->addReplyTo('luongkhanhnhu2512@gmail.com', 'Reply');
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $mailTitle;
        $mail->Body = $mailBody;
        // $mail->AltBody = 'This is the body in plain text for non-HTML email clients';
        $mail->send();
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    // }
    // }
}
function mailOrder($sendTo, $mailTitle, $cart)
{
    $mailBody  =  "<h2>Order Confirmation</h2> <br>";
    $mailBody .=  "Dear";
    $mailBody .= $name;
    $mailBody .= "<br>We have received your order and will be processing it shortly. The details of the order are below:";
    $mailBody .= "Name: ";
    $mailBody .=  "<table border='1px' width='100%' cellpadding='0' cellspacing='0'>
    <tr>
        <td style='width: 40px'>STT</td>
        <td style='width: 600px'>Name</td>
        <td style='width: 100px'>Qty</td>
        <td>Price</td>  
        <td style='width: 200px'>Total</td>
    </tr>
    <tr>";
    $i = 1;
    foreach ($cart as $key => $value) {
        $mailBody .=    "<td style='width: 40px'>";
        $mailBody .=    $i;
        $mailBody .=    "</td>
    <td style='width: 300px'>";
        $mailBody .= $value['name'];
        $mailBody .=    "</td>
    <td style='width: 100px'>";
        $mailBody .= $value['qty'];
        $mailBody .=    "</td>
    <td>";
        $mailBody .= $value['price'];
        $mailBody .=    "</td>
    <td>";
        $mailBody .= ($value['qty'] * $value['price']);
        $mailBody .=    "</td>
    </tr>";
        $i++;
    }
    $mailBody .=    "</table>";
    sendmail($sendTo, $mailTitle, $mailBody);
}

// $mailBody =  "<table border='1px' width='100%' cellpadding='0' cellspacing='0'>
//                 <tr>
//                     <td style='width: 40px'>STT</td>
//                     <td style='width: 100px'>Image</td>
//                     <td style='width: 600px'>Name</td>
//                     <td style='width: 100px'>Qty</td>
//                     <td>Price</td>  
//                     <td style='width: 200px'>Total</td>
//                 </tr>
//                 <tr>";
//     $i = 0;
//             foreach ($_SESSION['cart'] as $key => $value) {
// $mailBody .=    "<td style='width: 40px'>";
// $mailBody .=    $i; 
// $mailBody .=    "</td>
//                 <td>
//                     <img src='./library/images/image-product/";$mailBody .=$value['image'];
// $mailBody .= "'>
//                 </td>
//                 <td style='width: 300px'>";
// $mailBody .= $value['name'];
// $mailBody .=    "</td>
//                 <td style='width: 100px'>";
// $mailBody .= $value['qty']; 
// $mailBody .=    "</td>
//                 <td>";
// $mailBody .= $value['price'];
// $mailBody .=    "</td>
//                 <td>";
// $mailBody .= $value['qty'] * $value['price'];
// $mailBody .=    "</td>
//                 </tr>";
//     $i++;}
// $mailBody .=    "</table>";

// $mailBody = "<table border='1px' width='100%' cellpadding='0' cellspacing='0'>
//                         <tr>
//                             <td style='width: 40px'>STT</td>
//                             <td style='width: 100px'>Image</td>
//                             <td style='width: 600px'>Name</td>
//                             <td style='width: 100px'>Qty</td>
//                             <td>Price</td>
//                             <td style='width: 200px'>Total</td>
//                         </tr>

//                         <tr>
//                             <td style='width: 40px'>";
// $mailBody .= $id;                              
//  $mailBody .=           "</td>
//                             <td>
//                                 img
//                             </td>
//                             <td style='width: 300px'>
//                                 2
//                             </td>
//                             <td style='width: 100px'>
//                                 3
//                             </td>
//                             <td>
//                                 4
//                             </td>
//                             <td>
//                                 5
//                             </td>
//                         </tr>
//                     </table>";
// sendmail($sendTo, $mailTitle, $mailBody);

?>