<html>
<head>
</head>
<body>
<table border="1">
<tr>
<td>Name</td>
<td>Price</td>
<td>Description</td>
</tr>
<?php
$dbname = 'garava2';
$login ='root';
$password = 'root';
$location = 'localhost';
mysql_connect($location, $login, $password);
mysql_select_db($dbname);
$answer=mysql_query("SELECT * FROM products;");


while ($result = mysql_fetch_object($answer))
{

echo "<tr>";
echo "<td>";
print $result->name;
echo "</td>";
echo "<td>";
print $result->price;
echo "</td>";
echo "<td>";
print $result->description;
echo "</td>";
echo "</tr>";
$result = mysql_fetch_array($answer);
}
mysql_close();

?>
</table>
</body>
</html>