<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UsersModel;
use App\Models\AdminModel;
use App\Http\Controllers\DashboardController;
use Carbon\Carbon;
use Faker\Factory; 

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase, withFaker;

    protected $admin;
    protected $faker;
    // Create this to authenticate as admin for the index page (admin dashboard)

    public function setUp(): void {
        parent::setUp();
        $this->admin = AdminModel::factory()->create([
            'name'=>'Test Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password'),
        ]);
        $this->faker = Factory::create();
    }
    
 
    public function test_index()
    {   
        $response = $this->actingAs($this->admin)->get(route('admin.dash'));

        $response->assertStatus(302);

    }



  public function test_create_user()
    {
      
        $this->actingAs($this->admin)
             ->get(route('admin.dash'));

    
        $data = [
            'id'=>1,
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'employee_id' =>$this->faker->regexify('[A-Z]{2}-\d{4}')
        ];

        UsersModel::create($data);
        $this->assertDatabaseHas('users', $data);
          
    }
    
        

 
    public function test_update_user()
    {
        $this->actingAs($this->admin)->get(route('admin.dash'));
      
        $id = 1;
      
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'employee_id' => $this->faker->regexify('[A-Z]{2}-\d{4}')
        ];
        
        $created_user = UsersModel::create($data);
        

        $this->assertDatabaseHas('users', $data);
        

        $user = UsersModel::findOrFail($created_user->id);
        $user->update($data);
    
        $this->assertDatabaseHas('users', ['id'=>$created_user->id]);
    }
    
    public function test_delete_user()
    {
        $this->actingAs($this->admin)->get(route('admin.dash'));
      
        $id = 1;
      
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'employee_id' => $this->faker->regexify('[A-Z]{2}-\d{4}')
        ];
        
        $created_user = UsersModel::create($data);
        
            $this->assertDatabaseHas('users', $data);
        
        $user = UsersModel::findOrFail($created_user->id);
        $user->delete($data);
    
        $this->assertDatabaseMissing('users', ['id'=>$created_user->id]);
    }
    
    
}

?>