@extends('./master')
@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Genel Görünüm</h1>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        @include('./alert/alert')
                        @include('./alert/error')
                    </div>
                </div>
                @if ($userAccount->isAdmin == 1)
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                                <i class="far fa-clock float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Günlük Fazla Mesai</h6>
                                <h1 class="m-b-20 text-white counter">487 Saat</h1>
                                <span class="text-white">Aylık Fazla Mesai</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-purple">
                                <i class="far fa-clock float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Haftalık Mesai</h6>
                                <h1 class="m-b-20 text-white counter">290 Saat</h1>
                                <span class="text-white">12 Today</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-warning">
                                <i class="far fa-clock float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Aylık</h6>
                                <h1 class="m-b-20 text-white counter">320 Saat</h1>
                                <span class="text-white">25 Today</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-info">
                                <i class="far fa-clock float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Geçen Aydan Fazla</h6>
                                <h1 class="m-b-20 text-white counter">58</h1>
                                <span class="text-white">5 New</span>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-chart-bar"></i> Analiz 1</h3>
                                    Personel aylık artış grafiği ektedir.
                                </div>

                                <div class="card-body">
                                    <canvas id="comboBarLineChart"></canvas>
                                </div>
                                <div class="card-footer small text-muted">Son güncelleme dün 13.00</div>
                            </div>
                            <!-- end card-->
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-chart-bar"></i> Analiz 2</h3>
                                    Personel haftalık mesai görünüm aşağıdadır.
                                </div>

                                <div class="card-body">
                                    <canvas id="barChart"></canvas>
                                </div>
                                <div class="card-footer small text-muted">Son güncelleme bugün 13.00</div>
                            </div>
                            <!-- end card-->
                        </div>
                    </div>
                    <!-- end row -->



                    <div class="row">
                        <div class="row m-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> Personel Ekle
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Personel Ekle</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('personelAdd') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Personel Adı</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="exampleInputEmail1" placeholder="Personel Adı">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Personel E-mail</label>
                                                    <input type="text" class="form-control" name="email"
                                                        id="exampleInputEmail1" placeholder="Personel Mail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Personel Şifre</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="exampleInputEmail1" placeholder="Personel Şifre">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Kaydet" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mb-3">

                                <div class="card-header">
                                    <h3><i class="fas fa-user-friends"></i> Personel Detayları</h3>
                                    Firmanızın personellerinin detayları görebileceğiniz ekran burasıdır.
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>İsim</th>
                                                    <th>Email</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($personels as $item)
                                                    <tr>
                                                        <td>{{ $item->getUser->name }}</td>
                                                        <td>{{ $item->getUser->email }}</td>
                                                        <td>
                                                            <a href="{{ route('personelEdit', [$item->id]) }}">
                                                                <button class="btn btn-warning"><i
                                                                        class="fa fa-edit"></i></button>
                                                            </a>
                                                            <a href="{{ route('personelRemove', [$item->id]) }}">
                                                                <button class="btn btn-danger"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive-->

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card-->
                        </div>

                    </div>
                @endif
                @if ($userAccount->isAdmin == 0)
                    <div class="col-12">
                        @if ($mesaiControl->end == 'Hala Çalışıyor')
                            <form action="{{ route('mesaiEnd') }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-warning mb-3" value="Mesai Bitir">
                            </form>
                        @else
                            <form action="{{ route('mesaiStart') }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-success mb-3" value="Mesai Başlat">
                            </form>
                        @endif

                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fas fa-user-friends"></i> Mesai Tablosu</h3>
                                Mesailerinizin detayları görebileceğiniz ekran burasıdır.
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Tarih</th>
                                                <th>Giriş Saati</th>
                                                <th>Çıkış Saati</th>
                                                <th>Çalışma Saati</th>
                                                <th>Mesai Sebebi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mesai as $item)
                                                <tr>
                                                    <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->start }}</td>
                                                    <td>{{ $item->end }}</td>
                                                    <td>{{ $item->total!=null ? ($item->total) : '0' }}</td>
                                                    <td>{{ $item->notes }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive-->

                            </div>
                            <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div>
                @endif
                <!-- end row-->

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
@endsection
