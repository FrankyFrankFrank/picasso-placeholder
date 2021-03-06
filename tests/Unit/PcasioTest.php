<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PcasioTest extends TestCase
{
    public $testSeed = 'foo';

    /** @test **/
    public function itGetsDimensionsFromRequest() {
        $this->withoutExceptionHandling();
        $expected_width = '222';
        $expected_height = '111';

        $response = $this->get('/' . $expected_width . '/'. $expected_height . '?seed=' . $this->testSeed);

        $response->assertViewHas('width', $expected_width);
        $response->assertViewHas('height', $expected_height);
    }

    /** @test **/
    public function itGetsHueFromRequest() {
        $expected_hue = '345';

        $response = $this->get('/100/100?hue=' . $expected_hue . '&seed=' . $this->testSeed);

        $response->assertViewHas('hue', $expected_hue);
    }

    /** @test **/
    public function itGetsSaturationFromRequest() {
        $expected_saturation = '88';

        $response = $this->get('/100/100?saturation=' . $expected_saturation . '&seed=' . $this->testSeed);

        $response->assertViewHas('saturation', $expected_saturation);
    }

    /** @test **/
    public function itHasTheCorrectViewportOrigin()
    {
        $width = '420';
        $height = '630';

        $response = $this->get('/'. $width . '/' . $height . '?seed=' . $this->testSeed);

        $response->assertViewHas('viewport_x', -210);
        $response->assertViewHas('viewport_y', -315);
    }

    /** @test **/
    public function itHasTheCorrectMidpoints()
    {
        $width = '420';
        $height = '640';

        $response = $this->get('/'. $width . '/' . $height . '?seed=' . $this->testSeed);

        $response->assertViewHas('mid_left', -105);
        $response->assertViewHas('mid_right', 105);
        $response->assertViewHas('mid_bottom', 160);
        $response->assertViewHas('mid_top', -160);
    }

    /** @test **/
    public function itHasTheCorrectRightEyeValues()
    {
        $width = '420';
        $height = '640';

        $half_width = $width / 2;

        $response = $this->get('/'. $width . '/' . $height . '?seed=' . $this->testSeed);

        $this->assertThat(
            $response->viewData('right_eye_radius'),
            $this->logicalAnd(
                $this->greaterThanOrEqual($width / 8),
                $this->lessThanOrEqual($width)
            )
        );

        $this->assertThat(
            $response->viewData('right_eye_x_position'),
            $this->logicalAnd(
                $this->greaterThanOrEqual(0),
                $this->lessThanOrEqual($half_width)
            )
        );
    }

    /** @test **/
    public function itHasTheCorrectLeftEyePositioning()
    {
        $width = '1000';
        $height = '150';

        $expected_min_radius = '10';
        $expected_max_radius = '75';

        $expected_min_x_position = '-500';
        $expected_max_x_position = '0';

        $expected_min_y_position = -$height / 4;
        $expected_max_y_position = $height / 4;

        $response = $this->get('/'. $width . '/' . $height . '?seed=' . $this->testSeed);

        $this->assertThat(
            $response->viewData('left_eye_radius'),
            $this->logicalAnd(
                $this->greaterThanOrEqual($expected_min_radius),
                $this->lessThanOrEqual($expected_max_radius)
            )
        );

        $this->assertThat(
            $response->viewData('left_eye_x_position'),
            $this->logicalAnd(
                $this->greaterThanOrEqual($expected_min_x_position),
                $this->lessThanOrEqual($expected_max_x_position)
            )
        );

        $this->assertThat(
            $response->viewData('left_eye_y_position'),
            $this->logicalAnd(
                $this->greaterThanOrEqual($expected_min_y_position),
                $this->lessThanOrEqual($expected_max_y_position)
            )
        );
    }

    /** @test 
    */
    public function itGetsImageAsSvg()
    {
        $response = $this->get('/300/500?seed=' . $this->testSeed);

        $response->assertHeader('content-type', 'image/svg+xml');
    }

    /** @test 
    */
    public function itGetsImageAsPngIfRequested()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/300/500?seed=' . $this->testSeed.'&type=png')
            ->assertOk();

        $response->assertHeader('content-type', 'image/png');
    }
}
