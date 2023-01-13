@extends('dashboard.layouts.main')

@section('container')
    <h2>Objek <b> Pajak</b></h2>

        <div class="col-md-12 grid-margin">
          <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Wajib Pajak</h4>
                  <p class="card-description">
                    Data Wajib Pajak 
                  </p>
                  <form class="forms-sample" action="" method="">
                    
                    <div class=" row">
                      <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                      <div class="col-sm-4 date date" id="">
                       
                        <input  id="tanggal_daftar" type="input" class="form-control" value="{{ $op->wajibpajak->tanggal_daftar }}" required data-language="en" readonly >
                          <input type="hidden" name="tanggal_daftar" value="{{ date('Y-m-d') }}">
                       
                       
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">NPWPD</label>
                      <div class="col-sm-4">
                       
                            
                        <input type="input" class="form-control" id="npwpd" name="npwpd" value="{{ sprintf("%07s",$op->wajibpajak->no_pendaftaran) }}"  readonly placeholder="Nomor" required>
                       
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">NIK</label>
                      <div class="col-sm-4">
                       
                            
                        <input type="input" class="form-control" id="jenis_pajak" name="jenis_pajak" value="{{ $op->wajibpajak->nik }}"  readonly required>
                       
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-4">
                       
                            
                        <input type="text" name="nama" id="nama" value="{{ $op->wajibpajak->nama }}" class="form-control" readonly required>
                       
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $op->wajibpajak->alamat. ',' . ' '. 'RT'.' '.$op->wajibpajak->rt.','.' '. 'RW'.' '.$op->wajibpajak->rw }}" class="form-control" placeholder="Nama" readonly required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">No Telepon</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $op->wajibpajak->no_telpon }}" class="form-control" readonly placeholder="Nama" required>
                      </div>
                    </div>
                  
                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos"  value="{{ $op->wajibpajak->kode_pos }}" readonly maxlength="5" placeholder="Kode Pos">
                      </div>
                    </div>

                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="email" id="email" value="{{ $op->wajibpajak->email }}"  readonly maxlength="5" placeholder="Kode Pos">
                      </div>
                    </div>
                    
                  </form>
                </div>
              </div>
        </div>

{{-- Form Tambah Objek --}}
        <div class="col-md-12 grid-margin stretch-card " id="wp">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Formulir Objek Pajak</h4>
                  <p class="card-description">
                    Edit Objek Pajak
                  </p>
                  <form class="forms-sample" action="{{route('objek_pajak.update',$op->id)  }}" method="post">
                    @csrf
                    <div class=" row">
                      <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                      <div class="col-sm-4 date" id="">
                       <input  id="tanggal_daftar_objek" name="tanggal_daftar_objek" type="input" class="form-control" value="{{ date('d/m/Y') }}" required data-language="en" readonly >
                        <input type="hidden" name="tanggal_daftar_objek" value="{{ date('Y-m-d') }}">
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" id="no_objek" name="no_objek" value="{{ sprintf("%07s",$op->no_objek) }}"  readonly required>
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">Jenis Pajak</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single-jenis_pajak w-100  form-control" name="id_jenis_pajak" id="id_jenis_pajak" type="text" required>
                          <option value="AL">Silahkan Pilih</option> 
                          @foreach ($jenispajak as $jp)
                          <option value="{{ $jp->id }}" {{ $op->id_jenis_pajak == $jp->id ? 'selected' : '' }}>{{ $jp->kode_jenis_pajak }} | {{ $jp->nama_pajak }}</option>
                              
                          @endforeach
              
                        </select>
                      </div>
                    </div>
                    
                    <div class="row">

                      <label for="rekening" class="col-sm-3 col-form-label">Rekening</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single-rekening w-100  form-control" name="id_rekening" id="id_rekening" type="text" placeholder="Rekening" required>
                          <option >Silahkan Pilih</option>
                          @foreach ($rekening as $rek)
                              <option value="{{ $rek->id }}" {{ $op->id_rekening == $rek->id ? 'selected' : '' }}>{{ $rek->kode_rekening }} | {{ $rek->nama_rekening }} | {{ $rek->persen_tarif }} </option>
                          @endforeach
                        </select>
                      </div>
                    
                      {{-- <div class="col-sm-4">
                         <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilih-rekening">Pilih Rekening</button>
                        
                      </div> --}}
                    </div>
                   
                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama_objek" id="nama_objek" value="{{ $op->nama_objek }}" class="form-control" placeholder="Nama" required>
                      </div>
                     
                    </div>
                    <div class="row">
                      <label for="jalan" class="col-sm-3 col-form-label">Jalan</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="alamat_objek" value="{{ $op->alamat_objek}}" id="alamat_objek" placeholder="Alamat" required>
                      </div>
                      <label for="rw" class="col-sm-1 col-form-label">RW</label>
                      <div class="col-sm-1">
                        <input type="text" class="form-control" id="rw_objek" name="rw_objek" value="{{$op->rw_objek}}" placeholder="RW" required>
                      </div>
                      <label for="rt" class="col-sm-1 col-form-label">RT</label>
                      <div class="col-sm-1">
                        <input type="text" class="form-control" id="rt_objek" name="rt_objek" value="{{ $op->rt_objek }}" placeholder="RT" required>
                      </div>
                    </div>
                    <div class="row">
                      <label for="kabupaten" class="col-sm-3 col-form-label">Kecamatan</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single-kecamatan w-100  form-control" onchange="" name="id_kecamatan" id="id_kecamatan" type="text" placeholder="Kecamatan" required>
                          <option >Silahkan Pilih</option>
                          @foreach ($kecamatans as $kecamatan)
                              <option value="{{ $kecamatan->id }}" {{ $op->id_kecamatan == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->kode_kecamatan }} | {{ $kecamatan->nama_kecamatan }} </option>
                          @endforeach
                         
                          
                        </select>
                       
                      </div>
                    </div>
                    <div class="row">
                      <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                      <div class="col-sm-4">
                        <select class="js-example-basic-single-kelurahan w-100  form-control" name="id_kelurahan" id="id_kelurahan" type="text" placeholder="Kelurahan" required>
                          @foreach ($kelurahans as $kelurahan)
                              <option value="{{ $kelurahan->id }}" {{ $op->id_kelurahan == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->kode_kelurahan }} | {{ $kelurahan->nama_kelurahan }} </option>
                          @endforeach
                        
                        </select>
                       
                      </div>
                    </div>
                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="kode_pos_objek" value="{{ $op->kode_pos_objek }}" id="kode_pos_objek"  maxlength="5" placeholder="Kode Pos">
                      </div>
                    </div>
                    <div class="row">
                      <div class="container map " id="map" style="height:350px; margin:20px 0px"></div>
                    </div>
                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Latitude</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $op->latitude }}">
                      </div>
                    </div>
                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Longitude</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $op->longitude }}">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Batal</button>
                  </form>
                </div>
              </div>
            </div>

          {{-- Modal --}}
          <div class="modal fade " id="pilih-rekening" tabindex="-1" aria-labelledby="pilih-rekening" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Wajib Pajak Terdaftar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Rekening</th>
                                <th>Nama Rekening</th>
                                <th>Tarif</th>
                           
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                             
                            <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td> </td>
                               
                                  <td>
                                    <a href="">
                                      <button type="button" class="btn btn-success btn-icon-text">
                                      <i class="ti-plus btn-icon-prepend"></i>Objek Pajak
                                    </button>
                                    </a>
                                  </td> 
                            </tr>
                         
                            </tbody>
                          </table>
                        </div>
                </div>
                
              </div>
            </div>
          </div>
      @push('scripts')
      <script>
      // Kelurahan
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
                        url: '/getKelurahanObjek/' + id_kecamatan,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('select[name="id_kelurahan"]').empty();
                            $('select[name="id_kelurahan"]').append(
                                '<option hidden>Pilih Kelurahan</option>');
                            $.each(data, function(key, datakelurahan) {
                                $('select[name="id_kelurahan"]').append('<option value="' +
                                    datakelurahan.id + '">' + datakelurahan.kode_kelurahan + '|' + datakelurahan.nama_kelurahan  +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_kelurahan"]').empty();
                }
            });
        });

        // Rekening
        $(document).ready(function() {
            $('.js-example-basic-single-jenis_pajak').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-single-rekening').select2();
        });
        
        $(document).ready(function() {
            $('#id_jenis_pajak').on('change', function() {
                var id_jenis_pajak = $(this).val();
                // window.alert(id_prov);
                if (id_jenis_pajak) {
                    $.ajax({
                        url: '/getRekening/' + id_jenis_pajak,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('select[name="id_rekening"]').empty();
                            $('select[name="id_rekening"]').append(
                                '<option hidden>Pilih Rekening</option>');
                            $.each(data, function(key, dataRekening) {
                                $('select[name="id_rekening"]').append('<option value="' +
                                    dataRekening.id + '">' + dataRekening.kode_rekening + '|' + dataRekening.nama_rekening + '|' + dataRekening.persen_tarif + '%' +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_rekening"]').empty();
                }
            });
        });
   
    </script>

    <script>
      // Peta Koordinat
          // set lokasi latitude dan longitude, lokasinya kabupaten rembang
          var mymap = L.map('map').setView([-6.7147371, 111.3209311], 13);
              // stting maps
              L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', 
              {subdomains:['mt0','mt1','mt2','mt3'], attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(mymap);
          
              var marker = L.marker([<?= $op->latitude ?>, <?= $op->longitude ?>]).addTo(mymap);
              marker.bindPopup("<?= $op->nama_objek ?>").openPopup();

              // buat variabel berisi fungsi L.popup
              var popup = L.popup();

              // buat fungsi popup saat map diklik
              function onMapClick(e) {
                popup
                  .setLatLng(e.latlng)
                  .setContent("Koordinatnya adalah" + e.latlng.toString())
                  .openOn(mymap);

                document.getElementById('longitude').value = e.latlng
                .lng //value pada form latitde, longitude akan berganti secara otomatis
            document.getElementById('latitude').value = e.latlng
                .lat //value pada form latitde, longitude akan berganti secara otomatis
              }
              mymap.on('click', onMapClick); //jalankan fungsi
    </script>
        @endpush
            
@endsection