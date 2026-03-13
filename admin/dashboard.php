
<?php

session_start();
include "../DB_connect/db.php";

if(!isset($_SESSION['admin'])){
header("Location: admin.php");
exit();
}

/* FETCH DATA */

$review_count=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM reviews"));
$scan_count=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM scan_results"));

$reviews=mysqli_query($conn,"SELECT * FROM reviews ORDER BY review_date DESC");
$scans=mysqli_query($conn,"SELECT * FROM scan_results ORDER BY scan_date DESC");

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#0f172a;
color:white;
font-family:Segoe UI;
}

.sidebar{
width:200px;
height:100vh;
background:#020617;
position:fixed;
padding:20px;
}

.sidebar a{
display:block;
color:white;
padding:10px;
text-decoration:none;
}

.sidebar a:hover{
background:#1e293b;
}

.content{
margin-left:220px;
padding:30px;
}

.card-box{
background:#1e293b;
padding:20px;
border-radius:10px;
margin-bottom:20px;
}

</style>

</head>

<body>

<div class="sidebar">

<h4>Synthia Flux</h4>

<a href="#">Dashboard</a>
<a href="#reviews">Reviews</a>
<a href="#scans">API Scans</a>
<a href="logout.php">Logout</a>

</div>


<div class="content">

<h2>Admin Dashboard</h2>

<div class="row">

<div class="col-md-4">

<div class="card-box">

<h4>Total Reviews</h4>

<h2><?php echo $review_count['total']; ?></h2>

</div>

</div>


<div class="col-md-4">

<div class="card-box">

<h4>Total API Scans</h4>

<h2><?php echo $scan_count['total']; ?></h2>

</div>

</div>

</div>


<!-- REVIEWS -->

<h3 id="reviews" class="mt-5">User Reviews</h3>

<table class="table table-dark table-striped">

<tr>

<th>Name</th>
<th>Review</th>
<th>Rating</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($reviews)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['review']; ?></td>

<td><?php echo $row['rating']; ?> ⭐</td>

<td><?php echo $row['review_date']; ?></td>

</tr>

<?php } ?>

</table>


<!-- API SCANS -->

<h3 id="scans" class="mt-5">API Scan Results</h3>

<table class="table table-dark table-striped">

<tr>

<th>API URL</th>
<th>Risk Score</th>
<th>Vulnerabilities</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($scans)){ ?>

<tr>

<td><?php echo $row['api_url']; ?></td>

<td><?php echo $row['risk_score']; ?></td>

<td><?php echo $row['vulnerabilities']; ?></td>

<td><?php echo $row['scan_date']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
