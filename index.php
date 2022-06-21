<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once './library/email.php';

$body = "
<!doctype html>
<html lang=\"ja\">

<head>
  <style>
    * {
      box-sizing: border-box;
    }

    h1 {
      text-align: center;
      margin-top: 0;
    }

    .container {
      margin: auto;
      background-color: #eee;
      padding: 3%;
    }

    table {
      margin: auto;
      width: 70%;
      background-color: #fff;
      border-style: hidden;
      box-shadow: 0 0 0 2px #E5E5E5;
      border-radius: 8px;
      border-collapse: collapse;
      overflow: hidden;
      height: auto;
    }

    th,
    td {
      border: 2px solid #E5E5E5 !important;
      padding: 8px 10px;
      max-width: 300px;
      word-break:break-all;
    }

    th {
      width: 30%;
    }

    td {
      width: 70%;
    }
  </style>
</head>

<body>

  <div class=\"container\">
  <h1>
  お問い合わせ
</h1>
    <table class=\"table\">
     
      <tbody>
        <tr>
          <th scope=\"row\">項目</th>
          <td style=\"text-align:center; font-weight:bold\">内容</td>
        </tr>";

foreach ($_POST as $key => $value) {
  $body .= "<tr>
            <th scope=\"row\">";
  $body .=  $key . "</th><td>";

  
  if (is_array($value)) {

    foreach ($value as $item) {
      
      $item = nl2br($item);
      $body .= ' ' . $item;

    }
  } else {

    $value = nl2br($value);

    $body .= $value;
    
  }
  $body .= "</td> </tr>";
}

$body .=        "
      </tbody>
    </table>
  </div>

</body>

</html>
";

sendMail($body ,$_FILES);
