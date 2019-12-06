<?php

namespace Tests\Unit;

use App\Http\Requests\SvgRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class SvgRequestTest extends TestCase
{
    /** @test **/
    public function it_returns_a_random_hue_if_not_present_in_query()
    {
        $request = SvgRequest::create(route('generate', ['width' => 100, 'height' => 100]));

        $this->assertTrue($request->hue() >= 0);
        $this->assertTrue($request->hue() <= 360);
    }

    /** @test **/
    public function it_returns_a_random_saturation_if_not_present_in_query()
    {
        $request = SvgRequest::create(route('generate', ['width' => 100, 'height' => 100]));

        $this->assertTrue($request->saturation() >= 0);
        $this->assertTrue($request->saturation() <= 100);
    }
}
