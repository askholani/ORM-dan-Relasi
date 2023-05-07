<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membuat Laporan PDF Dengan DOMPDF Laravle</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No.Telpon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                <tr>{{ $loop->iteration }}</tr>
                <td>{{ $mahasiswa->Nim }}</td>
                <td>{{ $mahasiswa->Nama }}</td>
                <td>
                    <img src="{{ asset('storage/' . $mahasiswa->featured_image) }}" alt="image" style="width: 10px">
                </td>
                <td>{{ $mahasiswa->Kelas->nama_kelas }}</td>
                <td>{{ $mahasiswa->Jurusan }}</td>
                <td>{{ $mahasiswa->No_Handphone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
