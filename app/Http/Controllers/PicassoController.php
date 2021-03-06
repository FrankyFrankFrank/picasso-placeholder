<?php

namespace App\Http\Controllers;

use App\Http\Requests\SvgRequest;
use Illuminate\Support\Facades\View;

/**
 * Class PicassoController
 * @package App\Http\Controllers
 */
class PicassoController extends Controller
{

    /**
     * @param SvgRequest $request
     * @param String $width
     * @param String $height
     * @return Controller $this
     */
    public function show(SvgRequest $request, $width, $height)
    {
        if(! $request->has('seed')) {

            $seed = rand();

            return redirect()->route(
                'generate',
                array_merge([
                    'width' => $width,
                    'height' => $height,
                    'seed' => $seed
                ], $request->query())
            );
        }

        $this->generateSeed($request);

        $hue = $request->hue();
        $saturation = $request->saturation();

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

        $left_eye_radius = rand($length_of_shortest_side / 15, $length_of_shortest_side / 2);
        $left_eye_x_position = rand($viewport_x, 0);
        $left_eye_y_position = rand($mid_top, $mid_bottom);

        $right_eye_radius = rand($length_of_shortest_side / 8, $length_of_shortest_side);
        $right_eye_x_position = rand(0, -$viewport_x);

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
            'left_eye_y_position' => $left_eye_y_position,

            'left_shape' => $this->generate_left_polygon($width, $height, $mid_left, $mid_right, $viewport_x, $viewport_y),

            'wavey_line' => $this->generate_wavey_line($length_of_shortest_side),
        ];

        if ($request->query('type', 'svg') === 'png') {
            $view = view('picasso', $data)->render();

            $magic = new \Imagick();
            $magic->readImageBlob($view);
            $magic->setImageFormat('png24');


            return response()
                ->make($magic->getImageBlob())
                ->header('Content-Type', 'image/png');
        }

        return response()
            ->view('picasso', $data, 200)
            ->header('Content-Type', 'image/svg+xml');
    }

    private function generateSeed(SvgRequest $request)
    {
        if($request->has('seed')) {
            srand(crc32($request->query('seed')));
        }
    }

    private function generate_left_polygon($width, $height, $mid_left, $mid_right, $viewport_x, $viewport_y)
    {
        $nose_width = rand($width / 30, $width / 3);

        $left_shape_skew_x_distance = rand($width / 10, $width / 8);
        $left_shape_skew_y_distance = rand($height / 10, $height / 8);

        $left_shape_skew_y = rand(-10,10);
        $left_shape_center_x = rand($mid_left, $mid_right);
        $left_shape_rotate = rand(-10, 10);
        $has_nose = (bool)rand(0,1);

        $left_shape_polygon = $this->generate_left_polygon_points($viewport_x, $viewport_y, $left_shape_center_x, $has_nose, $nose_width, $left_shape_skew_y_distance);

        return [
            'polygon' => $left_shape_polygon,
            'skew_y' => $left_shape_skew_y,
            'rotate' => $left_shape_rotate,
        ];
    }

    /**
     * @param int $viewport_x
     * @param int $viewport_y
     * @param int $center_x
     * @param bool $has_nose
     * @param int $nose_width
     * @param int $skew_y_distance
     * @return array
     */
    private function generate_left_polygon_points($viewport_x, $viewport_y, $center_x, $has_nose, $nose_width, $skew_y_distance)
    {
        $points = array(
            $viewport_x * 2 . "," . $viewport_y * 2,
            $center_x . "," . $viewport_y * 2,
        );

        if ($has_nose) {
            array_push(
                $points,
                $nose_width / 2 + $center_x . "," . $skew_y_distance,
                -$nose_width / 2 + $center_x . "," . $skew_y_distance
            );
        }

        array_push(
            $points,
            $center_x . "," . -$viewport_y * 2,
            $viewport_x * 2 . "," . -$viewport_y * 2
        );

        return join(" ", $points);
    }

    private function generate_wavey_line($length_of_shortest_side)
    {
        $number_of_waves = rand(2,8);

        $wavey_stroke_width = rand($length_of_shortest_side / 20, $length_of_shortest_side / 8);
        $wave_length = rand($wavey_stroke_width, $wavey_stroke_width * 6);

        return [
            'points' => $this->generate_wavey_line_points($wave_length, $number_of_waves),
            'stroke_width' => $wavey_stroke_width,
            'translate_x' => -($number_of_waves * $wave_length) / 2,
            'translate_y' => rand(0, $length_of_shortest_side / 5),
            'scale' => rand(20, 40) / 10,
            'rotate' => rand(0, 360),
        ];
    }

    /**
     * @param $wave_length
     * @param $wave_sequence
     * @return string
     */
    private function generate_wavey_line_points($wave_length, $number_of_waves): string
    {
        $wave_sequence = str_repeat($wave_length . ' 0 ', $number_of_waves);

        $wave = array(
            "M -" . ($wave_length / 2) . ",0",
            "Q 0 " . ($wave_length / 2) . ", " . ($wave_length / 2) . " 0",
            't ' . $wave_sequence,
        );
        return join(" ", $wave);
    }

}
