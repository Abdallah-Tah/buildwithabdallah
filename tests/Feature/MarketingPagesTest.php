<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarketingPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_positions_company_without_public_admin_link(): void
    {
        $this->withoutVite();

        $this->get('/')
            ->assertOk()
            ->assertSee('Software Development')
            ->assertSee('legacy modernization')
            ->assertSee('buildwithabdallah@gmail.com')
            ->assertDontSee('href="http://localhost/admin"', false)
            ->assertDontSee('>Admin<', false);
    }

    public function test_homepage_explains_deliverables_engagements_and_the_engineer(): void
    {
        $this->withoutVite();

        $this->get('/')
            ->assertOk()
            ->assertSeeText('Typical deliverables')
            ->assertSeeText('Role-based workflows')
            ->assertSeeText('data-acquisition workflow')
            ->assertSeeText('milestones and acceptance criteria')
            ->assertSeeText('Founded by Abdallah Mohamed')
            ->assertSeeText('Understand an existing system')
            ->assertSeeText('Deliver a defined project')
            ->assertSeeText('Maintain and improve')
            ->assertSee('href="'.route('about').'"', false)
            ->assertSee('href="'.route('contact.index').'"', false);
    }

    public function test_homepage_links_to_existing_engineering_summaries(): void
    {
        $this->withoutVite();

        $response = $this->get('/')->assertOk();

        foreach (config('case-studies') as $slug => $caseStudy) {
            $response
                ->assertSeeText($caseStudy['title'])
                ->assertSeeText($caseStudy['summary'])
                ->assertSee('href="'.route('case-studies.show', $slug).'"', false);
        }

        $response->assertSeeText('Client identities and proprietary implementation details remain confidential.');
    }

    public function test_homepage_answers_project_questions_with_native_disclosures(): void
    {
        $this->withoutVite();

        $response = $this->get('/')
            ->assertOk()
            ->assertSeeText('How are pricing and timelines determined?')
            ->assertSeeText('Who owns the code and documentation?')
            ->assertSeeText('What happens after launch?')
            ->assertSeeText('defined in the engagement agreement')
            ->assertSeeText('Support availability and response expectations are agreed for each engagement.');

        $document = new \DOMDocument;
        @$document->loadHTML($response->getContent());
        $xpath = new \DOMXPath($document);
        $questions = $xpath->query('//section[@id="faq"]//details/summary');
        $answers = $xpath->query('//section[@id="faq"]//details/p');

        $this->assertCount(6, $questions);
        $this->assertCount(6, $answers);

        foreach ($questions as $question) {
            $this->assertNotEmpty(trim($question->textContent));
        }

        foreach ($answers as $answer) {
            $this->assertNotEmpty(trim($answer->textContent));
        }
    }

    public function test_kirada_portfolio_preview_does_not_depend_on_a_missing_upload(): void
    {
        $this->withoutVite();

        $response = $this->get('/')
            ->assertOk()
            ->assertSeeText('Rental operations, connected.')
            ->assertSeeText('Properties, units, tenants and leases')
            ->assertSeeText('Invoices, payment proofs and documents')
            ->assertSeeText('Maintenance requests and messaging')
            ->assertSee('href="https://kirada.buildwithabdallah.com"', false)
            ->assertDontSee('01KXXD1NG9X4YDDVRGCH9SKGV1.png');

        $document = new \DOMDocument;
        @$document->loadHTML($response->getContent());
        $xpath = new \DOMXPath($document);

        $this->assertCount(1, $xpath->query('//*[@data-kirada-overview]'));
        $this->assertCount(0, $xpath->query('//*[@data-kirada-overview]//img'));
        $this->assertCount(3, $xpath->query('//*[@data-kirada-overview]//dl/div'));
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
            'organization' => 'Example Manufacturing',
            'email' => 'prospect@example.com',
            'phone' => '207-555-0100',
            'project_type' => 'Systems Integration',
            'timeline' => 'Within 1–3 months',
            'message' => 'I need a dashboard and an API integration.',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'prospect@example.com',
            'organization' => 'Example Manufacturing',
            'project_type' => 'Systems Integration',
        ]);
    }

    public function test_government_page_shows_truthful_contracting_information_without_blank_identifiers(): void
    {
        $this->withoutVite();

        $this->get('/government')
            ->assertOk()
            ->assertSee('Government &amp; Public Sector Software Services', false)
            ->assertSee('541511')
            ->assertSee('Sole Proprietorship')
            ->assertDontSee('Government Contractor')
            ->assertDontSee('D-U-N-S');
    }

    public function test_government_contact_link_prefills_project_type(): void
    {
        $this->withoutVite();

        $this->get('/contact?project_type=Government%20%2F%20Public%20Sector')
            ->assertOk()
            ->assertSee('value="Government / Public Sector" selected', false);
    }

    public function test_capability_statement_is_truthful_and_print_ready(): void
    {
        $this->get('/government/capability-statement')
            ->assertOk()
            ->assertSee('Capability')
            ->assertSee('NAICS 541511')
            ->assertSee('Legacy Manufacturing Modernization')
            ->assertSee('Subcontracting / prime-contractor support')
            ->assertDontSee('D-U-N-S');
    }

    public function test_prime_contractor_inquiry_prefills_contact_flow(): void
    {
        $this->withoutVite();

        $this->get('/contact?project_type=Subcontracting%20%2F%20Prime%20Contractor%20Partnership')
            ->assertOk()
            ->assertSee('value="Subcontracting / Prime Contractor Partnership" selected', false);
    }

    public function test_anonymized_procurement_case_studies_are_available(): void
    {
        foreach ([
            'legacy-manufacturing-modernization' => 'Legacy Manufacturing Modernization',
            'enterprise-soap-integration' => 'Enterprise / SOAP Integration',
            'quality-device-integration' => 'Quality &amp; Device Integration',
        ] as $slug => $title) {
            $this->get("/work/{$slug}")
                ->assertOk()
                ->assertSee('Engineering approach')
                ->assertSee($title, false);
        }
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
