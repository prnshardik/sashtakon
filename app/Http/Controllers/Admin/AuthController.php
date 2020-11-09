<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Hash, Auth, Mail;
    use App\Models\User;
    use App\Models\Email_templates;


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
                    $token = md5(time());
        
                    $link = route('reset-password', ['token' => $token, 'email_token' => base64_encode($user->email), 'user_token' => base64_encode($user->id)]);
                    $time = date("Y-m-d H:i:s", strtotime('+1 hours'));
    
                    $crud = array(
                        'user_id' => $user->id,
                        'token' => $token,
                        'expire_time' => $time,
                        'created_at' => date('Y-m-d H:i:s')
                    );
    
                    DB::table('reset_password')->insert($crud);
    
                    $logo_url = _get_site_logo('header_logo');
                    $footer_text = _footer_text();
    
                    $content = (object)[];
                    $content->obj_name = $user->first_name.' '.$user->last_name;
                    $content->obj_link = $link;
    
                    $body_content = _email_template('forget_password', $content);
                    
                    // $send_mail_from = _setting('site_mail_email');
                    // $admin_recieve_mail = _setting('mail_send_signup');
    
                    // $content->body = _header_footer($logo_url, $body_content->email_title, $body_content->html, $footer_text);
                    // $content->to = $request->email;
                    // $content->from = $send_mail_from;
                    // $content->subject = $body_content->email_subject;
                    
                    // $content = (array)$content;
                    
                    // Mail::send([], [], function ($message) use ($content) {
                    //     $message->to($content['to'])
                    //         ->from($content['from'])
                    //         ->subject($content['subject'])
                    //         ->setBody($content['body'], 'text/html');
                    // });
    
                    return redirect()->back()->with(['success' => "We have sent you a reset password link to your registered email id."]);    
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
