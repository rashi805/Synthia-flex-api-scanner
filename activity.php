
<?php

include "DB_connect/db.php";

$result = mysqli_query($conn,"SELECT api_url,vulnerabilities FROM scan_results ORDER BY scan_date DESC LIMIT 5");

while($row=mysqli_fetch_assoc($result)){

if($row['vulnerabilities']>0){

echo "<div style='color:red'>⚠ ".$row['api_url']." vulnerable</div>";

}else{

echo "<div style='color:lime'>✔ ".$row['api_url']." secure</div>";

}

}

?>

