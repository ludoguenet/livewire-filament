<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Profile;
use App\Models\JobTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraphs(3, true),
            'current' => $current = $this->faker->boolean(),
            'profile_id' => Profile::factory(),
            'job_title_id' => JobTitle::factory(),
            'company_id' => Company::factory(),
            'started_at' => $startDate = now()->subMonths($this->faker->numberBetween(1, 16)),
            'finished_at' => $current ? null : $startDate->addMonths($this->faker->numberBetween(1, 6)),
        ];
    }
}
