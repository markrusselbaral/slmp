<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class Users extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:users';

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
        $this->fetchUsers();
    }

    public function fetchUsers()
    {
        $this->info('Fetching users...');
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        foreach ($response->json() as $userData) {
            User::updateOrCreate(
                ['id' => $userData['id']],
                [
                    'name' => $userData['name'],
                    'username' => $userData['username'],
                    'email' => $userData['email'],
                    'address' => json_encode($userData['address']),
                    'phone' => $userData['phone'],
                    'website' => $userData['website'],
                    'company' => json_encode($userData['company']),
                ]
            );
        }
        $this->info('Users fetched and stored successfully.');
    }
}
