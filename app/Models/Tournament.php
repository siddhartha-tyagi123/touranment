<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'touranments';

    protected $fillable = ['title', 'date', 'age','organiser','country_id'];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
