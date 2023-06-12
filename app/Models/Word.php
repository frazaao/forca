<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    const WORD = 'word';
    const LEVEL = 'level';

    protected $fillable = [
        Word::WORD,
        Word::LEVEL,
    ];
}
