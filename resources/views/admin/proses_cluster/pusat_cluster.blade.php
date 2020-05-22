@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;ADMINISTRATOR
@endsection
@section('location3')
    <i class="fa fa-dashboard"></i>&nbsp;MANAJEMEN DATA SISWA
@endsection
@section('user-login','Administrator')
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data siswa yang sudah ditambahkan, silahkan tambahkan jika ada data siswa baru
            <br>
        </p>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-calendar"></i>&nbsp;Data Pusat Cluster</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="row">
                <div class="col-md-12">
                    @if (empty($max))
                        @if ($max == $max_cost)
                            @if ($max == 1)
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi ke {{ $max }} sudah berhasil, silahkan lanjutkan ke iterasi ke {{ $max+1 }}
                                </div>
                            @endif
                            @else
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Silahkan Generate Pusat Cluster Terlebih Dahulu
                            </div>
                        @endif
                        @else
                        @if ($max == $max_cost)
                            @if ($max == 1)
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi ke {{ $max }} sudah berhasil, silahkan lanjutkan ke iterasi ke {{ $max+1 }}
                                </div>
                                @else
                                    @if ($cost_awal->nilai_cost < $cost_akhir->nilai_cost)
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi dihentikan, nilai cost baru lebih besar dari nilai_cost lama
                                        </div>
                                        @else
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                                <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Iterasi ke {{ $max }} sudah berhasil, silahkan lanjutkan ke iterasi ke {{ $max+1 }}
                                        </div>
                                @endif
                            @endif
                            @else
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="fa fa-success-circle"></i><strong>Perhatian :</strong> Pusat Cluster sudah digenerate, saat ini adalah langkah cluster yang ke {{ $max }}, silahkan klik next dan generate semua nilai sampai didapatkan nilai cost
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                    <div style="margin-bottom:5px;">
                        <nav aria-label="...">
                            <ul class="pagination" style="margin: 0px !important">
                                <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item active">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                    </span>
                                </li>
                                <li class="page-item"><a class="page-link" href="{{ route('admin.proses_clustering.nilai_cluster_satu',[$max]) }}">2</a></li>
                                <li class="page-item"><a class="page-link" href="{{ route('admin.proses_clustering.nilai_cluster_dua',[$max]) }}">3</a></li>
                                <li class="page-item"><a class="page-link" href="{{ route('admin.proses_clustering.nilai_cluster_tiga',[$max]) }}">4</a></li>
                                <li class="page-item"><a class="page-link" href="{{ route('admin.proses_clustering.nilai_min',[$max]) }}">5</a></li>
                                <li class="page-item"><a class="page-link" href="{{ route('admin.proses_clustering.cluster',[$max]) }}">6</a></li>
                                <li class="page-item"><a class="page-link" href="{{ route('admin.proses_clustering.jumlah_cost',[$max]) }}">7</a></li>
                                <li class="page-item">
                                <a class="page-link" href="{{ route('admin.proses_clustering.nilai_cluster_satu',[$max]) }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 10px;">
                    <form action="{{ route('admin.proses_clustering.generate_pusat_cluster',[$max]) }}" method="POST">
                        @csrf {{ method_field('POST') }}
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-refresh fa-spin"></i>&nbsp; Generate Pusat Cluster</button>
                    </form>
                </div>
                
                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="kelas">
                        <thead class="bg-primary">
                            <tr>
                                <th>No</th>
                                <th>Iterasi Ke-</th>
                                <th>Cluster Ke-</th>
                                <th>Kedalaman</th>
                                <th>Kekuatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($datas as $data)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $data->iterasi_ke }} </td>
                                    <td> {{ $data->cluster_ke }} </td>
                                    <td> {{ $data->kedalaman }} </td>
                                    <td> {{ $data->kekuatan }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#kelas').DataTable();
        } );

        function previewFoto() {
            var preview = document.querySelector('#preview-foto');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.onloadend = function () {
            preview.src = reader.result;
            }

            if (file) {
            reader.readAsDataURL(file);
            } else {
            preview.src = "";
            }
        }

        function ubahSiswa(id){
            $.ajax({
                url: "{{ url('admin/manajemen_siswa') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id').val(data.id);
                    $('#nm_siswa').val(data.nm_siswa);
                    $('#kelas_id').val(data.kelas_id);
                    $('#paket_id').val(data.paket_id);
                    $('#nm_sekolah').val(data.nm_sekolah);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#alamat_rumah').val(data.alamat_rumah);
                    $('#jenjang').val(data.jenjang);
                    $('#no_hp').val(data.no_hp);
                    $('#email').val(data.email);
                    $('#nm_orang_tua').val(data.nm_orang_tua);
                    $('#pekerjaan_orang_tua').val(data.pekerjaan_orang_tua);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function hapusSiswa(id){
            $('#modalhapus').modal('show');
            $('#id_hapus').val(id);
        }

    </script>
@endpush