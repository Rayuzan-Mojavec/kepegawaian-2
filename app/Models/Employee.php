<?php

namespace App\Models;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public $table = "karyawan";
    protected $fillable = [
        'id', 'nip', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'telpon', 'agama', 'status_nikah', 'alamat', 'golongan_id', 'foto'
    ];
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'tanggal_lahir' => 'datetime:Y-m-d',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'golongan_id');
    }

    public function age()
    {
        return Date::parse($this->attributes['tanggal_lahir'])->format('d F Y');
    }

    public function year()
    {
        return Carbon::createFromDate($this->attributes['tanggal_lahir'])->diff(Carbon::now())->format('%y tahun, %m bulan, %d hari');
    }
}
