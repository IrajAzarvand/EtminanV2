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

                    <p class="text-green">1- افزودن کاربر جدید برای استفاده از امکانات سایت </p>

                    <p class="text-light-blue">2- وارد کردن ایمیل و پسورد ثبت شده در هاست برای دپارتمان مورد نظر ضروری است</p>

                    {{-- <p class="text-red">3- برای تغییر هر کدام از موارد ابتدا آن را حذف و مورد جدید تغییر یافته را اضافه کنید</p> --}}

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!--/.Guide box   -->

        {{-- ============================================ --}}

        <!-- add new user -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">تعریف کاربر جدید</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('StoreNewUser') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">ایمیل</label>

                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputName" placeholder="نام" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">ایمیل</label>

                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="ایمیل" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">رمز عبور</label>

                            <div class="col-sm-10">
                                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="رمز عبور" required>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">ورود</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!--/.add new user -->

        {{-- ============================================ --}}
        <!--/validation error for add new user (if any)-->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!--/ .validation error for add new user (if any)-->




        {{-- ============================================ --}}
        <!--/ Users List   -->

        <div class="col-lg-9">
            @livewire('section-setting')
        </div>
        <!--/ .Users List   -->


    </div>
    <!-- /.row (main row) -->
@endsection
