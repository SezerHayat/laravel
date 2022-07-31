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

                <div class="row">
                    <div class="col-md-12">
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
                                                <th>Personel</th>
                                                <th>Giriş Saati</th>
                                                <th>Çıkış Saati</th>
                                                <th>Çalışma Saati</th>
                                                <th>Fazla Mesai</th>
                                                <th>Mesai Sebebi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mesais as $item)
                                                <tr>
                                                    <td> {{$item->overtime_clock>0 || $item->overtime_minute >0 ? '🕑' : ''}} {{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->getUser->name }}</td>
                                                    <td>{{ substr($item->start, -1 - 8) }}</td>
                                                    <td>{{ substr($item->end, -1 - 8) }}</td>
                                                    <td>{{ $item->total != null ? $item->total : '0' }}</td>
                                                    <td>{{ $item->overtime_clock .' Saat ' . $item->overtime_minute . ' Dakika'}}</td>
                                                    <td style="max-width: 50px">{{ $item->notes }}</td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive-->
    
                            </div>
                            <!-- end card-body-->
                        </div>
                    </div>
                </div>
                <!-- end row-->

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
@endsection
