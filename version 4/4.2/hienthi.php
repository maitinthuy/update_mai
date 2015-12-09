
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hiển thị</title>
</head>

<body>

<?php

$pdo = new PDO("mysql:host=mysql.hostinger.vn; dbname=u667511593_book","u667511593_book","123456");
$pdo->query("set names 'utf8' ");
$sql="select Count(*) as dem from book ";
$stm = $pdo->query($sql);
$n = $stm->rowCount();//số dòng trả về
$arr = $stm->fetchAll(PDO::FETCH_ASSOC);

//print_r($sql);
	$n = $arr[0]["dem"];
	echo "ban dang co $n sach ";
	$pageSize = 30;
	$sotrang = ceil($n/$pageSize);//ceil lam tron len
	$page = isset($_GET["page"])?$_GET["page"]:1;
	$vt = ($page-1) *$pageSize;
	
	
	$sql1="select * from book limit $vt, $pageSize";
	$stm1 = $pdo->query($sql1);
	$n1 = $stm1->rowCount();//số dòng trả về
	$arr2 = $stm1->fetchAll(PDO::FETCH_ASSOC);
	?>
	
<table width="800" border="1">
  <tr>
    <td>book_id</td>
    <td>book_name</td>
    <td>description</td>
    <td>price</td>
    <td>img</td>
    <td>pub_id</td>
    <td>cat_id</td>
    <td>Thao Tác</td>
  </tr>	 
  
 <?php foreach($arr2 as $r2)
	{
		?> 
  <tr>
    <td><?php echo $r2["book_id"]; ?></td>
    <td><?php echo $r2["book_name"]; ?></td>
    <td><?php echo $r2["description"]; ?></td>
    <td><?php echo $r2["price"]; ?></td>
    <td><img src="<?php echo $r2["img"]; ?>" height="100px" width="100px" /></td>
    <td><?php echo $r2["pub_id"]; ?></td>
    <td><?php echo $r2["cat_id"]; ?></td>
    <td><a href="delete.php?book_id=<?php echo $r2["book_id"]; ?> ">Xóa</a></td>
  </tr>
  <?php
      }
      ?>  
</table>


<div style="color:#F00; clear:both; text-align:center;">
	<?php
		for($i=1; $i<= $sotrang; $i++)
		{
			?>
			<a class="a" href="hienthi.php?page=<?php echo $i;?>"><?php echo $i;?></a>&nbsp;
			<?php	
		}
	?>
</div>


</body>
</html>