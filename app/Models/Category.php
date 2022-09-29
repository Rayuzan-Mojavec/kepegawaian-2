<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = "golongan";
    protected $fillable = [
        'id', 'nama_golongan'
    ];
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function employee()
    {
        return $this->hasMany(Employee::class, 'golongan_id');
    }
}
