<svg
    width="{{ $width }}"
    height="{{ $height }}"
>
    <defs>
        <linearGradient id="linear_gradient_01" gradientTransform="rotate(90)">
            <stop offset="5%"  stop-color="hsl({{ $background_hue + 30}}, 80%, 90%)" />
            <stop offset="95%" stop-color="hsl({{ $background_hue + 30 }}, 80%, 70%)" />
        </linearGradient>
        <filter id="shadow">
          <feDropShadow dx="1" dy="1" stdDeviation="2" flood-color="hsla({{ $background_hue + 30 }}, 80%, 20%, 0.3)" />
        </filter>
    </defs>

    <rect x="0"  y="0" width="{{ $width }}" height="{{ $height }}" fill="hsl({{ $background_hue }}, 80%, 90%)" />
    <circle cx="{{ $right_eye_x_position }}" cy="{{ $right_eye_y_position }}" r="{{ $right_eye_radius }}" fill="hsl({{ $background_hue - 90}}, 80%, 90%)" />
    <polygon
        points="0,0 {{ $left_rectangle_width }},0 {{ $left_rectangle_point_three }},{{ $height / 2 }} {{ $left_rectangle_point_four }},{{ $height / 2}} {{ $left_rectangle_width }},{{ $height }} 0,{{ $height }}"
        style="filter:url(#shadow);"
        fill="url('#linear_gradient_01')"
    />
    <circle cx="{{ $left_eye_x_position }}" cy="{{ $left_eye_y_position }}" r="{{ $left_eye_radius }}" fill="hsl({{ $background_hue + 90}}, 80%, 90%)" style="filter:url(#shadow);" />
</svg>
