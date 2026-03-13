
<?php

$url="";
$vulnerabilities=[];
$risk_score=0;
$risk_level="Low";

$csp="Missing";
$xframe="Missing";
$hsts="Missing";

$safe=0;
$medium=0;
$high=0;

if(isset($_POST['api_url'])){

$url=$_POST['api_url'];

$ch=curl_init($url);

curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER,true);
curl_setopt($ch,CURLOPT_TIMEOUT,10);

$response=curl_exec($ch);

$header_size=curl_getinfo($ch,CURLINFO_HEADER_SIZE);

$headers=substr($response,0,$header_size);
$body=substr($response,$header_size);

curl_close($ch);


/* AUTH CHECK */

if(stripos($body,"token")==false && stripos($body,"auth")==false){

$vulnerabilities[]=["name"=>"Missing Authentication","severity"=>"High"];
$risk_score+=30;

}

/* SENSITIVE DATA */

if(stripos($body,"password")!==false){

$vulnerabilities[]=["name"=>"Sensitive Data Exposure","severity"=>"High"];
$risk_score+=25;

}

/* HEADERS */

if(stripos($headers,"Content-Security-Policy")!==false){
$csp="Present";
}else{
$risk_score+=15;
}

if(stripos($headers,"X-Frame-Options")!==false){
$xframe="Present";
}else{
$risk_score+=15;
}

if(stripos($headers,"Strict-Transport-Security")!==false){
$hsts="Present";
}else{
$risk_score+=15;
}

if($risk_score>100){
$risk_score=100;
}

if($risk_score<=30){
$risk_level="Low";
$safe=1;
}
elseif($risk_score<=70){
$risk_level="Medium";
$medium=1;
}
else{
$risk_level="High";
$high=1;
}

}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>API Security Scan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

.card-box{
background:#1e293b;
padding:22px;
border-radius:10px;
margin-bottom:20px;
box-shadow:0 0 15px rgba(0,0,0,0.2);
}

body.light .card-box{
background:white;
}

.risk-circle{
width:180px;
height:180px;
border-radius:50%;
background:conic-gradient(#ef4444 <?php echo $risk_score*3.6 ?>deg,#1e293b 0deg);
display:flex;
align-items:center;
justify-content:center;
margin:auto;
}

.inner-circle{
width:130px;
height:130px;
border-radius:50%;
background:#020617;
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
}

body.light .inner-circle{
background:white;
}

.scanbar{
height:5px;
background:#3b82f6;
width:0%;
animation:scan 2s forwards;
}

@keyframes scan{
0%{width:0%}
100%{width:100%}
}

/* Risk chart */

.chart-container{
width:150px;
height:150px;
margin:auto;
}

.risk-legend{
display:flex;
flex-direction:column;
gap:6px;
margin-top:10px;
}

.legend-row{
display:flex;
justify-content:space-between;
font-size:14px;
}

.dot{
width:10px;
height:10px;
border-radius:50%;
display:inline-block;
margin-right:6px;
}

.safe{background:#22c55e;}
.medium{background:#f59e0b;}
.high{background:#ef4444;}

.status-box{
padding:8px;
border-radius:8px;
background:#dcfce7;
color:#15803d;
font-weight:600;
margin-top:10px;
text-align:center;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h2 id="title">API Security Scan Dashboard</h2>

<div>

<select id="language" class="form-select d-inline" style="width:140px">

<option value="en">English</option>
<option value="hi">Hindi</option>
<option value="mr">Marathi</option>

</select>

<button class="btn btn-outline-light" onclick="toggleMode()">
<span id="modeIcon">🌙</span>
</button>

</div>

</div>

<div class="scanbar"></div>


<div class="card-box">

<h5 id="scanurl">Scanned API</h5>

<p><?php echo $url ?></p>

</div>


<div class="row">

<div class="col-md-4">

<div class="card-box text-center">

<h5 id="score">Security Score</h5>

<div class="risk-circle">

<div class="inner-circle">

<h2><?php echo $risk_score ?>%</h2>
<p><?php echo $risk_level ?></p>

</div>

</div>

</div>


<div class="card-box text-center">

<h5>🎯 Risk Overview</h5>

<div class="chart-container">
<canvas id="riskChart"></canvas>
</div>

<div class="risk-legend">

<div class="legend-row">
<div><span class="dot safe"></span>Safe</div>
<div><?php echo $safe ?></div>
</div>

<div class="legend-row">
<div><span class="dot medium"></span>Medium</div>
<div><?php echo $medium ?></div>
</div>

<div class="legend-row">
<div><span class="dot high"></span>High</div>
<div><?php echo $high ?></div>
</div>

</div>

<div class="status-box">

<?php

if($risk_level=="Low"){
echo "Safe";
}
elseif($risk_level=="Medium"){
echo "Medium Risk";
}
else{
echo "High Risk";
}

?>

</div>

</div>

</div>



<div class="col-md-8">

<div class="card-box">

<h5 id="vulnTitle">Detected Vulnerabilities</h5>

<?php

if(empty($vulnerabilities)){
echo "<div class='alert alert-success'>No vulnerabilities detected</div>";
}

foreach($vulnerabilities as $v){

$color="warning";

if($v["severity"]=="High"){
$color="danger";
}

echo "<div class='alert alert-$color'>";
echo "<strong>".$v["severity"]."</strong> : ".$v["name"];
echo "</div>";

}

?>

</div>


<div class="card-box">

<h5 id="headerTitle">Security Headers Check</h5>

<table class="table table-dark">

<tr>
<th>Header</th>
<th>Status</th>
</tr>

<tr>
<td>Content Security Policy</td>
<td><?php echo $csp ?></td>
</tr>

<tr>
<td>X Frame Options</td>
<td><?php echo $xframe ?></td>
</tr>

<tr>
<td>Strict Transport Security</td>
<td><?php echo $hsts ?></td>
</tr>

</table>

</div>


<div class="card-box">

<h5 id="recommend">Security Recommendations</h5>

<ul>

<?php

if($csp=="Missing"){
echo "<li>Add Content Security Policy header</li>";
}

if($xframe=="Missing"){
echo "<li>Add X-Frame-Options header</li>";
}

if($hsts=="Missing"){
echo "<li>Enable Strict-Transport-Security</li>";
}

if(empty($vulnerabilities)){
echo "<li>API appears secure</li>";
}

?>

</ul>

</div>

</div>

</div>

</div>


<?php

include "../DB_connect/db.php";

/* convert vulnerabilities array to text */

$vuln_text = "";

foreach($vulnerabilities as $v){

$vuln_text .= $v['name'] . ", ";

}

/* insert into database */

$stmt = $conn->prepare("INSERT INTO scan_results(api_url,vulnerabilities,risk_score) VALUES(?,?,?)");

$stmt->bind_param("ssi",$url,$vuln_text,$risk_score);

$stmt->execute();

?>


<script>

function toggleMode(){

document.body.classList.toggle("light");

let icon=document.getElementById("modeIcon");

if(document.body.classList.contains("light")){
icon.innerHTML="☀️";
}else{
icon.innerHTML="🌙";
}

}

/* donut chart */

const ctx=document.getElementById('riskChart');

new Chart(ctx,{

type:'doughnut',

data:{
labels:['Safe','Medium','High'],
datasets:[{
data:[
<?php echo $safe ?>,
<?php echo $medium ?>,
<?php echo $high ?>
],
backgroundColor:[
'#22c55e',
'#f59e0b',
'#ef4444'
],
borderWidth:0
}]
},

options:{
cutout:'75%',
plugins:{legend:{display:false}},
animation:{animateRotate:true,duration:1500}
}

});


/* translator */

const translations={

hi:{
title:"API सुरक्षा डैशबोर्ड",
scanurl:"स्कैन किया गया API",
score:"सुरक्षा स्कोर",
vulnTitle:"कमजोरियाँ",
headerTitle:"सुरक्षा हेडर जाँच",
recommend:"सुरक्षा सुझाव"
},

mr:{
title:"API सुरक्षा डॅशबोर्ड",
scanurl:"स्कॅन केलेला API",
score:"सुरक्षा स्कोअर",
vulnTitle:"त्रुटी",
headerTitle:"सुरक्षा हेडर तपासणी",
recommend:"सुरक्षा सूचना"
}

};

document.getElementById("language").addEventListener("change",function(){

let lang=this.value;

if(!translations[lang]) return;

for(let key in translations[lang]){

if(document.getElementById(key)){
document.getElementById(key).innerText=translations[lang][key];
}

}

});

</script>

</body>
</html>