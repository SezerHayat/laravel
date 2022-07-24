@extends('./master')
@section('content')
    <div class="content-page">
        <div class="content">

        <!-- Start content -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Personel Bölümü</h1>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
       
        
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

        </div>
           

            </div>
        
        </div>

        <!-- END content -->
    </div>
    </div>
    
@endsection
