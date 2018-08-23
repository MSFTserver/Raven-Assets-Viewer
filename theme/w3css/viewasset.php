 <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-file w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['name'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Name</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-money-bill-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['amount'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Amount</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['nrAssetHolders'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4># Holders</h4>
      </div>
    </div>
  </div>
  
  <div class="w3-container">
    <h5>More details:</h5>
	<div class="w3-panel">
	Issuer: <?php echo $data['issuer']; ?>
	</div>
	<div class="w3-panel">
		<strong>IPFS:</strong><br>
		<?php
		if($data['ipfs_hash']){
		?>
		<a href='https://gateway.ipfs.io/ipfs/<?php echo $data['ipfs_hash'];?>' target='_blank'><?php echo $data['ipfs_hash'];?></a><br>
		<?php
		}else{
		?>
		No IPFS data found for this asset object.
		<?php
		}
		?>
	</div>
  </div>
  
  <div class="w3-container">
    <h5>Holder(s)</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-threequarter w3-responsive">
	  <tr>
        <th>Holder Address (#id)</th>
        <th>Amount</th>
      </tr>
	<?php
foreach($data['addresses'] as $key => $value){
?>
      <tr>
        <td><a href='./?cmd=viewholder&id=<?php echo $key;?>'><?php echo $key;?></a></td>
        <td><?php echo $value;?></td>
	  </tr>
<?php
}
?>
     
    </table>
  </div>
  <hr>
