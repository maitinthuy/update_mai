
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
try{
$pdh = new PDO("mysql:host=mysql.hostinger.vn; dbname=u667511593_book"  , "u667511593_book"  , "123456"  );
$pdh->query("set names 'utf8'");
}
catch(Exception $e){
		echo $e->getMessage(); exit;
}


$timkiem =$_POST["timkiem"];
$sql ="select * from book b inner join category c on b.cat_id = c.cat_id  where book_name like '%$timkiem%'  ";
$stm = $pdh->prepare($sql);
$stm->bindValue("timkiem","$timkiem");
$stm->execute();//thực thi câu sql
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>";
//print_r($rows);
//echo "</pre>";


if($timkiem==null)
{
	?>
    <script language="javascript">
	alert("bạn phải nhập ít nhất 1 từ");
	window.location="timkiem.php";
    
    </script>
    <?php
}
?>
<?php
if (Count($rows)==0)
{?>
	<script language="javascript">
	alert("không tìm được");
	window.location="timkiem.php";
    
    </script>
    <?php
}
else 
{
?>
    <?php echo "KẾT QUẢ TÌM KIẾM"; ?><br/><P>
		<div style="width:100%; height:100%;">
           <?php 
			foreach($rows as $r)
				{
				?>  
                   <table width="200" border="1">
                      <tr>
                        
                        <td><?php echo $r["book_name"];?></td>
                        <td><?php echo $r["cat_name"]; ?></td>
                        
                        <td>
                        <?php
						
						 ?>
                        </td>
                      </tr>
                    </table>

                
				<?php
				}
				?>	
		</div>
  					
					
<?php
}
?>
