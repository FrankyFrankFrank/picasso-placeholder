<?php return '<svg
    xmlns=\'http://www.w3.org/2000/svg\'
    viewBox="-50 -50 100 100"
    width="100"
    height="100"
>
    <defs>
        <linearGradient id="linear_gradient_01" gradientTransform="rotate(90)">
            <stop offset="5%"  stop-color="hsl(305, 80%, 70%)" />
            <stop offset="95%" stop-color="hsl(275, 80%, 50%)" />
        </linearGradient>

        <filter id="shadow">
          <feDropShadow dx="1" dy="1" stdDeviation="2" flood-color="hsla(305, 80%, 20%, 0.3)" />
        </filter>
    </defs>

    <rect
        id="background"
        x="-50"
        y="-50"
        width="100"
        height="100"
        fill="hsl(335, 50%, 90%)"
    />

    <circle
        id="right-circle"
        cx="4"
        cy="25"
        r="31"
        fill="hsl(345, 80%, 70%)"
    />

    <polygon
        id="left-polygon"
        points="-100,-100 -13,-100 -4.5,12 -21.5,12 -13,100 -100,100"
        style="filter:url(#shadow);"
        fill="url(\'#linear_gradient_01\')"
        transform="
            skewY(-9)
            rotate(-2)
        "
    />

    <path
        id="wavey-line"
        d="M -12.5,0 Q 0 12.5, 12.5 0 t 25 0 25 0 25 0 25 0 25 0 25 0 25 0 25 0 "
        style="
            fill: none;
            stroke: hsla(275, 80%, 40%, 0.5);
            stroke-width: 11;
            transform: skewX(-9);
        "
        transform="
            rotate(175)
            scale(2.7)
            translate(-100, 16)
        "
    />

    <circle
        id="left-circle"
        cx="-1"
        cy="11"
        r="21"
        fill="hsl(275, 80%, 90%)"
        style="filter:url(#shadow);"
    />

</svg>
';
