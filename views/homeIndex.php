<?php
$webPage->setHome(true);
$projects = '
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>Project</th>
			<th style="text-align:center;">hosts</th>
			<th style="text-align:center;">mag</th>
		</tr>
';

$webPage->appendHomeBody('
	'.($this->view->online != '1'?'
		'.Bootstrap_Callout::error($this->view->onlineMessage).'		
	':'').'		
	<div class="row">
		<div class="col-sm-6 rowpad">
			<div class="embed-responsive embed-responsive-16by9" style="border:1px solid #ccc;"><iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/jm2E6pQ-Ifw" frameborder="0" allowfullscreen></iframe></div>
		</div>
		<div class="col-sm-6 rowpad">
			<div class="embed-responsive embed-responsive-16by9" style="border:1px solid #ccc;"><iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/Ws4BUte-2b8" frameborder="0" allowfullscreen></iframe></div>
		</div>
	</div>
');
$webPage->append('
	<div class="row rowpad">
		<div class="col-sm-6">
			'.Bootstrap_Callout::info('
				<h3>Gridcoin Client</h3>
				<table class="table table-striped table-hover table-condensed">
					<tr><td>Version</td><td style="text-align:right;" id="version">'.$this->view->superblockData->version.'</td></tr>
					<tr><td>Last Superblock</td><td style="text-align:right;" id="lastSuperblock">'.$this->view->superblockData->block.'</td></tr>
					<tr><td>Superblock Age</td><td style="text-align:right;" id="superblockAge">'.$this->view->superblockData->ageText.'</td></tr>
					<tr><td>Pending Superblock</td><td style="text-align:right;" id="pendingSuperblock">'.($this->view->superblockData->pending==0?'':$this->view->superblockData->pending).'</td></tr>
					<tr><td>Network Magnitude</td><td id="poolMag" style="text-align:right;">
						'.implode('<br/>',array_map(function($arr,$key) {
						return (count($this->view->superblockData->mag)>1?'#'.($key+1):'').' '.$arr.'';
						},$this->view->superblockData->mag,array_keys($this->view->superblockData->mag)))
					.'</td></tr>
					<tr><td>Network Whitelist Count</td><td id="whiteListCount" class="text-right">'.$this->view->superblockData->whiteListCount.'</td></tr>
				</table>					
			',true).'		
		</div>
		<div class="col-sm-6">
			'.Bootstrap_Callout::info('		
				<h3>Pool Details</h3>
				<table class="table table-striped table-hover table-condensed rowpad">
					<tr><td>Pool CPIDs</td><td style="text-align:right;">
						'.implode('<br/>',array_map(function($arr,$key) {
							return '#'.($key+1).' '.$arr.'<br/>
								<i class="fa fa-external-link"></i> <a href="'.GrcPool_Utils::getCpidUrl($arr).'">stats</a>
								|
								<i class="fa fa-external-link"></i> <a href="http://boinc.netsoft-online.com/e107_plugins/boinc/get_user.php?cpid='.$arr.'&format=xml">Netsoft</a>
							';
						},$this->view->cpids,array_keys($this->view->cpids))).'						
					</td></tr>					
					<tr><td>Magnitude</td><td style="text-align:right;">
						'.implode('<br/>',array_map(function($arr,$key) {
						return (count($this->view->mags)>1?'#'.($key):'').' '.$arr.'';
						},$this->view->mags,array_keys($this->view->mags))).'
						'.(count($this->view->mags)>1?'<div style="border-top:1px solid black;"><strong>'.array_sum($this->view->mags).'</strong></div>':'').'
					</td></tr>					
					<tr><td>Total Paid Out</td><td class="text-right">'.$this->view->totalPaidOut.' GRC</td></tr>
					<tr><td>Pool Fee</td><td style="text-align:right;">'.$this->view->txFee.' GRC per payout</td></tr>
					<tr><td>Min Pool Payout</td><td style="text-align:right;">'.$this->view->minPayout.' GRC</td></tr>
					<tr><td>Min POR Balance <a href="#" data-toggle="tooltip" title="This is the minimum balance from POR needed to update the amount owed."><i style="color:black;" class="fa fa-info-circle"></i></a></td><td style="text-align:right;">'.$this->view->minStake.' GRC</td></tr>
					<tr><td>Pool Whitelist Count</td><td style="text-align:right;">'.$this->view->poolWhiteListCount.'</td></tr>
					<tr><td>Number of Active Projects</td><td style="text-align:right;">
						'.implode('<br/>',array_map(function($arr,$key) {
						return (count($this->view->activeHosts)>1?'#'.($key):'').' '.number_format($arr,0).'';
						},$this->view->activeHosts,array_keys($this->view->activeHosts))).'
					</td></tr>
				</table>
				<div class="text-right"><a href="/report/poolBalance">pool financials &raquo;</a></div>
			',true).'
		</div>
	</div>
');
// SOME DAY PUSH THE DATA VIA NODEJS												
// $webPage->appendScript('
// 	<script>
// 		$.get( "/api/superBlockAge", function( data ) {
// 			$("#version").html(data.version);
// 			$("#lastSuperblock").html(data.block);
// 			$("#superblockAge").html(data.ageText);
// 			$("#poolMag").html("#1 "+data.mag[0]+"<br/>#2 "+data.mag[1]);
// 			$("#whiteListCount").html(data.whiteListCount);
// 			if (data.pending) {
// 				$("#pendingSuperblock").html(data.pending);
// 			}
// 		});
// 		$(\'[data-toggle="tooltip"]\').tooltip();		
// 	</script>
// ');
