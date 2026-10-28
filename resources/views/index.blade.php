<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #1e293b;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #00000010;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button, .btn {
            padding: 9px 13px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-tambah {
            background: #2563eb;
            margin-top: 15px;
        }

        .btn-edit {
            background: #eab308;
            color: black;
        }

        .btn-hapus {
            background: #dc2626;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        .pesan {
            padding: 12px;
            background: #dcfce7;
            color: #166534;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .aksi {
            white-space: nowrap;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Penginputan Data Mahasiswa</h1>

    @if (session('success'))
        <div class="pesan">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h2>Tambah Mahasiswa</h2>

        <form action="/mahasiswa/store" method="POST">
            @csrf

            <label>Nama Mahasiswa</label>
            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama mahasiswa"
                required
            >

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label>Alamat</label>
            <textarea
                name="alamat"
                rows="3"
                placeholder="Masukkan alamat"
                required
            >{{ old('alamat') }}</textarea>

            <label>Nomor HP</label>
            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                placeholder="Masukkan nomor HP"
                required
            >

            <button type="submit" class="btn-tambah">
                Simpan Mahasiswa
            </button>
        </form>
    </div>

    <div class="card">
        <h2>Daftar Mahasiswa</h2>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->jenis_kelamin }}</td>
                        <td>{{ $mhs->alamat }}</td>
                        <td>{{ $mhs->no_hp }}</td>
                        <td class="aksi">
                            <a
                                href="/mahasiswa/edit/{{ $mhs->id }}"
                                class="btn btn-edit"
                            >Edit</a>

                            <form
                                action="/mahasiswa/destroy/{{ $mhs->id }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-hapus">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>