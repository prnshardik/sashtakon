<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Hash, Auth;
    use App\Models\User;

    class AuthController extends Controller{
        
        /** login */
            public function login(Request $request){
                return view('admin.view.login');
            }
        /** login */

        /** signin */
            public function signin(Request $request){
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

                if($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $email = $request->email;
                $password = $request->password;

                $auth = \Auth::attempt(['email' => $email, 'password' => $password]);
                
                if($auth){
                    return redirect()->route('admin');
                }else{
                    return redirect()->back()->with('error', 'Please check credentials.');
                }
            }
        /** signin */

        /** forget */
            public function forget(Request $request){
                return view('admin.view.forger');
            }
        /** forget */

        /** reset */
            public function reset(Request $request){
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email'
                ]);

                if($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $email = $request->email;

                $user = User::where(['email' => $email])->first();

                if(!$user){
                    return redirect()->back()->withErrors(['email' => 'Please enter correct email']);
                }else{
                    dd($user);    
                }            
            }
        /** reset */

        /** reset */
            public function reset_password(Request $request){
                dd($request->all());
            }
        /** reset */

        /** logout */
            public function logout(){
                Auth::logout();
                return redirect()->route('admin.login');
            }
        /** logout */
    }
