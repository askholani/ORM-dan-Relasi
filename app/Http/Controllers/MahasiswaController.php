<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
/**
 * Display a listing of the resource.
 *

 * @return \Illuminate\Http\Response
 */
    public function index()
    {
    //fungsi eloquent menampilkan data menggunakan pagination
        // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel

        // $mahasiswas = Mahasiswa::paginate(6);
        // $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
        // return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);

        // $user = Auth::user(); // nyalakan jika menggunakan konsep login atau auth
        
        $mahasiswas = Mahasiswa::paginate();
        // return view('mahasiswas.index',compact('mahasiswas','user'));
        return view('mahasiswas.index',compact('mahasiswas'));
    }
    public function create()
    {
        // return view('mahasiswas.create');
        
        $kelas = Kelas::all(); // mendapatkan data dari tabel kelas
        return view('mahasiswas.create',['kelas'=>$kelas]);
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        // Mahasiswa::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama

        // fungsi eloquent untuk menambah data
        $mahasiswa = new Mahasiswa; // instance objek baru dari class Mahasiswa
        $mahasiswa->Nim=$request->get('Nim'); /**
         * mengisi nilai attribute Nim dari objek mahasiswa dari input form yang memiliki name "Nim"
         * $request objek instance dari Illuminate\Http\Request yang menyimpan informasi tentang request HTTP yang masuk seperti metode HTTP, header, data form, dan data parameter lainnya.
         * get()  method yang digunakan untuk mengambil nilai dari data input 'Nim' yang dikirimkan oleh user pada request HTTP
         * Method get() mengambil nilai dari data input yang disebutkan(Nim) dengan parameter dan akan mengembalikan null jika parameter tersebut tidak ditemukan.
         */
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');

        // fungsi eloequent untuk menambah data dengan relasi belongs to
        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::find($Nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        // Mahasiswa::find($Nim)->update($request->all());
        
        $mahasiswa = Mahasiswa::find($Nim);
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
};