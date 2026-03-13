
<?php

include "../DB_connect/db.php";

/* SAVE REVIEW */

if(isset($_POST['submit_review'])){

$name=$_POST['name'];
$review=$_POST['review'];
$rating=$_POST['rating'];

$query="INSERT INTO reviews(name,review,rating) VALUES('$name','$review','$rating')";

mysqli_query($conn,$query);

$msg="Review submitted successfully!";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Submit Review</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#0f172a;
color:white;
font-family:Segoe UI;
transition:0.4s;
}

body.light{
background:#f1f5f9;
color:#111;
}

/* navbar */

.navbar{
background:#020617;
}

body.light .navbar{
background:white;
}

body.light .nav-link{
color:#111 !important;
}

/* card */

.review-card{
background:#1e293b;
padding:30px;
border-radius:10px;
max-width:500px;
margin:auto;
margin-top:80px;
}

body.light .review-card{
background:white;
}

</style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">

<a class="navbar-brand fw-bold">🛡 Synthia Flux</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="../index.php" id="navHome">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="about.php" id="navAbout">About</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="review.php" id="navReview">Review</a>
</li>

</ul>

<select id="language" class="form-select ms-3" style="width:130px">

<option value="en">English</option>
<option value="hi">Hindi</option>
<option value="mr">Marathi</option>

</select>

<button class="btn btn-outline-light ms-3" onclick="toggleMode()">
<span id="modeIcon">🌙</span>
</button>

</div>

</div>

</nav>


<!-- REVIEW FORM -->

<div class="container">

<div class="review-card">

<h3 id="reviewTitle">Leave a Review</h3>

<?php if(isset($msg)){ ?>

<div class="alert alert-success"><?php echo $msg; ?></div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label id="nameLabel">Your Name</label>

<input type="text" name="name" class="form-control" required>

</div>


<div class="mb-3">

<label id="reviewLabel">Your Review</label>

<textarea name="review" class="form-control" rows="4" required></textarea>

</div>


<div class="mb-3">

<label id="ratingLabel">Rating</label>

<select name="rating" class="form-control">

<option value="5">⭐⭐⭐⭐⭐</option>
<option value="4">⭐⭐⭐⭐</option>
<option value="3">⭐⭐⭐</option>
<option value="2">⭐⭐</option>
<option value="1">⭐</option>

</select>

</div>


<button class="btn btn-primary w-100" name="submit_review" id="submitBtn">
Submit Review
</button>

</form>

</div>

</div>


<script>

/* DARK MODE */

function toggleMode(){

document.body.classList.toggle("light");

let icon=document.getElementById("modeIcon");

if(document.body.classList.contains("light")){
icon.innerHTML="☀";
}else{
icon.innerHTML="🌙";
}

}


/* TRANSLATION */

const translations={

en:{ reviewTitle:"Leave a Review", nameLabel:"Your Name", reviewLabel:"Your Review", ratingLabel:"Rating", submitBtn:"Submit Review", navHome:"Home", navAbout:"About", navReview:"Review" },

hi:{
reviewTitle:"अपनी समीक्षा लिखें",
nameLabel:"आपका नाम",
reviewLabel:"आपकी समीक्षा",
ratingLabel:"रेटिंग",
submitBtn:"समीक्षा भेजें",
navHome:"होम",
navAbout:"अबाउट",
navReview:"रिव्यू"
},

mr:{
reviewTitle:"तुमचा अभिप्राय द्या",
nameLabel:"तुमचे नाव",
reviewLabel:"तुमचा अभिप्राय",
ratingLabel:"रेटिंग",
submitBtn:"अभिप्राय सबमिट करा",
navHome:"होम",
navAbout:"अबाउट",
navReview:"रिव्यू"
}

};

document.getElementById("language").addEventListener("change",function(){

let lang=this.value;

if(!translations[lang]) return;

for(let key in translations[lang]){

let el=document.getElementById(key);

if(el){
el.innerText=translations[lang][key];
}

}

});

</script>

</body>
</html>
