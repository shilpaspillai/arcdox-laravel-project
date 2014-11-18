    @extends ('layout')    
    @section('content')
       <script>
        $(document).ready(function(){
            $("form[name=loginpage]").submit(function(){
                $(".alert-danger").hide();
                $('.form-group > .label').each(function(){
                     $(this).hide();
                });
                        var form_obj = new form();
                        
                        $("[name=email]").each(function(){
                            form_obj.is_valid_field($(this).val(),$("#alert_email_error"),'please enter the email',form_obj.show_error);
                            form_obj.is_valid_email(this,$("#alert_email_error"),'please enter a valid email',form_obj.show_error);
                        });
                        $("[name=password]").each(function(){
                            form_obj.is_valid_field($(this).val(),$("#alert_password_error"),'please enter the password',form_obj.show_error);
                        });
                        if(form_obj.is_valid()){
                            event.preventDefault();
                        }
                    });
                });
    </script>
    </head>
    <body>
    <div class="container">
        <div id='contents-login'>
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <?php if(isset($usererror))
                    {echo'<p style="color:red">enter a valid username and password.. </p>';}?>
                    {{ Form::open(array('name'=>'loginpage','route'=>'login_processLogin','novalidate'=>'')) }}
                    
                    <div class='form-group'>
                    <h2>welcome</h2>
                    </div>
                    <?php  
                    $message = Session::get('message');
                    if(isset($message)) echo "<div class=\"alert-danger\">" .$message."</div>";
                    ?>
                    <div class="form-group"> 
                       {{Form::label('email','Email')}}
                       {{Form::email("email",Input::old('email',''),array('class'=>'form-control','id'=>'email'))}}
                        <span id="alert_email_error" class="label label-danger" style="display:none; background-color: red;"> </span>
                    </div>
                    <div class="form-group"> 
                        {{Form::label('Password','Password')}}
                        {{Form::password('password',array('class'=>'form-control','id'=>'password'))}}
                        <span id="alert_password_error" class="label label-danger" style="display:none; background-color: red;"></span>
                    </div>
                    <div class='form-group'>
                        {{Form::button("Log In",array('class'=>'btn btn-success','type'=>'submit'))}}
                    </div>{{ Form::Close()}}
                           
                    <a href="{{ URL::route('user_registeration')}}">{{Form::button("BECOME A MEMBER",array('class'=>'btn btn-default','type'=>'submit'))}}</a> 
                    <a href="{{ URL::route('user_password_reset')}}">Forgot your password?</a>   
                     </div></div></div></div>
@stop
