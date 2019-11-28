<svg
    viewBox="{{ $viewport_x }} {{ $viewport_y }} {{ $width }} {{ $height }}"
    width="{{ $width }}"
    height="{{ $height }}"
>
    <defs>
        <linearGradient id="linear_gradient_01" gradientTransform="rotate(90)">
            <stop offset="5%"  stop-color="hsl({{ $background_hue + 30 }}, 80%, 70%)" />
            <stop offset="95%" stop-color="hsl({{ $background_hue }}, 80%, 50%)" />
        </linearGradient>
        <filter id="shadow">
          <feDropShadow dx="1" dy="1" stdDeviation="2" flood-color="hsla({{ $background_hue + 30 }}, 80%, 20%, 0.3)" />
        </filter>
    </defs>

    <rect x="{{ $viewport_x }}"  y="{{ $viewport_y }}" width="{{ $width }}" height="{{ $height }}" fill="hsl({{ $background_hue + 60 }}, 50%, 90%)" />
    <circle cx="{{ $mid_right }}" cy="{{ $mid_bottom }}" r="{{ $right_eye_radius }}" fill="hsl({{ $background_hue + 70}}, 80%, 70%)" />
    <polygon
        points="{{ $left_shape_polygon }}"
        style="filter:url(#shadow);"
        fill="url('#linear_gradient_01')"
    />
    <path
        d="{{ $wavey_line_points }}"
        style="
            fill: none;
            stroke: hsla({{ $background_hue }}, 80%, 40%, 0.5);
            stroke-width: {{ $wavey_stroke_width }};
        "
        transform="
            rotate({{ $wavey_line_rotate }})
            scale({{ $wavey_line_scale }})
            translate({{ $wavey_line_translate_x }}, {{ $wavey_line_translate_y }})
        "
    />
    <circle cx="{{ $mid_left }}" cy="{{ $mid_top }}" r="{{ $left_eye_radius }}" fill="hsl({{ $background_hue}}, 80%, 90%)" style="filter:url(#shadow);" />

</svg>
