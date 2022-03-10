<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;

use App\Models\Categoria;
use App\Models\Marca;

class Producto extends Model
{

    use HasUUID;
    protected $table = 'productos';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $uuidFieldName = 'id';

    function categoria()
    {
        return $this->belongsTo(Categoria::class,"categoria_id");
    }

    function marca()
    {
        return $this->belongsTo(Marca::class,"marca_id");
    }
}
