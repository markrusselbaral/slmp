<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Album;
use Illuminate\Support\Facades\Http;

class Albums extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:albums';

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
        $this->fetchAlbums();
    }

    public function fetchAlbums()
    {
        $this->info('Fetching albums...');
        $response = Http::get('https://jsonplaceholder.typicode.com/albums');

        foreach ($response->json() as $albumData) {
            Album::updateOrCreate(
                ['id' => $albumData['id']],
                [
                    'user_id' => $albumData['userId'],
                    'title' => $albumData['title'],
                ]
            );
        }

        $this->info('Albums fetched and stored successfully.');
    }
}
