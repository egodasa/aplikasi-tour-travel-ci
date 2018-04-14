<table class="table table-bordered table-striped dataTable">
	<?php
	$data = json_encode($data);
	$data = json_decode($data);
	?>
	<thead>
		<tr>
			<th>No</th>
			@foreach($fields as $r)
			<th>{{$r['title']}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($data as $d)
			<tr>
				<td>{{$loop->iteration}}</td>
				@foreach($fields as $r)
				<td>{{ $d->{$r['name']} }}</td>
				@endforeach
			</tr>
		@endforeach
	</tbody>
</table>
