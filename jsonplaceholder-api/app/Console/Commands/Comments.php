<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;

class Comments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:comments';

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
        $this->fetchComments();
    }

    public function fetchComments()
    {
        $this->info('Fetching comments...');
        $response = Http::get('https://jsonplaceholder.typicode.com/comments');

        foreach ($response->json() as $commentData) {
            Comment::updateOrCreate(
                ['id' => $commentData['id']],
                [
                    'post_id' => $commentData['postId'],
                    'name' => $commentData['name'],
                    'email' => $commentData['email'],
                    'body' => $commentData['body'],
                ]
            );
        }

        $this->info('Comments fetched and stored successfully.');
    }

}
