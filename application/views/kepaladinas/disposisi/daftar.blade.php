@extends('components.layout_admin')

{{-- 
  Section tambahan:
  head : untuk penambahan kode didalam head
  script : untuk penambahan kode didalam script bagian paling bawah halaman
  sidebar : untuk mengatur menu pada sidebar
   --}}

@section('title', 'Disposisi Surat Masuk')
@section('sidebar_title', 'Disposisi Surat Masuk')
@section('user_image', 'images/img.jpg')
@section('username', 'Mandan')
@section('content_title', 'Disposisi Surat Masuk')

@section('content')
  <div class="table-responsive">
    <div style="overflow:auto; max-height:650px; margin:0px 0 0px 0;">
      <table class="table table-bordered table-stripped">
        <tr>
          <th>No</th>
          <th>No Surat</th>
          <th>Bidang</th>
          <th>Tgl Surat</th>
          <th>Tgl Diterima</th>
          <th>Judul Surat</th>
          <th>Asal Surat</th>
          <th>Email</th>
          <th>Perihal Surat</th>
          <th>Alamat Surat</th>
          <th>Kode Pos</th>
          <th>Website</th>
          <th>File Surat</th>
          <th>Aksi</th>
        </tr>
        @foreach($data_list as $nomor => $data)
          <tr>
            <td>{{ ($nomor+1) }}</td>
            <td>{{ $data['nomorsm'] }}</td>
            <td>{{ $data['bidang'] }}</td>
            <td>{{ TanggalIndo($data['tglsurat']) }}</td>
            <td>{{ TanggalIndo($data['tglditerima']) }}</td>
            <td>{{ $data['judulsurat'] }}</td>
            <td>{{ $data['asalsurat'] }}</td>
            <td>{{ $data['email'] }}</td>
            <td>{{ $data['perihalsurat'] }}</td>
            <td>{{ $data['alamatsurat'] }}</td>
            <td>{{ $data['kodepos'] }}</td>
            <td>{{ $data['website'] }}</td>
            <td><a href="{{ base_url() }}assets/images/{{ $data['filesurat'] }}">Unduh File</td>
            <td>
              <button type="button" onclick="showModalEdit({{ $nomor }})" class="btn btn-primary">Disposisi</button>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  
  <script>
    var data = <?=json_encode($data_list)?>;
    
    function resetModal()
    {
      elId("form_modal").action = "";
      elName("id")[0].value = "";
      elName("status")[0].value = "";
      elName("ket")[0].value = "";
      elName("isidisposisi")[0].value = "";
      elName("tgldisposisi")[0].value = "";
    }
    
    function closeModal()
    {
      resetModal();
      hideModal("#modal");
    }
    
    function showModalEdit(id)
    {
      resetModal();
      elId("judul_modal").innerHTML = "Disposisi Surat";
      var detail = data[id]; 
      elId("form_modal").action = "{{ site_url('kepaladinas/disposisi/edit') }}";
      elName("id")[0].value = detail.id;
      
      showModal("#modal");
    }
  </script>
  
  <div class="modal fade hide-modal" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="judul_modal">Judul Modal</h4>
        </div>
        <div class="modal-body">
          <form id="form_modal" method="POST" action="{{ site_url('kepaladinas/disposisi/tambah') }}">
            <input type="hidden" name="id">
            @include('components.form.select', ['_data' => ['name' => 'status', 'class' => 'form-control', 'label' => 'Status Surat', 'val' => 'value', 'caption' => 'value','options' => [['value' => 'acc'], ['value' => 'ditolak']]]])	
            @include('components.form.input', ['_data' => ['type' => 'date', 'name' => 'tgldisposisi', 'class' => 'form-control', 'max' => 50, 'label' => 'Tanggal Disposisi']])	
            @include('components.form.textarea', ['_data' => ['name' => 'isidisposisi', 'class' => 'form-control', 'label' => 'Isi Disposisi']])	
            @include('components.form.textarea', ['_data' => ['name' => 'ket', 'class' => 'form-control', 'label' => 'Keterangan']])	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="closeModal()">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Disposisi</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
