Number of created assets in the Raven TestNet: <?php echo $data['nrAssets'];?><br><br>
<?php
foreach($data['assetsList'] as $asset){
?>
<a href='./?cmd=viewasset&id=<?php echo $asset['id'];?>'><?php echo $asset['name'];?></a>

<?php if($asset['ipfs']){?>
<em>(IPFS !)</em><br>
<?php
}else{
?>
<br>
<?php
}
}
?>

