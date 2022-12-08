@extends('dashboard.layouts.main')

@section('container')
    <h2>Pajak <b>  Hotel</b></h2>

    <div class="col-lg-4 d-flex flex-column">
      <div class="row flex-grow">
          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div>
                                       <a href="{{ route('wajib_pajak.create') }}" class="btn btn-primary">Tambah Pajak Hotel</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
    </div>

    <div class="home-tab">
      <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register Pajak Hotel</h4>
                  <p class="card-description">
                    Data Pajak Hotel yang sudah diregistrasi
                  </p>
                  @if (session()->has('success'))
                    <div class="alert alert-success col-lg-12 " role="alert">{{ session('success') }}
                    </div>
                @endif
                  <div class="table-responsive">
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
                          <th>Cetak</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach ($wajibpajak as $wp) --}}
                        <tr>
                         <td></td> 
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                          <td>
                           <a href="">
                              <button type="button" class="btn btn-inverse-primary btn-lg mdi mdi-file"></button>
                            </a>
                          </td>
                          <td>
                            <a href="" class="d-inline-block text-decoration-none" >
                              <button type="button"  class="d-flex btn btn-inverse-warning btn-fw">Edit</button>
                            </a>
                            <button type="button" class=" d-flex btn btn-inverse-info btn-fw">Data</button>
                          </td>
                        </tr>
                         {{-- @endforeach      --}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
                      
            </div>        
          </div>
        </div>
      </div>
    </div>
@endsection