<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px #00000010;
        }

        h1 {
            text-align: center;
            color: #1e293b;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            box-sizing: border-box;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
        }

        button, .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .btn {
            background: #64748b;
            color: white;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Edit Data Mahasiswa</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/mahasiswa/update/{{ $mahasiswa->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Mahasiswa</label>
        <input
            type="text"
            name="nama"
            value="{{ old('nama', $mahasiswa->nama) }}"
            required
        >

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option
                value="Laki-laki"
                {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}
            >Laki-laki</option>

            <option
                value="Perempuan"
                {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}
            >Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" rows="4" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>

        <label>Nomor HP</label>
        <input
            type="text"
            name="no_hp"
            value="{{ old('no_hp', $mahasiswa->no_hp) }}"
            required
        >

        <button type="submit">Simpan Perubahan</button>

        <a href="/mahasiswa" class="btn">Kembali</a>
    </form>

</div>
</body>
</html>