<!DOCTYPE html>
<html>
<title><?php echo$data['title'];?> | Ravencoin Assets Viewer</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./theme/w3css/css/w3.css">
<link rel="stylesheet" href="./theme/w3css/css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
  <span class="w3-bar-item w3-right">Ravencoin Asset Viewer</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <hr>
  <div class="w3-container">
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <a href="./" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-list-ul fa-fw"></i>&nbsp; All Assets</a>
    <a href="https://ravencoin.org/" target="_blank" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; RVN Official Website</a>
    <a href="https://ravencoin.network/" target="_blank" class="w3-bar-item w3-button w3-padding"><i class="fa fa-wpexplorer fa-fw"></i>&nbsp; RVN Block Explorer</a>
    <a href="https://bitcointalk.org/index.php?topic=3238497" target="_blank" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullhorn fa-fw"></i>&nbsp; Forum [ANN]</a>
    <a href="https://discord.gg/jn6uhur" target="_blank" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments fa-fw"></i>&nbsp; Discord</a><br><br>
  </div>
  <div class="w3-bar-block">
	Donations (real) RVN: RQPxk7ngwRj5nZVhBXYc7a5LRDpDuv4zE1 
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
