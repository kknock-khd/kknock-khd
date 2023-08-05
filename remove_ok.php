<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '1234', 'bss');
    $id = $_GET['id'];

    $sql_check = "SELECT * FROM board WHERE id=$id";
    $res_check = mysqli_fetch_array(mysqli_query($conn, $sql_check));
    if($_SESSION['user_id'] != $res_check['writer']){
        echo "<script>alert('권한이 없습니다!');";
        echo "window.history.back()</script>";
        exit;
    }

    $sql = "
    DELETE FROM board WHERE id=$id;
    DELETE FROM like_manager WHERE like_post_id=$id;
    ";

    $res = mysqli_multi_query($conn, $sql);

    echo "<script>alert('게시글이 삭제되었습니다!');";
    echo "window.location.replace('board.php');</script>";
?>