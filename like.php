<title>Who Like This Post</title>
<?php
include 'header.php';
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$_SESSION['name']) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='view.php'>All Posts</a>";
            echo '<a href="index.php">Log out</a>';
        } ?>
    </div>


</div>
<div class="note full-height">
<?php
if (isset($_POST['submit'])) {
    $postId = $_POST["postId"];
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];

    echo '<div class="success">Who also liked the post : </div>';


    $sql = "SELECT likes.id as like_id, likes.*, users.*
FROM users
    LEFT JOIN likes
         ON likes.user_id = users.id 
   WHERE likes.post_id = '$postId' AND likes.user_id = '$userId' ORDER BY likes.id DESC";


    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row == 0){
        $sql = "INSERT likes(user_id, post_id, time) VALUES ('$userId', '$postId', now())";
    }

    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {

        $sql = "SELECT likes.id as like_id, likes.time as like_time, likes.*, users.*
FROM users
    LEFT JOIN likes
         ON likes.user_id = users.id 
   WHERE likes.post_id = '$postId' ORDER BY likes.id DESC";


        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>Visitor Name：" . $row['name']. "<br>";
            echo "Time：" . $row['like_time'] . "<br>";
            echo "<hr>";

            if($userId == $row['id']){
                echo '
        <form name="form1" action="dislike.php" method="post">
        <input type="hidden" name="postId" value= ' . $postId . ' >
        <input type="hidden" name="userId" value= ' . $userId . ' >
        <input type="hidden" name="likeId" value= ' . $row['like_id'] . ' >
         <input type="submit" name="submit" value= "Retrive like 👎" >
           <style>
                        input {
                            padding:5px 15px;
                            background:#CCEEFF;
                            border:0 none;f
                        cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: \'Nunito\', sans-serif;
                            font-size: 19px;
                        }
                    </style>
        </form>
        
        ';

            }

        }

        echo '<div class="bottom left position-abs content">';


    }
}else{
    var_dump('not cool');
    die();
}
?>
</div>
