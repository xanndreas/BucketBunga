<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'locations';

    protected $hidden = [
        'address',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'address',
        'district',
        'city',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function locationItems()
    {
        return $this->hasMany(Item::class, 'location_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
