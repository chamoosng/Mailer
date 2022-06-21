<?php

require_once './src/PHPmailer.php';
require_once './src/SMTP.php';


/**
 * @param string $body メールの内容（HTML)
 * @param $files Files
 */
function sendMail(string $body, $files = null): void
{
  $mail = new PHPMailer(true);


  /**
   * Mail 受け取り先
   */
  $recipients = [

  ];

  try {
    //Gmail 認証情報
    $host = 'smtp.gmail.com';
    $username = 'chamoosong@gmail.com'; // example@gmail.com
    $password = 'fwolnpcdqjhmgihu';
  
    //差出人
    $from = 'moosong@netreal.co.jp';
    $fromname = 'moosong';
  
    //メール設定
    $mail->SMTPDebug = 2; //デバッグ用
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = $host;
    $mail->Username = $username;
    $mail->Password = $password;

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";

    $mail->setFrom($from, $fromname);

    foreach ($recipients as $email => $name) {
      
      $mail->addAddress($email, $name);

    }

    // Title
    $mail->Subject = '件名：お問い合わせ';

    // 内容
    $mail->Body    = $body;

    $mail->IsHTML(true);  

    foreach($files as $file) {
      
      if ($file['size'] > 0 ) {
        attach_file($mail, $files);
      }

    }

    //メール送信
    $mail->send();
  
  } catch (Exception $e) {

    error_log(PHP_EOL . date("Y-m-d H:i:s") . " : " . $mail->ErrorInfo . PHP_EOL, 3, './log/error.log');

  }
}
/**
 * @param PHPMailer $mail PHPMailer Class
 * @param $files Files
 * 
 * ファイルを添付する
 */

function attach_file(PHPMailer $mail, $files): void
{
  foreach ($files as $file) {
    
    $mail->AddAttachment($file["tmp_name"],$file["name"], 'base64', $file['type']);
  
  }
}

