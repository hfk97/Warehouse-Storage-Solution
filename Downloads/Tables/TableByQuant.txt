
<html>

<style>
                table, th, tr, td {
                border: 1px solid black;
                }
        </style>
<body>

<h1> Products by stored quantity and facility</h1>


<?php
echo"<table>
<tr bgcolor=#2E9AFE>
        <td>Quantity</td>
        <td>Product</td>
        <td>Facilitynumber</td>
        <td>Description</td>
        <td>Earliest expirationdate of a batch</td>

</tr>";

$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123");

$query = "select name,F_number,sum(quantity),min(exp_date),description from stored_in natural join batch natural join product group by name,f_number,description order by sum(quantity);";
$result = pg_query ($query);

$row= pg_fetch_object ($result);

while ($row!=null){
        echo "<tr>";
        echo "<td>";
        echo $row -> sum;
        echo "</td>";
        echo "<td>";
        echo $row -> name;
        echo "</td>";
        echo "<td>";
        echo $row -> f_number;
        echo "</td>";
        echo "<td>";
        echo $row -> description;
        echo "</td>";
        echo "<td>";
        echo $row -> min;
        echo "</td>";
        echo "</tr>";
        $row=pg_fetch_object($result);
}

echo "</table>";
?>
<br>

<a href=" ../index.html"> Home</a>     <a href="./?"> Back</a>     <a href=" ../About.html"> About</a>

