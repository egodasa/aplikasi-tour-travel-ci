<html>
	<head>
		<title>Laporan Peserta Keberangkatan</title>
		<style>
			.judul {
				text-align: center;
				font-weight: bold;
				font-size: 17pt;
				font-family: Arial, Helvetica, 'Sans Serif';
				width: 100%;
        margin: 30px 10px;
			}
			
			.tabel_laporan {
				border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        font-size: 10pt;
			}
			.kolom_tabel_laporan{
        border: 1px solid black;
        border-collapse: collapse;
				text-align: center;
        padding: 10px 5px;
			}
			
		</style>
	</head>
	<body>
		<div class="judul">
			LAPORAN DATA KEBERANGKATAN TOUR AND TRAVEL <br> AISYAH TOUR AND TRAVEL BUKITTINGGI <br>
			{{ $jenis }}
			<br>
			PERIODE {{ $judul }}
		</div>
		<hr style="width: 100%; border: 2px solid black">
    <table class="tabel_laporan">
      <tr>
        <th class="kolom_tabel_laporan" style="width: 10px;">No</th>
        <th class="kolom_tabel_laporan">Nama Peserta</th>
        <th class="kolom_tabel_laporan">Tanggal Berangkat</th>
        <th class="kolom_tabel_laporan">Maskapai</th>
        <th class="kolom_tabel_laporan">Nama Program</th>
        <th class="kolom_tabel_laporan">Status</th>
        <th class="kolom_tabel_laporan">Keterangan</th>
      </tr>
      @foreach($data_list as $no => $data)
        <tr>
          <td class="kolom_tabel_laporan">{{ ($no+1) }}</td>
          <td class="kolom_tabel_laporan">{{ $data['nama_lengkap'] }}</td>
          <td class="kolom_tabel_laporan">{{ TanggalIndo($data['tgl_berangkat']) }}</td>
          <td class="kolom_tabel_laporan">{{ $data['nama_maskapai'] }}</td>
          <td class="kolom_tabel_laporan">{{ $data['nama_program']." ".$data['nm_jenis'] }}</td>
          <td class="kolom_tabel_laporan">{{ $data['status'] }}</td>
          <td class="kolom_tabel_laporan">{{ $data['keterangan'] }}</td>
        </tr>
      @endforeach
    </table>
	</body>
</html>
