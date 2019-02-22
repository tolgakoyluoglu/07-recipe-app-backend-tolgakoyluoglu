<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'email',
        'label',
        'image',
        'calories',
        'healthLabels',
        'ingredientLines',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
