<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categorys()
    {
        return $this->belongsTo(Categorys::class);
    }
    public function catalogs()
    {
        return $this->belongsTo(Catalogs::class);
    }

  
}
