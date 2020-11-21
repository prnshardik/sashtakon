<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Products;
	use DataTables;

	class ProductController extends Controller{
	    
	    /** list */
	    	public function list(Request $request){
	    		return view('admin.view.product.list');
	    	}
	    /** list */

	    /** lists */
	    	public function lists(Request $request){
	    		$data = Products::orderBy('id', 'desc')->get();

	            return Datatables::of($data)
			            ->addIndexColumn()
		                ->addColumn('action', function($data){
		                    $btn = '<a href="'.route('admin.product.edit', ['id' => base64_encode($data->id)]).'" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
		                    		<a href="javascript:void(0);" class="delete btn btn-danger btn-sm" onclick="delete_record(this);" data-id="'.base64_encode($data->id).'" ><i class="fa fa-trash"></i></a>';
		                    return $btn;
		                })
		                ->rawColumns(['action'])
		                ->make(true);
	    	}
	    /** lists */

	    /** add */
	    	public function add(Request $request){	
		    	return view('admin.view.product.crud');	
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
        
                $last_id = Products::create($crud)->id;
        
                if($last_id > 0){
					return redirect()->route('admin.category.list')->with('success', 'Record added successfully.');
                }else{
                	return redirect()->back()->with('error', 'Failed to add record.')->withInput();
                }	    		
	    	}
	    /** insert */

	    /** edit */
	    	public function edit(Request $request, $id){
	    		$id = base64_decode($id);
	    		$data = Products::find($id);

				return view('admin.view.product.crud', ['data' => $data, 'id' => $id]);    		
	    	}
	    /** edit */

	    /** update */
	    	public function update(Request $request, $id){
	    		$this->validate(request(), [
                    'name' => ['required', 'string', 'max:255']
                ]);

                $crud = array(
                    'name' => ucfirst($request->name),
                    'updated_at' => date('Y-m-d H:i:s')
                );
        
                $update = Products::where(['id' => $id])->update($crud);
        
                if($id){
					return redirect()->route('admin.product.list')->with('success', 'Record updated successfully.');
                }else{
                	return redirect()->back()->with('error', 'Failed to updated record.')->withInput();
                }		
	    	}
	    /** update */

	    /** delete */
	    	public function delete(Request $request){
	    		if(!$request->ajax()){
                    exit('No direct script access allowed');
                }
        
                if(!empty($request->all())){
                    $id = base64_decode($request->id);

                    $delete = Products::where(['id' => $id])->delete();
        
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
