@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Transaksi')
@section('sidebar_title', 'Transaksi')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Transaksi')

@section('content')
  <div class="row">
    <div class="col-sm-2 col-xs-12">
      <button type="button" onclick="showModalTambah()" class="btn btn-primary">Tambah Peserta</button>
    </div>
    <div class="col-sm-2 col-xs-12">
      <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Cetak Laporan
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          @foreach($data_master_program as $d)
            <li><a href="{{ site_url('laporan/transaksi?id_program='.$d['id']) }}" target="_blank">{{ $d['nama_program'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <table class="table table-bordered table-stripped">
    <tr>
      <th>No</th>
      <th>No Transaksi</th>
      @if($_SESSION['level'] == "Admin")
        <th>Username</th>
      @endif
      <th>Program</th>
      <th>Total Peserta</th>
      <th>DP</th>
      <th>Total Bayar</th>
      <th>Sisa Pembayaran</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach($data_list as $nomor => $data)
      <tr>
        <td>{{ ($nomor+1) }}</td>
        <td>{{ $data['id'] }}</td>
        @if($_SESSION['level'] == "Admin")
          <td>{{ $data['username'] }}</td>
        @endif
        <td>{{ $data['nama_program']." ".$data['nm_jenis'] }}</td>
        <td>{{ $data['total_peserta'] }}</td>
        <td>{{ rupiah($data['dp']) }}</td>
        <td>{{ rupiah($data['total_bayar']) }}</td>
        <td>{{ rupiah(($data['total_bayar'] - $data['sudah_dibayar'])) }}</td>
        <td>{{ $data['status'] }}</td>
        <td>
          <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-success">Edit</button>
          <button type="button" onclick="showConfirmationDelete('<?=site_url("transaksi/hapus?id=".$data['id'])?>')" class="btn btn-danger">Hapus</button>
          <a href="<?=site_url("peserta-transaksi?id_transaksi=".$data['id'])?>" class="btn btn-primary">Data Peserta</a>
          <a href="<?=site_url("angsuran?id_transaksi=".$data['id'])?>" class="btn btn-warning">Data Angsuran</a>
        </td>
      </tr>
    @endforeach
  </table>
  
  <div class="modal fade hide-modal" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="judul_modal">Judul Modal</h4>
        </div>
        <div class="modal-body">
          <form id="form_modal" method="POST" action="{{ site_url('transaksi/tambah') }}">
            <input type="hidden" name="id">
            <input type="hidden" name="id_pengguna" value="<?=$_SESSION['id']?>" />
            @include('components.form.select', ['_data' => [ 'class' => 'form-control', 'name' => 'id_jenis', 'value' => '','val' => 'id', 'caption' => 'jenis_program', 'label' => 'Nama Program', 'options' => $data_program, 'caption' => 'nama_program']])
            @include('components.form.input', ['_data' => ['type' => 'number', 'name' => 'dp', 'class' => 'form-control', 'label' => 'Dp', 'readonly' => 'readonly']])
            @if($_SESSION['level'] == "Admin")
              @include('components.form.select', ['_data' => [ 'class' => 'form-control', 'name' => 'status', 'value' => 'val','caption' => 'status', 'label' => 'Status', 'options' => [['val' => 'Aktif'], ['val' => 'Dibatalkan']], 'val' => 'val', 'caption' => 'val']])
            @else
              <input type="hidden" name="status" value="Aktif" />
            @endif
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="closeModal()">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </div>
    </form>
  </div>
  <script>
    var data = <?=json_encode($data_list)?>;
    var data_program = <?=json_encode($data_program)?>;
    
    function tampilkanHargaDp()
    {
      var program_terpilih = document.getElementsByName("id_jenis")[0].selectedIndex;
      document.getElementsByName("dp")[0].value = data_program[program_terpilih].dp;
    }
    
    function resetModal()
    {
      elId("form_modal").action = "";
      elId("judul_modal").innerHTML = "Tambah Data Baru";
      elName("id")[0].value = "";
      elName("dp")[0].value = "";
      elName("id_jenis")[0].value = "";
      @if($_SESSION['level'] == "Admin")
        elName("status")[0].value = "";
      @else
        elName("status")[0].value = "Aktif";
      @endif
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalTambah()
    {
      resetModal();
      elId("form_modal").action = "{{ site_url('transaksi/tambah') }}";
      showModal("#modal");
    }
    
    function showModalEdit(id)
    {
      elId("judul_modal").innerHTML = "Edit Data";
      resetModal();
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('transaksi/edit') }}";
      elName("id")[0].value = detail.id;
      elName("dp")[0].value = detail.dp;
      elName("id_jenis")[0].value = detail.id_jenis;
      elName("status")[0].value = detail.status;
      showModal("#modal");
    }
    
    document.getElementsByName("id_jenis")[0].addEventListener("change", tampilkanHargaDp);
  </script>
@endsection
