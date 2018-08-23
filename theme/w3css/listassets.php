 <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-file w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['nrAssets'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Assets</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-asterisk w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['ipfsEnabled'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>IPFS Enabled</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>na</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Asset Holders</h4>
      </div>
    </div>
  </div>
  <div class="w3-panel">
  	<div class="w3-threequarter">
	<!--<form action="" method="post">
  		<input class="w3-input w3-border w3-round" type="text" value="" name="q" id="q">
	</form>-->
	</div>
  </div>
  <div class="w3-panel">
  	<div class="w3-bar">
	  <a href="./" class="w3-button  w3-tiny w3-grey">ALL</a>
	  <?php
	  	$alphabet = array("0..9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
		foreach($alphabet as $letter)
		{
			if(isset($_GET['f']) && $letter == $_GET['f'])
			{
	  ?>
				<a href="./?f=<?php echo $letter;?>" class="w3-button w3-tiny w3-green"><?php echo $letter;?></a>
	  		<?php
			}else{
			?>
				<a href="./?f=<?php echo $letter;?>" class="w3-button w3-tiny"><?php echo $letter;?></a>
			<?php
			}
			?>
	  <?php
	  }
	  ?>
	</div>
  </div>
  <div class="w3-panel">
    <div class="w3-row-padding">
      <div class="w3-container w3-threequarter">
        <h5>Assets on the Ravencoin Blockchain</h5>
        <table class="w3-table w3-striped w3-white w3-responsive">
		<?php
			if($data['assetsList'])
			foreach($data['assetsList'] as $asset){
		?>
			<tr>
				<td><i class="fa fa-file-prescription w3-text-blue w3-large"></i></td>
				<td><a href='./?cmd=viewasset&id=<?php echo $asset['id'];?>'><?php echo $asset['name'];?></a></td>
				<td>
					<?php if($asset['ipfs']){?>
					<em>(IPFS !)</em><br>
					<?php
					}
					?>
				</td>
		  </tr>
		<?php
			}
		?>
        </table>
      </div>
    </div>
  </div>
  <hr>