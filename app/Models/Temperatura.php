<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperatura extends Model
{
    use HasFactory;
    protected $table="temperatura";
    protected $fillable=[
        'id',
        'entry_id',
        'field1',
        'created_at',
        'updated_at'
    ];
}
