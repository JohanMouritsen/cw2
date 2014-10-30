<?php
//database connection infor
///include index.php;
$search=$_POST[search];

//SQL statement to select what to search
$sql="SELECT * FROM registration_tbl
WHERE name like '%$search%' OR
email like '%$search%' OR
company like '%$search%' OR
date like '%$search%' 
ORDER BY name ASC";

//run sql statement 
$result=mysql_query($sql,$db) or die(mysql_error());

//find out how many matches
$number=mysql_num_rows($result);
$pageTitle="Search Results";
print <<<HERE
<h2>Search Results</h2>
<h3>$number results found searching for "$search"</h3>

<table cellpadding="15">
HERE;

//loop through results and get variables
while ($row=mysql_fetch_array($result)){
$name=$row["name"];
$email=$row["email"];
$company=$row["company"];
$date=$row["date"];

print "<tr>
<td><strong>$name</strong><br />
<td><strong>$email</strong><br />
<td><strong>$company</strong><br />
<td><strong>$date</strong><br />";
}
print "</tr></table></body></html>";

?>