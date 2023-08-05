<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '1234', 'bbs');
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM board WHERE id=$id";
    $res = mysqli_fetch_array(mysqli_query($conn, $sql));
    if($_SESSION['user_id'] != $res['writer']){
        echo "<script>alert('권한이 없습니다!');";
        echo "window.history.back()</script>";
        exit;
    }
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<html lang="en">
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="update_ok.php?id=<?php echo $id; ?>" method="post">
                    <div class=head>글수정</div>
<div class=middle>
    <form method="post" action="update_ok.php" enctype="multipart/form-data" autocomplete="off">
        <p><input class=textform type=text size=25 name=title value='<?=$res['title']?>' required></p>
        <p><textarea class=textform cols=35 rows=15 name=content><?=$res['content'];?></textarea></p>
        <p><?=$res['file']?></p>
        <p><input class=file type=file name=file value=null></p>
        <p><input class=write type="submit" value="글수정"></p>
        <input type="hidden" name=id value=<?=$id?>>
    </form>
</div>
                </form>
            </div>
        </div>
    </body>
</html>
