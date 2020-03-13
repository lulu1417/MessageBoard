<title>All Comments</title>
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
<?php
if (isset($_POST['submit'])) {
    $postId = $_POST["postId"];
    echo '<div class="success">You liked number '.$postId.' post！ <br >Who also liked the post : </div>';
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];
    $postId = $_POST["postId"];
    $sql = "INSERT likes(user_id, post_id) VALUES ('$userId', '$postId')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {

        $sql = "SELECT likes.*, users.*
FROM users
    LEFT JOIN likes
         ON likes.user_id = users.id 
   WHERE likes.post_id = '$postId' ORDER BY likes.id DESC";


        $result = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>Visitor Name：" . $row['name']. "<br>";
            echo "Time：" . $row['time'] . "<br>";
            echo "<hr>";

        }

        echo '<div class="bottom left position-abs content">';


    }
}else{
    var_dump('not cool');
    die();
}
?>
