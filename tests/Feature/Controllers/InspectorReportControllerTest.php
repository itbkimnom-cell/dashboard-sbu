<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\InspectorReport;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InspectorReportControllerTest extends TestCase
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
    public function it_displays_index_view_with_inspector_reports(): void
    {
        $inspectorReports = InspectorReport::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('inspector-reports.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.inspector_reports.index')
            ->assertViewHas('inspectorReports');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_inspector_report(): void
    {
        $response = $this->get(route('inspector-reports.create'));

        $response->assertOk()->assertViewIs('app.inspector_reports.create');
    }

    /**
     * @test
     */
    public function it_stores_the_inspector_report(): void
    {
        $data = InspectorReport::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('inspector-reports.store'), $data);

        $this->assertDatabaseHas('inspector_reports', $data);

        $inspectorReport = InspectorReport::latest('id')->first();

        $response->assertRedirect(
            route('inspector-reports.edit', $inspectorReport)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_inspector_report(): void
    {
        $inspectorReport = InspectorReport::factory()->create();

        $response = $this->get(
            route('inspector-reports.show', $inspectorReport)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.inspector_reports.show')
            ->assertViewHas('inspectorReport');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_inspector_report(): void
    {
        $inspectorReport = InspectorReport::factory()->create();

        $response = $this->get(
            route('inspector-reports.edit', $inspectorReport)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.inspector_reports.edit')
            ->assertViewHas('inspectorReport');
    }

    /**
     * @test
     */
    public function it_updates_the_inspector_report(): void
    {
        $inspectorReport = InspectorReport::factory()->create();

        $user = User::factory()->create();
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'inspection_date' => $this->faker->dateTime(),
            'file_report' => $this->faker->text(255),
            'file_report_date' => $this->faker->dateTime(),
            'file_bast' => $this->faker->text(255),
            'file_bast_date' => $this->faker->dateTime(),
            'inspector_user_id' => $user->id,
            'administration_user_id' => $user->id,
        ];

        $response = $this->put(
            route('inspector-reports.update', $inspectorReport),
            $data
        );

        $data['id'] = $inspectorReport->id;

        $this->assertDatabaseHas('inspector_reports', $data);

        $response->assertRedirect(
            route('inspector-reports.edit', $inspectorReport)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_inspector_report(): void
    {
        $inspectorReport = InspectorReport::factory()->create();

        $response = $this->delete(
            route('inspector-reports.destroy', $inspectorReport)
        );

        $response->assertRedirect(route('inspector-reports.index'));

        $this->assertModelMissing($inspectorReport);
    }
}
