<?
include "rpc.php";

$rvn = new Raven("USETNAME","PASSWORD","HOST",PORT);
$results = $rvn->listassets();
sort($results);
$nrAssets = count($results);
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
?>