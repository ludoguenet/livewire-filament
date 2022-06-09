<?php

namespace Tests\Feature;

use App\Http\Livewire\Profile\ProfileForm;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BioTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_uuid_and_bio_are_set()
    {
        $user = $this->generateUserWithProfile();

        $this->actingAs($user);

        Livewire::test(ProfileForm::class, ['user' => $user])
            ->assertSet('uuid', $user->profile->uuid)
            ->assertSet('bio', $user->profile->bio)
            ->assertSee($user->profile->bio);
    }

    private function generateUserWithProfile(): User
    {
        $user = User::factory()->create([
            'name' => 'nord',
            'email' => 'nord@coders.com'
        ]);

        Experience::factory(10)->create([
            'profile_id' => $user->profile->id
        ]);

        return $user;
    }
}
