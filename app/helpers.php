<?php

	/** site logo */
		if(!function_exists('_get_site_logo')){
			function _get_site_logo($key = 'header_logo'){
				$path = url('uploads/logo').'/';
				
				$setting = \DB::table('setting')->select('value')->where(['key' => $key])->first();

				if($setting){
					return $path.$setting->value;
				}else{
					return false;
				}
			}
		}
	/** site logo */

	/** setting-value */
		if(!function_exists('_setting')){
			function _setting($key){
				$data = \DB::table('settings')->select('value')->where(['key' => $key, 'status' => 'Y'])->first();

				if(!empty($data))
					return $data->value;
				else
					return null;
			}
		}
	/** setting-value */

	/** footer-text */
		if(!function_exists('_footer_text')){
			function _footer_text(){
				$value = _setting('footer_title');

				if($value != false)
					return date('Y').' @ '.$value;
				else
					return date('Y').' @ Sashtakon | Designe and developed by <a ref="www.cypherocean.com" target="_blank">Cypher Ocean</a>';
			}
		}
	/** footer-text */

	/** email template */
		if(!function_exists('_email_template')){
			function _email_template($key, $content = ''){

				$response = \DB::table('email_templates')->where(['key' => "$key"])->first();
				
				if(!empty($response)){
					$html = $response->html;
					foreach ($content as $key => $value) {
						$html = str_replace('{'.$key.'}', $value, $html);
					}
					$response->html = $html;
					return $response;
				}else{
					return false;
				}
			}
		}
	/** email template */

	/** email header footer */
        if(!function_exists('_header_footer')){
            function _header_footer($logo = '', $title = '', $body = '', $footer = ''){
                $message = '';
            
                $message .= '
                        <html>
	                        <head>
		                        <title>' . $title . ' </title>
	                        </head>
	                        <body>
		                        <div style="margin: 0;">
		                            <table style="border-collapse: collapse;" border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="">
		                                <tbody>
		                                    <tr>
		                                        <td valign="top">
		                                            <center style="width: 100%;">
		                                                <div style="font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; overflow: hidden; font-family: sans-serif;">&nbsp;</div>
		                                                <div style="max-width: 600px;">
		                                                    <table style="max-width: 600px; background: #fff !important;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center" bgcolor="#f49b23">
		                                                        <tbody>
		                                                            <tr>
		                                                                <td style="background-color: #fff; text-align: center; padding: 15px 0; font-family: sans-serif; font-weight: bold; color: #000000; font-size: 30px;">
			                                                                <a href="javascript:void(0)" style="margin-top: 30px">
			                                                                	<img class="" src="'.$logo.'" style="height: 80px; width: 130px;">
			                                                                </a>
		                                                                </td>
		                                                            </tr>
		                                                        </tbody>
		                                                    </table>
		                                                    <table style="max-width: 600px; border-radius: 5px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
		                                                        <tbody>
		                                                            <tr>
		                                                                <td>
		                                                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
		                                                                        <tbody>
		                                                                            <tr>
		                                                                                <td style="padding: 20px; font-family: sans-serif; line-height: 24px; color: #555555; font-size: 15px;">' . $body . '</td>
		                                                                            </tr>
		                                                                            <tr>
		                                                                                <td>&nbsp;</td>
		                                                                            </tr>
		                                                                        </tbody>
		                                                                    </table>
		                                                                </td>
		                                                            </tr>
		                                                        </tbody>
		                                                    </table>
		                                                    <table style="background-color: #00853E !important; max-width: 600px; border="0" width="100%" cellspacing="0" cellpadding="0"  text-align="left" bgcolor="#00853E">
		                                                        <tbody>
		                                                            <tr>
		                                                                <td style="padding: 15px; padding-bottom: 12px;width: 100%; font-size: 12px; font-family: sans-serif; line-height: 19px; text-align: left; color: #fff;"> ' .$footer. ' 
		                                                               	</td>
		                                                            </tr>
		                                                        </tbody>
		                                                    </table>
		                                                </div>
		                                            </center>
		                                        </td>
		                                    </tr>
		                                </tbody>
		                            </table>
		                            <div class="yj6qo">&nbsp;</div>
		                            <div class="adL">&nbsp;</div>
		                        </div>
		                    </body>
	                    </html>';
                return $message;
            }
        }
	/** email header footer */
	
	/** notificaiton */
		if(!function_exists('_notificaiton')){
			function _notificaiton(){
				$noti = \DB::select("SELECT * FROM `notification` WHERE `is_read` = 'N' ORDER BY id desc LIMIT 5");
				
				if(!empty($noti) && $noti != null){
					$today = \DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
					foreach($noti as $r){
						$to_date = \DateTime::createFromFormat('Y-m-d H:i:s', $r->created_at);
						$r->ago = _day_diff_from_current($today, $to_date);
					}
				}
				
				$noti_count = \DB::select("SELECT * FROM `notification` WHERE `is_read` = 'N'");
				
				return ['notifications' => $noti, 'notifications_count' => $noti_count];
			}
		}
	/** notificaiton */

	/** day-diffrent */
		if (!function_exists('_day_diff_from_current')) {
			function _day_diff_from_current($date1, $date2){
				$interval = $date1->diff($date2);
				if($interval->invert == 1){
					$diff = ' ';
					if ($interval->y != 0) {
						$diff .= $interval->y . ' Yr ';
					}
					if ($interval->m != 0) {
						$diff .= $interval->m . ' mnth ';
					}
					if ($interval->d != 0) {
						$diff .= $interval->d . ' d ';
					}
					if ($interval->h != 0) {
						$diff .= $interval->h . ' h ';
					}
					if ($interval->i != 0) {
						$diff .= $interval->i . ' m ';
					}
					return $diff;
				}else{
					$diff = ' ';
					if ($interval->y != 0) {
						$diff .= $interval->y . ' Yr ';
					}
					if ($interval->m != 0) {
						$diff .= $interval->m . ' mnth ';
					}
					if ($interval->d != 0) {
						$diff .= $interval->d . ' d ';
					}
					if ($interval->h != 0) {
						$diff .= $interval->h . ' h ';
					}
					if ($interval->i != 0) {
						$diff .= $interval->i . ' m ';
					}
					return $diff;
				}
			}
		}
	/** day-diffrent */
?>