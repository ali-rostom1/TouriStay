<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'location',
        'startdate',
        'enddate',
        'city',
        'country',
        'equipments',
        'description',
        'persons',
        'rooms',
        'type',
    ];

    public function landlord()
    {
        return $this->belongsTo(landlord::class);
    }
    public function favoriteTourists()
    {
        return $this->belongsToMany(Tourist::class,"favorite","listing_id","tourist_id");
    }

}
