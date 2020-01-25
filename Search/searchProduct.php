<?php
$name= $_POST[product];
$id=$_POST[id];


if($name == null and $id==null){
	echo "Error: You have to choose a search parameter";
}



else{
if ($name!=null){
        $dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123");
        $query = "select ID,name,description,Quantity,S_number,F_number from stored_in natural join batch natural join product where product.p_number=batch.p_number and product.name like '%$name%' order by p_number;";

        $result = pg_query($query);
        $row = pg_fetch_object($result);
} 

else{
        $dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123");
        $query = "select ID,name,description,Quantity,S_number,F_number from stored_in natural join batch natural join product where product.p_number=batch.p_number and batch.id=$id order by p_number;";

        $result = pg_query($query);
        $row = pg_fetch_object($result);    
}
$test=$row->id;
if($test==null){
	 echo "There are no results for your enquiry,";
}

else{
echo"<style>
                table, th, tr, td {
                border: 1px solid black;
                }
        </style>";

echo "<h1> Match(es)</h1> ";
echo "<table>
        <tr bgcolor=#2E9AFE>
                <td> Batch </td>
                <td> Productname </td>
                <td> Product description </td>
                <td> Quantity stored </td>
                <td> Storage number </td>
                <td> Facility number </td>
        </tr>";


while ($row!=null){
        echo "
        <tr>
                <td>";
        echo $row -> id;
        echo "</td>";
        echo "  <td>";
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
        echo "</td> </tr>";
        $row=pg_fetch_object($result);
} 
echo "</table>";
}
}


?>
<br>
<br>


<a href=" ../index.html"> Home</a>     <a href="./searchform.html"> Back</a>     <a href=" ../About.html"> About</a>
