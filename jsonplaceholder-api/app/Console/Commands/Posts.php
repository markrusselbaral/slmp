<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class Posts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:posts';

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
        $this->fetchPosts();
    }

    public function fetchPosts()
    {
        $this->info('Fetching posts...');
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        foreach ($response->json() as $postData) {
            Post::updateOrCreate(
                ['id' => $postData['id']],
                [
                    'user_id' => $postData['userId'],
                    'title' => $postData['title'],
                    'body' => $postData['body'],
                ]
            );
        }

        $this->info('Posts fetched and stored successfully.');
    }
}
