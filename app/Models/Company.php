<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'social_links',
        'id_user'
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function stands()
    {
        return $this->hasMany(Stand::class, 'company_id');
    }

    public function media(){
        return $this->hasMany(Media::class);
    }
}
