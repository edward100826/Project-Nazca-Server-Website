<span>Craft API</span><br>
<?php 
$data = json_decode(file_get_contents('http://craftapi.com/api/server/info/projectnazca.nhz.hk:1027'),true); 
echo $data['latency']*1000;
?>
<br>

<span>MCAPI ca</span><br>
<?php 
$data = json_decode(file_get_contents('http://mcapi.ca/query/projectnazca.nhz.hk:1027/info'),true); 
echo $data['ping'];
?>