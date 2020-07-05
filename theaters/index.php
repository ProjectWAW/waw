<!DOCTYPE html>
<html lang="en">
<head>
<?php require $_SERVER['DOCUMENT_ROOT'].'/page_head.php';?>
<title>Theatres - Project: World at War</title>
<style>
h2 {
	text-align: left;
}
p {
	white-space: normal;
  line-height: 22px;
  margin-top: 7px;
  margin-bottom: 7px;
}
img {
  width: 100%;
  max-height: 200px;
	vertical-align: middle;
	border: 1px solid gray;
}
hr { 
	height: 1px;
  background-color: gray;
	border: none;
	margin-left: 20px;
  margin-right: 20px;
}
.section {
	right: 0;
  overflow-x: hidden;
	padding: 20px;
	margin-right: 0;
}
.section:hover {
  cursor: pointer;
}
.helper {
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
.img-ver {
  white-space: nowrap;
  text-align: center;
}
.center {
	text-align: center;
}
.start {
	margin-top: 15px;
}
/*.h2-theaters:hover {
	text-decoration: underline;
}*/
</style>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/loader.php'; include $_SERVER['DOCUMENT_ROOT'].'/navbar.php';?>
<h1 class="start center">European Theatres</h1>
<div class="section" onclick="location.href='europe/western_europe.php';">
	<div class="row">
		<div class="col-md-8">
			<h2 class="h2-theaters">Western Europe</h2>
			<p class="section-p">Slazem se da je dedic picka u tom cilju sada ovo pisem jer ja brate stvarno ne mogu da vjerujem znaci ovo je farsa protiv mila</p>
		</div>
		<div class="col-md-4 img-ver">
       <span class="helper"></span>
			<img src="test.jpg">
		</div>
	</div>
</div>
<hr>

</body>
</html>