<?php
    include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
</head>
<body>
	<?php
		$bno = $_GET['id']; /* bno함수에 id값을 받아와 넣음*/
		$hit = mysqli_fetch_array(query("select * from board where id ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = query("update board set hit = '".$hit."' where id = '".$bno."'");
		$sql = query("select * from board where id='".$bno."'"); /* 받아온 id값을 선택 */
		$board = $sql->fetch_array();
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['written']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
				<p class=file><a href="../file/upload/<?=$board['file'];?>"download><?=$board['file'];?></a></p>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="board.php">[목록으로]</a></li>
        		<?php
    if($_SESSION['user_id'] == $board['writer']){ ?>
        <div class=mine>
        	<button class=write onclick="window.location.href='update.php?id=<?=$res_view['id']?>'" type="button">수정</button>
        	<button class=write onclick="window.location.href='remove_ok.php?id=<?=$res_view['id']?>'" type="button">삭제</button>
        </div>
<?php } ?>
        </div>
		</ul>
	</div>
</div>
</body>
</html>