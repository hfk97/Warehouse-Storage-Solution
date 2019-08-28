<?php


$dbconn = pg_connect("host=localhost dbname=h1504978 user=h1504978 password=4225"); 

/*
pg_query("insert into storage values(001,'Facility number one','Warrington WA1 4RW,
Vereinigtes Königreich');
insert into storage values(002,'Facility number two', 'Altenwerder
Hauptstraße 1, 21129 Hamburg, Deutschland');");


$f_number=1;
$s_number=1;


while ($s_number!=100){
        pg_query("insert into storageplace values ($f_number,$s_number);");
        $s_number+=1;

}


$f_number=2;
$s_number=1;

while ($s_number!=100){
        pg_query("insert into storageplace values ($f_number,$s_number);");
        $s_number+=1;

}


pg_query("insert into product values(1,'Quarzsand','Siliciumdioxid ca. 12nm');
insert into product values(2,'Lanolin','Brown creme');
insert into product values(3,'Aspirin','Acetylsalicylic acid, powder');

insert into batch values(1,1802301,'2-12-2018','2-11-2028',13);
insert into batch values(2,1605244,'5-20-2016','5-19-2021',9);
insert into batch values(3,1507654,'7-14-2013','7-13-2018',10);

insert into stored_in values (1802301,1,'1-4-2018',1,2);
insert into stored_in values (1605244,2,'12-1-2017',2,2);
insert into stored_in values (1507654,3,'3-14-2018',3,2);");


*/

pg_query("copy product from './Products.csv' with delimiter ',';");

pg_query("copy batch from './Batches.csv' with delimiter ',';");

pg_query("copy stored_in from './Stored.csv' with delimiter ',';");

echo "<h1> Filled  </h1>";

?>
