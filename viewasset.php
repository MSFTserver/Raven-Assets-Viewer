<?
include "rpc.php";
$id = $_GET['id'];
$rvn = new Raven("USETNAME","PASSWORD","HOST",PORT);
$result = $rvn->getassetdata($id);
echo "<a href='./viewassets.php'>Go BACK</a><br>";
echo " Name: ".$result['name']."<br>";
echo " Amount: ".$result['amount']."<br>";
echo " Units: ".$result['units']."<br>";
echo " Reissuable: ".$result['reissuable']."<br>";
if($result['has_ipfs'] <> 0){
	echo " Data: <a href='https://gateway.ipfs.io/ipfs/".$result['ipfs_hash']."' target='_blank'>".$result['ipfs_hash']."</a><br>";
}
echo "<br>";
$results = $rvn->listaddressesbyasset($id);

foreach($results as $key => $value){
	echo "<strong>Address</strong>: <a href='./viewaddress.php?id=".$key."'>".$key."</a><br><strong>Amount: ".$value."</strong><br><br>";
}

echo "<br><br><br>If you appreciate the quick coding effort, feel free to send some real RVNs to: RQPxk7ngwRj5nZVhBXYc7a5LRDpDuv4zE1";
echo "<br>Disclaimer: Use at your own risk!";
?>