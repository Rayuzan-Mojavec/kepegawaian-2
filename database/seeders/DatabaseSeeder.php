<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username' => 'admin',
            'password' => bcrypt('pdpvictory20'),
            'remember_token' => Str::random(10)
        ]);

        User::factory(10)->create();

        Category::create([
            'id' => '1',
            'nama_golongan' => 'Ia: Juru Muda'
        ]);

        Category::create([
            'id' => '2',
            'nama_golongan' => 'Ib: Juru Muda Tingkat 1'
        ]);

        Category::create([
            'id' => '3',
            'nama_golongan' => 'Ic: Juru'
        ]);

        Category::create([
            'id' => '4',
            'nama_golongan' => 'Id: Juru Tingkat 1'
        ]);

        Category::create([
            'id' => '5',
            'nama_golongan' => 'IIa: Pengatur Muda'
        ]);

        Category::create([
            'id' => '6',
            'nama_golongan' => 'IIb: Pengatur Muda Tingkat 1'
        ]);

        Category::create([
            'id' => '7',
            'nama_golongan' => 'IIc: Pengatur'
        ]);

        Category::create([
            'id' => '8',
            'nama_golongan' => 'IId: Pengatur Tingkat 1'
        ]);

        Category::create([
            'id' => '9',
            'nama_golongan' => 'IIIa: Penata Muda'
        ]);

        Category::create([
            'id' => '10',
            'nama_golongan' => 'IIIb: Penata Muda Tingkat 1'
        ]);

        Category::create([
            'id' => '11',
            'nama_golongan' => 'IIIc: Penata'
        ]);

        Category::create([
            'id' => '12',
            'nama_golongan' => 'IIId: Penata Tingkat 1'
        ]);

        Category::create([
            'id' => '13',
            'nama_golongan' => 'IVa: Pembina'
        ]);

        Category::create([
            'id' => '14',
            'nama_golongan' => 'IVb: Pembina Tingkat 1'
        ]);

        Category::create([
            'id' => '15',
            'nama_golongan' => 'IVc: Pembina Utama Muda'
        ]);

        Category::create([
            'id' => '16',
            'nama_golongan' => 'IVd: Pembina Utama Madya'
        ]);

        Category::create([
            'id' => '17',
            'nama_golongan' => 'IVe: Pembina Utama'
        ]);

        Employee::factory(100)->create();
    }
}
