<title>Board</title>
<?php
include 'header.php';
$name = $_SESSION['name'];
$userId = $_SESSION['userId'];

?>

<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <a href='view.php?name=<?=$name?>'>View</a>
        <a href="index.php">Logout</a>
        <a href="register.php">Register</a>
    </div>
    <div class="content">
        <div class="m-b-md">
            <form name="form1" action="addPosts.php" method="post">
                <input type="hidden" name="name" value="<?=$name?>">
                <input type="hidden" name="userId" value="<?=$userId?>">
                <p><strong><?="Hi, " . $name?></strong>  ʕ•ᴥ•ʔ</p>
                <p>SUBJECT</p>
                <p><input type="text" name="subject"></p>
                <p>CONTENT</p>
                <p><textarea style="font-family: 'Nunito', sans-serif; font-size:20px; width:550px;height:100px;" name="content"></textarea></p>
                <p><input type="submit" name="submit" value="SEND">
                    <style>
                        input {padding:5px 15px; background:#FFCCCC; border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px; }
                    </style>
                    <input type="reset" name="Reset" value="RESET">
                    <style>
                        input {
                            padding:5px 15px;
                            background:#FFCCCC;
                            border:0 none;f
                        cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: 'Nunito', sans-serif;
                            font-size: 19px;
                        }
                    </style>
            </form>
        </div>

</body>
</html>

<?php
//
//if (isset($_POST['submit'])) {
//    echo '<div class="success">Added successfully ！</div>';
//    $name = $_POST['name'];
//    $userId = $_POST['userId'];
//    $subject = $_POST["subject"];
//    $content = $_POST["content"];
//    var_dump($userId);
//    die();
//    $sql = "INSERT posts(user_id, content, time) VALUES ('$userId', '$subject', '$content', now())";
//
//    if (!mysqli_query($db, $sql)) {
//        die(mysqli_error());
//    } else {
//        echo "
//                <script>
//                setTimeout(function(){window.location.href='view.php?name=" . $name ."&userId=" . $userId. "';},500);
//                </script>";
//
//    }
//} else {
//    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
//}
//?>