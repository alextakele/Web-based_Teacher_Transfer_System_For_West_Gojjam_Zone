<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM reservation WHERE id=$id");
	if($del_sql){
		echo "<h3 style='color:#e01f3c' ><b>የተያዘው ቦታ ተሰርዟል... !</b></h3>";
		
		}
	else{
		$msg="ቦታ መያዝ አሊተቻለም :".mysql_error();
		}	
			
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="am">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ወርቃማ አውቶቡስ ትራንስፖርት ስርዓት</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="210px" style="font-size:18px; color:#006; text-indent:30px;"><b>የተያዙ ቦታዎችን ይመልከቱ</b></td>
        <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        </td>
        <td>
        	<input type="text" name="searchtxt" title="ለፍለጋ ሁኔታ ያስገቡ" class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="ፈልግ" id="button-search" title="የተያዙ ወንበሮችን ይፈልጉ" />
        </td>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post">

    <table border="1" width="1100px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr height="35px">
            <th>ተ.ቁ</th>
            <th>መለያ ቁጥር</th>
            <th>ስም</th>
            <th>የአባት ስም</th>
            <th>ስልክ ቁጥር</th>
            <th>እድሜ</th>            
            <th>መነሻ ከተማ</th>
            <th>መድረሻ</th>
            <th>ቀን</th>
            <th>ዋጋ</th>
            <th>የትኬት መለያ ቁጥር</th>
            <th>የመኪና መለያ ቁጥር</th>
            <th>ሁኔታ</th>
            <th >ድርጊት</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM reservation WHERE status  like '' '%$key%'");
	else
		 $sql_sel=mysql_query("SELECT * FROM reservation where status = 'በጉዞ ላይ'or status='ተሰርዟል'or status='ደርሷል'");
	
		
       
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
			<td><?php echo $row['id'];?></td>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['telephone'];?></td>
            <td><?php echo $row['age'];?></td>
            <td><?php echo $row['depcity'];?></td>
            <td><?php echo $row['descity'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['transaction_no'];?></td>
            <td><?php echo $row['busid'];?></td>
           <td><?php echo $row['status'];?></td>
            <td><a href="?tag=view_reservationA&opr=del&rs_id=<?php echo $row['id'];?>" title="አጥፋ"><img  width="50" height="27px"  src="picture/delete.png" /></a></td>
            
        </tr>
    <?php	
    }
	
		
	
    ?>
    </table>
</form>
</div> 
</body>
</html>