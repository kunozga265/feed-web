<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $fillable=[
        "type",
        "name",
        "dm",
        "cp",
        "ndf",
        "fat",
        "adf",
        "phosphorus",
        "calcium",
        "sodium",
        "chlorine",
        "potassium",
        "magnesium",
        "sulphur",
        "cobalt",
        "copper",
        "iodine",
        "iron",
        "manganese",
        "selenium",
        "zinc",
        "vitamin_a",
        "vitamin_d",
        "vitamin_e",
        "energy",
        "percentage",
        "cost",
        "net_energy",
    ];
}
