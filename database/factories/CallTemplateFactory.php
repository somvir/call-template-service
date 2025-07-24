<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CallTemplate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CallTemplate>
 */
class CallTemplateFactory extends Factory
{
    protected $model = CallTemplate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'company_id' => \App\Models\Company::factory(),
            'name' => $this->faker->sentence(3),
            'prompt' => $this->faker->paragraph(),
            'is_active' => true,
        ];
    }
}
