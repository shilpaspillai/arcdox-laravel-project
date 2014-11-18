<?php
class userController extends BaseController{
    
    public $usermodel = null;
    public $training = null;
    public $company_obj=null;

    public function __construct()
    {
        $this->usermodel =new User();
        $this->training = new Training();
        $this->company_obj = new Companydetail();
    }
    
    public function show_login_page()
    {
        return View::make('login');
    }

    public function view_admin_dashboard()
    {     
        return View::make('admin.dashboard'); 
    }
    
    public function view_user_dashboard()
    {
        return View::make('user.dashboard');
    }
    
    public function view_training_section()
    {
        $data = $this->training->get_training_detail();
        return View::make('user.all_trainings')->with('data',$data);   
    }

    public function registeration_section()
    {
        $data = DB::table('companydetails')->select('company_name','id')->get();
       
        return View::make('user_registeration_page')->with('data', $data);
    }
        
    public function process_registeration()
    {
        $firstname=Input::get('first_name');
        $surname=Input::get('sur_name');   
        $email=Input::get('email');
        $profession=Input::get('usr_profession'); 
        $companyid=Input::get('company');
        $pass=Input::get('usrpassword');
        $new_company_name=Input::get('new_company'); 
            
            $data=$this->usermodel->insert_user_detail($firstname,$surname,$email,$profession,$companyid,$pass,$new_company_name);
            if($data)      
            {return  Redirect::Route('user_registeration')->with('message','Registeration Successful');}
            else
            {return  Redirect::Route('user_registeration')->with('message','Registeration Failed');}
    }
        
    public function is_email_exist()
    {
        if(isset($_GET['cemail']))
        {
        $user = DB::table('users')->where('email',$_GET['cemail'])->first();
        if($user)
        return "Email already exist";
        else{return "valid";}
        }
    }
    
    public function is_user_email_exist()
    {
        if(isset($_POST['cemail']))
        {
        $user=DB::table('users')->where('email',$_POST['cemail'])->first();
        if($user)
        {$result=array('status'=>true,'message' => 'email is valid','password_reset_link' => "<a href=".URL::to('user/password/reset/'.$user->password_reset_token)."> <h4>click here to reset password</h4></a>");
        die(json_encode($result));
        }
        else {$result=array('status'=>false,'message'=>'user email not exist');
        die(json_encode($result));}
        }
    }
        
        public function is_company_exist()
        {
            if(isset($_GET['company_name']))
            {
                $search_result = DB::table('companydetails')->where('company_name',$_GET['company_name'])->first();
                if($search_result)
                {$result=array('status'=>true,'message'=>'company name already exist');
                die(json_encode($result));}
                 else{
                  $result=array('status'=>false);
                  die(json_encode($result));
                  }
              }
        }
        public function process_login()
        {
            $email=Input::get('email');
            $pass=Input::get('password');
            $password = Hash::make($pass);

            if(Auth::attempt(array('email' => $email, 'password' => $pass)))
            {     
                $data = DB::table('users')->where('email', $email)->first();
                Session::put('email', $email);
                Session::put('id', $data->id);
                Session::put('role', $data->role);
                Session::put('firstname', $data->firstname);
                $role=Session::get('role');
                    if($role==ROLE_ADMIN)
                        {return Redirect::Route('admin_dashboard');}
                            else{return Redirect::Route('user_dashboard');}
            }
            else
            {
            return  Redirect::Route('login')->with('message','Incorrect Email or Password')->withInput();
            }
        }
 
        public function member_register()
        {
            return View::make('user');
        }
   
        public function logout()
        {
            Session::flush();
            return View::make('login');
        }

        public function training_section()
        {
            return View::make('admin.training.add'); 
        }

        public function check_email()
        {
            
        }
      
        public function process_training_data()
        {  
          
            $title=Input::get('tr_title');
            $des=Input::get('tr_description');
            $mimetype=Input::file('image')->getClientMimeType();
            $type=explode("/",$mimetype);
            if($type[0] == 'image')
            {
            $filename=date('dmYHis').Input::file('image')->getClientOriginalName();
            $path=Input::file('image')->move(ROOT_PATH.'/assets/upload/',$filename);
                $training=DB::table('trainings')->insert( array('tr_title'=>$title,'tr_description'=>$des,'tr_image'=>$filename));
                    if($training)
                    {
                    return  Redirect::Route('admin_training_list')->with('message','New Training Details Added successfully');    
                    }
                    else
                    {
                    die('xyoi');
                    }
            }
            else{
            return  Redirect::Route('admin_training_add')->with('message','choose image file only');    
            }
        }
        public function show_training_list()
        {
            return View::make('admin.training.list');    
        }
        public function edit_training($id)
        {
            $user=DB::table('trainings')->where('id',$id)->first();
            return View::make('admin.training.edit',array('user'=>$user)); 
        }
        
        public function delete_training($id)
        {
            $delete=$this->training->delete_training_detail($id);
            if($delete){return Redirect::Route('admin_training_list')->with('message',' Training Detail deleted successfully');}   
        }
        
        public function process_editing()
        {
        }
        public function update_training()
        {       
            $title=Input::get('tr_title');
            $des=Input::get('tr_description'); 
            $id=Input::get('update'); 
            if(Input::file('image'))
            {
            $filename=date('dmYHis').Input::file('image')->getClientOriginalName();
            $path=Input::file('image')->move(ROOT_PATH.'/assets/upload/',$filename);
            }
            else {$filename='';}
            
            $data=$this->training->update_training_detail($title,$des,$filename,$id);
            if($data){return Redirect::Route('admin_training_list')->with('message',' Training Details updated successfully');    
            }
            else{return Redirect::Route('admin_training_list')->with('message',' Training Details not updated ');}
        }
        
        
       public function  process_profiledata()
       {
          $id=Session::get('id');  
          $user=DB::table('users')->where('id',$id)->first();
          
          $firstname=Input::get('fname');
          $surname=Input::get('sname');
          $workemail=Input::get('w_email');
          $email=Input::get('p_email');
          $profession=Input::get('profession');
          $linkedin=Input::get('linkedin');
          $twitter=Input::get('twitter');
          $facebook=Input::get('facebook');
          $homeaddress1=Input::get('home_ad1');
          $homeaddress2=Input::get('home_ad2');
          $city=Input::get('city');
          $county=Input::get('c_pcode');
          $country=Input::get('country');
          $telephone=Input::get('tele_num');
          $mobile=Input::get('mob_num');
          
          $company_name=Input::get('cname_br');
          $industry=Input::get('industry');
          $address1=Input::get('address1');
          $address2=Input::get('address2');
          $company_city=Input::get('com_city');
          $company_postcode=Input::get('coun_pcode');
          $company_country=Input::get('c_country');
          $company_telephone=Input::get('c_tele');
          $company_fax=Input::get('c_fax');
          $company_email=Input::get('c_email');
          $company_website=Input::get('c_web');
          $company_linkedin=Input::get('ln_profile');
          $company_twitter=Input::get('tw_profile');
          $company_facebook=Input::get('fb_profile');
          
           $id=Session::get('id'); 
      
           $this->usermodel->update_user_detail($id,$firstname,$surname,$workemail,$email,$profession,$linkedin,$twitter,$facebook,$homeaddress1,$homeaddress2,$city,$county,$country,$telephone,$mobile);
          
            $insert_result=$this->company_obj->insert_company_detail($company_name, $industry, $address1, $address2, $company_city, $company_postcode, $company_country, $company_telephone, $company_fax, $company_email, $company_website, $company_linkedin, $company_twitter, $company_facebook);
            if($insert_result)
            {return Redirect::Route('edit_profile_data')->with('message','User profile updated successfully');    
            }
            else             
            {return Redirect::Route('edit_profile_data')->with('message','profile updation failed');}  
        }
        
       public function profile_section()
       {
            $id=Session::get('id');
            $user=DB::table('users')->where('id',$id)->first();
            $company=DB::table('companydetails')->where('id',$user->company_id)->first();
            return View::make('user.profile',array('user'=>$user,'company'=>$company));   
       }
       
       public function show_profiledata()
       {
            $id=Session::get('id');
            $user=DB::table('users')->where('id',$id)->first();
            $company=DB::table('companydetails')->where('id',$user->company_id)->first();
            return View::make('user.profile_update',array('user'=>$user,'company'=>$company));    
       }
       
       public function show_resetpassword_section()
       {
            return View::make('user.password_reset');   
       }
       
       
       public function process_password_reset()
       {
            $email=Input::get('email');
            $password=Input::get('usrpassword');
            $password_reset_token=Input::get('token'); 
            $reset_result =$this->usermodel->reset_password($password_reset_token, $password);
            if($reset_result)
            { return  Redirect::Route('login')->with('message','password reset successfull');
            }
       }
       
        public function reset_password($password_reset_token)
       {
        $token=$password_reset_token;
        return View::make('user.password_update',array('token'=>$token));   
        //return View::make('user.password_update',array('token'=>$this->usermodel->check_token($password_reset_token)? $password_reset_token:false));   

       }
}