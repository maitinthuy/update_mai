<?php

try{
$pdh = new PDO("mysql:host=mysql.hostinger.vn; dbname=u667511593_book"  , "u667511593_book"  , "123456"  );
$pdh->query("  set names 'utf8'"  );
}
catch(Exception $e){
		echo $e->getMessage(); exit;
}

$book_id = isset($_GET["book_id"])?$_GET["book_id"]:"";
$sql ="delete from book where book_id ='$book_id' ";
$stm = $pdh->query($sql);
$arr = $stm->fetchAll(PDO::FETCH_ASSOC);

$stm = $pdh->prepare($sql);
$stm->execute($arr);
$n = $stm->rowCount();
if ($n>0) 
{ 
	$thongbao="Loi xóa! ";
}
else 
	$thongbao=" xoa thanh cong!";
?>
<script language="javascript">
alert("<?php echo $thongbao;?>");
window.location = "hienthi.php";
</script>