<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'file_path',
        'id_company'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
