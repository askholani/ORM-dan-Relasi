<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
$mahasiswas = [
            [
            'Nim'=>2141729170,
            'Nama'=>'ibnu hajar askholani',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898045398',
            'Tanggal_Lahir' => '20-08-2001',
            'Email'=>'ibnu@gmail.com'
        ],
        [
            'Nim'=>2141720075,
            'Name'=>'abdullah azzam',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898047399',
            'Tanggal_Lahir' => '20-09-2002',
            'Email'=>'azzam@gmail.com'
        ],
        [
            'Nim'=>2141720077,
            'Name'=>'ahmad bima tristan ibrahim',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898045400',
            'Tanggal_Lahir' => '10-03-2002',
            'Email'=>'bima@gmail.com'
        ],
        [
            'Nim'=>2141728075,
            'Name'=>'alfi surya pratama',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898045401',
            'Tanggal_Lahir' => '27-03-2002',
            'Email'=>'surya@gmail.com'
        ],
        [
            'Nim'=>2141720079,
            'Name'=>'andhito galih nur cahyo',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898045402',
            'Tanggal_Lahir' => '21-03-2002',
            'Email'=>'dito@gmail.com'
        ],
        [
            'Nim'=>2141710170,
            'Nama'=>'iemadudin',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083899945398',
            'Tanggal_Lahir' => '10-08-2002',
            'Email'=>'didin@gmail.com'
        ],
        [
            'Nim'=>2141720073,
            'Name'=>'alivian firdaus',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898214399',
            'Tanggal_Lahir' => '20-09-2002',
            'Email'=>'alvian@gmail.com'
        ],
        [
            'Nim'=>2141730077,
            'Name'=>'naresh pratista',
            'Kelas'=>'ti2f',
            'Jurusan'=>'teknik informatika',
            'No_Handphone'=>'083898045400',
            'Tanggal_Lahir' => '10-23-2002',
            'Email'=>'naresh@gmail.com'
        ],
    ];
        //
        DB::table('mahasiswas')->insert($mahasiswa);
    }
}