<?
if(! mysql_connect("localhost","root","12345678"))
	die("無法連線資料庫");
mysql_query("SET NAMES utft8");
if(! mysql_select_db('ch09'))
	die("無法使用資料庫");
$sql="select * from books";
$result=mysql_query($sql);
echo "how many:";
echo "<br>";
$row=mysql_num_rows($result);
echo "<br>";

echo "<table width=100% border=2 align=center cellpadding=0 cellspacing=0>";
echo "<tr >
	<td>book id</td>
	<td>book News</td>
	<td>money</td>
	<td>emploee id</td>
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
