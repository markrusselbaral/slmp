<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Photo;
use Illuminate\Support\Facades\Http;

class Photos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->fetchPhotos();
    }

    public function fetchPhotos()
    {
        $this->info('Fetching photos...');
        $response = Http::get('https://jsonplaceholder.typicode.com/photos');

        foreach ($response->json() as $photoData) {
            Photo::updateOrCreate(
                ['id' => $photoData['id']],
                [
                    'album_id' => $photoData['albumId'],
                    'title' => $photoData['title'],
                    'url' => $photoData['url'],
                    'thumbnail_url' => $photoData['thumbnailUrl'],
                ]
            );
        }

        $this->info('Photos fetched and stored successfully.');
    }
}
