<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Potential;

use App\Models\Company;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PotentialControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_potentials(): void
    {
        $potentials = Potential::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('potentials.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.potentials.index')
            ->assertViewHas('potentials');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_potential(): void
    {
        $response = $this->get(route('potentials.create'));

        $response->assertOk()->assertViewIs('app.potentials.create');
    }

    /**
     * @test
     */
    public function it_stores_the_potential(): void
    {
        $data = Potential::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('potentials.store'), $data);

        $this->assertDatabaseHas('potentials', $data);

        $potential = Potential::latest('id')->first();

        $response->assertRedirect(route('potentials.edit', $potential));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_potential(): void
    {
        $potential = Potential::factory()->create();

        $response = $this->get(route('potentials.show', $potential));

        $response
            ->assertOk()
            ->assertViewIs('app.potentials.show')
            ->assertViewHas('potential');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_potential(): void
    {
        $potential = Potential::factory()->create();

        $response = $this->get(route('potentials.edit', $potential));

        $response
            ->assertOk()
            ->assertViewIs('app.potentials.edit')
            ->assertViewHas('potential');
    }

    /**
     * @test
     */
    public function it_updates_the_potential(): void
    {
        $potential = Potential::factory()->create();

        $company = Company::factory()->create();
        $user = User::factory()->create();

        $data = [
            'job_type' => $this->faker->text(255),
            'project_name' => $this->faker->text(255),
            'source' => $this->faker->text(255),
            'interest_level' => $this->faker->text(255),
            'estimated_value' => $this->faker->randomNumber(1),
            'status' => $this->faker->word(),
            'notes' => $this->faker->text(),
            'company_id' => $company->id,
            'created_by' => $user->id,
        ];

        $response = $this->put(route('potentials.update', $potential), $data);

        $data['id'] = $potential->id;

        $this->assertDatabaseHas('potentials', $data);

        $response->assertRedirect(route('potentials.edit', $potential));
    }

    /**
     * @test
     */
    public function it_deletes_the_potential(): void
    {
        $potential = Potential::factory()->create();

        $response = $this->delete(route('potentials.destroy', $potential));

        $response->assertRedirect(route('potentials.index'));

        $this->assertModelMissing($potential);
    }
}
