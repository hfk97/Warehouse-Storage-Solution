<?php

$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123"); 

pg_query("drop table stored_in;");

pg_query("drop table batch;");

pg_query("drop table product;");

pg_query("drop table storageplace;");

pg_query("drop table storage;");

echo "<h1> All tables deleted </h1>";


?>
