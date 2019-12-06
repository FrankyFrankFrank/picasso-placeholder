<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SvgRequest extends FormRequest
{
    const HUE_MIN = 0;
    const HUE_MAX = 360;
    const SATURATION_DEFAULT = 80;


    public function hue() {
        return $this->has('hue') ? $this->query('hue') : rand(self::HUE_MIN, self::HUE_MAX);
    }

    public function saturation() {
        return $this->has('saturation') ? $this->query('saturation') : self::SATURATION_DEFAULT;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
