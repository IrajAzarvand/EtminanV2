@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">
        <!-- file uploader box -->
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-image-o"></i>

                    <h3 class="box-title">تصاویر جدید گالری </h3>

                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('StoreGalleryItems') }}" enctype="multipart/form-data" class="dropzone" id="gallery-dropzone">
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

                    <p class="text-green">1- حجم هر تصویر باید کمتر از 90 کیلوبایت باشد. </p>

                    <p class="text-aqua">2- برای جداسازی تیتر و توضیحات گالری از enter استفاده کنید </p>

                    {{-- <p class="text-light-blue">2- حداکثر اندازه فایل کمتر از 5 مگابایت باشد</p> --}}

                    <p class="text-red">3- برای حذف تصویر روی لینک آن کلیک کنید</p>

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

                    <h3 class="box-title"> تیتر و توضیحات گالری </h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('StoreGalleryText') }}">
                        @csrf
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>

                </div>

                <!-- /.file uploader box -->
            </div>
        </div>



        <div class="col-lg-9">
            @livewire('section-setting')
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
