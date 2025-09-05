<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    //
    protected $fillable = ['name', 'color', 'description'];

    public function todos():HasMany
    {
        return $this->hasMany(Todo::class);
    }
}
