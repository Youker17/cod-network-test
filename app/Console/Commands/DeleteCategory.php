<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class DeleteCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete a category by ID';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $categoryId = $this->argument('id');
        try {
            Category::findOrFail($categoryId)->delete();
        } catch (\Throwable $th) {
            $this->error("Category with ID '$categoryId' not found.");
            return;
        }
        $this->info("Category with ID '$categoryId' deleted successfully.");

    }
}
