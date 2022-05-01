@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">

        {{-- ============================================ --}}

        {{-- Guide tips box --}}

        <div class="col-md-3 pull-left">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-question-circle-o"></i>

                    <h3 class="box-title">راهنمای بخش</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <p class="text-green">1- تعریف وزن و طعم جدید برای محصول. </p>

                    <p class="text-light-blue">2- برای وزن فقط عدد و برای طعم به تعداد زبان های سایت وارد کنید</p>

                    <p class="text-red">3- برای تغییر هر کدام از موارد ابتدا آن را حذف و مورد جدید تغییر یافته را اضافه کنید</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!--/.Guide box   -->

        {{-- ============================================ --}}


        <!-- weight content -->
        <div class="col-lg-4 pull-right">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تعریف کاربر جدید</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form method="POST" action="{{ route('StoreNewWeight') }}">
                            @csrf
                            <div class="col-xs-12">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <br>
                            <div class="col-xs-12">
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">افزودن</button>
                        </form>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>

        {{-- ============================================ --}}

        <!--/ Users List   -->

        <div class="col-lg-9">
            @livewire('section-setting')
        </div>
        <!--/ .Users List   -->


    </div>
    <!-- /.row (main row) -->
@endsection
