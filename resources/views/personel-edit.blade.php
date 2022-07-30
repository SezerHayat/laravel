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
                    <div class="col-md-12">
                        @include('./alert/alert')
                        @include('./alert/error')
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="far fa-check-square"></i> Simple form</h3>
                                Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g.,
                                <i>email</i> for email address or <i>number</i> for numerical information) to take
                                advantage of newer input controls like email verification, number selection, and
                                more.
                            </div>

                            <div class="card-body">

                                <form action="{{ route('personelUpdate', [$personel->getUser->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address (required)</label>
                                        <input type="text" name="name" value="{{ $personel->getUser->name }}"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter email" required>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                                            email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your lucky number (required)</label>
                                        <input type="text" name="email" value="{{ $personel->getUser->email }}"
                                            class="form-control" id="exampleInputNumber1" aria-describedby="numberlHelp"
                                            placeholder="Enter number" required>
                                        <small id="numberlHelp" class="form-text text-muted">We'll never share your
                                            email with anyone else.</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div><!-- end card-->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="far fa-check-square"></i> Simple form</h3>
                                Be sure to use an appropriate <i>type</i> attribute on all inputs (e.g.,
                                <i>email</i> for email address or <i>number</i> for numerical information) to take
                                advantage of newer input controls like email verification, number selection, and
                                more.
                            </div>

                            <div class="card-body">

                                <form action="{{ route('personelEditPassword', [$personel->getUser->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address (required)</label>
                                        <input type="text" name="password" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter email" required>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your
                                            email with anyone else.</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div><!-- end card-->
                    </div>
                </div>

            </div>


        </div>

    </div>

    <!-- END content -->
    </div>
    </div>
@endsection
