<?php
Class UserTableSeeder extends Illuminate\Database\Seeder{
    public function run()
    {
         $password = Hash::make('shilpa');
         $pass_res_token=substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4);
         User::create(array('role'=>1,'firstname'=>'shilpa','email'=>'shilpa@mail.com','password'=>$password,'password_reset_token'=>$pass_res_token));
    }
}
?>