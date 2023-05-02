<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'privacyPolicy',
        'createdAt',
        'updatedAt',
    ];

    protected $table = "privacy_policy";

    public $timestamps = false;
}
