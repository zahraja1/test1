<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;
    protected $table ='employees';
    protected $fillable = [
        'firstName',
        'lastName',
        'company_id',
        'email',
        'phone',
    ];

    public function employees()
    {
        return $this->hasMany(Employes::class, 'company_id');

    }
}
