<!DOCTYPE html>
<html>
<head>
	<title>Daftar Murid Teraktif</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>Daftar Murid Teraktif</h4>
	</center>

	<table class='table table-striped text-center'>
		<thead class="thead-dark">
			<tr>
				<th>No.</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>No. Absen</th>
                <th>Tahun</th>
                <th>Total</th>
			</tr>
		</thead>
		<tbody>
			 @foreach ($students as $row)
                <tr>          
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->nisn}}</td>
                    <td>{{$row->kelas->name}}</td>
                    <td>{{$row->no_absen}}</td>
                    <td>{{$row->year}}</td>
                    <td>{{ $row->borrow_count }}</td>
                </tr>
            @endforeach        
		</tbody>
	</table>

</body>
</html>