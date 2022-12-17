<?php

namespace App\Models;

use App\Traits\FormatDatetime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tools extends Model
{
    use HasFactory, SoftDeletes, FormatDatetime;

    protected $fillable = [
        "key",
        "type",
        "icon",
        "collection",
        "archive",
        "width",
        "height"
    ];
}
