<?php

    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Products;
    use App\Models\Categories;
    use App\Models\Subscription;
    use App\Models\ContactUs;

    class UserController extends Controller{

        /** index-dashboard */
            public function index(){
                $data = [];
                $product_url = url('/').'/uploads/product/';
                $categories = Categories::all();
                
                if($categories->isNotEmpty()){
                    foreach($categories as $row){                        
                        $product = Products::select('id', 'category_id', 'name', 'description',
                                                    \DB::Raw("SUBSTRING(".'sort_description'.", 1, 25) as sort_description"),
                                                    \DB::Raw("CONCAT(".'"'.$product_url.'"'.", ".'image'.") as image")
                                                )
                                            ->where(function ($query) {
                                                    $query->where('is_featured', '=', 'Y')
                                                        ->orWhere('is_featured', '=', 'N');
                                            })
                                            ->where(['category_id' => $row->id])
                                            ->first();
                        
                        if(!empty($product))
                            $data[] = $product;
                    }
                }

                return view('user.view.index', ['data' => $data]);
            }
        /** index-dashboard */

        /** product */
            public function product(){
                $data = [];
                $product_url = url('/').'/uploads/product/';
                $categories = Categories::all();

                if($categories->isNotEmpty()){
                    foreach($categories as $row){                        
                        $product = Products::select('id', 'category_id', 'name', 'description',
                                                    \DB::Raw("SUBSTRING(".'sort_description'.", 1, 25) as sort_description"),
                                                    \DB::Raw("CONCAT(".'"'.$product_url.'"'.", ".'image'.") as image")
                                                )
                                            ->where(function ($query) {
                                                    $query->where('is_featured', '=', 'Y')
                                                        ->orWhere('is_featured', '=', 'N');
                                            })
                                            ->where(['category_id' => $row->id])
                                            ->get();
                        
                        if(!empty($product))
                            $row->products = $product;
                    }
                }

                return view('user.view.product', ['data' => $categories]);
            }
        /** $categories */

        /** subscribe */
            public function subscribe(Request $request){
                $this->validate(request(), [
                    'email' => ['required', 'unique:subscription']
                ]);

                $crud = array(
                    'email' => $request->email,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
        
                $last_id = Subscription::create($crud)->id;
        
                if($last_id > 0){
					return redirect()->back()->with('success', 'Subscription successfully, Thank you.');
                }else{
                	return redirect()->back()->with('error', 'Something went wrong..')->withInput();
                }
            }
        /** subscribe */

        /** contact-us */
            public function contact_us(Request $request){
                $this->validate(request(), [
                    'name' => ['required'],
                    'phone' => ['required'],
                    'email' => ['required', 'unique:subscription'],
                    'subject' => ['required'],
                    'message' => ['required']
                ]);

                $crud = array(
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
        
                $last_id = ContactUs::create($crud)->id;
        
                if($last_id > 0){

                    $notiCrud = [
                                    'notification' => $request->name.' filled contect form',
                                    'link' => 'link',
                                    'is_read' => 'N',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                ];

                    \DB::table('notification')->insert($notiCrud);

                    return redirect()->back()->with('success', 'Thank you for contact us.');
                }else{
                    return redirect()->back()->with('error', 'Something went wrong..')->withInput();
                }
            }
        /** contact-us */

        /** terms */
            public function terms(){
                return view('user.view.terms');
            }
        /** terms */

        /** privacy */
            public function privacy(){
                return view('user.view.privacy');
            }
        /** privacy */

        /** licence */
            public function licence(){
                return view('user.view.licence');
            }
        /** licence */

    }
