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
                grid-template-columns: 2fr 1fr;
                grid-gap: 1rem;
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
        <div class="bg-gray-800 px-12 py-16 text-gray-100">
            <section class="mb-16">
                <h2 class="font-bold text-lg mb-4">What is Picassio?</h2>
                <p class="mb-4 text-gray-300">Use it to generate svg placeholder images for any purpose.</p>
                <script src="https://gist.github.com/FrankyFrankFrank/342a427cbc4dedcf381f19516c4113a2.js"></script>
            </section>
            <section class="mb-16">
                <h2 class="font-bold text-lg mb-4">Changing the size</h2>
                <p class="mb-2 text-gray-300">To change the size of the generated image, change the url.</p>
                <p class="mb-2 text-gray-300">The height and width are set by the first and second directory in the url, respectively.</p>
                <p class="mb-2 text-gray-300">For example, if you want to generate a placholder image 500px wide and 200px high, change the url to:</p>
                <pre class="bg-gray-900 p-2 mt-4">picass.io/500/200</pre>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h2 class="font-bold text-lg mb-4">Setting a base hue</h2>
                    <p class="mb-2 text-gray-300">Picassio automatically generates a pleasing set of shapes and colours based on a random base hue.</p>
                    <p class="mb-2 text-gray-300">If you would like to constrain the image to a particular base hue between 0 and 360, you may do so by adding a query parameter.</p>
                    <p class="mb-2 text-gray-300">For example, if you want to generate a placholder image with a red base hue, add the following to the end of the url:</p>
                    <pre class="bg-gray-900 p-2 mt-2 mb-4">?hue=360</pre>
                    <p class="text-gray-300 inline-block">Therefore a 400px wide 200px high red-based placeholder image would have this url:</p>
                    <pre class="bg-gray-900 p-2 mt-2 mb-4">picass.io/400/200?hue=360</pre>
                </div>
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div>
                        <img src="/400/200?hue=360" class="shadow-lg" />
                        <figcaption>picass.io/400/200?hue=360</figcaption>
                    </div>
                </div>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h2 class="font-bold text-lg mb-4">Setting a base saturation</h2>
                    <p class="mb-2 text-gray-300">If you would like to constrain the image to a particular base saturation between 0 (greyscale) and 100 (max brightness), you may do so by adding a query parameter.</p>
                    <p class="mb-2 text-gray-300">For example, if you want to generate a greyscale placholder image, add the following to the end of the url:</p>
                    <pre class="bg-gray-900 p-2 mt-2 mb-4">?saturation=0</pre>
                    <p class="text-gray-300 inline-block">Therefore a 400px wide 200px high greyscale placeholder image would have this url:</p>
                    <pre class="bg-gray-900 p-2 mt-2 mb-4">picass.io/400/200?saturation=0</pre>
                </div>
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div>
                        <img src="/400/200?saturation=0" class="shadow-lg" />
                        <figcaption>picass.io/400/200?saturation=0</figcaption>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
