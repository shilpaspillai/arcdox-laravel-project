@extends('user.layout')
@section('article')

    <div class="col-md-12">
        <img src="<?php echo URL::to('resources/images/tr.jpg'); ?>" style="width:100%;">
    </div>
       <?php foreach($data as $row)
       {
    echo "<div class=\"col-md-6\">
        <div class=\"training-box\">
            <h2>".$row->tr_title."</h2> <div class=\"training-img\" >
        <img src=".URL::to('/assets/upload/')."/".$row->tr_image;
        echo " class=\"img-responsive\" alt=\"Responsive image\">";
        echo  "</div><p><h3>". $row->tr_title."</h3>". $row->tr_description;"</p>";
        echo " </div>";
        echo "</div>";
       } ?>

@stop