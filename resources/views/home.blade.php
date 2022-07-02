@extends('./master')
@section('content')
    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Dashboard</h1>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="far fa-user float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Users</h6>
                            <h1 class="m-b-20 text-white counter">487</h1>
                            <span class="text-white">12 Today</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-purple">
                            <i class="fas fa-download float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Downloads</h6>
                            <h1 class="m-b-20 text-white counter">290</h1>
                            <span class="text-white">12 Today</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                            <i class="fas fa-shopping-cart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                            <h1 class="m-b-20 text-white counter">320</h1>
                            <span class="text-white">25 Today</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-info">
                            <i class="far fa-envelope float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Messages</h6>
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
                                <h3><i class="fas fa-chart-bar"></i> Chart 1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus
                                fermentum ultricies orci sit amet sollicitudin.
                            </div>

                            <div class="card-body">
                                <canvas id="comboBarLineChart"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <!-- end card-->
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fas fa-chart-bar"></i> Chart 2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus
                                fermentum ultricies orci sit amet sollicitudin.
                            </div>

                            <div class="card-body">
                                <canvas id="barChart"></canvas>
                            </div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                                    placeholder="Personel Adı">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Personel E-mail</label>
                                                <input type="text" class="form-control" name="email" id="exampleInputEmail1"
                                                    placeholder="Personel Adı">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Personel Şifre</label>
                                                <input type="password" class="form-control" name="password" id="exampleInputEmail1"
                                                    placeholder="Personel Adı">
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
                                <h3><i class="fas fa-user-friends"></i> Users details</h3>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus
                                fermentum ultricies orci sit amet sollicitudin.
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>İşlemler</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($personels as $item)
                                                <tr>
                                                    <td>{{ $item->getUser->name }}</td>
                                                    <td>{{ $item->getUser->email }}</td>
                                                    <td>
                                                        <button class="btn btn-warning"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger"><i
                                                                class="fa fa-trash"></i></button>
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
                <!-- end row-->

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
@endsection
