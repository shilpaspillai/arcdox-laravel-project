<?php
 
class usermodelTest extends Illuminate\Foundation\Testing\TestCase 
{
    /**
     * Default preparation for each test
     */
    public function setUp()
    {
     parent::setUp();
     $this->prepareForTests();
    }
 
    /**
     * Creates the application.
     *
     * @return Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;
        $testEnvironment = 'testing';
        return require __DIR__.'/../../bootstrap/start.php';
    }
 
    /**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     */
    private function prepareForTests()
    {
       // Artisan::call('migrate');
        Mail::pretend(true);
    }
    
    public function testUser_data_insertion(){
        
          $user_model_object = new User();
          $firstname="testname";
          $surname="testsurname";
          $email="testname".rand(999,9999)."@mail.com";
          $profession="IT";
          $companyid=2;
          $pass="testname";
          $new_company_name="test_new";
          $user=$user_model_object->insert_user_detail($firstname,$surname,$email,$profession,$companyid,$pass,$new_company_name);
          $userName=$user_model_object->get_user_detail($user->id);     
          $this->assertEquals($userName->firstname, $firstname);
    }
    public function testUser_data_updation(){
        $user_model_object = new User();
        $id=15;
        $firstname="shyam";
        $surname="achuthan";
        $workemail="shyamachuthan@mail.com";
        $email="shyama@mail.com";
        $profession = "web developer";
        $linkedin = "www.linkedIn.com";
        $twitter = "www.twitter.com";
        $facebook = "www.facebook.com";
        $homeaddress1 = "address1";
        $homeaddress2 = "address2";
        $city = "kollam";
         $county =232212;
         $country = "india";
         $telephone = 98472445452;
         $mobile = 8482682734;
         $user=$user_model_object->update_user_detail($id,$firstname,$surname,$workemail,$email,$profession,$linkedin,$twitter,$facebook,$homeaddress1,$homeaddress2,$city,$county,$country,$telephone,$mobile);
         $userName=$user_model_object->get_user_detail($id);     
         $this->assertEquals($userName->firstname, $firstname);
    }

    public function tearDown(){
        parent::tearDown();
    }
    
}
?>

