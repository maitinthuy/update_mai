
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<?php
try{
$pdh = new PDO("mysql:host=mysql.hostinger.vn; dbname=u667511593_book"  , "u667511593_book"  , "123456" );
$pdh->query("set names 'utf8'");
}
catch(Exception $e){
		echo $e->getMessage(); exit;
}
$id=$_POST["id"];
$ten=$_POST["tensach"];
$mt=$_POST["mota"];
$gia=$_POST["gia"];
$hinhdaidien= time()."_".$_FILES["hinh"]["name"];
$ml=$_POST["maloai"];
$nxb=$_POST["manxb"];

if(isset($_POST["sm"]))
{
	$sql="insert into book(book_id, book_name, description, price, img, pub_id,cat_id ) values('$id','$ten','$mt','$gia','$hinhdaidien', '$nxb', '$ml') ";
	$arr=array ("'$id','$ten','$mt','$gia','$hinhdaidien,'$nxb','$ml'");
	move_uploaded_file($_FILES["hinh"]["tmp_name"], "hinh/". $hinhdaidien);
	$stm= $pdh->prepare($sql);
	$stm->execute($arr);
	$n = $stm->rowCount();
	if ($n>0) echo "Đã thêm $n loại ";
	else echo "Lỗi thêm ";
}

$stm = $pdh->prepare("select * from category");
$stm->execute();
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
echo "<pre>";
echo "<br>";
?>


<script >
window.location="hienthi.php";
</script>