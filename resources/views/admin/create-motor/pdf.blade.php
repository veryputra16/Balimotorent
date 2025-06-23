<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1, .header p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>GALKARENT BALI</h1>
        <p>Jl. Raya Kerobokan No.123, Bali, Indonesia</p>
        <p>Email: infogalka@gmail.com | Telp: +62 812-3456-7890</p>
    </div>
    
    <h2>{{ $title }}</h2>
    <p><strong>Tanggal:</strong> {{ $date }}</p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Nama Motor</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $index => $loan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $loan->user->name ?? 'N/A' }}</td>
                <td>{{ $loan->motor->name ?? 'N/A' }}</td>
                <td>{{ $loan->delivery_date }}</td>
                <td>{{ $loan->return_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
