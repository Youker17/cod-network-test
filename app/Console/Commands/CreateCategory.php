<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new category';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        Category::create(['name' => $name]);
        $this->info("Category '$name' created successfully.");
    }
}
