<style>
		table, th, tr, td {
		border: 1px solid black;
		}
	</style>  
<body>


<?php

$name= $_POST[name]; 
$description= $_POST[description];


if($name==null or $description==null){
echo "<h1> ERROR: You forgot to insert product name or description </h1>";

}

else{

$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123");

$query="select count(name) from product where name like '$name';";
$result=pg_query($query);
$row=pg_fetch_object($result);
$count=$row->count;
	if ($count>0){
echo "<h1> ERROR: A product named like this is already in the portfolio </h1>";
echo "Tipp: if you want to add the same product but with a different description, add some tag to the end Produktname-tag";
}


else{
$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123"); 

$query0="select max(p_number) from product;";
$result0=pg_query($query0);
$row0=pg_fetch_object($result0);

$prodnumb=$row0->max+1;

$query = "insert into product values('$prodnumb','$name','$description');";
$result = pg_query($query);
$row = pg_fetch_object($result);

echo "<h1> Success </h1>";
}
}
 
?>
<br>
<br>
<a href=" ../index.html" > Home</a>     <a href=" ./index.php "> Back</a>     <a href=" ../About.html "> About</a>
