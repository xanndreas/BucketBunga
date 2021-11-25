<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'colors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'hex',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function colorItems()
    {
        return $this->belongsToMany(Item::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
