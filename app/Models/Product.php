<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    public function like(): HasMany
    {
        return $this->hasMany(Propertly_likes::class ,'product_id','id');
    }
    public function colors()
{
    return $this->belongsToMany(Lookups::class, 'product_colors');
}
public function productcolors()
    {
        return $this->hasMany(Product_colors::class, 'product_id');
    }

}
