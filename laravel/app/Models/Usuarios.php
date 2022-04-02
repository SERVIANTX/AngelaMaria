<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;

class Usuarios extends Model
{

    use HasUUID;
    protected $table = 'users';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';
}
