<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'level', 'collaborators', 'ambassador'];

    public function parent()
    {
        return $this->belongsTo(Division::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Division::class, 'parent_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
