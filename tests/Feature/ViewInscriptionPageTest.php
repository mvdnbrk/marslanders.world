<?php

namespace Tests\Feature;

use App\Models\Marslander;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewInscriptionPageTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    #[Test]
    public function a_request_to_the_inscription_page_should_return_a_200_status_code(): void
    {
        $marslander = Marslander::factory()->create();

        $this->get('/inscription/d69deae6e29207fbc1b46a7a878ad631f790aadc3b5d00da4b9960c371eeae62i0')
            ->assertOk()
            ->assertViewIs('marslander');
    }
}
