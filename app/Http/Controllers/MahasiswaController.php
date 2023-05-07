<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa_Matakuliah;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\PDF;


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
        $mahasiswas = Mahasiswa::paginate();
        return view('mahasiswas.index',compact('mahasiswas'));
    }

    public function create()
    {
        $kelas = Kelas::all(); // mendapatkan data dari tabel kelas
        return view('mahasiswas.create',['kelas'=>$kelas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'image' =>'required'
        ]);
        
        // image
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images','public');
        }

        $mahasiswa = new Mahasiswa; 
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');
        $mahasiswa->featured_image = $image_name;

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    public function show($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    public function nilai($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        $nilai = Mahasiswa_Matakuliah::where('mahasiswa_id', $Nim)->get();
        return view ('mahasiswas.nilai',compact('Mahasiswa', 'nilai'));
    }

    public function edit($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }

    public function update(Request $request, $Nim)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            // 'image' =>'required'
        ]);

        $mahasiswa = Mahasiswa::find($Nim);

        if ($mahasiswa->featured_image && file_exists(storage_path('app/public/'.$mahasiswa->featured_image))) {
            \Storage::delete('public/'.$mahasiswa->featured_image);
        }

        $image_name = $request->file('image')->store('images','public');
        
        $mahasiswa->featured_image = $image_name;
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    public function cetak_pdf () {
        $mahasiswa = Mahasiswa::all();
        $pdf = PDF::loadview('mahasiswas.cetak_pdf',['mahasiswas'=>$mahasiswa]);
        return $pdf->stream();
    }

    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
};