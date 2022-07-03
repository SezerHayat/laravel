@extends('./master')
@section('content')
    <div class="content-page">

        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Personel Düzenle</h1>

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

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ route('personelUpdate', [$personel->user_id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ad Soyad</label>
                                        <input type="text" value="{{ $personel->getUser->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                                            email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="text" value="{{ $personel->getUser->email }}" name="email" class="form-control" id="exampleInputNumber1" aria-describedby="numberlHelp" placeholder="Enter number" required>
                                        <small id="numberlHelp" class="form-text text-muted">We'll never share your
                                            email with anyone else.</small>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </form>
                            </div>
                        </div><!-- end card-->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Şifre</label>
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </form>

                            </div>
                        </div><!-- end card-->
                    </div>
                </div>

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
@endsection
