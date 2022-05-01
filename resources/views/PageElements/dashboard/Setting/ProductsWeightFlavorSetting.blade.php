@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">

        <!-- Weight Declaration -->

        <!-- Weight Text -->
        <div class="col-lg-4">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-text-o"></i>

                    <h3 class="box-title"> تعریف طعم جدید </h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('StoreNewFlavor') }}">
                        @csrf
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- .Weight Text -->


        <!-- .Weight Declaration -->


        {{-- ============================================ --}}



        <!-- Flavor content -->
        <section>
            <div class="col-md-5">

                <!-- general form elements disabled -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست طعم های موجود</h3>
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
                                    <option value="">انتخاب طعم</option>
                                    @foreach ($FlavorItems as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
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
        <!-- /.flavor content -->

        {{-- ============================================ --}}

        {{-- Guide tips box --}}

        <div class="col-md-3">
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
    </div>

    {{-- ============================================ --}}


    <div class="row">
        <!-- weight content -->
        <div class="col-lg-4">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تعریف وزن جدید (گرم)</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form method="POST" action="{{ route('StoreNewWeight') }}">
                            @csrf
                            <div class="col-xs-6">
                                <input type="number" name="weight" class="form-control" required min="1">
                            </div>
                            <button type="submit" class="btn btn-success">افزودن</button>
                        </form>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>



        {{-- ============================================ --}}



        <section>
            <div class="col-lg-5">

                <!-- general form elements disabled -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست وزن های موجود</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action="{{ route('RemoveWeight') }}">
                            @csrf
                            <!-- select -->
                            <div class="form-group">
                                <label>یکی از گزینه ها را انتخاب کنید:</label>
                                <br>
                                <select name="weight" class="form-control col-md-6">
                                    <option value="">انتخاب وزن</option>
                                    @foreach ($WeightItems as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
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
        <!-- /.weight content -->

    </div>
    <!-- /.row (main row) -->
@endsection
