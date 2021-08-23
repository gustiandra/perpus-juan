<!DOCTYPE html>
<html>
<head>
	<title>Daftar Buku Favorit</title>
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
		<h4>Daftar Buku Favorit</h4>
	</center>

	<table class='table table-striped text-center'>
		<thead class="thead-dark">
			<tr>
				<th >No.</th>
                <th >Judul</th>
                <th >ISBN</th>
                <th >Penulis</th>
                <th >Penerbit</th>
                <th >Kategori</th>
                <th >Jumlah</th>
                <th >Dipinjam</th>
			</tr>
		</thead>
		<tbody>
			 @foreach ($books as $row)
                <tr>          
                <td>{{$loop->iteration}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->isbn}}</td>
                <td>{{$row->author}}</td>
                <td>{{$row->publisher}}</td>
                <td>{{$row->category->name}}</td>
                <td>{{count($row->bookcode)}}</td>
                <td>{{ $row->borrow_count }}</td>
                </tr>
            @endforeach       
		</tbody>
	</table>

</body>
</html>