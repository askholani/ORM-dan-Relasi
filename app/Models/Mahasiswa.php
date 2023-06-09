<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Model Eloquent
class Mahasiswa extends Model//Definisi Model
 {
protected $table = "mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
public $timestamps = false;
protected $primaryKey = 'Nim'; // Memanggil isi DB Dengan primarykey
/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = [
    'Nim',
    'Nama',
    'kelas_id',
    'Jurusan',
    'No_Handphone',
    'featured_image'
    ];

public function kelas()
{
    return $this->belongsTo(Kelas::class);
}

public function mahasiswa_matakuliah () {
    return $this->hasMany(Mahasiswa_Matakuliah::class);
}
};