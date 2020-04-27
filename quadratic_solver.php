<?php
session_start();
$user= $email= "";

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	$email = $_SESSION['mail'];
}else{
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<title>Mathematics Distant Learning</title>
<style>
table{
	text-align:center;
}
</style>
<script>
function quadratic(){
	var a, b, c, ans1, ans2;
	a = parseInt(document.getElementById('a').value);
	b = parseInt(document.getElementById('b').value);
	c = parseInt(document.getElementById('c').value);
	
	document.getElementById('a1').innerHTML = "-("+ b +") &#8723; &#8730;"+ b +"<sup>2</sup> - 4("+ a +")("+ c +")";
	document.getElementById('a2').innerHTML = "2("+ a +")";
	
	var chunk1, chunk2, chunk3, chunk4, chunk5, chunk6;
	var operator;
	
	chunk1 = -1 * b;
	chunk2 = Math.pow(b, 2);
	chunk3 = (-4 * a * c); 
	chunk4 = 2 * a;
	
	if(chunk3 >= 0){
		operator = "+";
		chunk5 = chunk2 + chunk3;
	}else if(chunk3 < 0){
		operator = "";
		chunk5 = chunk2 - chunk3;
	}
	
	
	
	document.getElementById('b1').innerHTML =  chunk1 +" &#8723; &#8730;"+ chunk2 +" "+ operator +" "+chunk3;
	document.getElementById('b2').innerHTML = " "+ chunk4;
	
	document.getElementById('c1').innerHTML =  chunk1 +" &#8723; &#8730;"+ chunk5;
	document.getElementById('c2').innerHTML = " "+ chunk4;
	
	chunk6 = Math.round(Math.sqrt(chunk5));
	
	document.getElementById('d1').innerHTML =  chunk1 +" &#8723; "+ chunk6;
	document.getElementById('d2').innerHTML = " "+ chunk4;
	
	document.getElementById('e1').innerHTML =  chunk1 +" + "+ chunk6;
	document.getElementById('e2').innerHTML = chunk1 +" - "+ chunk6;
	document.getElementById('e3').innerHTML = " "+ chunk4;
	document.getElementById('e4').innerHTML = " "+ chunk4;
	
	document.getElementById('f1').innerHTML =  chunk1 + chunk6;
	document.getElementById('f2').innerHTML = chunk1 - chunk6;
	document.getElementById('f3').innerHTML = " "+ chunk4;
	document.getElementById('f4').innerHTML = " "+ chunk4;
	
}
</script>
</head>
<body>
	<div class="userHeader">
	<a href=""><h3>Logout</h3></a><h1><?php echo $user; ?></h1><a href=""><h3>Join Discussion</h3></a>
	<h2><?php echo $email; ?></h2>
	</div>
	<div class="userBody">
		<span>NOTE: It is advised to only use quadratic formula on equations that cannot be factorised</span>
		<div class="ans">
			Quadratic Formula:
			<table>
			<tr>
			<td rowspan="2">x = </td><td style="border-bottom:1px solid black;">-b &#8723; &#8730;b<sup>2</sup> - 4ac</td>
			</tr>
			<tr>
			<td colspan="2">2a</td>
			</tr>
			</table>
		</div>
		<table>
		<tr>
		<td colspan="2">Enter The Variables</td>
		</tr>
		<tr>
		<td>a</td><td><input type="text" id="a"></td>
		</tr>
		<tr>
		<td>b</td><td><input type="text" id="b"></td>
		</tr>
		<tr>
		<td>c</td><td><input type="text" id="c"></td>
		</tr>
		<tr>
		<td><button onclick="quadratic()">Calculate</button></td>
		</tr>
		</table>
		<br />ANSWER<br />
		<div class="ans">
			<table>
				<tr>
				<td rowspan="2">x = </td><td id="a1" style="border-bottom:1px solid black;"></td>
				</tr>
				<tr>
				<td colspan="2" id="a2"></td>
				</tr>
			</table>
			<table>
				<tr>
				<td rowspan="2">x = </td><td id="b1" style="border-bottom:1px solid black;"></td>
				</tr>
				<tr>
				<td colspan="2" id="b2"></td>
				</tr>
			</table>
			<table>
				<tr>
				<td rowspan="2">x = </td><td id="c1" style="border-bottom:1px solid black;"></td>
				</tr>
				<tr>
				<td colspan="2" id="c2"></td>
				</tr>
			</table>
			<table>
				<tr>
				<td rowspan="2">x = </td><td id="d1" style="border-bottom:1px solid black;"></td>
				</tr>
				<tr>
				<td colspan="2" id="d2"></td>
				</tr>
			</table>
			<table>
				<tr>
				<td rowspan="2">x = </td><td id="e1" style="border-bottom:1px solid black;"></td><td rowspan="2"> or </td><td style="border-bottom:1px solid black;" id="e2" ></td>
				</tr>
				<tr>
				<td id="e3"></td><td id="e4"></td>
				</tr>
			</table>
			<table>
				<tr>
				<td rowspan="2">x = </td><td id="f1" style="border-bottom:1px solid black;"></td><td rowspan="2"> or </td><td style="border-bottom:1px solid black;" id="f2" ></td>
				</tr>
				<tr>
				<td id="f3"></td><td id="f4"></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>