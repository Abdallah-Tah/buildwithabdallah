<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarketingPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_positions_abdallah_services_without_public_admin_link(): void
    {
        $this->withoutVite();

        $this->get('/')
            ->assertOk()
            ->assertSee('AI agents')
            ->assertSee('Kyocera AVX')
            ->assertSee('buildwithabdallah@gmail.com')
            ->assertDontSee('href="http://localhost/admin"', false)
            ->assertDontSee('>Admin<', false);
    }

    public function test_newsletter_signup_can_be_updated_for_existing_email(): void
    {
        $this->withoutVite();

        $payload = [
            'email' => 'client@example.com',
            'name' => 'Client',
            'source' => 'test',
        ];

        $this->post('/newsletter', $payload)->assertSessionHasNoErrors();
        $this->post('/newsletter', [...$payload, 'name' => 'Client Updated'])->assertSessionHasNoErrors();

        $this->assertDatabaseCount('newsletter_subscribers', 1);
        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'client@example.com',
            'name' => 'Client Updated',
        ]);
    }

    public function test_contact_form_stores_business_inquiry(): void
    {
        $this->withoutVite();

        $this->post('/contact', [
            'name' => 'Prospect',
            'email' => 'prospect@example.com',
            'subject' => 'Dashboard project',
            'message' => 'I need a dashboard and an API integration.',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'prospect@example.com',
            'subject' => 'Dashboard project',
        ]);
    }

    public function test_health_check_returns_ok(): void
    {
        $this->getJson('/api/health-check')
            ->assertOk()
            ->assertJson([
                'status' => 'ok',
            ]);
    }
}
