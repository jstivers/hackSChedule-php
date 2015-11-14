<?php


//returns approximate time
//takes in a building string (example: "VKC305")
//returns -1 if Building not found
function locationTime($building_1, $building_2){
	//creates acronym out of the string
	$start=preg_replace("/[^a-zA-Z]+/", "", $building_1);
	$end=preg_replace("/[^a-zA-Z]+/", "", $building_2);

	
	$humanities=array('1','SHC','URC','FWH','UUC','LUC','CSS','MUS',
		'BMH','CTV','SSS','RHM','CTC','LPB','HOH');
	$vkc = array('2','VKC','SOS','WPH','CAS','THH');
	$parkside=array('4','SGM','GFS','HNB','KAP','MCB','CWT','CWO','HRC','DRB','OHE',
		'BHE','VHE','HED','PCE','RTH','SSC','SSL','EEB','SAL','PHE','SCA');
	$mhp=array('3','RRB','LIS','OCW','LHI','SHS','CEM','SCI','HAR','MHP');
	$law=array('5','AHF','ACC','BRI','HOH','LAW','RGL','SAS','JKP');

	$map=array($humanities,$vkc,$parkside,$mhp,$law);
	for($a=0;$a<sizeof($map);$a++){
		for($b=0;$b<sizeof($map[$a]);$b++){
			if($map[$a][$b]==$start){
				$start=$map[$a][0];
			}
			if($map[$a][$b]==$end){
				$end=$map[$a][0];
			}
		}
	}
	$start=intval($start);
	$end=intval($end);

	if($start ==0 || $end ==0){
		return -1;
	}


	if(($start==4 || $end == 4)&&($start == 5 || $end == 5)){
		return 6;
	}

	$dif=abs($start-$end);

	if($dif<=1){
		return 3;
	}
	else if($dif==2){
		return 6;
	}
	else{
		return 10;
	}

}

?>