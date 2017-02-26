<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 26/02/2017
 * Time: 11:36
 */

namespace App\Listeners;
use App\Events\ProductAddedEvent;
use Illuminate\Support\Facades\Log;

class ProductAddedListener
{
    public function __construct()
    {
        
    }

    /**
     * @param ProductAddedEvent $event
     * @return bool
     */
    public function handle(ProductAddedEvent $event)
    {
        Log::debug("added new product ",$event->product);

    }
}