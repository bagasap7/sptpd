@extends('dashboard.layouts.main')

@section('container')
    <h2>Wajib <b> Pajak</b></h2>
       <div class="col-md-12 grid-margin stretch-card " id="wp">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulir Wajib Pajak</h4>
                  <p class="card-description">
                    Tambah Wajib Pajak
                  </p>
                  <form class="forms-sample" action="/wajib_pajak/store" method="post">
                    @csrf
                    <div class=" row">
                      <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                      <div class="col-sm-4 date datepicker" id="datepicker-popup">
                       <input  id="tanggal_daftar" type="input" class="form-control" value="{{ date('d/m/Y') }}" required data-language="en" readonly >
                        <input type="hidden" name="tanggal_daftar" value="{{ date('Y-m-d') }}">
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" id="no_pendaftaran" name="no_pendaftaran" value="{{ $kd }}"  readonly placeholder="Nomor" required>
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">Jenis Pendapatan</label>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" id="jenis_pendapatan" name="jenis_pendapatan" value="Pajak"  readonly required>
                     
                      </div>
                    </div>
                    
                    <div class="row">
                      <label for="jenis_pendapatan" class="col-sm-3 col-form-label">Jenis Usaha</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single w-100  form-control" name="jenis_usaha" id="jenis_usaha" type="text" required>
                          <option value="">Silahkan Pilih</option>
                          <option value="1">1 | Pribadi</option>
                          <option value="2">2 | Badan Usaha</option>
              
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <label for="nik" class="col-sm-3 col-form-label">NIK/NIB</label>
                      <div class="col-sm-4">
                        <input type="text" name="nik" id="nik" value=""  class="form-control @error('nik') is-invalid @enderror"  placeholder="NIK" required>
                        @error('nik')
                          <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                      </div>

                    </div>
                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" required>
                        @error('nama')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                     
                    </div>
                    <div class="row">
                      <label for="jalan" class="col-sm-3 col-form-label">Jalan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="" id="alamat" placeholder="Alamat" required>
                        @error('alamat')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                      <label for="rw" class="col-sm-1 col-form-label">RW</label>
                      <div class="col-sm-1">
                        <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" name="rw" value="" placeholder="RW" required>
                        @error('rw')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                      <label for="rt" class="col-sm-1 col-form-label">RT</label>
                      <div class="col-sm-1">
                        <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt" value="" placeholder="RT" required>
                        @error('rt')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Kabupaten</label>
                      <div class="col-sm-4">
                        <input type="text" name="kabupaten" id="kabupaten" value="" class="form-control @error('kabupaten') is-invalid @enderror" placeholder="Kabupaten" required>
                        @error('kabupaten')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    
                    <div class="row">
                      <label for="kabupaten" class="col-sm-3 col-form-label">Kecamatan</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single-kecamatan w-100  form-control" onchange="" name="id_kecamatan" id="id_kecamatan" type="text" placeholder="Kecamatan" required>
                          <option >Silahkan Pilih</option>
                          @foreach ($kecamatans as $kecamatan)
                              <option value="{{ $kecamatan->id }}">{{ $kecamatan->kode_kecamatan }} | {{ $kecamatan->nama_kecamatan }} </option>
                            
                          @endforeach
                          
                        </select>
                       
                      </div>
                    </div>
                    <div class="row">
                      <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single-kelurahan w-100  form-control" name="id_kelurahan" id="id_kelurahan" type="text" placeholder="Kelurahan" required>
                          <option >Silahkan Pilih</option>
                        
                        </select>
                       
                      </div>
                    </div>
                  
                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" id="kode_pos"  maxlength="5" placeholder="Kode Pos">
                        @error('kode_pos')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="no_telpon" class="col-sm-3 col-form-label">Nomor Hp</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" id="no_telpon"  maxlength="13" placeholder="Nomor Telepon">
                        @error('no_telpon')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Batal</button>
                  </form>
                </div>
              </div>
            </div>
            
@push('scripts')
      <script>
        
        $(document).ready(function() {
            $('.js-example-basic-single-kecamatan').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-single-kelurahan').select2();
        });
        
        $(document).ready(function() {
            $('#id_kecamatan').on('change', function() {
                var id_kecamatan = $(this).val();
                // window.alert(id_prov);
                if (id_kecamatan) {
                    $.ajax({
                        url: '/getKelurahan/' + id_kecamatan,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('select[name="id_kelurahan"]').empty();
                            $('select[name="id_kelurahan"]').append(
                                '<option hidden>Pilih Kelurahan</option>');
                            $.each(data, function(key, datakelurahan) {
                                $('select[name="id_kelurahan"]').append('<option value="' +
                                    datakelurahan.id + '">' + datakelurahan.kode_kelurahan + '|' + datakelurahan.nama_kelurahan +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_kelurahan"]').empty();
                }
            });
        });        
    </script>
@endpush
            
@endsection