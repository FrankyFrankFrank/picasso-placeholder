<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class CharacterizationTest extends TestCase
{
    use MatchesSnapshots;
    /** @test **/
    public function testBaseSVG()
    {
        $response = $this->get('/100/100?seed=taco');

        $this->assertMatchesSnapshot($response->getContent());
    }

    /** @test **/
    public function testWithHue()
    {
        $response = $this->get('/100/100?seed=taco&hue=30');

        $this->assertMatchesSnapshot($response->getContent());
    }

    public function testWithSaturation()
    {
        $response = $this->get('/100/100?seed=taco&saturation=30');

        $this->assertMatchesSnapshot($response->getContent());
    }
}
