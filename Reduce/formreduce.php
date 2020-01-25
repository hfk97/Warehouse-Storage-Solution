<html>
<form action="reducequantity.php" method="POST">
<h1> Reduce stored quantity: </h1>
Product: <select name="id">
	<?php
        $dbconn = pg_connect("host=localhost  dbname=name user=user1 password=password123");
    
        $query = "select id,name,quantity from batch,product where product.p_number=batch.p_number order by name;";
        $result = pg_query($query);
        $row = pg_fetch_object($result);

        echo "<option>Batch  -  Product  -  Quantity</option>"; 

        while($row != null) {
        echo "<option value='$row->id'>".$row->id." - ".$row->name." - ".$row->quantity."</option>";
        $row = pg_fetch_object($result);
        }
?>

</select>



Reduce Quantity by: <input type=number name="reduce">

<input type="submit" value="Confirm">

<br>
<br>
<a href="../index.html"> Home</a>     <a href=" ../About.html"> About </a>


</html>
