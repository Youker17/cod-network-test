<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a product by ID';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $productId = $this->argument('id');
        try {
            Product::findOrFail($productId)->delete();
        } catch (\Throwable $th) {
            $this->error("Product with ID '$productId' not found.");
            return;
        }

        $this->info("Product with ID '$productId' deleted successfully.");
        
    }
}
