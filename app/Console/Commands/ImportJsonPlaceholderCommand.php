<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());
        foreach ($data as $item){
            Post::firstOrCreate([
                'title' => $item->title,
            ],[
                'title' => $item->title,
                'content' => $item->body,
                'category_id' => 2,
            ]);
        }
    }
}
