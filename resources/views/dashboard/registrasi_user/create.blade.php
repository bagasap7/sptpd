@extends('dashboard.layouts.main')

@section('container')
    <h2>Registrasi<b> Akun</b></h2>
       <div class="col-md-12 grid-margin stretch-card " id="wp">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pembuatan Akun Pengguna Wajib</h4>
                  <p class="card-description">
                    Tambah Akun
                  </p>
                  <form class="forms-sample" action="{{ route('tambah_user.store') }}" method="post">
                    @csrf

                    <div class="row">
                      <label for="id_wajib_pajak" class="col-sm-3 col-form-label">ID WP</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('id_wajib_pajak') is-invalid @enderror" name="id_wajib_pajak" id="id_wajib_pajak"  value="{{ $wajibpajak->id }}" readonly>
                        @error('id_wajib_pajak"')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class=" row">
                      <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pembuatan</label>
                      <div class="col-sm-4 date" id="">
                       <input  id="tanggal_daftar" type="input" class="form-control" value="{{ date('d/m/Y') }}" required data-language="en" readonly >
                        <input type="hidden" name="tanggal_daftar" value="{{ date('Y-m-d') }}">
                      </div>
                    </div>

                    <div class="row">
                      <label for="akses" class="col-sm-3 col-form-label">Akses</label>
                      <div class="col-sm-4">
                         <select class="js-example-basic-single-kecamatan w-100  form-control" onchange="" name="akses" id="akses" type="text" placeholder="Silahkan Pilih" required>
                          <option >Silahkan Pilih</option>
                          <option value="2">User </option>
                        </select>
                        @error('akses')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $wajibpajak->nama }}">
                        @error('kode_pos')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    
                    <div class="row">
                      <label for="username" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username"  value="{{ "P.".$wajibpajak->jenis_usaha.".".sprintf("%07s",$wajibpajak->no_pendaftaran).".".$wajibpajak->id_kecamatan.".".$wajibpajak->id_kelurahan }}" readonly>
                        @error('kode_pos')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-4">
                          <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  minlength="8" placeholder="password">
                            <div class="input-group-append">
                            <span id="mybutton" onclick="change()" class="input-group-text"><i class="mdi mdi-eye"></i></span>
                          </div>
  
                          @error('no_telpon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $wajibpajak->email }}" readonly>
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="no_telpon_wp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('no_telpon_wp') is-invalid @enderror" name="no_telpon_wp" id="no_telpon_wp" value="{{ $wajibpajak->no_telpon }}" readonly>
                        @error('no_telpon_wp')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>
                    <div class="row">
                      <label for="alamat_wp" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control @error('alamat_wp') is-invalid @enderror" name="alamat_wp" id="alamat_wp" value="{{ $wajibpajak->alamat }}" readonly>
                        @error('alamat_wp')
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
            // membuat fungsi change
            function change() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('password').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('password').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = '<i class="mdi mdi-eye-off"></i>';
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('password').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<i class="mdi mdi-eye"></i>`;
                }
            }
        </script>
@endpush
            
@endsection