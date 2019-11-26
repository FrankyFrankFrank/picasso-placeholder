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

Route::get('/{width}/{height}', function ($width, $height) {
    $background_hue = rand(0, 360);

    $half_width = $width / 2;
    $half_height = $height / 2;

    $length_of_shortest_side = min([$width, $height]);

    $mid_x = rand($width * 0.25, $width * 0.75);
    $mid_y = rand($height * 0.25, $height * 0.75);

    $mid_left = $mid_x / 2;
    $mid_right = $mid_left + $half_width;
    $mid_top = $mid_y / 2;
    $mid_bottom = $mid_y / 2 + $half_height;

    $nose_width = rand($width / 30, $width / 10);

    $left_eye_radius = rand($length_of_shortest_side / 10, $length_of_shortest_side / 8);
    $right_eye_radius = rand($length_of_shortest_side / 20, $length_of_shortest_side / 10);

    $left_shape_polygon_points = array(
        "0" . "," . "0",
        $mid_x + $nose_width / 2 . "," . "0",
        $mid_x + $nose_width / 2 . "," . $mid_y,
        $mid_x - $nose_width / 2 . "," . $mid_y,
        $mid_x - $nose_width / 2 . "," . $height,
        "0" . "," . $height,
    );

    $left_shape_polygon = join(" ", $left_shape_polygon_points);

    $wave_length = str_repeat('20,20 ', rand(2,8));

    $wave = array(
        'M ' . strval($half_width - 40) . "," . strval($half_height - 40),
        'Q ' . strval($half_width - 20) . "," . strval($half_height - 40),
        strval($half_width - 20) . "," . strval($half_height - 20),
        't ' . $wave_length,
    );
    // $wave = array(
    //     'M ' . strval($half_width - 40) . "," . strval($half_height - 40),
    //     't ' . strval($half_width - 20) . "," . strval($half_height - 40),
    //     't ' . strval($half_width - 20) . "," . strval($half_height - 20),
    //     't ' . $half_width . "," . strval($half_height - 20),
    //     't ' . $half_width . "," . $half_height,
    //     't ' . strval($half_width + 20) . "," . $half_height,
    //     't ' . strval($half_width + 20) . "," . strval($half_height + 20),
    //     't ' . strval($half_width + 40) . "," . strval($half_height + 20),
    //     't ' . strval($half_width + 40) . "," . strval($half_height + 40),
    // );
    $wavey_line_points = join(" ", $wave);

    $wavey_line_translate_x = rand(-$half_width * 0.5, $half_width * 0.5);
    $wavey_line_translate_y = rand(-$half_height * 0.5, $half_height * 0.5);
    $wavey_line_scale = rand(10, 30) / 10;
    $wavey_line_rotate = rand(0, 360);
    $wavey_line_transform_origin = $half_width . "px " . $half_height . "px";

    return view('picasso', [
        'width' => $width,
        'height' => $height,

        'background_hue' => $background_hue,

        'mid_x' => $mid_x,
        'mid_y' => $mid_y,
        'mid_left' => $mid_left,
        'mid_top' => $mid_top,
        'mid_right' => $mid_right,
        'mid_bottom' => $mid_bottom,

        'right_eye_radius' => $right_eye_radius,
        'left_eye_radius' => $left_eye_radius,

        'left_shape_polygon' => $left_shape_polygon,

        'wavey_line_points' => $wavey_line_points,
        'wavey_line_translate_x' => $wavey_line_translate_x,
        'wavey_line_translate_y' => $wavey_line_translate_y,
        'wavey_line_scale' => $wavey_line_scale,
        'wavey_line_rotate' => $wavey_line_rotate,
        'wavey_line_transform_origin' => $wavey_line_transform_origin,
    ]);
});
