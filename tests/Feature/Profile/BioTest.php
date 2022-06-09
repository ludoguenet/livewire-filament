<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Support\Str;
use App\Http\Livewire\Profile\ProfileForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BioTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_form_set_up_has_no_errors()
    {
        $profile = Profile::factory()->create();

        Livewire::test(ProfileForm::class, ['user' => $profile->owner])
            ->set('bio', $profile->bio)
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function test_bio_updated_correctly()
    {
        $profile = Profile::factory()->create();
        $string = Str::random(15);

        Livewire::test(ProfileForm::class, ['user' => $profile->owner])
            ->set('bio', $string)
            ->set('uuid', $profile->uuid)
            ->call('submit');

        $this->assertEquals(($profile->refresh())->bio, $string);
    }
}
