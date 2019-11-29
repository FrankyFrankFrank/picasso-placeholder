<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PicassoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $width, $height)
    {
        if(!is_null($request->query('seed'))) {
            srand(crc32($request->query('seed')));
        }

        $hue = !is_null($request->query('hue')) ? $request->query('hue') : rand(0, 360);
        $saturation = !is_null($request->query('saturation')) ? $request->query('saturation') : 80;

        $half_width = $width / 2;
        $half_height = $height / 2;

        $viewport_y = -$half_height;
        $viewport_x = -$half_width;

        $length_of_shortest_side = min([$width, $height]);
        $legnth_of_longest_side = max([$width, $height]);

        $mid_left = -$width  / 4;
        $mid_right = $width / 4;
        $mid_top = -$height / 4;
        $mid_bottom = $height / 4;

        $nose_width = rand($width / 30, $width / 3);

        $left_eye_radius = rand($length_of_shortest_side / 10, $length_of_shortest_side / 2);
        $left_eye_x_position = rand($viewport_x, 0);

        $right_eye_radius = rand($length_of_shortest_side / 8, $length_of_shortest_side);
        $right_eye_x_position = rand(0, -$viewport_x);

        $left_shape_skew_x_distance = rand($width / 10, $width / 8);
        $left_shape_skew_y_distance = rand($height / 10, $height / 8);

        $left_shape_skew_y = rand(-10,10);

        $left_shape_polygon_points = array(
            $viewport_x * 2 . "," . $viewport_y * 2,
            "0" . "," . $viewport_y * 2,
            $nose_width / 2 . "," . $left_shape_skew_y_distance,
            -$nose_width / 2 . "," . $left_shape_skew_y_distance,
            "0" . "," . -$viewport_y * 2,
            $viewport_x * 2 . "," . -$viewport_y * 2,
        );

        $left_shape_polygon = join(" ", $left_shape_polygon_points);

        $number_of_waves = rand(2,8);

        $wavey_stroke_width = rand($length_of_shortest_side / 20, $length_of_shortest_side / 8);
        $wave_length = rand($wavey_stroke_width, $wavey_stroke_width * 6);
        $wave_sequence = str_repeat($wave_length . ' 0 ', $number_of_waves);

        $wave = array(
            "M -" . ($wave_length / 2) . ",0",
            "Q 0 " . ($wave_length / 2) . ", " . ($wave_length / 2) . " 0",
            't ' . $wave_sequence,
        );

        $wavey_line_points = join(" ", $wave);

        $wavey_line_translate_x = -($number_of_waves * $wave_length) / 2;
        $wavey_line_translate_y = rand(0, $length_of_shortest_side / 5);
        $wavey_line_scale = rand(20, 40) / 10;
        $wavey_line_rotate = rand(0, 360);

        $data = [
            'width' => $width,
            'height' => $height,

            'hue' => $hue,
            'saturation' => $saturation,

            'viewport_x' => $viewport_x,
            'viewport_y' => $viewport_y,

            'mid_left' => $mid_left,
            'mid_top' => $mid_top,
            'mid_right' => $mid_right,
            'mid_bottom' => $mid_bottom,

            'right_eye_radius' => $right_eye_radius,
            'right_eye_x_position' => $right_eye_x_position,

            'left_eye_radius' => $left_eye_radius,
            'left_eye_x_position' => $left_eye_x_position,

            'left_shape_polygon' => $left_shape_polygon,

            'left_shape_skew_y' => $left_shape_skew_y,

            'wavey_line_points' => $wavey_line_points,
            'wavey_line_translate_x' => $wavey_line_translate_x,
            'wavey_line_translate_y' => $wavey_line_translate_y,
            'wavey_line_scale' => $wavey_line_scale,
            'wavey_line_rotate' => $wavey_line_rotate,
            'wavey_stroke_width' => $wavey_stroke_width,
        ];

        return response()
        ->view('picasso', $data, 200)
        ->header('Content-Type', 'image/svg+xml');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
