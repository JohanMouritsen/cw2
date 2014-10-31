<?php 

$search=$_POST['search']; 
//connect  to the database 
$db=mysql_connect  ("eu-cdbr-azure-west-b.cloudapp.net", "b0f27f5ecf18c9",  "d3b9c22a") or die ('I cannot connect to the database  because: ' . mysql_error()); 
//-select  the database to use 
$mydb=mysql_select_db("myWebJoABWSQBed1"); 
//-query  the database table 
$sql="SELECT * FROM registration_tbl 
		WHERE name LIKE '%$search%' 
		OR email LIKE '%$search%' 
		OR company LIKE '%$search%'
		OR date LIKE '%$search%' 
		ORDER by name ASC";
//-run  the query against the mysql query function 
$result=mysql_query($sql, $db);
$number=mysql_num_rows($result);
$pageTitle="Search Results";
 

//-create  while loop and loop through result set 
while($row=mysql_fetch_array($result)){ 
        $name  =$row['name']; 
        $email =$row['email']; 
        $company =$row['company']; 
        $date =$row['date']; 
//-display the result of the array 
print " <tr>
<td><strong> $name $email $company $date </strong><br /></td>";
}

?> 