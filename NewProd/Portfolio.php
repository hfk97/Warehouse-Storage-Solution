
<html>

<style>
table, th, tr, td {
border: 1px solid black;
}
</style>
<body>

<h1> Product Portfolio </h1>


<?php
    
    
    $dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123");
    
    
    $query1="select count (p_number) from Product;";
    
    $result1 = pg_query ($query1);
    $row1= pg_fetch_object ($result1);
    
    
    echo "In total ";
    echo $row1-> count;
    echo " Products are in the database";
    echo "<br>";
    

    
    $query = "select p_number,name,description from Product order by p_number;";
    
    $result = pg_query ($query);
    $row= pg_fetch_object ($result);
    
    
    echo"<table>
    <tr bgcolor=#2E9AFE>
    <td>Product ID</td>
    <td>Product</td>
    <td>Description</td>
    </tr>";
    
    while ($row!=null){
        echo "<tr> <td>";
        echo $row -> p_number;
        echo "</td>";
        echo "<td>";
        echo $row -> name;
        echo "</td>";
        echo "<td>";
        echo $row -> description;
        echo "</td>";
        echo "</tr>";
        $row=pg_fetch_object($result);
    }
    
    echo "</table>";
    ?>
<br>
<a href=" ../index.html"> Home</a>     <a href="./index.php"> Back</a> <a href="../About.html"> About</a> 

