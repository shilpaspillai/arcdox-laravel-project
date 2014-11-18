<?php 
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Encryption\EncryptionServiceProvider;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Companydetail extends Eloquent{
    protected $table = 'companydetails';
    public function user()
    {
        return $this->belongsTo('User');
    }
    function insert_company_detail($company_name,$industry,$address1,$address2,$company_city,$company_postcode,$company_country,$company_telephone,$company_fax,$company_email,$company_website,$company_linkedin,$company_twitter,$company_facebook)
    {
        $id=Session::get('id');
        $companyid = DB::table('users')->where('id',$id)->pluck('company_id');
                if($companyid)
                {
             return(Companydetail::where('id', '=', $companyid)->update(array('company_name' =>$company_name,'industry'=>$industry,'adress1'=>$address1,'adress2'=>$address2,'city'=>$company_city,'c_pcode'=>$company_postcode,'country'=>$company_country,'tele'=>$company_telephone,'fax'=>$company_fax,'company_email'=>$company_email,'website'=>$company_website,'ln_com_profile'=>$company_linkedin,'tw_com_profile'=>$company_twitter,'fb_com_profile'=>$company_facebook,'user_id'=>$id)));
                }
    }
    }
?>
