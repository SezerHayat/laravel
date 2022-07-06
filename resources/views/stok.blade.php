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
                    <div class="col-md-12">
                        @include('./alert/alert')
                        @include('./alert/error')
                    </div>
                </div>
                <div class="">
                    Stok
                </div>

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
@endsection
