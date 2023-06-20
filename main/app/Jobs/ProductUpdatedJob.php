<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductUpdatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product_data)
    {
        $this->product_data = $product_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $product = Product::find($this->product_data['id']);

        $product->update([
            'title' => $this->product_data['title'],
            'image' => $this->product_data['image'],
            'created_at' => $this->product_data['created_at'],
            'updated_at' => $this->product_data['updated_at'],
        ]);
    }
}
