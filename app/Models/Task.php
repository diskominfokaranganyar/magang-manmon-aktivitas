<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Task extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    public function users()
    {
        return $this->belongsTo(User::class, reports)->withPivot('photo', 'description', 'logitude', 'latitude', 'date');
    }

    //UUID boot
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }
}
