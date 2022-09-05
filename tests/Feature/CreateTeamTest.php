<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\CreateTeamForm;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_teams_can_be_created()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        Livewire::test(CreateTeamForm::class)
                    ->set(['state' => ['name' => 'ChildActions Team']])
                    ->call('createTeam');

        $this->assertCount(2, $user->fresh()->ownedTeams);
        $this->assertEquals('ChildActions Team', $user->fresh()->ownedTeams()->latest('id')->first()->name);
    }
}
