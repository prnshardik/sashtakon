<?php

	if(!function_exists('_setting')){
		function _setting($key){
			$data = \DB::table('settings')->select('value')->where(['key' => $key, 'status' => 'Y'])->first();

			if(!empty($data))
				return $data->value;
			else
				return null;
		}
	}

	if(!function_exists('_footer_text')){
		function _footer_text(){
			$value = _setting('footer_title');

			if($value != false)
				return date('Y').' @ '.$value;
			else
				return date('Y').' @ Sashtakon | Designe and developed by <a ref="www.cypherocean.com" target="_blank">Cypher Ocean</a>';
		}
	}

?>