<html>
<h1> Product Portfolio Management </h1>


<h3> Add Product  </h3>
<form action="newprod.php" method="POST">


Product: <input type="text" name="name">
Product description: <input type="text" name="description">

<input type="submit" value="Add Product">
</form>



<br>
<form action="deleteprod.php" method="POST">
<h3> Delete Product from Portfolio</h3>


Product: <select name="p_number">
<?php
        $dbconn = pg_connect("host=localhost  dbname=name user=user1 password=password123");
    
        $query = "select * from product order by name;";
        $result = pg_query($query);
        $row = pg_fetch_object($result);

        echo "<option>Product  -  Description</option>"; 

        while($row != null) {
        echo "<option value='$row->p_number'> $row->name -  $row->description</option>";
        $row = pg_fetch_object($result);
        }
?>

</select>



<input type="submit" value="Remove">

</form>


<br>
<form action="Portfolio.php" method="POST">
<h3> See Product Portfolio </h3>
<input type="submit" value="Show Portfolio">

</form>



<br>
<a href=" ../index.html"> Home</a>     <a href=" ../About.html"> About </a>


</html>
