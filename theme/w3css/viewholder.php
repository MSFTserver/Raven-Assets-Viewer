 <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-half">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-file w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['id'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Asset Holder Address</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-money-bill-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $data['totalAmount'];?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Amount</h4>
      </div>
    </div>
  </div>
    
  <div class="w3-container">
    <h5>Asset(s):</h5>
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-threequarter w3-responsive">
	  <tr>
        <th>Asset</th>
        <th>Amount</th>
      </tr>
     <?php
	foreach($data['assets'] as $asset => $value){
	?>
		<tr>
			<td><a href='./?cmd=viewasset&id=<?php echo base64_encode($asset);?>'><?php echo $asset;?></a></td>
			<td><?php echo $value;?></td>
		</tr>
	<?php
	}
	?>
    </table>
  </div>
  <hr>
