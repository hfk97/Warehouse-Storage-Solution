<?php

$dbconn = pg_connect("host=localhost dbname=name user=user1 password=password123"); 


$query = "create table Product (p_number int, Name varchar(30) unique, Description
varchar(80), primary key(p_number));";
$result = pg_query($query);


$query1 = "create table Storage (F_number int, Name varchar(30), Adress varchar(80),
primary key(F_number));";
$result1 = pg_query($query1);
$row1 = pg_fetch_object($result1);

$query2 = "create table Storageplace (F_number int, S_number int, primary
key(F_number, S_number), foreign key (F_number) references Storage);";
$result2 = pg_query($query2);
$row2 = pg_fetch_object($result2);

$query3 = "create table Batch (p_number int, ID int, Prod_date Date not null,
Exp_date Date not null, Quantity int check (quantity>0), primary
key(p_number, ID), foreign key (p_number) references Product);";
$result3 = pg_query($query3);
$row3 = pg_fetch_object($result3);

$query4 = "create table stored_in (ID int, p_number int, date date, S_number int,
F_number int, foreign key (ID,p_number) references Batch(ID,p_number),
foreign key (S_number,F_number) references
storageplace(S_number,F_number), primary key (ID, p_number, Date,
F_number, S_number));";
$result4 = pg_query($query4);
$row4 = pg_fetch_object($result4);

echo "<h1> Created </h1>";

?>
