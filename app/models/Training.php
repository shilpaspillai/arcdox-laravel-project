<?php
class Training extends Eloquent{
    protected $fillable = array('tr_title','tr_description','tr_image','created_at','updated_at');

    function get_training_detail()
    {
   $list = DB::table('trainings')->get();
   return $list;
    }
    
    function update_training_detail($title,$des,$filename,$id)
    {
        if($filename != '')
        {
       $result= DB::table('trainings')
            ->where('id', $id)
            ->update(array('tr_title' =>$title,'tr_description' =>$des,'tr_image'=>$filename));
       return($result);
        }
        else{
            $result= DB::table('trainings')
            ->where('id', $id)
            ->update(array('tr_title' =>$title,'tr_description' =>$des)); 
         return($result);
         }
    }
    function delete_training_detail($id)
    {
      $training = Training::find($id);
      $result=$training->delete(); 
      return($result);
    }
    

 } 
?>