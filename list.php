<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#FED084">
<title>封鎖及警告名單 | Project Nazca</title>
<?php include'head.php'; ?>
<script src="js/toggle.js"></script>
</head>
<body id="homepage" style="padding-top:60px;">
<?php include'nav.php'; ?>

<div class="container" style="bottom:0; top:0; height:100%;">
<article id="main" class="banlist">
<div class="btban">
<span><i class="fa fa-ban"></i>封鎖BAN</span><a href="#" id="btban" style="border:none;"><i id="switchban" onclick="myfunc(this)" class="fa fa-plus fa-3x" style="float:right"></i></a>
</div>
<div id="ban" style="display:none;">
</div>
</article>
</div>
</div>
<?php include'footer.php'; ?>
</body>
</html>
<script>
$("[data-toggle=popover]").popover();
</script>