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

        <!-- add new role -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">تعریف نقش جدید</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('AddNewRole') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputGroup" class="col-sm-2 control-label">نام نقش</label>

                            <div class="col-sm-10">
                                <input name="rolename" value="{{ old('rolename') }}" type="text" class="form-control" id="inputGroup" placeholder="نام نقش" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">ثبت</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!--/.add new role -->



        {{-- ============================================ --}}

        <!-- role content -->
        <section>
            <div class="col-md-3">

                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست نقش ها</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{ route('RemoveFlavor') }}">

                            <!-- select -->
                            <div class="form-group">
                                <label>یکی از گزینه ها را انتخاب کنید:</label>
                                <br>

                                @csrf
                                <select name="flavor" class="form-control col-md-6">
                                    <option value="">انتخاب نقش</option>
                                    @foreach ($RoleList as $key => $item)
                                        <option value="{{ $key }}">{{ $item['role_name'] }}</option>
                                    @endforeach
                                </select>
                                &nbsp; &nbsp;
                                <button type="submit" class="btn btn-danger">حذف</button>

                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.role content -->
    </div>
    <!-- /.row (main row) -->


    {{-- ============================================ --}}
    <div class="row">
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
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="inputName" placeholder="نام" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">ایمیل</label>

                            <div class="col-sm-10">
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="inputEmail" placeholder="ایمیل" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="col-sm-2 control-label">رمز عبور</label>

                            <div class="col-sm-10">
                                <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="Password" placeholder="رمز عبور" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword" class="col-sm-2 control-label">تکرار رمز عبور</label>

                            <div class="col-sm-10">
                                <input name="password_confirm" type="password" class="form-control" id="ConfirmPassword" placeholder="تکرار رمز عبور" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Role" class="col-sm-2 control-label">انتخاب نقش</label>

                            <div class="col-sm-10">
                                <select name="role" id="Role" class="form-control col-md-6">
                                    <option value="">انتخاب نقش</option>
                                    {{-- @foreach ($FlavorItems as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">ثبت</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!--/.add new user -->


        {{-- ============================================ --}}

        <!-- Flavor content -->
        <section>
            <div class="col-md-3">

                <!-- general form elements disabled -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست کاربران</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{ route('RemoveFlavor') }}">

                            <!-- select -->
                            <div class="form-group">
                                <label>یکی از گزینه ها را انتخاب کنید:</label>
                                <br>

                                @csrf
                                <select name="flavor" class="form-control col-md-6">
                                    <option value="">انتخاب کاربر</option>
                                    {{-- @foreach ($FlavorItems as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach --}}
                                </select>
                                &nbsp; &nbsp;
                                <button type="submit" class="btn btn-danger">حذف</button>

                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.flavor content -->

    </div>
    <!-- /.row (main row) -->

    {{-- ============================================ --}}
    <!--/validation error for add new user (if any)-->
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <!--/ .validation error for add new user (if any)-->


    {{-- ============================================ --}}

@endsection
