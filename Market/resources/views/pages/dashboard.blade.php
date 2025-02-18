@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Users</h4>
                            </div>
                            <div class="card-body">
                                {{$allData->count()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>News</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            //cek
            <div class="container mt-5 col-12">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-lg border-0">
                            <div class="card-header bg-primary text-white text-center">
                                <h3>🕌 Jadwal Sholat - {{ $prayerTimes['cityName']['date'] }} | {{ $prayerTimes['data']['jadwal']['tanggal'] }}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Sholat</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>🕓 Imsak</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['imsak'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>🌅 Subuh</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['subuh'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><h5>🌞 Terbit</h5></td>
                                            <td>{{ $prayerTimes['data']['jadwal']['terbit'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>🌤️ Dhuha</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['dhuha'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>☀️ Dzuhur</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['dzuhur'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>🌇 Ashar</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['ashar'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>🌆 Maghrib</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['maghrib'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>🌙 Isya</td>
                                            <td>{{ $prayerTimes['data']['jadwal']['isya'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center bg-light">
                                <small class="text-muted">Sumber: API Jadwal Sholat</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            //cek

            <div class="row">
                <div class="col-12">
                    <div class="card card-statistic-1">
                            <div class="card-header">
                                <h4>Simple</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">email</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $user )
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{$user->id ?? 'No Data'}}</th>
                                            <td>{{$user->name ?? 'No Data'}}</td>
                                            <td>{{$user->email ?? 'No Data'}}
                                            <td>
                                                <form action="/"
                                                method="POST" class="d-inline ml-1">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <button type="hidden" value="EDIT" name="_method" class="btn btn-sm btn-primary btn-icon"
                                                data-toggle="tooltip" title="Edit">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            </form>

                                            <form action="{{ route('UserWeb.destroy', $user->id) }}"
                                                method="POST" class="d-inline ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="hidden" value="DELETE" name="_method" class="btn btn-sm btn-danger btn-icon"
                                                data-toggle="tooltip" title="Delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                <div class="float-right mt-3 mb-3 card-footer page-item">
                                    {{ $data->withQueryString()->links() }}
                                </div>

                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link"
                                                href="#"
                                                tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                href="#">1</a></li>
                                        <li class="page-item active">
                                            <a class="page-link"
                                                href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

@endpush
