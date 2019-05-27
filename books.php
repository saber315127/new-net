<?
if(! mysql_connect("localhost","root","12345678"))
	die("無法連線資料庫");
mysql_query("SET NAMES utft8");
if(! mysql_select_db('ch09'))
	die("無法使用資料庫");
?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body><form name="forml" method="get" action="books.php">
輸入查詢書本編號:
<?
$sql="select * from books";
$result=mysql_query($sql);
?>
<select name="bookno" size="1">
<?
while ($row=mysql_fetch_array($result))
{
	echo "<option value=$row[0]>$row[0] ";
}
?>
</option>
</select>
<br>
<input type="submit" value='查詢'>
<input type= "reset" value='重設'>
</form>
</body>
</html>

<?
if($_GET['bookno'])
{
$bookno=$_GET['bookno'];
$sql="select books.書籍編號, books.書籍名稱, books.價格, employee.姓名 from books inner join employee on books.負責員工編號=employee.員工編號 where books.書籍編號=$bookno";
$result=mysql_query($sql);
}
echo "<br>目前有幾筆資料: ";
echo mysql_num_rows($result);
echo "<br>";
echo "<table height=80 border=10>";
echo "<tr >
	<td>book id</td>
	<td>book News</td>
	<td>money</td>
	<td>emploee name</td>
	</tr>";	
while($row=mysql_fetch_array($result))
{
echo "<tr >
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	</tr>";
}
echo "</table>";
?>
<br>
=======================================================================================================================================
<br>


<body><form name="form1" method="get" action="books.php">
輸入查詢書本名稱:
<input type="text" name="bookname" maxlength="6" size="8"><br>

<input type="submit" value='查詢'>
<input type="reset" value='重設'>
</form>
</body>
</html>

<?
if($_GET['bookname'])
{
$bookname=$_GET['bookname'];
$sql="select books.書籍編號, books.書籍名稱, books.價格, employee.姓名 from books inner join employee on books.負責員工編號=employee.員工編號 where books.書籍名稱 like '%$bookname%'";
$result=mysql_query($sql);
}
echo "<br>目前有幾筆資料: ";
echo mysql_num_rows($result);
echo "<br>";
echo "<table height=80 border=10>";
echo "<tr >
	<td>book id</td>
	<td>book News</td>
	<td>money</td>
	<td>emploee name</td>
	</tr>";	
while($row=mysql_fetch_array($result))
{
echo "<tr >
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	</tr>";
}
echo "</table>";
?>
<br>
=======================================================================================================================================
<br>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body><form name="forml" method="get" action="books.php">
輸入查詢書本編號:
<?
$sql="select * from books";
$result=mysql_query($sql);
?>
<select name="bookno" size="1">
<?
while ($row=mysql_fetch_array($result))
{
	echo "<option value=$row[0]>$row[0] ";
}
?>
</option>
</select>
<br>
<input type="submit" value='刪除'>
<input type="reset" value='重設'>
</form>
</body>
</html>
<?
if($_GET['bookno1'])
{
$bookno1=$_GET['bookno1'];
$sql="delete from books where 書籍編號= $bookno1";
$result=mysql_query($sql);
echo "你已經刪除書本編號 $bookno1";
}
?>
<br>
=======================================================================================================================================
<br>
<?
if($_GET['del'])
{
$bookno1=$_GET['del'];
$sql="delete from books where 書籍編號=$bookno1";
$result=mysql_query($sql);
echo "你已經刪除書本編號 $bookno1";
}
$sql="select books.書籍編號, books.書籍名稱, books.價格, employee.姓名 from books inner join employee on books.負責員工編號=employee.員工編號";
$result=mysql_query($sql);
echo "<br>目前有幾筆資料: ";
echo mysql_num_rows($result);
echo "<br>";
echo "<table height=80 border=10>";
echo "<tr >
	<td>book id</td>
	<td>book News</td>
	<td>money</td>
	<td>emploee name</td>
	<td>Delete?</td>
	</tr>";	
while($row=mysql_fetch_array($result))
{
echo "<tr >
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td><a href=books.php?del=$row[0]>Delete</a></td>
	</tr>";
}
echo "</table>";
?>
