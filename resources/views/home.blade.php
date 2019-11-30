<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pcas.io SVG Placeholder Images</title>

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

            @media (max-width: 640px) {
                .gallery-grid {
                    grid-template-rows: auto;
                    grid-template-columns: 1fr;
                    grid-gap: 1rem;
                    grid-template-areas:
                        "left"
                        "upperright"
                        "lowerright"
                    ;
                }
            }
        </style>
    </head>
    <body>
        <div class="bg-gray-100 px-12 py-8">
            <h1 class="border-b mb-4">Pcas.io</h1>
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
        <div class="bg-gray-900 px-12 py-24 text-gray-100">
            <section>
                <h2 class="font-bold text-xl mb-4">What is Pcas.io?</h2>
                <p class="mb-4 text-gray-300">It generates visually-pleasing, semi-random compositions of shapes and colour as SVG code.</p>
                <p class="mb-4 text-gray-300">Use it to generate images for any purpose.</p>
                <script src="https://gist.github.com/FrankyFrankFrank/342a427cbc4dedcf381f19516c4113a2.js"></script>
            </section>
        </div>
        <div class="bg-gray-800 px-12 py-16 text-gray-100">
            <h2 class="font-bold text-xl mb-4">Changing the look</h2>
            <section class="mb-16">
                <h3 class="uppercase tracking-widest text-xl">Size</h3>
                <p class="mb-2 text-gray-300">To change the size of the generated image, change the url.</p>
                <p class="mb-2 text-gray-300">The height and width are set by the first and second directory in the url, respectively.</p>
                <p class="mb-2 text-gray-300">For example, if you want to generate a placholder image 500px wide and 200px high, change the url to:</p>
                <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-4">pcas.io/500/200</pre>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h3 class="uppercase tracking-widest text-xl">Hue</h3>
                    <p class="mb-2 text-gray-300">pcas.io automatically generates a pleasing set of shapes and colours based on a random base hue.</p>
                    <p class="mb-2 text-gray-300">If you would like to constrain the image to a particular base hue between 0 and 360, you may do so by adding a query parameter.</p>
                    <p class="mb-2 text-gray-300">For example, if you want to generate a placholder image with a red base hue, add the following to the end of the url:</p>
                    <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-2 mb-4">?hue=360</pre>
                    <p class="text-gray-300 inline-block">Therefore a 400px wide 200px high red-based placeholder image would have this url:</p>
                    <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-2 mb-4">pcas.io/400/200?hue=360</pre>
                </div>
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div class="p-4">
                        <img src="/400/200?hue=360" class="shadow-lg" />
                        <figcaption>pcas.io/400/200?hue=360</figcaption>
                    </div>
                </div>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h3 class="uppercase tracking-widest text-xl">Saturation</h3>
                    <p class="mb-2 text-gray-300">If you would like to constrain the image to a particular base saturation between 0 (greyscale) and 100 (max brightness), you may do so by adding a query parameter.</p>
                    <p class="mb-2 text-gray-300">For example, if you want to generate a greyscale placholder image, add the following to the end of the url:</p>
                    <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-2 mb-4">?saturation=0</pre>
                    <p class="text-gray-300 inline-block">Therefore a 400px wide 200px high greyscale placeholder image would have this url:</p>
                    <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-2 mb-4">pcas.io/400/200?saturation=0</pre>
                </div>
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div class="p-4">
                        <img src="/400/200?saturation=0" class="shadow-lg" />
                        <figcaption>pcas.io/400/200?saturation=0</figcaption>
                    </div>
                </div>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h3 class="uppercase tracking-widest text-xl">Multiple Customizations</h3>
                    <p class="mb-2 text-gray-300">You can chain any number of valid query parameters onto the end of the url using the &amp; character between each parameter.</p>
                    <p class="mb-2 text-gray-300">For example, if you want to generate a vibrant placholder image with a base colour of magenta, add the following to the end of the url:</p>
                    <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-2 mb-4">?saturation=100&hue=300</pre>
                    <p class="text-gray-300 inline-block">Therefore a 400px wide 200px high vibrant magenta-based image would have this url:</p>
                    <pre class="whitespace-pre-wrap bg-gray-900 p-2 mt-2 mb-4">pcas.io/400/200?saturation=100&hue=300</pre>
                    <p class="text-sm">Note: Using invalid parameters can cause pcas.io to return no image at all.</p>
                </div>
                <div class="w-full md:w-1/2 flex items-center justify-center">
                    <div class="p-4">
                        <img src="/400/200?saturation=100&hue=300" class="shadow-lg" />
                        <figcaption>pcas.io/400/200?saturation=100&hue=300</figcaption>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-purple-800 px-12 py-16 text-purple-100">
            <h2 class="font-bold text-xl mb-4">Repeated Results</h2>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h3 class="uppercase tracking-widest text-xl">Using a Seed</h3>
                    <p class="mb-2 text-purple-300">You can use a seed to create consistent results. Placeholder images that are generated with a seed will always produce the same configuration.</p>
                    <p class="mb-2 text-purple-300">For example, if you want to generate the same image multiple times, add this to end end of the url:</p>
                    <pre class="whitespace-pre-wrap bg-purple-900 p-2 mt-2 mb-4">?seed=12345</pre>
                    <p class="text-purple-300 inline-block">Therefore a 100px wide 100px high placeholder with the seed '12345' would have this url:</p>
                    <pre class="whitespace-pre-wrap bg-purple-900 p-2 mt-2 mb-4">pcas.io/100/100?seed=12345</pre>
                </div>
                <div class="w-full md:w-1/2 flex flex-wrap justify-around">
                    <div class="w-1/3 text-center">
                        <img src="/100/100?seed=12345" class="shadow-lg m-4 inline" />
                    </div>
                    <div class="w-1/3 text-center">
                        <img src="/100/100?seed=12345" class="shadow-lg m-4 inline" />
                    </div>
                    <div class="w-1/3 text-center">
                        <img src="/100/100?seed=12345" class="shadow-lg m-4 inline" />
                    </div>
                    <div class="w-1/3 text-center">
                        <img src="/100/100?seed=12345" class="shadow-lg m-4 inline" />
                    </div>
                    <div class="w-1/3 text-center">
                        <img src="/100/100?seed=12345" class="shadow-lg m-4 inline" />
                    </div>
                    <div class="w-1/3 text-center">
                        <img src="/100/100?seed=12345" class="shadow-lg m-4 inline" />
                    </div>
                </div>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h3 class="uppercase tracking-widest text-xl">Saving The Image</h3>
                    <p class="mb-2 text-purple-300">You can save the image as an SVG as you would any other image in the browser.</p>
                </div>
            </section>
            <section class="mb-16 flex flex-wrap">
                <div class="w-full md:w-1/2 mb-8">
                    <h3 class="uppercase tracking-widest text-xl">Manually Manipulating The Image</h3>
                    <p class="mb-2 text-purple-300">Because the generated image is code, you are able to modify it as you would any other SVG.</p>
                    <p class="mb-2 text-purple-300">Save the image to your computer and then edit the code in any text editor or IDE.</p>
                </div>
            </section>
        </div>
        <div class="bg-gray-200 text-gray-700 p-4">
            <p class="text-right">pcas.io was created by Adam Frank | <a class="underline text-teal-500" href="https://twitter.com/frankyfraaank">twitter frankyfraaank</a> | <a class="underline text-teal-500" href="https://github.com/FrankyFrankFrank">github FrankyFrankFrank</a></p>
        </div>
    </body>
</html>
