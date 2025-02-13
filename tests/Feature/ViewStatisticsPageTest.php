<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewStatisticsPageTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_request_to_the_statistcs_page_should_return_a_200_status_code(): void
    {
        $this->get('/statistics')
            ->assertOk()
            ->assertViewIs('statistics');
    }
}
