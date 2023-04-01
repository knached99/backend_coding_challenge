<?php
namespace Database\Factories;

use App\Models\UsersModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class UsersModelFactory extends Factory
{
    /**
     * The name of the model being generated.
     *
     * @var string
     */
    protected $model = UsersModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id'=>fake()->id(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'employee_id' => fake()->randomNumber(6),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
    }
}
?>