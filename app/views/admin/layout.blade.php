<!doctype html>
<html>
 <head>
  <link href="<?php echo URL::to('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
             <link href="<?php echo URL::to('resources/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
            <link href="<?php echo URL::to('resources/style.css'); ?>" rel="stylesheet">
           
            <script src="<?php echo URL::to('resources/jquery.min.js');?>"></script> 
            <script src="<?php echo URL::to('resources/js/bootstrap.min.js'); ?>"></script> 
             <script src="<?php echo URL::to('resources/newjavascript.js');?>"></script> 
 <body>
  <div id="content">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default btn-lg pull-right">
                 <?php echo  $value=Session::get('firstname');?><span class="glyphicon glyphicon-user" ></span>
                </button>
            </div>
            <div class="col-md-12">        
                <nav class="navbar navbar-header" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo URL::route('admin_dashboard'); ?>">HOME</a></li>
                            <li class="">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">TRAINING <span class="caret"></span></a>
                                 <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="<?php echo URL::route('admin_training_add'); ?>"> {{Form::button("ADD TRAINING",array('class'=>'btn btn-default','type'=>'button'))}}</a></li>
                                     <li class=""><a href="<?php echo URL::route('admin_training_list'); ?>"> {{Form::button("MANAGE TRAINING",array('class'=>'btn btn-default','type'=>'button'))}}</a></li>
                                 </ul>
                            </li>
                            <li class=""><a href="#">SUBSCRIPTIONS</a></li>
                            <li class=""><a href="#">COURSES</a></li>
                            <li class=""><a href="<?php echo URL::route('signout'); ?>">LOGOUT</a></li>
                           </ul>
                    </div>
                </nav>
                @yield('content')
            </div>
        </div>
      <div class="row">
      </div>
   </div>
</div>

</body>
</html>
  