@extends('layouts.layout')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-user"></i>&nbsp;ADMINISTRATOR
@endsection
@section('location3')
    <i class="fa fa-dashboard"></i>&nbsp;JADWAL KELAS
@endsection
@section('user-login','Administrator')
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data gempa bumi mentawai yang didapatkan dari website usgs.gov
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar"></i>&nbsp;Data Gempa Bumi Mentawai</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover" id="kelas">
                        <thead class="bg-primary">
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Kekuatan</th>
                                <th>Kedalaman</th>
                                <th>Kekuatan Error</th>
                                <th>Kedalaman Error</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($datas as $data)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $data->tahun }} </td>
                                    <td> {{ $data->latitude }} </td>
                                    <td> {{ $data->longitude }} </td>
                                    <td> {{ $data->kekuatan }} </td>
                                    <td> {{ $data->kedalaman }} </td>
                                    <td> {{ $data->kekuatan_error }} </td>
                                    <td> {{ $data->kedalaman_error }} </td>
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
    </script>
@endpush