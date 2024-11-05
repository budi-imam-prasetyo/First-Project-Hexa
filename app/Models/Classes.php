<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'desc'];

    protected $hidden = ['pivot'];

    // protected function serializeDate($date)
    // {
    //     return $date ? $date->timestamp : null;
    // }

    public function members()
    {
        return $this->hasMany(Members::class, 'class_id');
    }
}
