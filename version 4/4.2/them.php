
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm loại sách</title>


<form action="xlthem.php" method="post" enctype="multipart/form-data"><br>
ID:<input type="text" name="id"  /><br>
Tên sách:<input type="text" name="tensach"  /><br>
Mô tả:<input type="text" name="mota"  /><br>
Giá:<input type="text" name="gia"  /><br>
Hình:<input type="file" name="hinh"  /><br>
Mã Loai:<select name="maloai" >
      <?php
		$pdo = new PDO("mysql:host=mysql.hostinger.vn; dbname=u667511593_book"  , "u667511593_book"  , "123456");
		$pdo->query("set names 'utf8' ");
		$sql="select * from category";
		$stm = $pdo->query($sql);
		
		
		$n = $stm->rowCount();//số dòng trả về
		$arr = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach($arr as $ml)
		{
		?>
        <option value="<?php echo $ml["cat_id"];?>">
         <?php echo $ml["cat_name"];?></option>
        <?php	} ?>
</select><br>

Mã NXB:<select name="manxb" >
      <?php
		$pdo = new PDO("mysql:host=mysql.hostinger.vn; dbname=u667511593_book"  , "u667511593_book"  , "123456");
		$pdo->query("set names 'utf8' ");
		$sql="select * from publisher";
		$stm = $pdo->query($sql);
		
		
		$n = $stm->rowCount();//số dòng trả về
		$arr2 = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach($arr2 as $nxb)
		{
		?>
        <option value="<?php echo $nxb["pub_id"];?>">
         <?php echo $nxb["pub_name"];?></option>
        <?php	} ?>
</select><br>
<input type="submit" value="insert" name="sm"/>
</form>


