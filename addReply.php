<?php
include 'header.php';
$commentId = $_POST["commentId"];
$postId = $_POST['postId'];
if (isset($_POST['submit'])) {
    $content = $_POST["content"];

    $sql = "INSERT replies(user_id, comment_id ,content) VALUES ('$userId', '$commentId', '$content')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo "

                <script>
                 setTimeout(function(){window.location.href='allReplies.php?commentId=" . $commentId. "&postId=".$postId.";'},10);
                </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>

