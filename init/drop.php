<?php

$dbconn = pg_connect("host=localhost dbname=h1504978 user=h1504978 password=4225"); 

pg_query("drop table stored_in;");

pg_query("drop table batch;");

pg_query("drop table product;");

pg_query("drop table storageplace;");

pg_query("drop table storage;");

echo "<h1> All tables deleted </h1>";


?>
