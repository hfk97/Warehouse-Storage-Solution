<?php

$p_number= $_POST[p_number]; 
$description= $_POST[description];


if($p_number=='Product - Description'){
echo "<h1> ERROR: You forgot to choose the product that is to be removed </h1>";

}




else{



$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123");

$query="select count(p_number) from product natural join batch where product.p_number=batch.p_number and description like '$description';";
$result=pg_query($query);
$row=pg_fetch_object($result);
$count=$row->count;
if ($count>0){
echo "<h1> ERROR: Products can only be deleted if there is no Batch containing them anymore</h1>";
}


else{

$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123"); 

$query0="delete from product where p_number=$p_number;";
$result0=pg_query($query0);
$row0=pg_fetch_object($result0);


echo "<h1> Product deleted from Portfolio </h1>";
}

}
 
?>
<br>
<br>
<a href=" ../index.html" > Home</a>     <a href=" ./index.php "> Back</a>     <a href=" ../About.html "> About</a>
