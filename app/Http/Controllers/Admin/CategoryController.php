<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Categories;
	use DataTables;

	class CategoryController extends Controller{
	    
	    /** list */
	    	public function list(Request $request){
	    		return view('admin.view.category.list');
	    	}
	    /** list */

	    /** lists */
	    	public function lists(Request $request){
	    		$data = Categories::orderBy('id', 'desc')->get();

	            return Datatables::of($data)
			            ->addIndexColumn()
		                ->addColumn('action', function($row){
		                    $btn = '<a href="'.route('admin-category-edit', ['id' => base64_encode($data->id)]).'" class="edit btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
		                    		<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" onclick="delete_record(this);" data-id="'.base64_encode($data->id).'" ><i class="fas fa-trash"></i></a>';
		                    return $btn;
		                })
		                ->rawColumns(['action'])
		                ->make(true);
	    	}
	    /** lists */

	    /** add */
	    	public function add(Request $request){	
		    	return view('admin.view.category.crud');	
	    	}
	    /** add */

	    /** insert */
	    	public function insert(Request $request){
				$this->validate(request(), [
                    'name' => ['required', 'string', 'max:255']
                ]);

                $crud = array(
                    'name' => ucfirst($request->name),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
        
                $last_id = Categories::create($crud)->id;
        
                if($last_id > 0){
					return redirect()->route('admin.category.list')->with('success', 'Record added successfully.');
                }else{
                	return redirect()->back()->with('error', 'Failed to add record.')->withInput();
                }	    		
	    	}
	    /** insert */

	    /** edit */
	    	public function edit(Request $request, $id){
				return view('admin.view.category.crud');    		
	    	}
	    /** edit */

	    /** update */
	    	public function update(Request $request, $id){
	    		
	    	}
	    /** update */

	    /** delete */
	    	public function delete(Request $request){
	    		if(!$request->ajax()){
                    exit('No direct script access allowed');
                }
        
                if(!empty($request->all())){
                    $id = base64_decode($request->id);
        
                    $delete = Categories::delete($id);
        
                    if($delete){
                        return json_encode(['code' => 200]);
                    }else{
                        return json_encode(['code' => 201]);
                    }
                }else{
                    return json_encode(['code' => 200]);
                }
	    	}
	    /** delete */

	}
