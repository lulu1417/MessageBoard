<?php
include 'header.php';
$commentId = $_POST["commentId"];
$postId = $_POST['postId'];
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $userId = $_POST['userId'];
    $content = $_POST["content"];

    $sql = "INSERT replies(user_id, comment_id ,content) VALUES ('$userId', '$commentId', '$content')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo '<div class="success">Reply send successfully ！</div>';
        echo "

                <script>
                 setTimeout(function(){window.location.href='allReplies.php?commentId=" . $commentId. ".&postId=".$postId.";'},800);
                </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>

