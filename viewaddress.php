<?
include "rpc.php";
$id = $_GET['id'];
$rvn = new Raven("USETNAME","PASSWORD","HOST",PORT);
$results = $rvn->listassetbalancesbyaddress($id);

echo "<a href='./viewassets.php'>Go BACK</a><br>";
echo "Asset(s) for address: <strong>".$id."</strong><br><br>";
foreach($results as $key => $value){
	echo "<strong>Asset</strong>: ".$key." <strong>Amount: ".$value."</strong><br><br>";
}

echo "<br><br><br>If you appreciate the quick coding effort, feel free to send some real RVNs to: RQPxk7ngwRj5nZVhBXYc7a5LRDpDuv4zE1";
echo "<br>Disclaimer: Use at your own risk!";
?>