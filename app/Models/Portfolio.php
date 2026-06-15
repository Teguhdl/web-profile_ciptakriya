<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'client',
        'year',
        'status',
        'description',
        'tag',
        'tone'
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->id . '-' . \Illuminate\Support\Str::slug($this->title);
    }
}
