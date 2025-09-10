<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ToolCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_tool_categories(): void
    {
        $toolCategories = ToolCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tool-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_categories.index')
            ->assertViewHas('toolCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tool_category(): void
    {
        $response = $this->get(route('tool-categories.create'));

        $response->assertOk()->assertViewIs('app.tool_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tool_category(): void
    {
        $data = ToolCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tool-categories.store'), $data);

        $this->assertDatabaseHas('tool_categories', $data);

        $toolCategory = ToolCategory::latest('id')->first();

        $response->assertRedirect(route('tool-categories.edit', $toolCategory));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tool_category(): void
    {
        $toolCategory = ToolCategory::factory()->create();

        $response = $this->get(route('tool-categories.show', $toolCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_categories.show')
            ->assertViewHas('toolCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tool_category(): void
    {
        $toolCategory = ToolCategory::factory()->create();

        $response = $this->get(route('tool-categories.edit', $toolCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_categories.edit')
            ->assertViewHas('toolCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_tool_category(): void
    {
        $toolCategory = ToolCategory::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('tool-categories.update', $toolCategory),
            $data
        );

        $data['id'] = $toolCategory->id;

        $this->assertDatabaseHas('tool_categories', $data);

        $response->assertRedirect(route('tool-categories.edit', $toolCategory));
    }

    /**
     * @test
     */
    public function it_deletes_the_tool_category(): void
    {
        $toolCategory = ToolCategory::factory()->create();

        $response = $this->delete(
            route('tool-categories.destroy', $toolCategory)
        );

        $response->assertRedirect(route('tool-categories.index'));

        $this->assertModelMissing($toolCategory);
    }
}
