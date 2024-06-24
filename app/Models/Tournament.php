<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'touranments';

    protected $fillable = ['title', 'date', 'age','organiser','country_id', 'status','city','playing_time','number_of_players',
                             'play_field'];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    public function getDateTimeTournamentAttribute()
    {
        return $this->date . ' ' . $this->playing_time;
    }
}
