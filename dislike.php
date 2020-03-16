<?php
include 'header.php';


if (isset($_POST['submit'])) {
    $postId = $_POST["postId"];
    $userId = $_POST['userId'];
    $likeId = $_POST['likeId'];
    $sql = "delete from likes where (id='$likeId')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo "
                <script>
                 setTimeout(function(){window.location.href='view.php';},10);
                </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>