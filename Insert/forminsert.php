
<html>
<body>
<h1>Insert Information</h1>


<form action="forminsert2.php" method="POST"> 
<table>

<tr>
<td>
Product: 

</td>
<td>
<select name="product">

<?php
	$dbconn = pg_connect("host=localhost  dbname=name user=user1 password=password123");
	$query = "select name,p_number from product order by name;";
	$result = pg_query($query);

	$row = pg_fetch_object($result);

	echo "<option>(select)</option>"; 
	while($row!=null) {
	echo "<option value='$row->p_number'>$row->name</option>"; 
	$row = pg_fetch_object($result);
	}
	pg_free_result($result);
?>

</select>
</td>
</tr>


<tr>
<td>
Batch ID: 
</td>
<td>
<input type="number" name="id">
</td>
</tr>


<tr>
<td>
Production Date: 
</td>
<td>
<input type="date" name="prod_date">
</td>
</tr>


<tr>
<td>
Expiration Date: 
</td>
<td>
<input type="date" name="exp_date">
</td>
</tr>



<tr>
<td>
Quantity: 
</td>
<td>
<input type="number" name="quantity">
</td>
</tr>



<tr>
<td>
Facility:
</td>
<td>
<select name="f_number">

<?php
	$dbconn = pg_connect("host=localhost  dbname=name user=user1 password=password123");
	$query2 = "select name,f_number from Storage;";
	$result2 = pg_query($query2);

	$row2 = pg_fetch_object($result2);

	echo "<option>(select)</option>"; 
	while($row2!=null) {
	echo "<option value='$row2->f_number'>$row2->name</option>"; 
	$row2 = pg_fetch_object($result2);
	}
	pg_free_result($result2);
	pg_close($dbconn);
?>
</select>
</td>
</tr>



</table>

<input type="submit" value="choose storage place"> 



<br>
<br>
<a href=" ./index.html"> Home</a>     <a href=" ./About.html"> About </a>

</form>
</body>
</html>
