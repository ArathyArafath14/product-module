<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait TracksHistoryTrait
{
    protected function track(Model $model, callable $func = null, $table = null, $id = null)
    {
        
        $table = $table ?: $model->getTable(); 
        $id = $id ?: $model->id;
        $func = $func ?: [$this, 'getHistoryBody'];
        $this->getUpdated($model)
             ->map(function ($value, $field) use ($func) {
                return call_user_func_array($func, [$value, $field]);
             })
             ->each(function ($fields) use ($table, $id) {
                History::create([
                    'reference_table' => $table,
                    'reference_id'    => $id,
                    'actor_id'        => Auth::user()->id,
                ] + $fields);
             });
    }

    protected function getHistoryBody($value, $field)
    {
        return [
            'body' => "Updated {$field} to ${value}",
        ];
    }

    protected function getUpdated($model)
    {
        return collect($model->getDirty())->filter(function ($value, $key) {
           
            return !in_array($key, ['created_at', 'updated_at']);
        })->mapWithKeys(function ($value, $key) {
        
            return [str_replace('_', ' ', $key) => $value];
        });
    }
}