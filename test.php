<?php
if(isset($_GET['do']) || isset($argv[1]) );
	
else
	exit(0);
ini_set('memory_limit','2024M');
set_time_limit(-1);
@ini_set('max_execution_time',-1);


$tmpPath="/home/bazy/perl5/";
$path="/home/bazy/mail/bazy.com.sa/";

$initX=0;
$x=0;

$results=explode("|",file_get_contents($tmpPath."ls.tmp"));

foreach ($results as $result) {
		$x++;
		if($x>0 && intval($x % 50)==0)
			$initX=$x;
		
		if($x==200 || $x==250);
		else continue;
			
		$cTmpPath=$tmpPath.$initX;
		if(!is_dir($cTmpPath))
			mkdir($cTmpPath,0777);

		$cTmpPath.="/";
		
        echo $result.'\n';
		
		$f=$cTmpPath.$result .".tmp";
		
		exec( "zip -r ".$f." ".$path.$result);
		
		$myfile = fopen("/home/bazy/perl5/last.tmp", "w+") or die("Unable to open file!");
		$txt = $initX."/".$result;
		fwrite($myfile, $txt); 
		fclose($myfile);
		sleep(1);
		 
		
    
}

?>
