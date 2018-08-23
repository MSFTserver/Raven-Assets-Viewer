<?
class rvnAssetsViewer{
	private $cfg;
	private $command;

	public function __construct()
	{
		require_once("config.php");
		$this->cfg = $cfg;
		
		//List of valid models
		$valid_cmds = array("viewholder","viewasset", "listassets", "search");
		
		if(isset($_GET['cmd']) && in_array($_GET["cmd"],$valid_cmds))
		{
			$this->command = $_GET['cmd'];
		}else{
			$this->command = "listassets";
		}
	}
	
	public function run()
	{
		$command = $this->command;
		$data = $this->$command();
		
		$data['title'] = "Ravencoin Asset Viewer";
		
		include "theme/".$this->cfg['theme']."/header.php";
		include "theme/".$this->cfg['theme']."/".$this->command.".php";
		include "theme/".$this->cfg['theme']."/footer.php";
	}
	
	private function listassets()
	{	
		include "profanityFilter.php";
		
		if(isset($_GET['f']) && !empty($_GET['f']))
		{
			if($_GET['f'] == "0..9")
			{
				
				$results = array();
				for($i=0;$i<10;$i++)
				{
					$temp = $this->getRPCresults("listassets", $i."*");
					$results = array_merge($results, $temp);
				}
			}else{
				$filter = $_GET['f']."*";
				$results = $this->getRPCresults("listassets", $filter);
			}
		}else{
			$results = $this->getRPCresults("listassets");
		}
				
		if(empty($results)){
			$data['error'] = "<br><br><br><strong>CONNECTION TO TESTNET NODE LOST</strong<br><br><br>";
			
			$data['nrAssets']= 0;
			$data['ipfsEnabled'] = 0;
			$data['assetsList'] = false;
			return $data;
		}
		
		sort($results);
		$nrAssets = count($results);
		$data['nrAssets']= $nrAssets;
		$data['ipfsEnabled'] = 0;
		
		$data['assetsList'] = array();		
		for($i=0;$i<$nrAssets;$i++)
		{
			$id = $results[$i];
			
			$name = profanityFilter($results[$i]);
			$results[$i] = $name;
			
			$data['assetsList'][$i]['id'] = base64_encode($id);
			$data['assetsList'][$i]['name'] = $results[$i];	
				
			$result = $this->getRPCresults("getassetdata", $id);
			if($result['has_ipfs'] <> 0){
				$data['assetsList'][$i]['ipfs'] = true;
				$data['ipfsEnabled']++;
			}else{
				$data['assetsList'][$i]['ipfs'] = false;
			}
		}
		
		return $data;
	}
	
	private function viewasset()
	{
		$id = base64_decode($_GET['id']);
		$result = $this->getRPCresults("getassetdata", $id);		
		
		if(empty($result)){
			$data['error'] = "<br><br><br><strong>CONNECTION TO TESTNET NODE LOST</strong<br><br><br>";
			return $data;
		}		
		
		$data['name'] = $result['name'];
		$data['amount'] = $result['amount'];
		$data['units'] = $result['units'];
		$data['reissuable'] = $result['reissuable'];
		if($result['has_ipfs'] <> 0){
			$data['ipfs_hash'] = $result['ipfs_hash'];
		}else{
			$data['ipfs_hash'] = false;
		}
		
		$result = $this->getRPCresults("listaddressesbyasset", $id."!");
		$checkIssuerCount = count($result);
		$data['issuer'] = '';
		if($checkIssuerCount > 1){
			$data['issuer'] .= "<br><strong>NOTE:</strong> Multiple issuers due to chainsplit(s).";
		}else{
			$data['issuer'] = key($result);
		}
		
		$data['addresses'] = array();
		$data['nrAssetHolders'] = 0;
		$results = $this->getRPCresults("listaddressesbyasset",$id);
		foreach($results as $key => $value){
			$data['addresses'][$key] = $value;
			$data['nrAssetHolders']++;
		}
		
		return $data;
	
	}
	
	private function viewholder()
	{
		$id = $_GET['id'];
		$result = $this->getRPCresults("listassetbalancesbyaddress", $id);
		
		if(empty($result)){
			$data['error'] = "<br><br><br><strong>CONNECTION TO TESTNET NODE LOST</strong<br><br><br>";
			return $data;
		}
		$data['id'] = $id;
		$data['assets'] = array();
		$data['totalAmount'] = 0;
		foreach($result as $key => $value){
			$data['assets'][$key] = $value;
			$data['totalAmount'] += $value;
		}
		
		return $data;
	}
	/*
	In development. Not used due to some strange issues in the RPC responces.
	*/
	private function search(){
		if(isset($_POST['q']) && !empty($_POST['q']))
		{
			$q = $_POST['q'];
			if($this->getRPCresults("getassetdata", $q))
			{
				header('Location: ./?cmd=viewasset&id='.base64_encode($q));
			}elseif($this->getRPCresults("listassetbalancesbyaddress", $q))
			{
				header('Location: ./?cmd=viewholder&id='.$q);
			}else{
				header('Location: ./');
				exit();
			}
			exit();
		}else{
			header('Location: ./');
			exit();
		}
	}
	
	private function getRPCresults($command, $param = '')
	{
		require_once("rpc.php");
		$rvn = new Raven($this->cfg['rpcUsername'],$this->cfg['rpcPassword'],$this->cfg['rpcHostIP'],$this->cfg['rpcHostPort']);
		return $rvn->$command($param);
	}
}
?>
