@extends('mahasiswas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
                <a class="btn btn-primary" href="{{ route('mahasiswas.cetak') }}"> Cetak</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" id="id">
        <thead>
            <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No_Handphone</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $Mahasiswa)
                <tr>
                    <td>{{ $Mahasiswa->Nim }}</td>
                    <td>{{ $Mahasiswa->Nama }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $Mahasiswa->featured_image) }}" alt="image" style="width: 100px">
                    </td>
                    <td>{{ $Mahasiswa->Kelas->nama_kelas }}</td>
                    <td>{{ $Mahasiswa->Jurusan }}</td>
                    <td>{{ $Mahasiswa->No_Handphone }}</td>
                    <td>
                        <form action="{{ route('mahasiswas.destroy', $Mahasiswa->Nim) }}" method="POST">
                            @csrf
                            <a class="btn btn-info" href="{{ route('mahasiswas.show', $Mahasiswa->Nim) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $Mahasiswa->Nim) }}">Edit</a>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a class="btn btn-warning" href="{{ route('mahasiswas.nilai', $Mahasiswa->Nim) }}">Nilai</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
