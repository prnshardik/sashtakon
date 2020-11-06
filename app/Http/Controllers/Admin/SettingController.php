<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Setting;
	use DB;

	class SettingController extends Controller{
	    
	    /** index */
	    	public function index(Request $request){

	    		$logo_url = url('/').'/uploads/logo/';

	    		$generals = Setting::where(['type' => 'general'])->get()->toArray();
	    		$smtps = Setting::where(['type' => 'smtp'])->get()->toArray();
	    		$logos = Setting::select('id', 'key', \DB::Raw("CONCAT(".'"'.$logo_url.'"'.", ".'value'.") as value"))->where(['type' => 'logo'])->get()->toArray();

	    		return view('admin.view.settings.index', ['generals' => $generals, 'smtps' => $smtps, 'logos' => $logos]);
	    	}
	    /** index */

	    /** setting-update */
		    public function setting_update(Request $request){
		    	$all = $request->all();
				unset($all['_token']);
				
				if(!empty($all) && count($all) > 0){
					
					\DB::beginTransaction();
					try {
						$i = 0;
						
						foreach($all as $key => $value){
							\DB::table('settings')->where('id', $key)->update(['value' => $value]);
							$i++;
						}
						
						if($i == count($all)){
							\DB::commit();
							return redirect()->back()->with('success', 'Record updated');
						}else{
							\DB::rollback();
							return redirect()->back()->with('error', 'Record update failed');
						}			
					} catch (\Throwable $th) {
						\DB::rollback();
						return redirect()->back()->with('error', 'Record update failed');
					}
				}else{
					return redirect()->back()->with('error', 'Record update failed');
				}
		    }
	    /** setting-update */

	    /** setting-logo-update */
		    public function setting_logo_update(Request $request){
		    	$all = $request->all();
				unset($all['_token']);
				
				if(!empty($all) && isset($all)){
					$data = [];
					foreach($all as $key => $value){
						$image = $request->file($key);
						$image_name = time()."_".rand(1, 999).".".request()->$key->getClientOriginalExtension();
						$data[$key] = $image_name;
					}

					\DB::beginTransaction();
					try {
						if(!empty($data)){
							$i = 0;

							foreach($data as $k => $v){
								DB::table('settings')->where('key', $k)->limit(1)->update(['value' => $v]);
								$i++;
							}

							if($i == count($all)){
								foreach($data as $k => $v){
									$image = $request->file($k);
									$destinationPath = 'uploads/logo';
									$image->move($destinationPath, $v);
								}
								\DB::commit();
								return redirect()->back()->with('success', 'Record updated successfully');
							}else{
								\DB::rollback();
								return redirect()->back()->with('error', 'Record update failed');
							}
						}
					}catch(\Throwable $th) {
						\DB::rollback();
						return redirect()->back()->with('error', 'Record update failed');
					}
				}else{
					\DB::rollback();
					return redirect()->back()->with('error', 'Record update failed');
				}
		    }
	    /** setting-logo-update */
	    
	}
