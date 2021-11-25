<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'location_id',
        'price',
        'rating',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function itemCarts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function special_fors()
    {
        return $this->belongsToMany(SpecialFor::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
