<svg
    xmlns='http://www.w3.org/2000/svg'
    viewBox="{{ $viewport_x }} {{ $viewport_y }} {{ $width }} {{ $height }}"
    width="{{ $width }}"
    height="{{ $height }}"
>
    <defs>
        <linearGradient id="linear_gradient_01" gradientTransform="rotate(90)">
            <stop offset="5%"  stop-color="hsl({{ $hue + 30 }}, {{ $saturation }}%, 70%)" />
            <stop offset="95%" stop-color="hsl({{ $hue }}, {{ $saturation }}%, 50%)" />
        </linearGradient>
        <filter id="shadow">
          <feDropShadow dx="1" dy="1" stdDeviation="2" flood-color="hsla({{ $hue + 30 }}, {{ $saturation }}%, 20%, 0.3)" />
        </filter>
    </defs>

    <rect
        x="{{ $viewport_x }}"
        y="{{ $viewport_y }}"
        width="{{ $width }}"
        height="{{ $height }}"
        fill="hsl({{ $hue + 60 }}, {{ $saturation - 30 }}%, 90%)"
    />
    <circle
        cx="{{ $right_eye_x_position }}"
        cy="{{ $mid_bottom }}"
        r="{{ $right_eye_radius }}"
        fill="hsl({{ $hue + 70 }}, {{ $saturation }}%, 70%)"
    />
    <polygon
        points="{{ $left_shape_polygon }}"
        style="filter:url(#shadow);"
        fill="url('#linear_gradient_01')"
        transform="
            skewY({{ $left_shape_skew_y }})
        "
    />
    <path
        d="{{ $wavey_line_points }}"
        style="
            fill: none;
            stroke: hsla({{ $hue }}, {{ $saturation }}%, 40%, 0.5);
            stroke-width: {{ $wavey_stroke_width }};
            transform: skewX({{ $left_shape_skew_y }});
        "
        transform="
            rotate({{ $wavey_line_rotate }})
            scale({{ $wavey_line_scale }})
            translate({{ $wavey_line_translate_x }}, {{ $wavey_line_translate_y }})
        "
    />
    <circle
        cx="{{ $left_eye_x_position }}"
        cy="{{ $mid_top }}"
        r="{{ $left_eye_radius }}"
        fill="hsl({{ $hue }}, {{ $saturation }}%, 90%)"
        style="filter:url(#shadow);"
    />

</svg>
