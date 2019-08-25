<div class="modal fade hide-modal" id="modal-tambah-peserta-keberangkatan">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="judul_modal">Tambahkan Peserta</h4>
    </div>
    <div class="modal-body">
      <form method="POST" action="{{ site_url('peserta-keberangkatan') }}">
      <input type="hidden" name="id_keberangkatan" value="<?=$_GET['id_keberangkatan']?>">
      <table class="table table-bordered table-stripped">
        <tr>
          <th>#</th>
          <th>No</th>
          <th>ID Transaksi</th>
          <th>Nama Peserta</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Asal</th>
          <th>Ukuran Baju</th>
        </tr>
        @foreach($data_peserta as $nomor => $data)
          <tr>
            <td>
              <input type="checkbox" name="id_peserta_transaksi[]" value="{{ $data['id'] }}" />
            </td>
            <td>{{ ($nomor+1) }}</td>
            <td>{{ $data['id_transaksi'] }}</td>
            <td>{{ $data['nama_lengkap'] }}</td>
            <td>{{ TanggalIndo($data['tgl_lahir']) }}</td>
            <td>{{ $data['jenis_kelamin'] }}</td>
            <td>{{ $data['nm_kota'] }}</td>
            <td>{{ $data['ukuran_baju'] }}</td>
          </tr>
        @endforeach
      </table>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-danger">Tambahkan</button>
    </div>
    </form>
  </div>
</div>
</div>
