<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    use HasFactory;

    protected $fillable=['name','adress'];

    public function sales(){
        return $this->hasMany(Sales::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
