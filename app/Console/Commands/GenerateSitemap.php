<?php

namespace App\Console\Commands;

use App\Models\Tour;
use http\Url;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

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
     * @return int
     */
    public function handle()
    {
//        SitemapGenerator::create(config('app.url'))
//            ->writeToFile(public_path('sitemap.xml'));

        $sitemap = Sitemap::create();

        Tour::all()->each(function (Tour $tour) use ($sitemap) {
           $sitemap->add(url()->to("tour/{$tour->slug}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
