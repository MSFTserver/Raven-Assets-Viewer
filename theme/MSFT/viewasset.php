<div class="test">
<a class='back' href='./viewassets.php'>Go BACK</a><br>
Name: <?php echo $data['name'];?><br>
Amount: <?php echo $data['amount'];?><br>
Units: <?php echo $data['units'];?><br>
Reissuable: <?php echo $data['reissuable'];?><br>
<?php
if($data['ipfs_hash']){
?>
Data: <a href='https://gateway.ipfs.io/ipfs/<?php echo $data['ipfs_hash'];?>' target='_blank'><?php echo $data['ipfs_hash'];?></a><br>
<?php
}
?>

<?php
foreach($data['addresses'] as $key => $value){
?>
<strong>Address</strong>: <a href='./?cmd=viewaddress&id=<?php echo $key;?>'><?php echo $key;?></a><br><strong>Amount: <?php echo $value;?></strong><br><br>
<?php
}
?>