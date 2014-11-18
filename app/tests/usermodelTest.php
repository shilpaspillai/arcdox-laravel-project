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
    public function testUser_data_updation() {
         $user_model_object = new User();
         $id=15;
         $firstname='updatedname';
         $surname='updatedsurname';
         $workemail='update@mail.com';
         $email='update1@mail.com';
         $profession='updateprofession';
         $user=$user_model_object->update_user_detail($id,$firstname,$surname,$workemail,$email,$profession,$linkedin,$twitter,$facebook,$homeaddress1,$homeaddress2,$city,$county,$country,$telephone,$mobile);
        
    }
    public function tearDown() {
        parent::tearDown();
    }
}
?>

