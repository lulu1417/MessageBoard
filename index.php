<title>Login</title>
<?php
include 'header.php';
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <a href='view.php'>All Posts</a>
        <a href="index.php">Login</a>
        <a href="register.php">Register</a>
    </div>
    <div class="content">
        <div class="m-b-md">
            <form name="login" action="index.php" method="post">
                <p>Username : <input type=text name="name" value="lulu"></p>
                <p>Password : <input type=password name="password" value="123456"></p>
                <p><input type="submit" name="submit" value="Log in">
                    <style>
                        input {
                            padding: 5px 15px;
                            background: #ccc;
                            border: 0 none;
                            cursor: pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                        }
                    </style>
                    <input type="reset" name="Reset" value="Reset">
                    <style>
                        input {
                            padding: 5px 15px;
                            background: #FFCCCC;
                            border: 0 none;
                            f cursor: pointer;
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
if (isset($_POST['submit'])) {
    $name = $_SESSION['name'] = $_POST['name'];
    $password = $_POST['password'];
    if ($name && $password) {
        $sql = "select * from users where name = '$name' and password='$password'";
        $result = mysqli_query($db, $sql);
        $rows = mysqli_num_rows($result);
        $result = mysqli_fetch_array($result);
        $userId = $_SESSION['userId'] = $result['id'];

        if ($rows) {
            echo '<div class="sucess">welcome！ </div>';
            echo "
            <script>
//            setTimeout(function(){window.location.href='view.php?name=" . $name ."&userId=" . $userId. "';},1000);
             setTimeout(function(){window.location.href='view.php';},1000);
            </script>";
            exit;
        } else {
            echo '<div class="warning">Wrong Username or Password！</div>';
        }
    } else {

        echo '<div class="warning">Incompleted form！ </div>';
        echo "
<script>
setTimeout(function(){window.location.href='index.php';},2000);
</script>";
    }

}

?>