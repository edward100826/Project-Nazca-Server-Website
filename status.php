<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#FED084">
<title>伺服器狀態 | Project Nazca</title>
<?php include'head.php'; ?>
<style>
.big-icon
{
	font-size:10em;
}
</style>
</head>
<body style="padding-top:60px;">
<?php include'nav.php'; ?>
<div class="container" align="center" id="fadein" style="min-height:100%; bottom:0">

<div id="online" style="display:none;">
<span class="fa-stack fa-lg big-icon" style="margin-top:50px;">
  <i class="fa fa-circle fa-stack-2x" style="color:#80FF00"></i>
  <i class="fa fa-thumbs-o-up fa-stack-1x fa-inverse"></i>
</span>
<div class="alert alert-success" role="alert">
<h2 style="margin-bottom:1em; font-weight:400;"><font class="version"></font>伺服器<font class="server-online"></font></h2>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
  <span class="players-no"></span><span>人上線中</span>
  </div>
</div>
<div class="btn-group" role="group" style="margin-top:30px; margin-bottom:30px">
  <a href="player.php"><button type="button" class="btn btn-default btn-info btn-lg"><i class="fa fa-user"></i>在線玩家</button></a>
 </div>
</div>

<div id="offline" style="display:none;">
<span class="fa-stack fa-lg big-icon" style="margin-top:50px;">
  <i class="fa fa-circle fa-stack-2x" style="color:#FF0000"></i>
  <i class="fa fa-thumbs-o-down fa-stack-1x fa-inverse" style="color:#111"></i>
</span>
<div class="alert alert-danger" role="alert">
<h2 style="margin-bottom:1em; font-weight:400;">伺服器正在維護</h2>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only"></span>
  </div>
</div>
</div>
</div>
<script src="https://mcapi.us/scripts/minecraft.js"></script>
<script>
  MinecraftAPI.getServerStatus('projectnazca.nhz.hk', {
    port: 2048 // optional, only if you need a custom port
  }, function (err, status) {
    if (err) {
      return document.querySelector('.server-status').innerHTML = 'Error loading status';
    }

    // you can change these to your own message!
    document.querySelector('.server-online').innerHTML = status.online ? '正常運作' : '正在維護';
	document.querySelector('.players-no').innerHTML = status.players.now ;
	document.querySelector('.version').innerHTML = status.server.name ;
	
	if(status.online == true){
	    $("#online").show();
	} else {
		$("#offline").show();
	}
  });
</script>
<?php include'footer.php'; ?>
</body>
</html>
<script>
$("[data-toggle=popover]").popover();
</script>