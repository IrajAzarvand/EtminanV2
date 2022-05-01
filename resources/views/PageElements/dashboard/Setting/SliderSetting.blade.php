@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">
        <div class="col-lg-9">
            <!-- file uploader box -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-image-o"></i>

                    <h3 class="box-title">اسلایدر و المان ها </h3>

                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('StoreSliderImages') }}" enctype="multipart/form-data" class="dropzone" id="slider-dropzone">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>

                </div>

                <!-- /.file uploader box -->
            </div>
        </div>


        {{-- Guide tips box --}}

        <div class="col-md-3">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-question-circle-o"></i>

                    <h3 class="box-title">راهنمای بخش</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <p class="text-green">1- نام فایل ها را بصورت زیر انتخاب کنید: </p>

                    <p class="text-aqua">bg, lb, rb, lm, rm, lt, rt </p>

                    <p class="text-light-blue">2- حداکثر اندازه فایل کمتر از 100 کیلوبایت باشد</p>

                    {{-- <p class="text-red">3- برای حذف تصویر روی آن کلیک کنید</p> --}}

                    <p class="text-muted">4- برای جایگزین کردن عکس، تصویر جدید را با همان نام قبلی ذخیره و آپلود کنید.</p>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!--/.Guide box   -->

        <div class="col-lg-9">
            @livewire('section-setting')

        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
