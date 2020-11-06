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
		                    $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
		                    		<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
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
	    	public function delete(Request $request, $id){
	    		
	    	}
	    /** delete */

	}
