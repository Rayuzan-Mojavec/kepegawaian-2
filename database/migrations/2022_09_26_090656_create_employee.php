<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 12);
            $table->string('nik', 12);
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('telpon', 12);
            $table->string('agama', 15);
            $table->enum('status_nikah', ['belum nikah', 'nikah']);
            $table->longText('alamat');
            $table->foreignId('golongan_id')
            ->constrained('golongan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('foto', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
