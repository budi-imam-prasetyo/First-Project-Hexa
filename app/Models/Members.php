<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'class_id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'address'
    ];

    protected $hidden = ['class_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id')->withTrashed();
    }

    protected function serializeDate($date)
    {
        return $date ? $date->timestamp : null;
    }
}
