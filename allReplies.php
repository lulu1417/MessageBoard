<title>All Replies</title>
<?php
include 'header.php';
$name = $_SESSION['name'];
$userId = $_SESSION['userId'];
$commentId = $_GET['commentId'];
$postId = $_GET['postId'];
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$_SESSION['name']) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='view.php'>All POST</a>";
            echo '<a href="index.php">Log out</a>';
        } ?>
    </div>


</div>

<div class="note full-height">
    <?php
    $sql = "SELECT replies.id as reply_id, users.*, replies.*
FROM users
    LEFT JOIN replies
         ON replies.user_id = users.id 
   WHERE replies.comment_id = '$commentId' ORDER BY replies.id DESC";


    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>Visitor Name：" . $row['name'];
        echo "<br>Content：" . nl2br($row['content']) . "<br>";
        echo "Time：" . $row['time'] . "<br>";

    }

    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " replies.";
    ?>
</div>
</body>
</html>
