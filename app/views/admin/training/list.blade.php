@extends('admin.layout')
@section('content')
<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3"><h2> Training List</h2></div>
         <div class="col-md-6 col-md-offset-3">    <?php  
            $message = Session::get('message');
            if($message) echo "<div class=\"alert-success\">" .$message."</div>";
            ?></div>
        <table  class="table table-hover"><tr><th width="400">Training Image</th><th width="400">Name</th><th width="300">Manage</th></tr>
          <?php  $training = DB::table('trainings')->get();
          foreach($training  as $row)
           {
         ?>
        <tr>
            <td> <div class="col-md-6"> <div class="training-img"><img src="<?php echo URL::to('/assets/upload/')."/".$row->tr_image;?>" class="img-responsive" alt="Responsive image"></div></div></td>
            <td>
    {{$row->tr_title}}
            </td>
            <td>
   {{ link_to_route('admin_training_edit', 'Edit', $row->id, array('class' => 'btn btn-success')) }}
    <a href="{{URL::to('admin/training/delete')}}/<?php echo $row->id;?>"><button type="button" class="btn btn-default btn-sm"> <span class="glyphicon glyphicon-pencil"></span>Delete</button></a>
            </td>
        </tr>
    <?php
    }?>
  </table> 
     </div>
 </div>
@stop
