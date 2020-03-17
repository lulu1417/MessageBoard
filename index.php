<title>Sign up</title>
<?php
include 'header.php';
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <a href='view.php'>All Posts</a>
        <a href="login.php">Login</a>
    </div>
    <div class="content">
        <div class="m-b-md">
            <form name="signup" action="index.php" method="post">
                <p>Username : <input type=text name="name"></p>
                <p>Password : <input type=password name="password"></p>
                <p><input type="submit" name="submit" value="Sign up">
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
                            cursor: pointer;
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
        $sql = "select * from users where name = '$name'";
        $result = mysqli_query($db, $sql);
        $rows = mysqli_num_rows($result);

        if (!$rows) {
            $sql = "INSERT users(id,name,password) values (null,'$name','$password')";
            $result = mysqli_query($db, $sql);
            $sql = "select * from users where name = '$name'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $userId = $_SESSION['userId'] = $row['id'];
            }

            if (!$result) {
                die('Error: ' . mysqli_error());
            } else {

                echo '<div class="success">Sign up successfully ！</div>';
                echo "
                    <script>
                    setTimeout(function(){window.location.href='view.php';},200);
                    </script>";
            }
        } else {

            echo '<div class="warning">The Username has already been used ！</div>';
            echo "
                <script>
               setTimeout(function(){window.location.href='index.php';},500);
                </script>";
        }
    } else {

        echo '<div class="warning">Incompleted form！ </div>';
        echo "
<script>
setTimeout(function(){window.location.href='index.php';},10);
</script>";
    }
}

mysqli_close($db);
?>
