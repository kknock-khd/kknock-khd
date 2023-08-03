<?php
    session_start();
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        echo "<script>alert('비회원입니다!');";
        echo "window.location.replace('main.php');</script>";
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $writer = $_SESSION['user_id'];
    $name = $_SESSION['user_name'];
    $error = $_FILES['file']['error'];
    $tmpfile = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $folder = "../file/upload/".$filename;
    $conn = mysqli_connect('localhost', 'root', '1234', 'bbs');

    $sql = "INSERT INTO board(title, writer, name, written, content, file, hit, liked) VALUES ('$title', '$writer', '$name', now(), '$content', '$filename', 0, 0);";

    $res = mysqli_query($conn, $sql);

    if( $error != UPLOAD_ERR_OK ){
	switch( $error ) {
    		case UPLOAD_ERR_INI_SIZE:
        	case UPLOAD_ERR_FORM_SIZE:
        		echo "<script>alert('파일이 너무 큽니다.');";
            		echo "window.history.back()</script>";
            		exit;
	    }
      } else { if($res) {
        echo "<script>alert('게시글이 작성되었습니다.');";
        echo "window.location.replace('board.php');</script>";
	move_uploaded_file($tmpfile, $folder);
      } else {
        echo mysqli_error($conn);
      }
      }
?>