<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\ContactUs;
	use DataTables;

	class NotificationController extends Controller{
        /** list */
            public function list(Request $request){
                return view("admin.view.notifications.list");
            }
        /** list */

        /** lists */
            public function lists(Request $request){
                $data = \DB::table('notification')
                                        ->select('id', 'notification', 'link', 'created_at as datetime')
                                        ->orderBy('id', 'desc')->get();

                $update = \DB::table('notification')->update(['is_read' => 'Y']);
                
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn("action", function($data) {
                            return '<a href="'.$data->link.'">'.$data->notification.'</a>';
                        })
                        ->rawColumns(["action"])
                        ->make(true);
                
            }
        /** lists */
        
        /** clear */
            public function clear(Request $request){
                if(!$request->ajax()){
                    exit('No direct script access allowed');
                }

                $update = \DB::table('notification')->update(['is_read' => 'Y']);

                if($update)
                    return response()->json(['code' => 200]);
                else
                    return response()->json(['code' => 201]);
            }
        /** clear */

        /** clear-one */
            public function clear_one(Request $request){
                if(!$request->ajax()){
                    exit('No direct script access allowed');
                }

                $id = $request->id;

                $update = \DB::table('notification')->where(['id' => $id])->update(['is_read' => 'Y']);

                if($update)
                    return response()->json(['code' => 200]);
                else
                    return response()->json(['code' => 201]);
            }
        /** clear-one */    
    } 