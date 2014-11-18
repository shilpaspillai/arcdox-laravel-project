    @extends('admin.layout')
    @section('content')
   
    <script>
    $(document).ready(function(){
        $("form[name=trainingpage]").submit(function(){
            $('.form-group > .label').each(function(){
                $(this).hide();
            });
            
            var form_obj = new form();
            
            $("input[name=tr_title]").each(function(){
                form_obj.is_valid_field($(this).val(),$("#alert_title"),'please enter the training title',form_obj.show_error);
            });
            $("[name=tr_description]").each(function(){
                form_obj.is_valid_field($(this).val(),$("#alert_description"),'please enter the training description',form_obj.show_error);
            });
            $("input[name=image]").each(function(){
                form_obj.is_valid_field($(this).val(),$("#alert_image"),'please enter the training image',form_obj.show_error);
            });
           if(form_obj.is_valid()){
                event.preventDefault();
                }               
        });
    });
    </script> 
    </head>
    <body>
    {{Form::open(array('name'=>'trainingpage','route'=>'admin_training_processTrainingDetail','novalidate'=>'','files'=>true))}}
    <div class="col-md-12"><img src="<?php echo URL::to('resources/images/tr.jpg'); ?>" style="width:100%;">
    </div>
    <div class="training-detail">   
        <div class="col-md-6">
            <div class="form-group">
                <h2>ADD A TRAINING</h2>
            </div>
            <?php  
            $message = Session::get('message');
            if($message) echo "<div class=\"alert-success\">" .$message."</div>";
            ?>
            <div class="form-group">
               {{Form::label("title",'Title')}}
               {{Form::text('tr_title','',array('class'=>'form-control','id'=>'tr_title'))}}
               <span id="alert_title" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group"> 
               {{Form::label("description",'Description')}}
               {{Form::textarea('tr_description','',array('class'=>'form-control','id'=>'tr_description'))}}
               <span id="alert_description" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                {{Form::label("upload Training Image::",'')}}
                {{Form::file('image');}}
                <span id="alert_image" class="label label-danger" style="display:none; background-color: red;"></span>
            </div>
            
            <div class="form-group">
                {{Form::button("SAVE",array('class'=>'btn btn-success','type'=>'submit'))}}
            </div>
        </div>
    </div>
{{Form::close()}}
@stop
