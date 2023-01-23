<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_page_shows_text()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertSeeText('Welcome to Minplan. We are here to support you in times of crisis.');
        $response->assertSeeText('We will help you and your loved ones cope');
    }
    public function test_help_page_shows_text()
    {
        $response = $this->get('/help');

        $response->assertStatus(200);
        $response->assertSeeText('The goal is to reduce access to resources or items which can be used to cause you harm');
        $response->assertSeeText('Move away from places that trigger something in you');
    }
    public function test_age_page_shows_text()
    {
        $response = $this->get('/home/guidance');

        $response->assertStatus(200);
        $response->assertSeeText('Tell us your age to let us help you better');
    }
    public function test_teen_age_shows_text()
    {
        $response = $this->get('/home/guidance/teens');

        $response->assertStatus(200);
        $response->assertSeeText('As a young person in need it is a good idea to ask for help from somebody you trust');
    }
}
