<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 */
final class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
