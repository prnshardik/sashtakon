<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	class SettingController extends Controller{
	    
	    /** index */
	    	public function index(Request $request){
	    		return view('admin.view.settings.index');
	    	}
	    /** index */
	}
