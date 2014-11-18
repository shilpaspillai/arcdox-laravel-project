@extends('user.layout')
@section('article')
  {{Form::open(array('name'=>'profile','route'=>'edit_profile_data','novalidate'=>''))}}
  <body>
        <div class="row">
            <?php  
             $message = Session::get('message');
             if(isset($message)) echo "<div class=\"alert-danger\">" .$message."</div>";
             ?>
        <div class="col-md-4 col-md-offset-1">    
            <div class="header"> <h2> Personal details </h2> </div>
            <div class="form-group">
                <label  for="finame">First Name</label>
                <input class="form-control" style="cursor:text;" required readonly type="text" name="fname" id="finame" value="<?php echo (isset($user) && $user)? $user->firstname:''; ?>">
            </div>
             
            <div class="form-group">
                <label  for="siname"> Surname</label>
                <input class="form-control" style="cursor:text;" required readonly type="text" name="sname" id="sname" value="<?php echo (isset($user) && $user)? $user->surname:'';?>">
            </div>
             
            <div class="form-group">
                 <label  for="w_email">Work Email Address</label>
                 <input  class="form-control" style="cursor:text;" readonly type="email" name="w_email" id="w_email" value="<?php echo (isset($user) && $user)? $user->w_email:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="p_email">Personal Email Address</label>
                 <input type="email" class="form-control" style="cursor:text;"  readonly name="p_email" id="p_email" value="<?php echo (isset($user) && $user)? $user->email:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="profession">profession</label>
                <input required class="form-control" style="cursor:text;" readonly type="text" name="profession" id="profession" value="<?php echo(isset($user) && $user)? $user->profession:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="linkedin"> LinkedIn</label>
                <input   class="form-control" style="cursor:text;" readonly type="url" name="linkedin" id="linkedin" value="<?php echo(isset($user) && $user)? $user->linkedin:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="twitter">Twitter</label>
                <input class="form-control" style="cursor:text;" readonly type="url" name="twitter" id="twitter"value="<?php echo (isset($user) && $user)? $user->twitter:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="facebook">Facebook</label> 
                <input class="form-control" style="cursor:text;" readonly type="url" name="facebook" id="facebook" value="<?php echo (isset($user) && $user)? $user->facebook:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="home_ad1">Home Address 1</label> 
                <input class="form-control" style="cursor:text;" required readonly type="text" name="home_ad1" id="home_ad1" value="<?php echo (isset($user) && $user)? $user->haddress1:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="home_ad2">Home Address 2</label>
                <input  class="form-control" style="cursor:text;" required readonly type="text" name="home_ad2" id="home_ad2" value="<?php echo (isset($user) && $user)? $user->haddress2:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="city">City</label>
                <input class="form-control" style="cursor:text;" required readonly type="text" name="city" id="city" value="<?php echo (isset($user) && $user)? $user->city:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="c_pcode">Country/postcode</label>   
                <input class="form-control" style="cursor:text;"  required readonly type="text" name="c_pcode" id="c_pcode" value="<?php echo(isset($user) && $user)? $user->postcode:'';?>">
            </div>
            
            <div class="form-group">  
                <label for="c_pcode"> Country</label>     
                <input class="form-control" style="cursor:text;"  required readonly type="text" name="country" id="country" value="<?php echo(isset($user) && $user) ? $user->country:'';?>">
            </div>
            
            <div class="form-group">  
                <label  for="tele_num">Telephone</label>     
                <input class="form-control" style="cursor:text;" readonly type="number" name="tele_num" id="tele_num" value="<?php echo(isset($user) && $user) ? $user->telephone:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="mob_num">Mobile</label>    
                <input class="form-control" style="cursor:text;" readonly type="number" name="mob_num" id="mob_num" value="<?php echo(isset($user) && $user)? $user->mobile:'';?>">
            </div>
              
             </div>
            <div class="col-md-4 col-md-offset-1">    
            <h2> company details </h2>
                
            <div class="form-group">
                <label  for="cname_br">Company Name</label>    
                <input class="form-control" style="cursor:text;" required  readonly type="text" name="cname_br" id="cname_br" value="<?php echo (isset($company) && $company)? $company->company_name:'';?>">
            </div>
            
            <div class="form-group"> 
                <label for="industry">Industry Sector</label> 
                <input class="form-control" style="cursor:text;" required readonly  type="text" name="industry" id="industry" value="<?php echo (isset($company) && $company)? $company->industry:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="address1">Address 1</label>                 
                <input class="form-control" style="cursor:text;"  required readonly type="text" name="address1" id="address1" value="<?php echo (isset($company) && $company)? $company->adress1:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="address2">Address 2</label>                            
                <input class="form-control" style="cursor:text;" required readonly type="text" name="address2" id="address2" value="<?php echo (isset($company) && $company)? $company->adress2:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="com_city">City</label>                     
                <input class="form-control" style="cursor:text;" required readonly type="text" name="com_city" id="com_city" value="<?php echo (isset($company) && $company)? $company->city:'';?>">
            </div>
            
            <div class="form-group">
                <label  for="coun_pcode">Country/postcode</label>                       
                <input class="form-control" style="cursor:text;"  required readonly type="text" name="coun_pcode" id="coun_pcode" value="<?php echo (isset($company) && $company)? $company->c_pcode:'';?>">
            </div>
                               
            <div class="form-group">
                <label  for="c_country">country</label>                   
                <input class="form-control" style="cursor:text;" required readonly type="text" name="c_country" id="c_country" value="<?php echo (isset($company) && $company)? $company->country:'';?>">
            </div>
            
             <div class="form-group">
                <label  for="c_tele">Telephone</label>                 
                <input  class="form-control" style="cursor:text;" readonly type="number" name="c_tele" id="c_tele" value="<?php echo (isset($company) && $company)? $company->tele:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="c_fax">Fax</label>                         
                <input class="form-control" style="cursor:text;" readonly type="url" name="c_fax" id="c_fax" value="<?php echo (isset($company) && $company)? $company->fax:'';?>">
            </div>
            
            <div class="form-group">
               <label  for="c_email">General Email</label>                          
               <input class="form-control" style="cursor:text;" readonly type="email" name="c_email" id="c_email" value="<?php echo (isset($company) && $company)? $company->company_email:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="c_web">Website</label>                   
                <input class="form-control" style="cursor:text;" readonly type="url" name="c_web" id="c_web" value="<?php echo (isset($company) && $company)? $company->website:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="ln_profile">LinkedIn Company Profile</label>   
                <input class="form-control" style="cursor:text;" readonly type="url" name="ln_profile" id="ln_profile" value="<?php echo (isset($company) && $company)? $company->ln_com_profile:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="tw_profile">Twitter Company Profile</label>       
                <input class="form-control" style="cursor:text;" readonly type="url" name="tw_profile" id="tw_profile" value="<?php echo (isset($company) && $company)? $company->tw_com_profile:'';?>">
            </div>
            
            <div class="form-group"> 
                <label  for="fb_profile">Facebook Company Profile</label>    
                <input class="form-control" style="cursor:text;" readonly type="url" name="fb_profile" id="fb_profile" value="<?php echo (isset($company) && $company)? $company->fb_com_profile:'';?>">
            </div>
            <button  name="Edit details" class="btn btn-success" type="submit">Edit details</button>
           {{Form::close()}}
              </div></div>
            </div>
   </body>
</html>
@stop