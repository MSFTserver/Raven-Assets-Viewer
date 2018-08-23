Asset(s) for address:<br><strong><?php echo $data['address'];?></strong><br><br>
<?php
foreach($data['assets'] as $asset => $value){
?>
	<strong>Asset</strong>: <a href='./?cmd=viewasset&id=<?php echo base64_encode($asset);?>'><?php echo $asset;?></a><br><strong>Amount: <?php echo $value;?></strong><br><br>
<?php
}
?>