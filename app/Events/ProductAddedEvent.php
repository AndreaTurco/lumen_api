<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 26/02/2017
 * Time: 11:33
 */

namespace App\Events;

use App\Product;
use Illuminate\Queue\SerializesModels;

class ProductAddedEvent
{
    use SerializesModels;
    public $product;
    
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
}