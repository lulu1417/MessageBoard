<title>All messages</title>
<?php
include 'header.php';
$name = $_SESSION['name'];
$userId = $_SESSION['userId'];
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$_SESSION['name']) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='board.php'>Write some messages</a>";
            echo '<a href="index.php">Log out</a>';
        }?>
    </div>


</div>
<div class="note full-height">
    <?php
    $sql = "select * from posts";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
//        echo "<br>Visitor Name：" . $row['name'];
        echo "<br>Subject：" . $row['subject'];
        echo "<br>Content：" . nl2br($row['content']) . "<br>";
        $postId = $_SESSION['postId'] =  $row['id'];

        echo '
        <form name="form1" action="like.php" method="post">
        <input type="hidden" name="postId" value= '.$postId.' >
        <input type="submit" name="submit" value= 👍 >
        </form>
        '.'<a href="comment.php">Comment</a> ';
        if ($_SESSION['userId'] == $row['user_id']) {
//            echo '
//		<a href="edit.php?name=' . $_SESSION['name'] ."&userId=". $_SESSION['userId']. '&no=' . $row['id'] .'">
//		<a href="edit.php">Edit message content</a>
//		&nbsp|&nbsp
//		<a href="delete.php">Delete the message</a><br>'
            ;
        }
        echo "<br>";
        echo "Time：" . $row['time'] . "<br>";
        echo "<hr>";

    }
    echo "<br>";
    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " posts.";
    ?>
</div>
</body>
</html>