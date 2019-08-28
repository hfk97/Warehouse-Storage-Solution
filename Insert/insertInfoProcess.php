<style>
		table, th, tr, td {
		border: 1px solid black;
		}
	</style>  
<body>


<?php

$product= $_POST[product]; 
$id= $_POST[id]; 
$prod_date= date("m-d-Y", strtotime($_POST[prod_date]));
$exp_date= date("m-d-Y", strtotime($_POST[exp_date]));
$quantity=$_POST[quantity];
$f_number=$_POST[f_number];
$s_number=$_POST[s_number];
$date=date("m-d-Y");

if($s_number==null or $quantity==null){
echo "ERROR: You forgot to choose Quantity>0 or Storagenumber, start again";

}

else{
$dbconn = pg_connect("host=localhost dbname=h1504978 user=h1504978 password=4225"); 


$query = "select count(id) from stored_in where stored_in.id=$id;";
$result = pg_query($query);
$row = pg_fetch_object($result);

if($row->count==0){



$query2 = "insert into batch values ($product,$id,'$prod_date','$exp_date',$quantity); insert into stored_in values ($id,$product,'$date', $s_number, $f_number);";
$result2 = pg_query($query2);
$row2 = pg_fetch_object($result2);

/*echo "p_number".$product."id".$id."prod".$prod_date."exp".$exp_date."q".$quantity."f".$f_number."s".$s_number;
*/

$query3="select ID,name,description,Quantity,S_number,F_number,exp_date from stored_in natural join batch natural join product where batch.id=$id order by name;";

$result3 = pg_query($query3);
$row3= pg_fetch_object ($result3);


echo "
<h1>Success</h1>
<table>
<tr bgcolor=#2E9AFE>
        <td>BatchID</td>
        <td>Product</td>
        <td>Description</td>
        <td>Quantity</td>
        <td>Storagenumber</td>
        <td>Facilitynumber</td>
        <td>Expirationdate</td>
</tr>";

        echo "<tr> <td>";
        echo $row3 -> id;
        echo "</td>";
        echo "<td>";
        echo $row3 -> name;
        echo "</td>";
        echo "<td>";
        echo $row3 -> description;
        echo "</td>";
        echo "<td>";
        echo $row3 -> quantity;
        echo "</td>";
        echo "<td>";
        echo $row3 -> s_number;
        echo "</td>";
        echo "<td>";
        echo $row3 -> f_number;
        echo "</td>";
        echo "<td>";
        echo $row3 -> exp_date;
        echo "</td>";
        echo "</tr>";

	echo"</table>";
}
else{
	echo"<h1> ERROR: Batch ID is already taken, please select a different one </h1>";
}
}
 
?>
<br>
<br>
<a href=" ../index.html" > Home</a>     <a href=" ./forminsert2.php?/ "> Back</a>     <a href=" ../About.html "> About</a>
