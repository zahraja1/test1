<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable =[
        'name',
        'email',
        'logo',
        'website'
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
