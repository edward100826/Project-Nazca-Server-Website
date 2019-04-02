<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
if (isset($_GET["username"])){
	if($_GET["username"] == NULL ){
		echo '<script language="javascript">';
		echo 'alert("message successfully sent")';
		echo '</script>';
		header ("Location:check.php");
	}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#FED084">
<title>遊戲名稱檢查 | Project Nazca</title>
<?php include'head.php'; ?>
<script src="js/toggle.js"></script>
</head>
<body id="homepage" style="padding-top:60px;">
<?php include'nav.php'; ?>

<div class="container" id="fadein" style="min-height:100%; bottom:0">
<section id="premium" class="premium_box">
<form class="form-inline" action="" method="get" style="margin:0 .5em 0 .5em">
<div class="input-group input-group-lg" style="margin-bottom:1em">
<input type="text" id="username" class="form-control" name="username" placeholder="遊戲名稱" required="required">
<span class="input-group-btn">
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
</span>
</div>
</form>
<?php
if (isset($_GET["username"])){
$username = $_GET["username"];
$content = json_decode(file_get_contents('http://craftapi.com/api/user/haspaid/'.urlencode($username)), true);
$haspaid = $content['haspaid'];
if ($haspaid == 'true'){
	$uuid_content = json_decode(file_get_contents('http://craftapi.com/api/user/uuid/'.urlencode($username)), true);
	$uuid = $uuid_content['uuid'];
	$history_content = json_decode(file_get_contents('http://craftapi.com/api/user/namehistory/'.urlencode($uuid)), true);
	if (isset($username)){
?>
<div class="alert alert-danger" role="alert" style="margin:0 20% 0 20%"><span class="glyphicon glyphicon-remove"></span>&nbsp;<strong><?=$username?></strong>這個遊戲名稱已被使用!</div>

<div class="user" >
<div class="skin">
<img src="https://minotar.net/body/<?=$username?>/140.png">
</div>
<div class="data">
<p style="font-size:36px; margin-top:.5em"><?=$username?></p>
<p class="label label-default" style="margin:.4em"><?=$uuid?></p>
<br />
<?php if (count($history_content)>1){ ?>
<table class="table table-hover" style=" text-align:left;">
<thead>
<th>遊戲名稱</th>
<th>更改日期</th>
</thead>
<tbody>
<?php 
echo '<tr>';
echo '<td>'.$history_content[0]['name'].'</td>';
echo '<td>-/-</td>';
echo '</tr>';
$count = count($history_content)-1;
for($i = 1;$i <= $count ;$i++){
        echo '<tr>';
        echo '<td>'.$history_content[$i]['name'].'</td>';
		echo '<td>'.date('Y-m-d',$history_content[$i]['changedToAt']/1000).'</td>';
        echo '</tr>';
}
?>
</tbody>
</table>
<?php }}?>
</div>
</div>
<?php
}else {
?>
<div class="alert alert-success" role="alert" style="margin:0 20% 0 20%"><span class="glyphicon glyphicon-ok"></span><strong> <?=$username?> </strong>這個遊戲名稱未被使用!</div>
<?php
}}
?>
</section>
</div>
<?php include'footer.php'; ?>
<script>
$("input#username").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
</script>
</body>
</html>
<script>
$("[data-toggle=popover]").popover();
</script>