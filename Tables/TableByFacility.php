
<html>

<style>
                table, th, tr, td {
                border: 1px solid black;
                }
        </style>
<body>

<h1> Product Information by Facility</h1>


<?php
echo"<table>
<tr bgcolor=#2E9AFE>
        <td>Facilitynumber</td>
        <td>Storagenumber</td>
        <td>Product</td>
        <td>BatchID</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Expirationdate</td>
</tr>";

$dbconn = pg_connect("host=localhost dbname=h1504978 user=h1504978 password=4225");

$query = "select ID,name,description,Quantity,S_number,F_number,exp_date from stored_in natural join batch natural join product order by f_number,s_number;";
$result = pg_query ($query);

$row= pg_fetch_object ($result);
while ($row!=null){
        echo "<tr> <td>";
        echo $row -> f_number;
        echo "</td>";
        echo "<td>";
        echo $row -> s_number;
        echo "</td>";
        echo "<td>";
        echo $row -> name;
        echo "</td>";
        echo "<td>";
        echo $row -> id;
        echo "</td>";
        echo "<td>";
        echo $row -> description;
        echo "</td>";
        echo "<td>";
        echo $row -> quantity;
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


