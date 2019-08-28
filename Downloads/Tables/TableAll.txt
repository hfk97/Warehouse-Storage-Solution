
<html>

<style>
                table, th, tr, td {
                border: 1px solid black;
                }
        </style>
<body>

<h1> Storage Item Information by Product </h1>


<?php


$dbconn = pg_connect("host=localhost dbname=h1504978 user=h1504978 password=4225");


$query1="select count(ID) from Batch;";

$result1 = pg_query ($query1);
$row1= pg_fetch_object ($result1);


echo "In total ";
echo $row1-> count;
echo " Items are stored";
echo "<br>";

$query = "select ID,name,description,Quantity,S_number,F_number,exp_date from stored_in natural join batch natural join product order by name;";

$result = pg_query ($query);
$row= pg_fetch_object ($result);


echo"<table>
<tr bgcolor=#2E9AFE>
        <td>BatchID</td>
        <td>Product</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Storagenumber</td>
        <td>Facilitynumber</td>
        <td>Expirationdate</td>
</tr>";

while ($row!=null){
        echo "<tr> <td>";
        echo $row -> id;
        echo "</td>";
        echo "<td>";
        echo $row -> name;
        echo "</td>";
        echo "<td>";
        echo $row -> description;
        echo "</td>";
        echo "<td>";
        echo $row -> quantity;
        echo "</td>";
        echo "<td>";
        echo $row -> s_number;
        echo "</td>";
        echo "<td>";
        echo $row -> f_number;
        echo "</td>";
        echo "<td>";
        echo $row -> exp_date;
        echo "</td>";
        echo "</tr>";
        $row=pg_fetch_object($result);
}

echo "</table>";
?>
<br>
<a href=" ../index.html"> Home</a>     <a href="./?"> Back</a>     <a href=" ../About.html"> About</a>


