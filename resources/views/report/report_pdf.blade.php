<!DOCTYPE html>
<html>
<head>
	<title>Laporan Total</title>
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
		<h4>Laporan Total</h4>
	</center>

	<table class='table table-striped text-center'>
		<thead class="thead-dark">
			<tr>
				<th >No.</th>
                <th >Judul</th>
                <th >Kode</th>
                <th >Kategori</th>
                <th >Murid</th>
                <th >Kelas</th>
                <th >Dipinjam</th>
                <th >Dikembalikan</th>
			</tr>
		</thead>
		<tbody>
			 @foreach ($reports as $row)
            <tr>          
                <td>{{$loop->iteration}}</td>
                <td>{{$row->bookcode->book->title}}</td>
                <td>{{$row->bookcode->code}}</td>
                <td>{{$row->bookcode->book->category->name}}</td>
                <td>{{$row->student->name}}</td>
                <td>{{$row->student->kelas->name}}</td>
                <td>{{date_format($row->created_at, 'Y-n-j')}}</td>
                <td>
                    @if ($row->returned_at != null)
                    {{ date('Y-n-j', strtotime($row->returned_at)) }}

                    @else 
                        {{ 'Belum' }}
                    @endif
                </td>
            </tr>
            @endforeach        
		</tbody>
	</table>

</body>
</html>