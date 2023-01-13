<?php 
use App\Models\Transaksi;
?>
@extends('dashboard.layouts.main')

@section('container')
<div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Data Pembayaran</h4>
                                   <p class="card-subtitle card-subtitle-dash">Anda memiliki 50+ pajak yang sudah dibayar</p>
                                  </div>
                                  
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        {{-- <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th> --}}
                                        <th>No</th>
                                        <th>Wajib Pajak</th>
                                       
                                        <th>Objek Pajak</th>
                                        <th>Masa Pajak</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                   <tbody>
                                        @foreach ($transaksi as $tr)
                                        {{-- <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td> --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                              <h6>{{ $tr->wajibpajak->nama }}</h6> 
                                        </td>
                                        <td>
                                            <h6>{{ $tr->objekpajak->nama_objek }}</h6>
                                          <p>{{ $tr->jenispajak->nama_pajak }}</p>
                                        </td>
                                      <td>{{$tr->masa_awal.' '. 's/d' . ' '.$tr->masa_akhir}}</td>
                                      
                                      <td>
                                        <h6>{{ $tr->total_pajak }}</h6>
                                          <p>{{ $tr->kode_bayar }}</p>
                                        </td>
                                         <td>{{ $tr->tanggal_pembayaran }}</td>
                                         <td><div class="badge badge-success">Sudah dibayar</div></td>
                                      </tr>
                                      
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

@endsection