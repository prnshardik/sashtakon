<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Hash, Auth, Mail;
    use App\Models\User;
    use App\Models\Email_templates;
    use DB;

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
                return view('admin.view.forget');
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
                    $token = md5(time());
        
                    $link = route('admin.reset_password', ['token' => $token, 'email_token' => base64_encode($user->email), 'user_token' => base64_encode($user->id)]);
                    $time = date("Y-m-d H:i:s", strtotime('+1 hours'));
    
                    $crud = array(
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => date('Y-m-d H:i:s')
                    );
    
                    DB::table('password_resets')->insert($crud);

                    return redirect()->back()->with(['success' => "We have sent you a reset password link to your registered email id."]);    
                }            
            }
        /** reset */

        /** reset-password */
            public function reset_password(Request $request){
                if(!isset($request->token) || !isset($request->email)){
                    return redirect()->back()->with(['error' => "Something went wrong."]);
                }

                $token = $request->token;
                $email = base64_decode($request->email);
    
                $data = DB::table('reset_password')
                                ->select('*')
                                ->where('token', $token)
                                ->where('email', $email)
                                ->first();
                        
                if(!empty($data)){
                    $data = ['code' => '200', 'data' => $email, 'id' => $user_token];
                    return view("front.views.auth.reset_password", compact('data'));
                }else{
                    $data = ['code' => '201', 'data' => 'Something went wrong.'];
                    return view("admin.view.reset", compact('data'));
                }
            }
        /** reset-password */

        /** password-reset */
            public function password_reset(Request $request){
                $this->validate($request, [
                    'id' => 'required',
                    'password' => 'required|min:7',
                    'confirm_password' => 'required|same:password'
                ], [
                    'password.min' => 'The new password must be at least 7 characters.',
                    'confirm_password.same' => 'The confirm password and new password must match.'
                ]);

                $id = $request->id;
                $password = $request->password;
                $confirm_password = $request->confirm_password;
                
                $user = DB::table('users')->select('users.*')->where('id', $id)->first();

                if(Hash::check(trim($password), $user->password)){
                    return redirect()->back()->with('error', 'New password cant be same as old password.');
                }else{
                    $delete = \DB::table('reset_password')->where('user_id', $id)->delete();
        
                    if($delete){
                        $crud = array('password' => Hash::make(trim($password)), 'updated_at' => date('Y-m-d H:i:s'));

                        DB::table('users')->where('id', $id)->limit(1)->update($crud);

                        return redirect()->route('admin.login')->with(['success' => "Your password has been updated."]);
                    }else{
                        return redirect()->back()->with('error', 'Something went wrong.');
                    }
                }
            }
        /** password-reset */

        /** logout */
            public function logout(){
                Auth::logout();
                return redirect()->route('admin.login');
            }
        /** logout */
    }
