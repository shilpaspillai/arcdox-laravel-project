<?php
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Encryption\EncryptionServiceProvider;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;


class User extends Eloquent implements UserInterface, RemindableInterface{
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        protected $fillable = array('email','role','password','firstname','surname','company_id','profession','password_reset_token','created_at','updated_at');
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        function insert_user_detail($firstname,$surname,$email,$profession,$companyid,$pass,$new_company_name)
        {     
            $password = md5($pass);
            $pass_res_token=substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4);
                 if($new_company_name != '') 
                {
                $companyid=Companydetail::insertGetId(array('company_name'=>$new_company_name));
                }
         
                $user=User::create(array('firstname' => $firstname,'surname' => $surname,'email'=>$email,'profession'=>$profession,'company_id'=>$companyid,'password'=>$password,'password_reset_token'=>$pass_res_token,'role'=>2));
                return($user);
        }
        
        function update_user_detail($id,$firstname,$surname,$workemail,$email,$profession,$linkedin,$twitter,$facebook,$homeaddress1,$homeaddress2,$city,$county,$country,$telephone,$mobile)
        { 
        return(User::where('id', '=', $id)->update(array('firstname' => $firstname,'surname'=>$surname,'w_email'=>$workemail,'email'=>$email,'profession'=>$profession,'linkedin'=>$linkedin,'twitter'=>$twitter,'facebook'=>$facebook,'haddress1'=>$homeaddress1,'haddress2'=>$homeaddress2,'city'=>$city,'postcode'=>$county,'country'=>$country,'telephone'=>$telephone,'mobile'=>$mobile)));
        }
        
        function reset_password($token,$password)
        {
        $pass = Hash::make($password);
        return(User::where('password_reset_token', '=', $token)->update(array('password' =>$pass)));
        }
        
        function get_user_detail($id)
        {
        return(DB::table('users')->where('id', $id)->first());
        }
      
        public function getAuthIdentifier(){
        
        }

        public function getAuthPassword(){
        
        }

        public function getRememberToken(){
        
        }

         public function getRememberTokenName(){
        
        }

        public function getReminderEmail(){
        
        }

        public function setRememberToken($value){
        
        }

}
