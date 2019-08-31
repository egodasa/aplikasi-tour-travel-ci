<html>
	<head>
		<title>Bukti Angsuran</title>
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
			BUKTI ANGSURAN TOUR AND TRAVEL <br> AISYAH TOUR AND TRAVEL BUKITTINGGI
		</div>
		<hr style="width: 100%; border: 2px solid black">
    
    <table style="width: 100%;text-align: left;">
      <tr>
        <td style="width:20%;">Nama Penanggung Jawab</td>
        <td style="width:1%;">:</td>
        <td style="width:79%;">Admin</td>
      </tr>
      <tr>
        <td style="width:20%;">Nama Peserta</td>
        <td style="width:1%;">:</td>
        <td style="width:79%;">{{ $detail_transaksi['username'] }}</td>
      </tr>
      <tr>
        <td style="width:20%;">Jenis Program</td>
        <td style="width:1%;">:</td>
        <td style="width:79%;">{{ $detail_transaksi['nama_program']." ".$detail_transaksi['nm_jenis'] }}</td>
      </tr>
      <tr>
        <td style="width:20%;">Total Bayar</td>
        <td style="width:1%;">:</td>
        <td style="width:79%;">{{ rupiah($detail_transaksi['total_bayar']) }}</td>
      </tr>
    </table>
    
    <p>Data Angsuran</p>
    <table class="tabel_laporan">
      <tr>
        <th class="kolom_tabel_laporan" style="width: 10px;">No</th>
        <th class="kolom_tabel_laporan">Tanggal Bayar</th>
        <th class="kolom_tabel_laporan">Jumlah Bayar</th>
        <th class="kolom_tabel_laporan">Jenis Pembayaran</th>
      </tr>
      @foreach($data_list as $no => $data)
        <tr>
          <td class="kolom_tabel_laporan">{{ ($no+1) }}</td>
          <td class="kolom_tabel_laporan">{{ TanggalIndo($data['tgl_bayar']) }}</td>
          <td class="kolom_tabel_laporan">{{ rupiah($data['juml_bayar']) }}</td>
          <td class="kolom_tabel_laporan">{{ $data['jenis_pembayaran'] }}</td>
        </tr>
      @endforeach
    </table>
	</body>
</html>
