@extends('./master')
@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Stok Bölümü</h1>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="row m-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Ürün Ekle
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Stok Ürünü Ekle</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('personelAdd') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ürün Adı</label>
                                                <input type="text" class="form-control" name="pname"
                                                    id="exampleInputEmail1" placeholder="Ürün Adı Adı">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ürün Özellik</label>
                                                <input type="text" class="form-control" name="productprop"
                                                    id="exampleInputEmail1" placeholder="Ürün Özellik">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ürün Adedi</label>
                                                <input type="text" class="form-control" name="piece"
                                                    id="exampleInputEmail1" placeholder="Ürün Adedi">
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
                                <h3><i class="fa-regular fa-plane-circle-check"></i> Ürün Detayları</h3>
                                Firmanızın ürün/garanti/reçete ait detayları görebileceğiniz ekran burasıdır.
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Ürün İsmi</th>
                                                <th>Kullanılan Malzemeler</th>
                                                <th>Adet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>LG Screen</td>
                                                    <td>43 Inc</td>
                                                    <td>
                                                        103 Adet
                                                            <button class="btn btn-warning"><i
                                                                    class="fa fa-edit"></i></button>
                                                        </a>
                                                            <button class="btn btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
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
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
@endsection