<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board</title>
</head>
<body>
    <div class=top><h2>게시판</h2></div>
    <button class=no onclick="window.location.href='write.php'">글쓰기</button>
    <table class=middle>
        <thead>
            <tr align=center>
                <th width=70>Post ID</th>
                <th width=300>제목</th>
                <th width=120>작성자</th>
                <th width=120>작성일</th>
                <th width=70>조회수</th>
                <th width=70>좋아요</th>
            </tr>
       </thead>
           <?php
	$conn = mysqli_connect('localhost', 'root', '1234', 'bbs');

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	$sql = "SELECT * FROM board";
	$res = mysqli_query($conn, $sql);

	$total_post = mysqli_num_rows($res);
	$per = 10;

	$start = ($page-1)*$per + 1;
	$start -= 1;

	$sql_page = "SELECT * FROM board ORDER BY id DESC limit $start, $per";
	$res_page = mysqli_query($conn, $sql_page);

	while($row = mysqli_fetch_array($res_page)){ ?>
		<tbody>
			<tr align=center>
				<td><?php echo $row['id'];?></td>
				<td><a style="color:purple;" href="view.php?id=<?=$row['id']?>"><?php echo $row['title'];?></a></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['written'];?></td>
				<td><?php echo $row['hit'];?></td>
				<td><?php echo $row['liked'];?></td>
			</tr>
		</tbody>
	<?php } ?>
    </table>
    <?php
	if($page > 1){
		echo "<a href=\"board.php?page=1\">[처음] </a>";
	}
	if($page > 1){
		$pre = $page - 1;
		echo "<a href=\"board.php?page=$pre\">이전 </a>";
	}
    
	$total_page = ceil($total_post / $per);
	$page_num = 1;
    
	while($page_num <= $total_page){
		if($page==$page_num){
			echo "<a style=\"color:purple;\" href=\"board.php?page=$page_num\">$page_num </a>";
		} else {
			echo "<a href=\"board.php?page=$page_num\">$page_num </a>"; }
		$page_num++;
	}
    
	if($page < $total_page){
		$next = $page + 1;
		echo "<a href=\"board.php?page=$next\">다음 </a>";
	}
	if($page < $total_page){
		echo "<a href=\"board.php?page=$total_page\">[끝]</a>";
	}
    ?>
	<p><a href="main.php">Go to login page</a></p>
</body>
</html>