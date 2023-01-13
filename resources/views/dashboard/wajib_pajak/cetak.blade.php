
    <h2>Wajib <b> Pajak</b></h2>

                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>NIK</th>
                          <th>No</th>
                          <th>NPWPD</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
                  
                        </tr>
                      </thead>
                      <tbody>
                       
                        <tr>
                         
                         <td>{{ $wajibpajak->tanggal_daftar }}</td>
                         <td>{{ $wajibpajak->nik }}</td>
                         <td>{{ sprintf("%07s",$wajibpajak->no_pendaftaran) }}</td>
                         <td>{{ "P.".$wajibpajak->jenis_usaha.".".sprintf("%07s",$wajibpajak->no_pendaftaran).".".$wajibpajak->kecamatan->kode_kecamatan.".".$wajibpajak->kelurahan->kode_kelurahan }}</td>
                         <td>{{ $wajibpajak->nama }}</td>
                         <td>{{ $wajibpajak->alamat }}</td>
                         <td>{{ $wajibpajak->no_telpon }}</td>
                        </tr>
                         
                      </tbody>
                    </table>
