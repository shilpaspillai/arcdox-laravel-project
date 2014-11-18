@extends('layout')
@section('content')
<script>
     $(document).ready(function() {
        $('.form-group > .label').each(function() {
            $(this).hide();
        });
        
        $("#email").change(function() {
            $.ajax({
                url: '<?php echo URL::route('search_user_email'); ?>',
                type: 'POST',
                data: 'cemail=' + $("#email").val(),
                success: function(data)
                {
                   var response = $.parseJSON(data);
                    if (response.status)
                    {
                   
                        $("#alert_messages").html(response.password_reset_link).show();
                    }
                    else {
                        $("#alert_messages").html(response.password_reset_link).hide();
                    }
                }
            });
        });
     });
</script>
</head>
<body>
    <div class ='password_reset_section'>
        <div class='col-md-6 col-md-offset-2'>
            <h2>Password Reset</h2>
           {{ Form::open(array('name'=>'password_resetpage','novalidate'=>''))}}
             <div class="form-group"> 
                {{Form::label('email','Email')}}
                {{Form::email("email",Input::old('email',''),array('class'=>'form-control','placeholder'=>'Enter the email','id'=>'email'))}}
                 <span id="alert_messages"  style="display:none; float:left;"> </span>
             </div>
           {{Form::close()}}
        </div>
    </div>
</body>

@stop

