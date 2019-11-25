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

    $left_rectangle_width = rand($width / 4, $width * 0.9);
    $left_rectangle_point_three = $left_rectangle_width + 10;
    $left_rectangle_point_four = $left_rectangle_width - 10;

    $left_eye_radius = rand($width / 10, $width / 8);
    $left_eye_x_position = rand(0 + $left_eye_radius, $left_rectangle_width - $left_eye_radius);
    $left_eye_y_position = rand($height / 4, $height * 0.7);

    $right_eye_radius = rand($width / 10, $width / 8);
    $right_eye_x_position = rand($left_rectangle_width + $right_eye_radius, $width - $right_eye_radius);
    $right_eye_y_position = rand($height / 4, $height * 0.7);

    return view('picasso', [
        'width' => $width,
        'height' => $height,
        'background_hue' => $background_hue,
        'left_rectangle_width' => $left_rectangle_width,
        'left_rectangle_point_three' => $left_rectangle_point_three,
        'left_rectangle_point_four' => $left_rectangle_point_four,
        'left_eye_radius' => $left_eye_radius,
        'left_eye_x_position' => $left_eye_x_position,
        'left_eye_y_position' => $left_eye_y_position,
        'right_eye_radius' => $right_eye_radius,
        'right_eye_x_position' => $right_eye_x_position,
        'right_eye_y_position' => $right_eye_y_position,
    ]);
});
