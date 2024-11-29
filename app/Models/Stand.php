<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable = [
        'name',
        'location',
        'id_company'
    ];

    
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id'); // Relación con la tabla 'companies'
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'id_company', 'company_id');
    }
}
