<?php return '<svg
    xmlns=\'http://www.w3.org/2000/svg\'
    viewBox="-50 -50 100 100"
    width="100"
    height="100"
>
    <defs>
        <linearGradient id="linear_gradient_01" gradientTransform="rotate(90)">
            <stop offset="5%"  stop-color="hsl(60, 80%, 70%)" />
            <stop offset="95%" stop-color="hsl(30, 80%, 50%)" />
        </linearGradient>

        <filter id="shadow">
          <feDropShadow dx="1" dy="1" stdDeviation="2" flood-color="hsla(60, 80%, 20%, 0.3)" />
        </filter>
    </defs>

    <rect
        id="background"
        x="-50"
        y="-50"
        width="100"
        height="100"
        fill="hsl(90, 50%, 90%)"
    />

    <circle
        id="right-circle"
        cx="36"
        cy="25"
        r="56"
        fill="hsl(100, 80%, 70%)"
    />

    <polygon
        id="left-polygon"
        points="-100,-100 -12,-100 -12,100 -100,100"
        style="filter:url(#shadow);"
        fill="url(\'#linear_gradient_01\')"
        transform="
            skewY(-8)
            rotate(5)
        "
    />

    <path
        id="wavey-line"
        d="M -10.5,0 Q 0 10.5, 10.5 0 t 21 0 21 0 21 0 21 0 21 0 "
        style="
            fill: none;
            stroke: hsla(30, 80%, 40%, 0.5);
            stroke-width: 6;
            transform: skewX(-8);
        "
        transform="
            rotate(347)
            scale(3.6)
            translate(-52.5, 0)
        "
    />

    <circle
        id="left-circle"
        cx="-26"
        cy="9"
        r="9"
        fill="hsl(30, 80%, 90%)"
        style="filter:url(#shadow);"
    />

</svg>
';
