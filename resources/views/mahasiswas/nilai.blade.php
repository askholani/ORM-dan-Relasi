@extends('mahasiswas.layout')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="d-flex justify-content-center">
                <h1>Kartu Hasil Studi (KHS)</h1>
            </div>
            <div class="d-inline-flex">
                <div class="font-weight-bold p-2">
                    <div>Nama</div>
                    <div>Nim</div>
                    <div>Kelas</div>
                </div>
                <div class="p-2">
                    <div class="d-flex">
                        <div class="mx-2">
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                        </div>
                        <div>
                            <div>{{ $Mahasiswa->Nama }}</div>
                            <div>{{ $Mahasiswa->Nim }}</div>
                            <div>{{ $Mahasiswa->Kelas->nama_kelas }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $n)
                        <tr>
                            <td>{{ $n->Matakuliah->nama_matkul }}</td>
                            <td>{{ $n->Matakuliah->sks }}</td>
                            <td>{{ $n->Matakuliah->semester }}</td>
                            <td>{{ $n->nilai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="width: 24rem">
                <a class="btn btn-success mt-3 w-100" href="{{ route('mahasiswas.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
