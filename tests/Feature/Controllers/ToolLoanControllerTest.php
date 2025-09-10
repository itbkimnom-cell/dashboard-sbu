<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ToolLoan;

use App\Models\ToolInventory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolLoanControllerTest extends TestCase
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
    public function it_displays_index_view_with_tool_loans(): void
    {
        $toolLoans = ToolLoan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tool-loans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_loans.index')
            ->assertViewHas('toolLoans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tool_loan(): void
    {
        $response = $this->get(route('tool-loans.create'));

        $response->assertOk()->assertViewIs('app.tool_loans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tool_loan(): void
    {
        $data = ToolLoan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tool-loans.store'), $data);

        $this->assertDatabaseHas('tool_loans', $data);

        $toolLoan = ToolLoan::latest('id')->first();

        $response->assertRedirect(route('tool-loans.edit', $toolLoan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tool_loan(): void
    {
        $toolLoan = ToolLoan::factory()->create();

        $response = $this->get(route('tool-loans.show', $toolLoan));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_loans.show')
            ->assertViewHas('toolLoan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tool_loan(): void
    {
        $toolLoan = ToolLoan::factory()->create();

        $response = $this->get(route('tool-loans.edit', $toolLoan));

        $response
            ->assertOk()
            ->assertViewIs('app.tool_loans.edit')
            ->assertViewHas('toolLoan');
    }

    /**
     * @test
     */
    public function it_updates_the_tool_loan(): void
    {
        $toolLoan = ToolLoan::factory()->create();

        $toolInventory = ToolInventory::factory()->create();
        $user = User::factory()->create();
        $user = User::factory()->create();
        $user = User::factory()->create();

        $data = [
            'start_loan_date' => $this->faker->dateTime(),
            'end_loan_date' => $this->faker->dateTime(),
            'return_date' => $this->faker->dateTime(),
            'quantity' => $this->faker->randomNumber(),
            'condition_out' => $this->faker->text(255),
            'condition_in' => $this->faker->text(255),
            'status' => $this->faker->word(),
            'notes' => $this->faker->text(),
            'tool_inventory_id' => $toolInventory->id,
            'borrowed_by' => $user->id,
            'approved_returned_by' => $user->id,
            'approved_borrowed_by' => $user->id,
        ];

        $response = $this->put(route('tool-loans.update', $toolLoan), $data);

        $data['id'] = $toolLoan->id;

        $this->assertDatabaseHas('tool_loans', $data);

        $response->assertRedirect(route('tool-loans.edit', $toolLoan));
    }

    /**
     * @test
     */
    public function it_deletes_the_tool_loan(): void
    {
        $toolLoan = ToolLoan::factory()->create();

        $response = $this->delete(route('tool-loans.destroy', $toolLoan));

        $response->assertRedirect(route('tool-loans.index'));

        $this->assertModelMissing($toolLoan);
    }
}
