<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Picassio SVG Placeholder Images</title>

        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <style>
            .gallery-grid {
                display: grid;
                grid-template-rows: 50vh 50vh;
                grid-template-columns: 50vw 50vw;
                grid-template-areas:
                    "left upperright"
                    "left lowerright"
                ;
            }
        </style>
    </head>
    <body>
        <div class="bg-gray-100 px-12 py-8">
            <h1 class="border-b">Picassio</h1>
            <div class="gallery-grid">
                <div style="grid-area: left" class="flex items-center justify-center">
                    <img src="/500/300" class="shadow-lg" />
                </div>
                <div style="grid-area: upperright" class="flex items-center justify-center">
                    <img src="/200/200" class="shadow-lg" />
                </div>
                <div style="grid-area: lowerright" class="flex items-center justify-center">
                    <img src="/300/200" class="shadow-lg" />
                </div>
            </div>
        </div>
        <div class="bg-gray-800 px-12 py-8">
            <section class="text-white">
                <h2 class="font-bold">What is Picassio?</h2>
                <p>Use it to generate placeholder images in svg format for any purpose.</p>
                <script src="https://gist.github.com/FrankyFrankFrank/342a427cbc4dedcf381f19516c4113a2.js"></script>
            </section>
        </div>
    </body>
</html>
