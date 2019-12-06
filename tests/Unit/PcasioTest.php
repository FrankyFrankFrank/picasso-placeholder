<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PcasioTest extends TestCase
{
    /** @test **/
    public function itGetsDimensionsFromRequest() {
        $expected_width = '222';
        $expected_height = '111';

        $response = $this->get('/' . $expected_width . '/'. $expected_height);

        $response->assertViewHas('width', $expected_width);
        $response->assertViewHas('height', $expected_height);
    }

    /** @test **/
    public function itGetsHueFromRequest() {
        $expected_hue = '345';

        $response = $this->get('/100/100?hue=' . $expected_hue);

        $response->assertViewHas('hue', $expected_hue);
    }

    /** @test **/
    public function itGetsSaturationFromRequest() {
        $expected_saturation = '88';

        $response = $this->get('/100/100?saturation=' . $expected_saturation);

        $response->assertViewHas('saturation', $expected_saturation);
    }
    
    /** @test **/
    public function itHasTheCorrectViewportOrigin()
    {
        $width = '420';
        $height = '630';
        $response = $this->get('/'. $width . '/' . $height);

        $response->assertViewHas('viewport_x', -210);
        $response->assertViewHas('viewport_y', -315);
    }
}
