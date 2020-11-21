<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Categories;
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
	    		$data = \DB::table('products as p')
                                ->select('p.id', 'p.name', 'p.category_id', 'p.status',
                                            \DB::Raw("CASE 
                                                        WHEN ".'p.is_featured'." = 'Y' THEN 'Yes' 
                                                        ELSE 'No'
                                                    END as is_featured
                                                    "),
                                			'c.name as category_name'
                                		)
                                ->leftjoin('categories as c', 'c.id', 'p.category_id')
                                ->orderBy('p.id', 'desc')
                                ->get();

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
	    		$categories = Categories::select('id', 'name')->get();	
		    	return view('admin.view.product.crud', ['categories' => $categories]);	
	    	}
	    /** add */

	    /** insert */
	    	public function insert(Request $request){
				$this->validate(request(), [
                    'name' => ['required', 'string', 'max:255'],
                    'sort_description' => ['required', 'max:255'],
                    'description' => ['required'],
                    'category_id' => ['required'],
                    'is_featured' => ['required'],
                    'image' => ['required']
                ]);

                $crud = array(
                    'name' => ucfirst($request->name),
                    'sort_description' => $request->sort_description,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'is_featured' => $request->is_featured,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                if(!empty($request->file('image'))){
                    $file = $request->file('image');
                    $filenameWithExtension = $request->file('image')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $filenameToStore = time()."_".$filename.'.'.$extension;

                    $folder_to_upload = public_path().'/uploads/product/';

                    if (!\File::exists($folder_to_upload)) {
                        \File::makeDirectory($folder_to_upload, 0777, true, true);
                    }

                    $crud["image"] = $filenameToStore;
                }else{
                    $crud["image"] = 'default.png';
                }
        
                $last_id = Products::create($crud)->id;
        
                if($last_id > 0){
                	if(!empty($request->file('image'))){
                        $file->move("uploads/product/", $filenameToStore);
                    }
					return redirect()->route('admin.product.list')->with('success', 'Record added successfully.');
                }else{
                	return redirect()->back()->with('error', 'Failed to add record.')->withInput();
                }	    		
	    	}
	    /** insert */

	    /** edit */
	    	public function edit(Request $request, $id){
	    		$id = base64_decode($id);
	    		$categories = Categories::select('id', 'name')->get();
	    		$data = Products::find($id);

				return view('admin.view.product.crud', ['data' => $data, 'id' => $id, 'categories' => $categories]);    		
	    	}
	    /** edit */

	    /** update */
	    	public function update(Request $request, $id){
	    		$exst_rec = Products::where('id', $id)->first();

	    		$this->validate(request(), [
                    'name' => ['required', 'string', 'max:255'],
                    'sort_description' => ['required', 'max:255'],
                    'description' => ['required'],
                    'category_id' => ['required'],
                    'is_featured' => ['required']
                ]);

                $crud = array(
                    'name' => ucfirst($request->name),
                    'sort_description' => $request->sort_description,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'is_featured' => $request->is_featured,
                    'updated_at' => date('Y-m-d H:i:s')
                );

				if(!empty($request->file('image'))){
                    $file = $request->file('image');
                    $filenameWithExtension = $request->file('image')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $filenameToStore = time()."_".$filename.'.'.$extension;

                    $folder_to_upload = public_path().'/uploads/product/';

                    if (!\File::exists($folder_to_upload)) {
                        \File::makeDirectory($folder_to_upload, 0777, true, true);
                    }

                    $crud["image"] = $filenameToStore;
                }else{
                    $crud["image"] = $exst_rec->profile;
                }
        
                $update = Products::where(['id' => $id])->update($crud);
        
                if($id){
                	if(!empty($request->file('profile'))){
                        $file->move("uploads/product/", $filenameToStore);
                    }
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
