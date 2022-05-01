@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">
        <!-- file uploader box -->
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-image-o"></i>

                    <h3 class="box-title">تصویر و ویدئو ها </h3>

                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('StoreAboutUsItems') }}" enctype="multipart/form-data" class="dropzone" id="aboutus-dropzone">
                        @csrf
                        <div class="fallback">
                            <input name="file" type="file" />
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

                    {{-- <p class="text-green">1- در صورت آپلود فیلم، تصویر آن را نیز برای نشان دادن در باکس ویدئو آپلود کنید. </p> --}}

                    {{-- <p class="text-aqua">bg, lb, rb, lm, rm, lt, rt </p> --}}

                    <p class="text-light-blue">1- حداکثر اندازه فایل کمتر از 5 مگابایت باشد</p>

                    <p class="text-red">2- برای حذف تصویر یا فیلم روی آن کلیک کنید</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!--/.Guide box   -->


        <!-- About us textbox -->
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-text-o"></i>

                    <h3 class="box-title"> متن درباره ما </h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('StoreAboutUsText') }}">
                        @csrf
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>

                </div>

                <!-- /.file uploader box -->
            </div>
        </div>



        <div class="col-lg-9">
            {{-- @livewire('about-us-setting') --}}
            @livewire('section-setting')
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
