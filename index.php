
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>AutoAPI Guard - Automated API Security Scanner</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>

<?php

include "DB_connect/db.php";

$reviews = mysqli_query($conn,"SELECT * FROM reviews ORDER BY review_date DESC");

?>



body{
font-family:Segoe UI;
background:#0f172a;
color:white;
transition:0.4s;
}

/* Light Mode */

body.light{
background:#f1f5f9;
color:#111;
}

/* Navbar */

.navbar{
background:#020617;
}

body.light .navbar{
background:#ffffff;
}

body.light .navbar .nav-link{
color:#111 !important;
}

body.light .navbar-brand{
color:#111 !important;
}

body.light .navbar .btn{
color:#111;
border-color:#111;
}

/* Hero */

.hero{
padding:120px 0;
text-align:center;
}

.hero h1{
font-size:52px;
font-weight:700;
background:linear-gradient(90deg,#3b82f6,#22c55e);
-webkit-background-clip:text;
color:transparent;
}

.hero p{
max-width:700px;
margin:auto;
color:#cbd5f5;
}

/* Scan Box */

.scan-box{
margin-top:40px;
padding:30px;
background:#1e293b;
border-radius:12px;
}

body.light .scan-box{
background:white;
}

/* Features */

.features{
padding:90px 0;
}

.feature-card{
padding:25px;
background:#1e293b;
border-radius:12px;
transition:0.3s;
}

body.light .feature-card{
background:white;
}

.feature-card:hover{
transform:translateY(-8px);
}

.feature-icon{
font-size:35px;
color:#3b82f6;
margin-bottom:10px;
}

/* Stats */

.stats{
padding:80px 0;
text-align:center;
}

.stat-number{
font-size:40px;
font-weight:700;
color:#3b82f6;
}

/* Footer */

footer{
padding:30px;
background:#020617;
text-align:center;
margin-top:40px;
}

body.light footer{
background:#e2e8f0;
}

.lang-select{
width:130px;
}


.circle{
width:160px;
height:160px;
border-radius:50%;
background:conic-gradient(#3b82f6 0deg,#1e293b 0deg);
display:flex;
align-items:center;
justify-content:center;
margin:auto;
position:relative;
}

.circle-inner{
width:120px;
height:120px;
border-radius:50%;
background:#020617;
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
}

.live-center{
width:160px;
height:160px;
border-radius:50%;
border:3px solid #22c55e;
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
animation:pulse 2s infinite;
}

@keyframes pulse{

0%{
box-shadow:0 0 0 0 rgba(34,197,94,0.7);
}

70%{
box-shadow:0 0 0 20px rgba(34,197,94,0);
}

100%{
box-shadow:0 0 0 0 rgba(34,197,94,0);
}

}



.review-btn{

background:linear-gradient(90deg,#3b82f6,#22c55e);
color:white;
padding:14px 30px;
border-radius:30px;
font-weight:600;
text-decoration:none;
transition:0.3s;

}

.review-btn:hover{

transform:scale(1.05);
box-shadow:0 5px 20px rgba(0,0,0,0.3);

}




</style>

</head>

<script>

function loadStats(){

fetch("stats.php")
.then(res=>res.json())
.then(data=>{

document.getElementById("apiCount").innerText=data.apis;

document.getElementById("threatCount").innerText=data.threats;

document.getElementById("accuracy").innerText=data.accuracy+"%";

updateCircle("circleApis",data.apis,100);

updateCircle("circleThreats",data.threats,100);

updateCircle("circleAccuracy",data.accuracy,100);

});

}

setInterval(loadStats,3000);

loadStats();


</script>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">

<a class="navbar-brand fw-bold">🛡 Synthia Flux</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a href="index.php" class="nav-link" id="navHome">Home</a>
</li>

<li class="nav-item">
<a href="submenue/about.php" class="nav-link" id="navFeatures">About Us</a>
</li>

<li class="nav-item">
<a href="admin/admin.php" class="nav-link" id="navAdmin">Admin</a>
</li>

</ul>

<select id="language" class="form-select ms-3 lang-select">
<option value="en">English</option>
<option value="hi">Hindi</option>
<option value="mr">Marathi</option>
</select>

<button class="btn btn-outline-light ms-3" onclick="toggleMode()">
<i id="modeIcon" class="fa-solid fa-moon"></i>
</button>

</div>

</div>

</nav>


<!-- HERO -->

<section class="hero">

<div class="container">

<h1 id="title" data-aos="fade-up">
Automated API Security Scanner
</h1>

<p id="subtitle" data-aos="fade-up" data-aos-delay="200">
Scan APIs for vulnerabilities such as authentication flaws and sensitive data exposure.
</p>

<div class="scan-box" data-aos="zoom-in">

<h5 id="scanText">Scan API Endpoint</h5>


<form action="submenue/scan.php" method="POST">

<div class="input-group">

<input type="text"
name="api_url"
class="form-control"
placeholder="Enter API URL"
required>

<button class="btn btn-primary" id="scanBtn">
Scan API
</button>

</div>

</form>

</div>

</form>

</div>

</div>

</section>


<!-- STATS -->


<!-- Real Time Stats Section -->

<section class="stats py-5">

<div class="container text-center">

<h2 class="mb-5">Security Monitoring Dashboard</h2>

<div class="row justify-content-center align-items-center">




<!-- Center LIVE -->

<div class="col-md-3">

<div class="live-center">

<h2 class="text-success">LIVE</h2>
<p>Monitoring</p>

</div>

</div>
<!-- APIs Scanned -->

<div class="col-md-3">

<div class="circle" id="circleApis">

<div class="circle-inner">

<h3 id="apiCount">0</h3>
<p>APIs Scanned</p>

</div>

</div>

</div>

<!-- Threats Detected -->

<div class="col-md-3">

<div class="circle" id="circleThreats">

<div class="circle-inner">

<h3 id="threatCount">0</h3>
<p>Threats Detected</p>

</div>

</div>

</div>


<!-- Detection Accuracy -->

<div class="col-md-3">

<div class="circle" id="circleAccuracy">

<div class="circle-inner">

<h3 id="accuracy">0%</h3>
<p>Detection Accuracy</p>

</div>

</div>

</div>

</div>

</div>

</section>



<!-- Recent Security Activity -->

<section class="activity-section">

<div class="container">

<h4 class="mb-3">Recent Security Activity</h4>

<div id="activity" class="p-3 rounded" style="background:#1e293b;"></div>

</div>

</section>




<!-- FEATURES -->

<section class="features">

<div class="container">

<h2 class="text-center mb-5" id="featureHeading">Core Features</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="feature-card">

<div class="feature-icon">
<i class="fa-solid fa-bug"></i>
</div>

<h5 id="f1title">API Vulnerability Scanner</h5>

<p id="f1desc">Detect authentication issues and exposed endpoints.</p>

</div>

</div>


<div class="col-md-4">

<div class="feature-card">

<div class="feature-icon">
<i class="fa-solid fa-shield-halved"></i>
</div>

<h5 id="f2title">Security Header Analysis</h5>

<p id="f2desc">Analyze HTTP headers for security best practices.</p>

</div>

</div>


<div class="col-md-4">

<div class="feature-card">

<div class="feature-icon">
<i class="fa-solid fa-robot"></i>
</div>

<h5 id="f3title">AI Fix Suggestions</h5>

<p id="f3desc">Get intelligent recommendations for fixing vulnerabilities.</p>

</div>

</div>

</div>

</div>


<div class="text-center mt-5">

<a href="submenue/review.php" class="review-btn">

💬 Share Your Review

</a>

</div>




<section class="container mt-5">

<h3 class="mb-4">User Reviews</h3>

<div class="row">

<?php while($row = mysqli_fetch_assoc($reviews)){ ?>

<div class="col-md-4">

<div class="card p-3 mb-3">

<h5><?php echo $row['name']; ?></h5>

<p><?php echo $row['review']; ?></p>

<p>

<?php

for($i=1;$i<=$row['rating'];$i++){
echo "⭐";
}

?>

</p>

<small><?php echo $row['review_date']; ?></small>

</div>

</div>

<?php } ?>

</div>

</section>


</section>


<!-- Footer -->

<footer>

<p id="footerText">© 2026 AutoAPI Guard | Cyber Security API Scanner</p>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

AOS.init();

/* Dark Light Mode */

function toggleMode(){

document.body.classList.toggle("light");

let icon=document.getElementById("modeIcon");

if(document.body.classList.contains("light")){
icon.classList.remove("fa-moon");
icon.classList.add("fa-sun");
}else{
icon.classList.remove("fa-sun");
icon.classList.add("fa-moon");
}

}

/* Language Translator */

const translations = {

en:{
navHome:"Home",
navFeatures:"Features",
navAdmin:"Admin",
title:"Automated API Security Scanner",
subtitle:"Scan APIs for vulnerabilities such as authentication flaws and sensitive data exposure.",
scanText:"Scan API Endpoint",
scanBtn:"Scan API",
featureHeading:"Core Features",
f1title:"API Vulnerability Scanner",
f1desc:"Detect authentication issues and exposed endpoints.",
f2title:"Security Header Analysis",
f2desc:"Analyze HTTP headers for security best practices.",
f3title:"AI Fix Suggestions",
f3desc:"Get intelligent recommendations for fixing vulnerabilities.",
stat1:"APIs Scanned",
stat2:"Threats Detected",
stat3:"Detection Accuracy",
stat4:"Security Monitoring",
footerText:"© 2026 AutoAPI Guard | Cyber Security API Scanner"
},

hi:{
navHome:"होम",
navFeatures:"विशेषताएँ",
navAdmin:"एडमिन",
title:"स्वचालित API सुरक्षा स्कैनर",
subtitle:"API में सुरक्षा कमजोरियों का पता लगाएं",
scanText:"API स्कैन करें",
scanBtn:"स्कैन करें",
featureHeading:"मुख्य विशेषताएँ",
f1title:"API भेद्यता स्कैनर",
f1desc:"प्रमाणीकरण समस्याओं का पता लगाएं",
f2title:"सुरक्षा हेडर जाँच",
f2desc:"HTTP हेडर का विश्लेषण करें",
f3title:"AI सुधार सुझाव",
f3desc:"कमजोरियों को ठीक करने के सुझाव",
stat1:"स्कैन किए गए API",
stat2:"पता लगाए गए खतरे",
stat3:"डिटेक्शन सटीकता",
stat4:"सुरक्षा निगरानी",
footerText:"© 2026 AutoAPI Guard | साइबर सुरक्षा API स्कैनर"
},

mr:{
navHome:"मुख्यपृष्ठ",
navFeatures:"वैशिष्ट्ये",
navAdmin:"अॅडमिन",
title:"स्वयंचलित API सुरक्षा स्कॅनर",
subtitle:"API मधील सुरक्षा त्रुटी शोधा",
scanText:"API स्कॅन करा",
scanBtn:"स्कॅन करा",
featureHeading:"मुख्य वैशिष्ट्ये",
f1title:"API असुरक्षा स्कॅनर",
f1desc:"प्रमाणीकरण समस्या शोधा",
f2title:"सुरक्षा हेडर तपासणी",
f2desc:"HTTP हेडर तपासा",
f3title:"AI दुरुस्ती सूचना",
f3desc:"त्रुटी दुरुस्त करण्यासाठी सूचना",
stat1:"स्कॅन केलेले API",
stat2:"आढळलेले धोके",
stat3:"अचूकता",
stat4:"सुरक्षा निरीक्षण",
footerText:"© 2026 AutoAPI Guard | सायबर सुरक्षा API स्कॅनर"
}

};

document.getElementById("language").addEventListener("change",function(){

let lang = this.value;

for(let key in translations[lang]){

if(document.getElementById(key)){
document.getElementById(key).innerText = translations[lang][key];
}

}

});


document.getElementById("language").addEventListener("change",function(){

let lang=this.value;

for(let key in translations[lang]){

if(document.getElementById(key)){
document.getElementById(key).innerText=translations[lang][key];
}

}

});


function updateCircle(id,value,max){

let circle=document.getElementById(id);

let percent=(value/max)*360;

circle.style.background="conic-gradient(#3b82f6 "+percent+"deg,#1e293b 0deg)";

}



</script>

</body>
</html>
