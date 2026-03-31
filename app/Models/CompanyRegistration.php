<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    protected $table = 'company_registration';

    protected $fillable = [
        'user_id',
        'company_name',
        'phone',
        'website',
        'company_size',
        'industry_type',
        'country',
        'state',
        'city',
        'address',
        'description',
        'founded_year',
        'created_by',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
}
