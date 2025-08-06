<?php

namespace App\Console\Commands;
use App\Models\Todo;
use Illuminate\Support\Facades\Http;

use Illuminate\Console\Command;

class Todos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:todos';

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
        $this->fetchTodos();
    }

    public function fetchTodos()
    {
        $this->info('Fetching todos...');
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');
        
        foreach ($response->json() as $todoData) {
            Todo::updateOrCreate(
                ['id' => $todoData['id']],
                [
                    'user_id' => $todoData['userId'],
                    'title' => $todoData['title'],
                    'completed' => $todoData['completed'],
                ]
            );
        }

        $this->info('Todos fetched and stored successfully.');
    }
}
