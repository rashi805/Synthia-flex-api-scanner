
<?php
include "DB_connect/db.php";

$apiCount = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM scan_results"))[0];

$threatCount = mysqli_fetch_row(mysqli_query($conn,"SELECT SUM(vulnerabilities) FROM scan_results"))[0];

$avgRisk = mysqli_fetch_row(mysqli_query($conn,"SELECT AVG(risk_score) FROM scan_results"))[0];

$accuracy = 100 - round($avgRisk);

$data = [

"apis"=>$apiCount,
"threats"=>$threatCount,
"accuracy"=>$accuracy

];

echo json_encode($data);

?>

