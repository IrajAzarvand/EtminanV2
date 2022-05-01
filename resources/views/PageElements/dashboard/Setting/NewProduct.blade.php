@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">



        {{-- Ptype Selection Box --}}

        <section>
            <div class="col-md-3">

                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست انواع اصلی محصولات</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ route('StoreNewProduct') }}">
                            @csrf

                            <!-- select -->
                            <div class="form-group">
                                <label>یکی از گزینه ها را انتخاب کنید:</label>
                                <br>

                                @csrf
                                <select name="ptype" class="form-control col-md-9" required>
                                    <option value="">انتخاب نوع اصلی</option>
                                    @foreach ($PtypeItems as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                &nbsp; &nbsp;

                            </div>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.flavor content -->

        {{-- ============================================ --}}

        {{-- Weight Selection Box --}}


        <section>
            <div class="col-lg-3">

                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست وزن های موجود</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <!-- select -->
                        <div class="form-group">
                            <label>یکی از گزینه ها را انتخاب کنید:</label>
                            <br>
                            <select name="weight" class="form-control col-md-9" required>
                                <option value="">انتخاب وزن</option>
                                @foreach ($WeightItems as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            &nbsp; &nbsp;
                        </div>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.weight content -->

        {{-- ============================================ --}}


        {{-- Flavor Selection Box --}}

        <section>
            <div class="col-md-3">

                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">لیست طعم های موجود</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <!-- select -->
                        <div class="form-group">
                            <label>یکی از گزینه ها را انتخاب کنید:</label>
                            <br>

                            @csrf
                            <select name="flavor" class="form-control col-md-9" required>
                                <option value="">انتخاب طعم</option>
                                @foreach ($FlavorItems as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            &nbsp; &nbsp;

                        </div>


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

        <div class="col-md-3 pull-left">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-question-circle-o"></i>

                    <h3 class="box-title">راهنمای بخش</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <p class="text-green">1- نوع اصلی، وزن و طعم محصول جدید را انتخاب کنید. </p>

                    <p class="text-light-blue">2- مشخصات محصول را وارد در بخش های مربوطه وارد کنید.</p>

                    <p class="text-aqua">3- اندازه تصویر محصول باید 643×675 پیکسل باشد.</p>

                    <p class="text-red">4- حجم تصویر اصلی محصول کمتر از 90 کیلوبایت باشد.</p>

                    <p class="text-aqua">5- اندازه تصویر نمونه باید 355×578 پیکسل باشد.</p>

                    <p class="text-red">6- نام تصویر نمونه باید sample.jpg باشد.</p>

                    <p class="text-muted">7- معرفی محصول بصورت زیر نوشته شود: <br> نام کامل (نام اختصاری)</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!--/.Guide box   -->


        {{-- ============================================ --}}











        <!-- Weight Declaration -->

        <!-- Weight Text -->
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-text-o"></i>

                    <h3 class="box-title"> معرفی | ارزش غذایی محصول </h3>
                </div>
                <div class="box-body">



                    <div class="col-md-6">
                        @include('PageElements.dashboard.Shared.Inputform', [($InputformName = 'intro')])
                    </div>
                    <div class="col-md-6">
                        @include('PageElements.dashboard.Shared.Inputform', [($InputformName = 'nutrition')])
                    </div>
                    <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- .Weight Text -->


        <!-- .Weight Declaration -->


        {{-- ============================================ --}}



        <!-- Product image -->
        <!-- file uploader box -->
        <div class="col-lg-3">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-image-o"></i>

                    <h3 class="box-title">تصویر محصول </h3>

                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('StoreProductImage') }}" enctype="multipart/form-data" class="dropzone" id="products-dropzone">
                        @csrf

                        <div class="fallback">
                            <input name="file" type="file" required multiple />
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.file uploader box -->
        <!-- .Product image -->


        {{-- ============================================ --}}


    </div>
    <!-- /.row (main row) -->


    {{-- table for showing products --}}

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                @livewire('section-setting')
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
