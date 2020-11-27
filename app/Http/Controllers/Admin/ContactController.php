<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\ContactUs;
	use DataTables;

	class ContactController extends Controller{
	    
	    /** list */
	    	public function list(Request $request){
	    		return view('admin.view.contact.list');
	    	}
        /** list */

        /** lists */
	    	public function lists(Request $request){
				$data = ContactUs::select('id', 'name', 'phone', 'email', 'subject', 
										\DB::Raw("SUBSTRING(".'message'.", 1, 25) as message")	 
									)
									->orderBy('id', 'desc')->get();

	            return Datatables::of($data)
			            ->addIndexColumn()
		                ->addColumn('action', function($data){
		                    $btn = '<a href="'.route('admin.contact.view', ['id' => base64_encode($data->id)]).'" class="edit btn btn-success btn-sm"><i class="fa fa-eye"></i></a>';
		                    return $btn;
		                })
		                ->rawColumns(['action'])
		                ->make(true);
	    	}
        /** lists */
        
        /** edit */
	    	public function view(Request $request, $id){
	    		$id = base64_decode($id);
	    		$data = ContactUs::find($id);

				return view('admin.view.contact.view', ['data' => $data, 'id' => $id]);    		
	    	}
	    /** edit */
    }