<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'name', 'description', 'logo'
    ];

    public function getPivotUsers()
    {
        return $this->belongsToMany(User::class, 'section_user', 'section_id', 'user_id');
    }
}
