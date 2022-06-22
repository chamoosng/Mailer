<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once './library/email.php';
require_once './library/rendor.php';

$email_body = render_php("./template/template.php", $_POST);

sendMail($email_body ,$_FILES);
