<html>
 <head>
  <title>Ravencoin Asset Directory</title>
	<style>
	body {background: url(https://ravencoin.network/img/background.png);color: #000;display: block;text-align: center;}a {color: black;}a:hover {color: green;}strong {font-size: x-large;}.test {width: 500px;display: inline-block;background: #eaeef6e6;}
	</style>
 </head>
 <body>
<?php
include "rpc.php";

$rvn = new Raven("USERNAME","PASSWORD","HOST",PORT);
$results = $rvn->listassets();
sort($results);
$nrAssets = count($results);
echo '<div class="test">';
echo "<strong>Ravencoin Asset Directory</strong><br>Number of created assets in the Raven TestNet: ".$nrAssets."<br><br>";

for($i=0;$i<$nrAssets;$i++){
	echo "<a href='./viewasset.php?id=".$results[$i]."'>".$results[$i]."</a>";
	$result = $rvn->getassetdata($results[$i]);
	if($result['has_ipfs'] <> 0){
		echo " <em>(IPFS !)</em><br>";
	}else{
		echo "<br>";
	}
}

echo "<br><br><br>If you appreciate the quick coding effort, feel free to send some real RVNs to: RQPxk7ngwRj5nZVhBXYc7a5LRDpDuv4zE1";
echo "<br>Disclaimer: Use at your own risk!";
echo '</div>';
?>
</body>
</html>
