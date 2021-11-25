<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialFor extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'special_fors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function specialForItems()
    {
        return $this->belongsToMany(Item::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
