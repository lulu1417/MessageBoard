<?php
include 'header.php';

//    echo '<div class="success">Added successfully ！</div>';
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];
    $postId = $_SESSION["postId"];
    $sql = "INSERT likes(user_id, post_id) VALUES ('$userId', '$postId')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo "
                <script>
                setTimeout(function(){window.location.href='view.php';},10);
                </script>";

    }
?>
