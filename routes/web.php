<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{width}/{height}/{hue?}/{saturation?}', function ($width, $height, $user_hue = false, $user_saturation = false) {
    $hue = $user_hue >= 0 ? $user_hue : rand(0, 360);
    $saturation = $user_saturation >= 0 ? $user_saturation : 80;
    $half_width = $width / 2;
    $half_height = $height / 2;

    $viewport_y = -$half_height;
    $viewport_x = -$half_width;

    $length_of_shortest_side = min([$width, $height]);

    $mid_left = -$width  / 4;
    $mid_right = $width / 4;
    $mid_top = -$height / 4;
    $mid_bottom = $height / 4;

    $nose_width = rand($width / 30, $width / 10);

    $left_eye_radius = rand($length_of_shortest_side / 20, $length_of_shortest_side / 4);
    $left_eye_x_position = rand($viewport_x, 0);

    $right_eye_radius = rand($length_of_shortest_side / 20, $length_of_shortest_side / 4);
    $right_eye_x_position = rand(0, -$viewport_x);

    $left_shape_skew_x_distance = rand($width / 10, $width / 8);
    $left_shape_skew_y_distance = rand($height / 10, $height / 8);

    $left_shape_polygon_points = array(
        $viewport_x . "," . $viewport_y,
        "0" . "," . $viewport_y,
        $nose_width / 2 . "," . $left_shape_skew_y_distance,
        -$nose_width / 2 . "," . $left_shape_skew_y_distance,
        "0" . "," . -$viewport_y,
        $viewport_x . "," . -$viewport_y,
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
    $wavey_line_translate_y = rand(0, $length_of_shortest_side / 4);
    $wavey_line_scale = rand(20, 40) / 10;
    $wavey_line_rotate = rand(0, 360);


    return view('picasso', [
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

        'wavey_line_points' => $wavey_line_points,
        'wavey_line_translate_x' => $wavey_line_translate_x,
        'wavey_line_translate_y' => $wavey_line_translate_y,
        'wavey_line_scale' => $wavey_line_scale,
        'wavey_line_rotate' => $wavey_line_rotate,
        'wavey_stroke_width' => $wavey_stroke_width,
    ]);
});
