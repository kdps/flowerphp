<?php

class str
{
	
	public static function round_up($args) 
	{
		$value = $args->value;
		$places = $args->places;
		
		$mult = pow(10, abs($places)); 
		 return $places < 0 ?
		ceil($value / $mult) * $mult :
			ceil($value * $mult) / $mult;
	}
	
	function getUrl($args){
		$return_url = NULL;
		$func_num = func_num_args();
		$func_get = func_get_args();
		if($func_get[0]==NULL){
			$i=1;
			while($i<$func_num)
			{
				if($return_url)
				{
					if(isset($func_get[$i+1]))
					{
						$return_url .= '&'.$func_get[$i].'='.$func_get[$i+1];
					}
				}
				else
				{
					$return_url .= 'index.php?';
					$return_url .= $func_get[$i].'='.$func_get[$i+1];
				}
				$i = $i+2;
			}
		}else{
			$i=0;
			$get_tmp = $_GET;
			
			while($i<$func_num)
			{
				if($func_get[$i+1]==''){
					unset($get_tmp[$func_get[$i]]);
				}elseif(isset($func_get[$i+1])){
					$get_tmp[$func_get[$i]] = $func_get[$i+1];
				}
				
				$i = $i+2;
			}
			
			foreach($get_tmp as $key=>$val){
				if($return_url){
					$return_url .= '&'.$key.'='.$val;
				}else{
					$return_url .= 'index.php?';
					$return_url .= $key.'='.$val;
				}
			}
		}
		return $return_url;
	}
	
	public static function filter_string($data,$encoding='UTF-8')
	{
	   return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
	}
	
}
