<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
   protected $guarded = ['id'];

   public function user()
    {
        return $this->belongsTo(User::class,'adding_person');
    }

    public function history()
    {
        return $this->morphMany(History::class, 'my_model_table', 'reference_table', 'reference_id');
    }
}

