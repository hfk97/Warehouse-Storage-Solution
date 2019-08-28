# Warehouse-Storage Sytstem

<p>Basic storage solution (SQL, php, html)</p>

<p><em><strong>Disclaimer:</strong> I drew up this project to demonstrate my SQL skills, it is not suitable for use as is. There are several security issues, including possible SQL-injection. There might also still be some minor bugs.</em></p>

<p>This simple storage solution is using SQL for data storage, php for handling queries and html for the interface. It is designed as a classic warehouse storage management solution that can work across several locations. Below you can see the ER-Model of the SQL database.</p>

![ER-Model](./ER_Model.png)

<p>A product name is unique, if you want to store two different variations of the same product you have to reflect the types in their name and later best specify in the description (i.e. Wood_logs vs Wood_tiles). Items are stored via their batches, the information needed to store a batch in the database is its id, the product number (choose name from dropdown in interface), the quantity that is going to be stored (has to be >0) and production-/expirationdates (Format dd.mm.yyyy). Last but not least the stored_in relation denotes where the batch is stored - the information for one object in this relation is: product number, batch id, date of storage, storagenumber and storagefacility number.</p>

<p><strong>Demo and Intitialization scripts:</strong> Upon first use you should navigate to "./init/index.html". Here you will find scripts to initialize a sql database and "fill" it with demo data (Batches.csv, Products.csv, Stored.csv) and delete it again.</p>