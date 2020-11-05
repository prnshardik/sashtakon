<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Setting;

	class SettingController extends Controller{
	    
	    /** index */
	    	public function index(Request $request){

	    		$generals = Setting::where(['type' => 'general'])->get()->toArray();
	    		$smtps = Setting::where(['type' => 'smtp'])->get()->toArray();
	    		$logos = Setting::where(['type' => 'logo'])->get()->toArray();

	    		return view('admin.view.settings.index', ['generals' => $generals, 'smtps' => $smtps, 'logos' => $logos]);
	    	}
	    /** index */

	    /** setting-update */
		    public function setting_update(Request $request){
		    	dd($request->all());
		    }
	    /** setting-update */

	    /** setting-logo-update */
		    public function setting_logo_update(Request $request){
		    	dd($request->all());
		    }
	    /** setting-logo-update */
	    
	}
