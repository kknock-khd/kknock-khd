<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '1234', 'bbs');
    $id = $_POST['id'];

    //파일업로드
    $error = $_FILES['file']['error'];
    $tmpfile = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $folder = "../file/upload/".$filename;

    if( $error != UPLOAD_ERR_OK ) {
        switch( $error ) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "<script>alert('파일이 너무 큽니다.');";
                echo "window.history.back()</script>";
                exit;
        }
    }

    move_uploaded_file($tmpfile, $folder);

    $title = $_POST['title'];
    $content = $_POST['content'];

    if(!$filename){
        $sql_update = "UPDATE board SET title = '$title', content = '$content' WHERE id=$id;";
    } else {
        $sql_update = "UPDATE board SET title = '$title', content = '$content', file = '$filename' WHERE id=$id;";
    }
        
    $res_update = mysqli_query($conn, $sql_update);

    if($res_update) {
        echo "<script>alert('게시글이 수정되었습니다.');";
        echo "window.location.replace('view.php?id=$id');</script>";
    } else {
        echo mysqli_error($conn);
    }
?>