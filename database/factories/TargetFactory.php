<?php

namespace Database\Factories;

use App\Models\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class TargetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Target::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime' => $this->faker->firstName(),
            'prezime' => $this->faker->lastName(),
            'sifra_objekta' => $this->faker->regexify('[0-9]{3}-[0-9]{3}'),
            'datum_rodjenja' => $this->faker->date(),
            'adresa' => $this->faker->streetAddress(),
            'mjesto_stanovanja' => $this->faker->city(),
//            'username' => $this->faker->unique()->userName(),
//            'is_admin' => 0,
//            'razur' => 1,
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),
        ];
    }
}
