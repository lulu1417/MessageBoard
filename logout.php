<?php
include 'header.php';
$_SESSION['name'] = null;
$_SESSION['userId'] = null;
echo "
       <script>
           setTimeout(function(){window.location.href=login.php;},10);
       </script>";
