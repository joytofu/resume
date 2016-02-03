<?php
require_once 'function.php';
require_once 'Connect2.1/qqConnectAPI.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QQLogin</title>
    <meta property="qc:admins" content="276066756763337176367164506000" />
</head>
<body>
    <?php
      if(!isset($_COOKIE['qq_accesstoken']) || !isset($_COOKIE['qq_openid'])){
          echo "<a href='qqlogin.php'><img src='images/Connect_logo.png'></a>";
      }else{
          echo "<a href='qqlogout.php'><button>退出QQ</button></a>";
          $qc = new QC($_COOKIE['qq_accesstoken'],$_COOKIE['qq_openid']);
          $user_info = $qc->get_user_info();
      }
    ?>

</body>
</html>

