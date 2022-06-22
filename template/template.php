<!doctype html>
<html lang="ja">

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
    .column {
      text-align:center; 
      font-weight:bold;
      font-size: 17px;
    }
    
    th,
    td {
      border: 2px solid #E5E5E5 !important;
      padding: 8px 10px;
      max-width: 300px;
      word-break: break-all;
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

  <div class="container">
    <h1>
      お問い合わせ
    </h1>
    <table class="table">

      <tbody>
        <tr>
          <th class="column" scope="row">項目</th>
          <td class="column">内容</td>
        </tr>

        <?php foreach ($_POST as $key => $value) : ?>
          <tr>
            <th scope="row">
              <?= $key ?>
            </th>
            <td>
              <?php if (is_array($value)) : ?>
                <?php foreach ($value as $item) : ?>

                  <?= nl2br($item) . '、' ?>

                <?php endforeach; ?>
              <?php else : ?>

                <?= nl2br($value) ?>

              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>

  </div>

</body>

</html>