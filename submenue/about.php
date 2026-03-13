
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>About - Synthia Flux</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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

/* NAVBAR */

.navbar{
background:#020617;
}

body.light .navbar{
background:white;
}

body.light .navbar .nav-link{
color:#111 !important;
}

/* HERO */

.hero{
text-align:center;
padding:90px 20px;
background:linear-gradient(135deg,#1e3a8a,#020617);
}

.hero h1{
font-size:50px;
font-weight:700;
background:linear-gradient(90deg,#3b82f6,#22c55e);
-webkit-background-clip:text;
color:transparent;
}

/* CARDS */

.card-box{
background:#1e293b;
padding:25px;
border-radius:12px;
margin-bottom:20px;
transition:0.3s;
}

.card-box:hover{
transform:translateY(-6px);
box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

body.light .card-box{
background:white;
}

.icon{
font-size:32px;
margin-bottom:10px;
color:#3b82f6;
}

/* STEPS */

.step{
background:#1e293b;
padding:20px;
border-radius:10px;
text-align:center;
transition:0.3s;
}

.step:hover{
transform:scale(1.05);
}

body.light .step{
background:white;
}

/* RISK BADGES */

.low{background:#22c55e}
.medium{background:#f59e0b}
.high{background:#ef4444}

.badge{
font-size:15px;
padding:8px 14px;
margin-right:8px;
}

/* FOOTER */

footer{
text-align:center;
padding:30px;
margin-top:40px;
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
<a class="nav-link active" href="about.php" id="navAbout">About</a>
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


<!-- HERO -->

<section class="hero">

<div class="container">

<h1 id="title" data-aos="fade-up">About Synthia Flux</h1>

<p id="subtitle" data-aos="fade-up" data-aos-delay="200">

AI-powered platform that scans APIs, detects vulnerabilities and provides real-time security intelligence.

</p>

</div>

</section>


<!-- PROBLEM -->

<div class="container py-5">

<div class="card-box" data-aos="fade-up">

<h3 id="problemTitle">🚨 Problem We Solve</h3>

<p id="problemText">

Modern applications rely heavily on APIs but many APIs are deployed without proper security testing.
This exposes systems to vulnerabilities like broken authentication, sensitive data exposure and insecure configurations.

</p>

</div>

</div>


<!-- HOW IT WORKS -->

<div class="container py-5">

<h3 class="text-center mb-4" id="workTitle" data-aos="fade-up">⚙ How It Works</h3>

<div class="row g-4">

<div class="col-md-3">

<div class="step" data-aos="zoom-in">

<div class="icon">🔗</div>

<p id="step1">Enter API URL</p>

</div>

</div>


<div class="col-md-3">

<div class="step" data-aos="zoom-in" data-aos-delay="100">

<div class="icon">📡</div>

<p id="step2">API Request Sent</p>

</div>

</div>


<div class="col-md-3">

<div class="step" data-aos="zoom-in" data-aos-delay="200">

<div class="icon">🔍</div>

<p id="step3">Security Analysis</p>

</div>

</div>


<div class="col-md-3">

<div class="step" data-aos="zoom-in" data-aos-delay="300">

<div class="icon">📊</div>

<p id="step4">Risk Dashboard</p>

</div>

</div>

</div>

</div>


<!-- ANALYSIS -->

<div class="container py-5">

<h3 class="text-center mb-5" id="analysisTitle" data-aos="fade-up">🔎 What We Analyze</h3>

<div class="row">

<div class="col-md-4">

<div class="card-box text-center" data-aos="fade-up">

<div class="icon">🔐</div>

<h5 id="a1">Authentication Security</h5>

<p id="a1t">Detect missing authentication mechanisms</p>

</div>

</div>


<div class="col-md-4">

<div class="card-box text-center" data-aos="fade-up" data-aos-delay="200">

<div class="icon">📦</div>

<h5 id="a2">API Response Data</h5>

<p id="a2t">Identify sensitive data exposure</p>

</div>

</div>


<div class="col-md-4">

<div class="card-box text-center" data-aos="fade-up" data-aos-delay="400">

<div class="icon">🛡</div>

<h5 id="a3">Security Headers</h5>

<p id="a3t">Analyze HTTP security headers</p>

</div>

</div>

</div>

</div>


<!-- RISK -->

<div class="container py-5">

<div class="card-box" data-aos="fade-up">

<h3 id="riskTitle">⚠ Risk Classification</h3>

<p id="riskText">

Synthia Flux categorizes vulnerabilities into severity levels.

</p>

<span class="badge low" id="lowRisk">Low Risk (0% - 30%)</span>
<span class="badge medium" id="mediumRisk">Medium Risk (31% - 70%)</span>
<span class="badge high" id="highRisk">High Risk (71% - 100%)</span>

</div>

</div>


<!-- TECHNOLOGY -->

<div class="container py-5">

<div class="card-box" data-aos="fade-up">

<h3 id="techTitle">💻 Technology Stack</h3>

<ul>

<li id="t1">PHP – backend scanning engine</li>
<li id="t2">JavaScript – dashboard logic</li>
<li id="t3">Chart.js – visualization</li>
<li id="t4">Bootstrap – responsive UI</li>
<li id="t5">MySQL – scan database</li>

</ul>

</div>

</div>


<footer>

<p id="footerText">© 2026 Synthia Flux | AI API Security Platform</p>

</footer>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>

AOS.init();

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
en:{ title:"About Synthia Flux", subtitle:"AI-powered platform that scans APIs, detects vulnerabilities and provides real-time security intelligence.", problemTitle:"🚨 Problem We Solve", problemText:"Modern applications rely heavily on APIs but many APIs are deployed without proper security testing. This exposes systems to vulnerabilities like broken authentication, sensitive data exposure and insecure configurations.", workTitle:"⚙ How It Works", step1:"Enter API URL", step2:"API Request Sent", step3:"Security Analysis", step4:"Risk Dashboard Generated", analysisTitle:"🔎 What We Analyze", a1:"Authentication Security", a1t:"Detect missing authentication mechanisms", a2:"API Response Data", a2t:"Identify sensitive data exposure", a3:"Security Headers", a3t:"Analyze HTTP security headers", riskTitle:"⚠ Risk Classification", riskText:"Synthia Flux categorizes vulnerabilities into severity levels.", lowRisk:"Low Risk (0% - 30%)", mediumRisk:"Medium Risk (31% - 70%)", highRisk:"High Risk (71% - 100%)", techTitle:"💻 Technology Stack", t1:"PHP – backend scanning engine", t2:"JavaScript – dashboard logic", t3:"Chart.js – visualization", t4:"Bootstrap – responsive UI", t5:"MySQL – scan database" },

hi:{
title:"Synthia Flux के बारे में",
subtitle:"AI आधारित प्लेटफॉर्म जो API स्कैन करता है और सुरक्षा जोखिमों का पता लगाता है",
problemTitle:"🚨 समस्या जिसे हम हल करते हैं",
problemText:"कई API बिना सुरक्षा परीक्षण के जारी किए जाते हैं जिससे डेटा लीक और सुरक्षा जोखिम बढ़ते हैं।",
workTitle:"⚙ यह कैसे काम करता है",
step1:"API URL दर्ज करें",
step2:"API अनुरोध भेजा जाता है",
step3:"सुरक्षा विश्लेषण किया जाता है",
step4:"जोखिम डैशबोर्ड बनाया जाता है",
analysisTitle:"🔎 हम क्या विश्लेषण करते हैं",
a1:"प्रमाणीकरण सुरक्षा",
a1t:"कमजोर प्रमाणीकरण का पता लगाता है",
a2:"API प्रतिक्रिया डेटा",
a2t:"संवेदनशील डेटा एक्सपोजर का पता लगाता है",
a3:"सुरक्षा हेडर",
a3t:"HTTP सुरक्षा हेडर का विश्लेषण करता है",
riskTitle:"⚠ जोखिम वर्गीकरण",
lowRisk:"कम जोखिम (0% - 30%)",
mediumRisk:"मध्यम जोखिम (31% - 70%)",
highRisk:"उच्च जोखिम (71% - 100%)",
techTitle:"💻 प्रौद्योगिकी स्टैक"
},

mr:{
title:"Synthia Flux बद्दल",
subtitle:"API स्कॅन करून सुरक्षा धोके शोधणारा AI आधारित प्लॅटफॉर्म",
problemTitle:"🚨 आम्ही सोडवत असलेली समस्या",
problemText:"अनेक API योग्य सुरक्षा तपासणीशिवाय प्रकाशित केल्या जातात ज्यामुळे डेटा लीक आणि सायबर धोके निर्माण होतात.",
workTitle:"⚙ हे कसे कार्य करते",
step1:"API URL प्रविष्ट करा",
step2:"API विनंती पाठवा",
step3:"सुरक्षा तपासणी करा",
step4:"जोखीम डॅशबोर्ड तयार करा",
analysisTitle:"🔎 आम्ही काय विश्लेषण करतो",
a1:"प्रमाणीकरण सुरक्षा",
a1t:"कमकुवत प्रमाणीकरण शोधते",
a2:"API प्रतिसाद डेटा",
a2t:"संवेदनशील माहिती तपासते",
a3:"सुरक्षा हेडर",
a3t:"HTTP सुरक्षा हेडर तपासते",
riskTitle:"⚠ जोखीम वर्गीकरण",
lowRisk:"कमी जोखीम (0% - 30%)",
mediumRisk:"मध्यम जोखीम (31% - 70%)",
highRisk:"उच्च जोखीम (71% - 100%)",
techTitle:"💻 तंत्रज्ञान स्टॅक"
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
