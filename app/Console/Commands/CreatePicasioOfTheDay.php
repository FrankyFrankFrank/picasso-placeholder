<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Browsershot\Browsershot;

class CreatePicasioOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pcasio:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the Pcasio of the day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = action('PicassoController@show', [ 'width' => 720, 'height' => 720 ]);
        $date = date('Y-m-d');
        $pathToImage = public_path('pcasio_of_the_day/potd_' . $date . '.png');

        Browsershot::url($url)
            ->windowSize(720, 720)
            ->save($pathToImage);
    }
}
