
flowerphp

# sample -> file copy

<?php

$args = var::args();

$args->sort = TRUE;

$args->from = array('a.txt','b.txt','c.txt','d.txt');

$args->to = array('a_copy.txt','b_copy.txt','c_copy.txt','d_copy.txt');

file::copy($args);

?>

# sample -> is_exist?

<?php

$args = var::args();

$args->from = 'read.txt';

file::exist($args);

?>

# sample -> unzip zlib

<?php

$args = va::args();

$args->path = dir::root().'/convert';

$args->show_sub = TRUE;

$args->show_path = TRUE;

$tmp_convert = dir::list($args);


foreach($tmp_convert as $key=>$val){

	$args = va::args();
	
	$args->from = $val;
	
	$args->to = $val.'.mp3';
	
	zlib::unzip($args);
	
}

?>


function for parser

=> view parser.php

<?php

$code = '

text "text";

msgbox "message";

';

$code_len = strlen($code);

for($i=0;$i<=$code_len;$i++){

	if(substr($code,$i,1)=="\w\n"){
	
		$i = $i+1;
		
	}
	
	if(substr($code,$i,1)=="\t"){
	
		$i = $i+1;
		
	}
	
	if(substr($code,$i,1)==" "){
	
		$i = $i+1;
		
	}
	
	if(substr($code,$i,5)=="text "){
	
		$i = $i+5;
		
		$func_end = strpos($code,";",$i)+1;
		
		$func_code = substr($code,$i,$func_end-$i);
		
		$str_i = strpos($code,'"')+1;
		
		$str_z = strpos($code,'"',$str_i);
		
		$variable_name = substr($code,$str_i,$str_z-$str_i);
		
		echo $variable_name;
		
	}
	
	if(substr($code,$i,7)=="msgbox "){
	
		$i = $i+7;
		
		$func_end = strpos($code,";",$i)+1;
		
		$func_code = substr($code,$i,$func_end-$i);
		
		$str_i = strpos($func_code,'"')+1;
		
		$str_z = strpos($func_code,'"',$str_i);
		
		$variable_name = substr($func_code,$str_i,$str_z-$str_i);
		
		echo '<script>'.'alert("'.$variable_name.'");</script>';
		
	}
	
}
