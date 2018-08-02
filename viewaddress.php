<html>
 <head>
  <title>Ravencoin Asset Directory</title>
	<style>
	body {background: url(https://ravencoin.network/img/background.png);color: #000;display: block;text-align: center;}a {color: black;}a:hover {color: green;}strong {font-weight: inherit;}.test {width: 500px;display: inline-block;background: #eaeef6e6;}
	</style>
 </head>
 <body>
<?php
include "rpc.php";
$id = $_GET['id'];
$rvn = new Raven("USERNAME","PASSWORD","HOST",PORT);
$results = $rvn->listassetbalancesbyaddress($id);
echo '<div class="test">';
echo "<a class='back' href='./viewassets.php'>Go BACK</a><br>";
echo "Asset(s) for address:<br><strong>".$id."</strong><br><br>";
foreach($results as $key => $value){
	echo "<strong>Asset</strong>: ".$key."<br><strong>Amount: ".$value."</strong><br><br>";
}

echo "<br><br><br>If you appreciate the quick coding effort, feel free to send some real RVNs to: RQPxk7ngwRj5nZVhBXYc7a5LRDpDuv4zE1";
echo "<br>Disclaimer: Use at your own risk!";
echo '</div>';
?>
</body>
</html>
