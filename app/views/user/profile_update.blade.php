@extends('user.layout')
@section('article')
<head>
<script>
     $(document).ready(function(){
            $('.form-group > .label').each(function(){
                $(this).hide();
            });
            var form_obj = new form();
                
       $("form[name=updateprofile]").submit(function(){
                $('.form-group > .label').each(function(){
                    $(this).hide();
                });
                
                var form_obj = new form();
       
                $("input[name=fname]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_fname"),'please enter the firstname',form_obj.show_error);
                   form_obj.is_only_characters(this,$("#alert_fname"),'please enter characteres only',form_obj.show_error);
                });
                $("input[name=sname]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_sname"),'please enter the  surname',form_obj.show_error);
                   form_obj.is_same_name(this,$("[name=fname]"),$("#alert_sname"),'Please enter different firstname and surname',form_obj.show_error);
                   form_obj.is_only_characters(this,$("#alert_sname"),'please enter characteres only',form_obj.show_error);
                });
                 $("[name=w_email]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_wemail"),'please enter the email',form_obj.show_error);
                   form_obj.is_valid_email(this,$("#alert_wemail"),'please enter a valid email',form_obj.show_error);
                });
                $("[name=p_email]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_pemail"),'please enter the personal email',form_obj.show_error);
                   form_obj.is_valid_email(this,$("#alert_pemail"),'please enter a valid email',form_obj.show_error);
                });
                
                 $("input[name=profession]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_profession"),'please enter the profession',form_obj.show_error);
                   form_obj.is_only_characters(this,$("#alert_profession"),'please enter characteres only',form_obj.show_error);
                 });
                          
                 $("input[name=city]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_city"),'please enter the city name',form_obj.show_error);
                   form_obj.is_only_characters(this,$("#alert_city"),'please enter characteres only',form_obj.show_error);
                   });
           
                  $("input[name=linkedin]").each(function(){
                   form_obj.is_valid_url(this,$("#alert_linkedin"),'please enter a valid URL',form_obj.show_error);
                 });
                   $("input[name=twitter]").each(function(){
                   form_obj.is_valid_url(this,$("#alert_twitter"),'please enter a valid URL',form_obj.show_error);
                 });
                 $("input[name=facebook]").each(function(){
                   form_obj.is_valid_url(this,$("#alert_facebook"),'please enter a valid URL',form_obj.show_error);
                 });
                 
                $("input[name=home_ad1]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_home_ad1"),'please enter home adress1',form_obj.show_error);
                 });
                 $("input[name=home_ad2]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_home_ad2"),'please enter home adress2',form_obj.show_error);
                 });
                 
                 $("input[name=c_pcode]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_county_pcode"),'please enter the county/postcode',form_obj.show_error);
                   form_obj.is_numeric(this,$("#alert_county_pcode"),'please enter numbers only',form_obj.show_error);
                  });
                  $("input[name=country]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_cpcode"),'please enter the country',form_obj.show_error);
                 });
                  $("input[name=tele_num]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_tele_num"),'please enter the telephone number',form_obj.show_error);
                   form_obj.is_numeric(this,$("#alert_tele_num"),'please enter numbers only',form_obj.show_error);
                 });
                  $("input[name=mob_num]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_mob_num"),'please enter the mobile number',form_obj.show_error);
                   form_obj.is_numeric(this,$("#alert_mob_num"),'please enter numbers only',form_obj.show_error);
                    });
                 $("input[name=cname_br]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_cname_br"),'please enter the company name',form_obj.show_error);
                  form_obj.is_only_characters(this,$("#alert_cname_br"),'please enter characteres only',form_obj.show_error);
                  });
                  $("input[name=industry]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_industry"),'please enter the industry name',form_obj.show_error);
                   form_obj.is_only_characters(this,$("#alert_industry"),'please enter characteres only',form_obj.show_error);
                  });
                 $("input[name=com_city]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_com_city"),'please enter the company city',form_obj.show_error);
                 });
                 $("input[name=coun_pcode]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_coun_pcode"),'please enter the county/postcode',form_obj.show_error);
                 });
                $("input[name=c_country]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_c_country"),'please enter the company country',form_obj.show_error);
                 });
                 
                  $("input[name=c_web]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_c_web"),'please enter the company website',form_obj.show_error);
                  form_obj.is_valid_url(this,$("#alert_c_web"),'please enter a valid url',form_obj.show_error);
                 });
                 $("input[name=c_tele]").each(function(){
                   form_obj.is_numeric(this,$("#alert_c_tele"),'please enter numbers only',form_obj.show_error);
                 });
                 $("input[name=c_fax]").each(function(){
                   form_obj.is_numeric(this,$("#alert_fax"),'please enter numbers only',form_obj.show_error);
                 });
                  $("input[name=c_email]").each(function(){
                   form_obj.is_valid_field(this,$("#alert_cemail"),'please enter the company website',form_obj.show_error);
                  form_obj.is_valid_email(this,$("#alert_cemail"),'please enter a valid email id',form_obj.show_error);
                 });
                 
                 $("input[name=ln_profile]").each(function(){
                   form_obj.is_valid_url(this,$("#alert_ln_profile"),'please enter a valid URL',form_obj.show_error);
                 });
                 $("input[name=tw_profile]").each(function(){
                   form_obj.is_valid_url(this,$("#alert_tw_profile"),'please enter a valid URL',form_obj.show_error);
                 });
                  $("input[name=fb_profile]").each(function(){
                   form_obj.is_valid_url(this,$("#alert_fb_profile"),'please enter a valid URL',form_obj.show_error);
                 });
                 
                      if(form_obj.is_valid()){
                event.preventDefault();
                }
    });
    });
</script>
</head>
  {{Form::open(array('name'=>'updateprofile','route'=>'update_user_profile','novalidate'=>''))}}
  <body>
        <div class="row">
        <div class="col-md-4 col-md-offset-1">  
                <?php  
                    $message = Session::get('message');
                    if(isset($message)) echo "<div class=\"alert-success\">" .$message."</div>";
                 ?>
            <div class="header"> <h2> Personal details </h2> </div>
            
            <div class="form-group">
                <label  for="finame"> First name</label>
                <input class="form-control" style="cursor:text;" required  type="text" name="fname" id="fname" value="<?php echo (isset($user) && $user)? $user->firstname:'';?>">
                <span id="alert_fname" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
                      
            <div class="form-group">
                <label  for="siname"> Surname</label>
                <input class="form-control" style="cursor:text;" required  type="text" name="sname" id="sname" value="<?php echo (isset($user) && $user)? $user->surname:'';?>">
                <span id="alert_sname" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
             
            <div class="form-group">
                 <label  for="w_email">Work Email Address</label>
                 <input  class="form-control" style="cursor:text;"  type="email" name="w_email" id="w_email" value="<?php echo (isset($user) && $user)? $user->w_email:'';?>">
                <span id="alert_wemail" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="p_email">Personal Email Address</label>
                 <input type="email" class="form-control" style="cursor:text;"   name="p_email" id="p_email" value="<?php echo (isset($user) && $user)? $user->email:'';?>">
                <span id="alert_pemail" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                <label  for="profession">profession</label>
                <input required class="form-control" style="cursor:text;"  type="text" name="profession" id="profession" value="<?php echo(isset($user) && $user)? $user->profession:'';?>">
                <span id="alert_profession" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="linkedin"> LinkedIn</label>
                <input   class="form-control" style="cursor:text;"  type="url" name="linkedin" id="linkedin" value="<?php echo(isset($user) && $user)? $user->linkedin:'';?>">
               <span id="alert_linkedin" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
             <div class="form-group"> 
                <label  for="twitter">Twitter</label>
                <input class="form-control" style="cursor:text;"  type="url" name="twitter" id="twitter" value="<?php echo(isset($user) && $user)? $user->twitter:'';?>">
                <span id="alert_twitter" class="label label-danger" style="display:none; background-color: red;"></span>
             </div>
            
            <div class="form-group">
                <label  for="facebook">Facebook</label> 
                <input class="form-control" style="cursor:text;" type="url" name="facebook" id="facebook" value="<?php echo(isset($user) && $user)? $user->facebook:'';?>">
                <span id="alert_facebook" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="home_ad1">Home Address 1</label> 
                <input class="form-control" style="cursor:text;" required  type="text" name="home_ad1" id="home_ad1"  value="<?php echo(isset($user) && $user)? $user-> haddress1:'';?>">
                <span id="alert_home_ad1" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="home_ad2">Home Address 2</label>
                <input  class="form-control" style="cursor:text;" required  type="text" name="home_ad2" id="home_ad2" value="<?php echo(isset($user) && $user)? $user-> haddress2:'';?>">
              <span id="alert_home_ad2" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                <label  for="city">City</label>
                <input class="form-control" style="cursor:text;" required  type="text" name="city" id="city" value="<?php echo(isset($user) && $user)? $user->city:'';?>">
                <span id="alert_city" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                <label  for="c_pcode">County/postcode</label>   
                <input class="form-control" style="cursor:text;"  required  type="text" name="c_pcode" id="c_pcode" value="<?php echo(isset($user) && $user)? $user->postcode:'';?>">
                <span id="alert_county_pcode" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">  
                <label for="c_pcode"> Country</label>     
                <input class="form-control" style="cursor:text;"  required type="text" name="country" id="country"value="<?php echo(isset($user) && $user)? $user->country:'';?>">
                <span id="alert_country" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">  
                <label  for="tele_num">Telephone</label>     
                <input class="form-control" style="cursor:text;"  type="tel" name="tele_num" id="tele_num" min="1" value="<?php echo(isset($user) && $user)? $user->telephone:'';?>">
                <span id="alert_tele_num" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="mob_num">Mobile</label>    
                <input class="form-control" style="cursor:text;"  type="tel" name="mob_num" id="mob_num" min="1" value="<?php echo(isset($user) && $user)? $user->mobile:'';?>">
                <span id="alert_mob_num" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
              
             </div>
            <div class="col-md-4 col-md-offset-1">    
            <h2> company details </h2>
                
            <div class="form-group">
                <label  for="cname_br">Company Name</label>    
                <input class="form-control" style="cursor:text;" required   type="text" name="cname_br" id="cname_br" value="<?php echo (isset($company) && $company)? $company->company_name:'';?>">
                <span id="alert_cname_br" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label for="industry">Industry Sector</label> 
                <input class="form-control" style="cursor:text;" required   type="text" name="industry" id="industry" value="<?php echo (isset($company) && $company)? $company->industry:'';?>">
                <span id="alert_industry" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                <label  for="address1">Address 1</label>                 
                <input class="form-control" style="cursor:text;"  required  type="text" name="address1" id="address1" value="<?php echo (isset($company) && $company)? $company->adress1:'';?>">
                <span id="alert_address1" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="address2">Address 2</label>                            
                <input class="form-control" style="cursor:text;" required  type="text" name="address2" id="address2" value="<?php echo (isset($company) && $company)? $company->adress2:'';?>">
                <span id="alert_address2" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                <label  for="com_city">City</label>                     
                <input class="form-control" style="cursor:text;" required  type="text" name="com_city" id="com_city" value="<?php echo (isset($company) && $company)? $company->city:'';?>">
               <span id="alert_com_city" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                <label  for="coun_pcode">County/postcode</label>                       
                <input class="form-control" style="cursor:text;"  required  type="text" name="coun_pcode" id="coun_pcode" value="<?php echo (isset($company) && $company)? $company->c_pcode:'';?>">
                <span id="alert_coun_pcode" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
                               
            <div class="form-group">
                <label  for="c_country">country</label>                   
                <input class="form-control" style="cursor:text;" required type="text" name="c_country" id="c_country" value="<?php echo (isset($company) && $company)? $company->country:'';?>">
                <span id="c_country" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
             <div class="form-group">
                <label  for="c_tele">Telephone</label>                 
                <input  class="form-control" style="cursor:text;"  type="tel" name="c_tele" id="c_tele"  value="<?php echo (isset($company) && $company)? $company->tele:'';?>">
                <span id="alert_c_tele" class="label label-danger" style="display:none; background-color: red;"></span>
             </div>
            
            <div class="form-group"> 
                <label  for="c_fax">Fax</label>                         
                <input class="form-control" style="cursor:text;"  type="tel" name="c_fax" id="c_fax" value="<?php echo (isset($company) && $company)? $company->fax:'';?>">
                <span id="alert_fax" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
               <label  for="c_email">General Email</label>                          
               <input class="form-control" style="cursor:text;"  type="email" name="c_email" id="c_email" value="<?php echo (isset($company) && $company)? $company->company_email:'';?>">
              <span id="alert_cemail" class="label label-danger" style="display:none; background-color: red;"></span>

            </div>
            
            <div class="form-group"> 
               <label  for="c_web">Website</label>                   
               <input class="form-control" style="cursor:text;"  type="url" name="c_web" id="c_web" value="<?php echo (isset($company) && $company)? $company->website:'';?>">
               <span id="alert_c_web" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="ln_profile">LinkedIn Company Profile</label>   
                <input class="form-control" style="cursor:text;"  type="url" name="ln_profile" id="ln_profile" value="<?php echo (isset($company) && $company)? $company->ln_com_profile:'';?>">
                 <span id="alert_ln_profile" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
                <label  for="tw_profile">Twitter Company Profile</label>       
                <input class="form-control" style="cursor:text;"  type="url" name="tw_profile" id="tw_profile" value="<?php echo (isset($company) && $company)? $company->tw_com_profile:'';?>">
                <span id="alert_tw_profile" class="label label-danger" style="display:none; background-color: red;"></span>

            </div>
            
            <div class="form-group"> 
                <label  for="fb_profile">Facebook Company Profile</label>    
                <input class="form-control" style="cursor:text;"  type="url" name="fb_profile" id="fb_profile" value="<?php echo (isset($company) && $company)? $company->fb_com_profile:'';?>">
                <span id="alert_fb_profile" class="label label-danger" style="display:none; background-color: red;"></span>

            </div>
            <button  name="update details" class="btn btn-success"> update</button>
           {{Form::close()}}
@stop
