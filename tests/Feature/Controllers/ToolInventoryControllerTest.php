<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ToolInventory;

use App\Models\ToolCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolInventoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_tool_inventories(): void
    {
        $toolInventories = ToolInventory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tool-inventories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_inventories.index')
            ->assertViewHas('toolInventories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tool_inventory(): void
    {
        $response = $this->get(route('tool-inventories.create'));

        $response->assertOk()->assertViewIs('app.tool_inventories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tool_inventory(): void
    {
        $data = ToolInventory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tool-inventories.store'), $data);

        $this->assertDatabaseHas('tool_inventories', $data);

        $toolInventory = ToolInventory::latest('id')->first();

        $response->assertRedirect(
            route('tool-inventories.edit', $toolInventory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tool_inventory(): void
    {
        $toolInventory = ToolInventory::factory()->create();

        $response = $this->get(route('tool-inventories.show', $toolInventory));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_inventories.show')
            ->assertViewHas('toolInventory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tool_inventory(): void
    {
        $toolInventory = ToolInventory::factory()->create();

        $response = $this->get(route('tool-inventories.edit', $toolInventory));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_inventories.edit')
            ->assertViewHas('toolInventory');
    }

    /**
     * @test
     */
    public function it_updates_the_tool_inventory(): void
    {
        $toolInventory = ToolInventory::factory()->create();

        $toolCategory = ToolCategory::factory()->create();
        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'purchase_date' => $this->faker->dateTime(),
            'purchase_price' => $this->faker->randomNumber(1),
            'location_store' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber(),
            'status' => $this->faker->word(),
            'picture' => $this->faker->text(255),
            'notes' => $this->faker->text(),
            'tool_category_id' => $toolCategory->id,
            'created_by' => $user->id,
        ];

        $response = $this->put(
            route('tool-inventories.update', $toolInventory),
            $data
        );

        $data['id'] = $toolInventory->id;

        $this->assertDatabaseHas('tool_inventories', $data);

        $response->assertRedirect(
            route('tool-inventories.edit', $toolInventory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_tool_inventory(): void
    {
        $toolInventory = ToolInventory::factory()->create();

        $response = $this->delete(
            route('tool-inventories.destroy', $toolInventory)
        );

        $response->assertRedirect(route('tool-inventories.index'));

        $this->assertModelMissing($toolInventory);
    }
}
