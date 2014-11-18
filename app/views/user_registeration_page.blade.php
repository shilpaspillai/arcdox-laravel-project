@extends('layout')
@section('content')

<script>
    $(document).ready(function() {
        $("#alert_confirm_password").hide();
        $("#alert_email").hide();
        $('.form-group > .label').each(function() {
            $(this).hide();
        });
        var form_obj = new form();

        $("#email").change(function() {
            $.ajax({
                url: '<?php echo URL::route('check_email_exist'); ?>',
                type: 'GET',
                data: 'cemail=' + $("#email").val(),
                success: function(data)
                {
                    if (data != "valid")
                        $("#alert_email").html(data).show();
                    else {
                        $("#alert_email").html(data).hide();
                    }
                }
            });
        });

        $("#company").change(function() {
            if ($(this).val() == "other")
            {
                $("#slide").show();
                $("[name=new_company]").change(function() {
                    if ($("#company").val() == "other")
                    {
                        form_obj.is_valid_field($("[name=new_company]").val(), $("#alert_newcompany_name"), 'please enter the new company name', form_obj.show_error);
                    }
                });
            }
            else
            {
                $("#slide").hide();
                $("[name=new_company]").unbind('change');
            }
        });

        $("[name=new_company]").change(function() {
            $.ajax({
                url: '<?php echo URL::route('check_company_exist'); ?>',
                type: 'GET',
                data: 'company_name=' + $("#new_company").val(),
                success: function(data)
                {
                    var response = $.parseJSON(data);
                    if (response.status)
                    {
                        $("#alert_company_name").text(response.message).show();
                    }
                    else {
                        $("#alert_company_name").hide();
                    }
                }
            });
        });


        $("[name=usrpassword]").on('change', (function() {
            if ($("[name=confirm_password]").val() == '') {
            }
            else {
                form_obj.is_same_data($("[name=confirm_password]"), $("[name=usrpassword]"), $("#alert_confirm_password"), 'password mismatch', form_obj.show_error);
            }
        }));

        $("[name=confirm_password]").on('change', (function() {
            if ($("[name=usrpassword]").val() == '') {
            }
            else {
                form_obj.is_same_data($("[name=confirm_password]"), $("[name=usrpassword]"), $("#alert_confirm_password"), 'password mismatch', form_obj.show_error);
            }
        }
        ));

        $("form[name=newuser]").submit(function() {
            $('.form-group > .label').each(function() {
                $(this).hide();
            });

            var form_obj = new form();

            $("input[name=first_name]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_first_name"), 'please enter the first name', form_obj.show_error);
            });

            $("[name=sur_name]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_sur_name"), 'please enter the sur name', form_obj.show_error);
            });

            $("[name=company]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_company_name"), 'please enter the company name', form_obj.show_error);
            });

            if ($("[name=company]").val() == 'other')
            {
                $("[name=new_company]").each(function() {
                    form_obj.is_valid_field($(this).val(), $("#alert_newcompany_name"), 'please enter the new company name', form_obj.show_error);
                });
            }

            $("input[name=user_profession]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_user_profession"), 'please enter the user profession', form_obj.show_error);
            });

            $("[name=email]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_email"), 'please enter the email', form_obj.show_error);
                form_obj.is_valid_email(this, $("#alert_email"), 'please enter a valid email', form_obj.show_error);
            });

            $("[name=usrpassword]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_password"), 'please enter the password', form_obj.show_error);
            });

            $("[name=confirm_password]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_confirm_password"), 'please enter the password', form_obj.show_error);
                form_obj.is_same_data((this), $("[name=usrpassword]"), $("#alert_confirm_password"), 'password mismatch', form_obj.show_error);
            });

            if (form_obj.is_valid()) {
                event.preventDefault();
            }
        });
    });
</script>
</head>
<body>  
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
          
            {{ Form::open(array('name'=>'newuser','route'=>'process_user_registeration','novalidate'=>'')) }}
            <div class="container">
                <h2>Registration Page</h2>
                  <?php
                $message = Session::get('message');
                if (isset($message))
                    echo "<div class=\"alert-success\">" . $message . "</div>";
                ?>
           
                <div class="form-group"> 
                    {{Form::label('First Name',null,array('class'=>'label-control'));}}
                    {{ Form::text('first_name',Input::old('first_name',''),array('class'=>'form-control','placeholder'=>'enter the first name','id'=>'first_name'));}} 
                    <span id="alert_first_name" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                
                <div class="form-group"> 
                    {{Form::label('Sur Name',null,array('class'=>'label-control'));}}
                    {{ Form::text('sur_name',Input::old('sur_name',''),array('class'=>'form-control','placeholder'=>'enter the surname','id'=>'sur_name'));}}
                    <span id="alert_sur_name" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                 
                <div class="form-group">
                    {{Form::label('Company',Input::old('company',''),array('class'=>'label-control'));}}
                    <select class="form-control" required name="company" id="company">
                        <option selected="select company name"></option>
                        <?php
                        
                        if(isset($data) && is_array($data))
                          
                        {foreach ($data as $row) {
                            echo '<option value="' . $row->id . '">' . $row->company_name . '</option>';   
                        }}
                        ?>
                        <option value="other">Other</option>
                    </select>
                    <span id="alert_company_name" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                 
                <div id="slide" style="display:none">
                    <div class="form-group">
                        {{Form::label('New Company',null,array('class'=>'label-control'));}}  
                        {{ Form::text('new_company',Input::old('new_company',''),array('class'=>'form-control','placeholder'=>'enter the company name','id'=>'new_company'));}}
                        <span id="alert_newcompany_name" class="label label-danger" style="display:none; background-color: red;"></span>
                    </div>
                </div> 
                <div class="form-group"> 
                    {{Form::label('Profession',null,array('class'=>'label-control'));}}
                    {{ Form::text('user_profession',Input::old('user_profession',''),array('class'=>'form-control','placeholder'=>'enter the profession','id'=>'user_profession'));}}
                    <span id="alert_user_profession" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                <div class="form-group">  
                    <?php if (isset($error))
                        echo '<p style="color:red">email id already exist</p>';
                    ?>
                </div>
                <div class="form-group"> 
                    {{Form::label('email','Email')}}
                    {{Form::email('email',Input::old('email',''),array('class'=>'form-control','placeholder'=>'enter the email','id'=>'email'))}}
                    <span id="alert_email" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                <div class="form-group"> 
                    {{Form::label('password','password')}}
                    {{Form::password('usrpassword',array('class'=>'form-control','placeholder'=>'enter the password','id'=>'usrpassword'))}}
                    <span id="alert_password" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                <div class="form-group"> 
                    {{Form::label('confirm_password','Confirm Password')}}
                    {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>'enter the password','id'=>'confirm_password'))}}
                    <span id="alert_confirm_password" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>

                {{Form::button("SAVE",array('class'=>'btn btn-success','type'=>'submit','name'=>'save'))}}
                <a href="{{ URL::route('login')}}">{{Form::button("Back",array('class'=>'btn btn-default','type'=>'button'))}}</a>   
           </div></div></div>
    {{Form::close()}}
    @stop
