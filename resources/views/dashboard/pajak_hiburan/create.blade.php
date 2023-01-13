@extends('dashboard.layouts.main')

@section('container')
    <h2>Objek <b> Pajak</b></h2>

        <div class="col-md-12 grid-margin">
          <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Wajib Pajak</h4>
                  <p class="card-description">
                    Data Wajib Pajak <b>{{ $objekpajak->wajibpajak->nama }}</b>
                  </p>
                  <form class="forms-sample" action="" method="">
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">NPWPD</label>
                      <div class="col-sm-4"> 
                        <input type="input" class="form-control" id="npwpd" name="npwpd" value="{{ sprintf("%07s",$objekpajak->wajibpajak->no_pendaftaran) }}"  readonly placeholder="Nomor" required>
                      </div>
                    </div>
                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $objekpajak->wajibpajak->nama }}" class="form-control" readonly required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $objekpajak->wajibpajak->alamat. ',' . ' '. 'RT'.' '.$objekpajak->wajibpajak->rt.','.' '. 'RW'.' '.$objekpajak->wajibpajak->rw . ',' . ' '.$objekpajak->wajibpajak->kelurahan->nama_kelurahan . ',' . ' '.$objekpajak->wajibpajak->kecamatan->nama_kecamatan  }}" class="form-control" placeholder="Nama" readonly required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">No Telepon</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $objekpajak->wajibpajak->no_telpon }}" class="form-control" readonly placeholder="Nama" required>
                      </div>
                    </div>

                  </form>
                </div>

                 <div class="card-body">
                  <h4 class="card-title">Data Objek Pajak</h4>
                  <p class="card-description">
                    Data Pajak Objek <b>{{ $objekpajak->nama_objek }}</b>
                  </p>
                  <form class="forms-sample" action="" method="">
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">NOPD</label>
                      <div class="col-sm-4"> 
                        <input type="input" class="form-control" id="npwpd" name="npwpd" value="{{ sprintf("%02s",$objekpajak->jenispajak->kode_jenis_pajak ).".".sprintf("%07s",$objekpajak->no_objek).".".$objekpajak->kecamatan->kode_kecamatan.".".$objekpajak->kelurahan->kode_kelurahan}}"  readonly placeholder="Nomor" required>
                      </div>
                    </div>
                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama Objek</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $objekpajak->nama_objek }}" class="form-control" readonly required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" name="nama" id="nama" value="{{ $objekpajak->alamat_objek. ',' . ' '. 'RT'.' '.$objekpajak->rt_objek.','.' '. 'RW'.' '.$objekpajak->rw_objek.','. ' '.$objekpajak->kelurahan->nama_kelurahan. ','. ' '.$objekpajak->kecamatan->nama_kecamatan }}
                        " class="form-control" placeholder="Nama" readonly required>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
        </div>

{{-- Form Tambah Pajak Resto --}}
        <div class="col-md-12 grid-margin stretch-card " id="wp">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Formulir Pajak Hiburan</h4>
                  <p class="card-description">
                    Tambah Pajak Hiburan
                  </p>
                  <form class="forms-sample" action="{{ route('pajak_hiburan.store') }}" method="post">
                    @csrf
                    <div class=" row">
                      <div class="col-sm-4 date " >
                       <input  id="id_wajib_pajak" name="id_wajib_pajak" type="hidden" class="form-control" value="" required data-language="en" readonly >
                        
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="id_wajib_pajak" name="id_wajib_pajak" value={{ $objekpajak->wajibpajak->id }}  readonly required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="id_objek_pajak" name="id_objek_pajak" value={{ $objekpajak->id }}  readonly required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <input type="hidden" class="form-control" id="id_jenis_pajak" name="id_jenis_pajak" value={{ $objekpajak->jenispajak->id }}  readonly required>
                      </div>
                    </div>
                   
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">Nomor Transaksi</label>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" id="no_transaksi" name="no_transaksi" value={{ $kd }}  readonly required>
                      </div>
                    </div>


                    <div class=" row">
                      <label for="tahun_pajak" class="col-sm-3 col-form-label">Tahun Pajak</label>
                      <div class="col-sm-4 date " >
                       <input  id="tahun_pajak" name="tahun_pajak" type="input" class="form-control" value="{{ date('Y') }}" required data-language="en" readonly >
                      
                      </div>
                    </div>
                    <div class=" row">
                      <label for="tanggal" class="col-sm-3 col-form-label">Masa Pajak</label>
                      <div class="col-sm-4 ">
                      
                       <input placeholder="masukkan tanggal Awal" type="date" class="form-control date " id="" name="masa_awal">
                       
                      </div>
                       <div class="col-sm-4 ">
                       <input placeholder="masukkan tanggal Akhir" type="date" class="form-control date" name="masa_akhir">
                     
                      </div>
                      
                    </div>
                    
                    <div class="row">
                      <label for="rekening" class="col-sm-3 col-form-label">Rekening</label>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" id="no_objek" name="norek_transaksi" value="{{ $objekpajak->rekening->kode_rekening.' '.$objekpajak->rekening->nama_rekening}}"  readonly required>
                      </div>
                    </div>
                   
                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="kegiatan" id="exampleTextarea1" rows="10"></textarea>
                      </div>
                     
                    </div>
                    <div class="row">
                      <label for="jalan" class="col-sm-3 col-form-label">Keterangan</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="ket_kegiatan" id="exampleTextarea1" rows="10"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <label for="dasar_pengenaan" class="col-sm-3 col-form-label">Dasar Pengenaan</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" name="dasar_pengenaan" value="" id="dasar_pengenaan" placeholder="Jumlah" required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="tarif_pajak" class="col-sm-3 col-form-label">Tarif(%)</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="tarif_pajak" id="tarif_pajak"  value="{{ $objekpajak->rekening->persen_tarif }}" >
                      </div>
                    </div>
                     <div class="row">
                      <label for="total_pajak" class="col-sm-3 col-form-label">Total Pajak</label>
                      <div class="col-sm-4">
                        <input type="text" ata-a-sign="Rp. " data-a-dec="," data-a-sep="." class="form-control" name="total_pajak" id="total_pajak"  readonly  placeholder="Total Pajak">
                      </div>
                    </div>
        

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Batal</button>
                  </form>
                </div>
              </div>
            </div>

  @push('pajak')
                
  <script>
    $(document).ready(function(){
      $('#dasar_pengenaan').keyup(function(){

        var bayar = parseInt($('#dasar_pengenaan').val());
        var diskon = parseInt($('#tarif_pajak').val());

        var totalBayar = bayar*diskon/100;
        $('#total_pajak').val(totalBayar);
      });
    });

    new AutoNumeric('#dasar_pengenaan',{
      decimalPlaces : '0',
      decimalCharacter : ',',
      digitGroupSeparator: '.'

    })

  //     function convertRupiah(angka, prefix) {
  //       var number_string = angka.replace(/[^,\d]/g, "").toString(),
  //         split  = number_string.split(","),
  //         sisa   = split[0].length % 3,
  //         rupiah = split[0].substr(0, sisa),
  //         ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      
  //       if (ribuan) {
  //         separator = sisa ? "." : "";
  //         rupiah += separator + ribuan.join(".");
  //       }
      
  //         rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  //         return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
  //       }
  
  // function isNumberKey(evt) {
  //     key = evt.which || evt.keyCode;
  //     if ( 	key != 188 // Comma
  //       && key != 8 // Backspace
  //       && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
  //       && (key < 48 || key > 57) // Non digit
  //       ) 
  //     {
  //       evt.preventDefault();
  //       return;
  //     }
  //   }
  </script>
  @endpush


@endsection