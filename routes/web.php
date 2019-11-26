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

    $foo = array(
        strval($half_width - 40) . "," . strval($half_height - 40),
        strval($half_width - 20) . "," . strval($half_height - 40),
        strval($half_width - 20) . "," . strval($half_height - 20),
        $half_width . "," . strval($half_height - 20),
        $half_width . "," . $half_height,
        strval($half_width + 20) . "," . $half_height,
        strval($half_width + 20) . "," . strval($half_height + 20),
        strval($half_width + 40) . "," . strval($half_height + 20),
        strval($half_width + 40) . "," . strval($half_height + 40),
    );
    $polyline_points = join(" ", $foo);

    $polyline_translate_x = rand(-$half_width * 0.5, $half_width * 0.5);
    $polyline_translate_y = rand(-$half_height * 0.5, $half_height * 0.5);
    $polyline_scale = rand(10, 30) / 10;
    $polyline_rotate = rand(0, 360);
    $polyline_transform_origin = $half_width . "px " . $half_height . "px";

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

        'polyline_points' => $polyline_points,
        'polyline_translate_x' => $polyline_translate_x,
        'polyline_translate_y' => $polyline_translate_y,
        'polyline_scale' => $polyline_scale,
        'polyline_rotate' => $polyline_rotate,
        'polyline_transform_origin' => $polyline_transform_origin,
    ]);
});
