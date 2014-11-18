@extends('admin.layout');
@section('content')
<div class="row">
         <div class="col-md-12">
               <div class="col-md-6 col-md-offset-3"><h2>Edit Training Detail</h2></div>
            {{ Form::open(array('name'=>'editpage','route'=>'admin_training_updateTraining','novalidate'=>'','files'=>true))}}
            <?php if(isset($user))?>
            <table  class="table table-hover">
                <tr><td>  {{form::label('training_image','Training Image')}}</td> <td><div class="col-md-6">  <div class="training-img"><img src="<?php echo URL::to('/assets/upload/')."/".$user->tr_image;?>" class="img-responsive" alt="Responsive image"></div>{{Form::file('image')}}</div></div>
               </td>        
                </tr>
            <tr><td>
            {{form::label('Title','Title')}}     
             </td><td>{{form::text('tr_title',$user->tr_title,array('class'=>'form-control','id'=>'tr_title'))}} </td></tr>
             <tr><td>{{form::label('Description','Description')}}</td><td>{{form::text('tr_description',$user->tr_description,array('class'=>'form-control','id'=>'tr_description'))}}</td></tr>
             <tr><td>
            <button type="submit" name="update" class="btn btn-success btn-sm" value="<?php echo $user->id;?>"><span class="glyphicon glyphicon-pencil"></span>Update</button>
            </td></tr>
            </table>
          {{form::close()}}
        </div>

</div>
@stop