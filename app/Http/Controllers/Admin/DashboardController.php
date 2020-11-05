<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class DashboardController extends Controller{
        
        /** index-dashboard */
            public function index(){
                return view('admin.view.index');
            }
        /** index-dashboard */

        /** profile */
            public function profile(){
                return view('admin.view.profile.index');
            }
        /** profile */

        /** change-password */
            public function change_password(){
                dd($request->all());
            }
        /** change-password */

    }
