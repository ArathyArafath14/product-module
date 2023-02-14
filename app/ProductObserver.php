<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductObserver
{
    use TracksHistoryTrait;

    public function updated(ProductData $model)
    {
        $this->track($model);
        
    }
}