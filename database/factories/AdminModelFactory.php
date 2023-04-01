<?php
namespace Database\Factories;
use App\Models\AdminModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminModelFactory extends Factory {

    protected $model = AdminModel::class;

    public function definition(): array 
    {
        return [
            'name'=>fake()->name(),
            'email'=>fake()->unique()->safeEmail(),
            'password'=>bcrypt('secret'),
        ];
    }
}
?>