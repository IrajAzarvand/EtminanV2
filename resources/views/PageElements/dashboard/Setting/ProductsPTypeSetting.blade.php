@extends('dashboard')

@section('contents')
    <!-- Main row -->
    <div class="row">

        <!-- PType Declaration -->

        <!-- PType Text -->
        <div class="col-lg-4">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-text-o"></i>

                    <h3 class="box-title"> عنوان نوع اصلی محصول </h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('StorePtypesText') }}">
                        @csrf
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- .PType Text -->

        <!-- PType image -->
        <!-- file uploader box -->
        <div class="col-lg-5">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-image-o"></i>

                    <h3 class="box-title">تصویر نوع اصلی محصول </h3>

                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('StorePtypesItems') }}" enctype="multipart/form-data" class="dropzone" id="ptypes-dropzone">
                        @csrf

                        <div class="fallback">
                            <input name="file" type="file" required />
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.file uploader box -->
        <!-- .PType image -->
        <!-- .PType Declaration -->






        {{-- Guide tips box --}}

        <div class="col-md-3">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <i class="fa fa-question-circle-o"></i>

                    <h3 class="box-title">راهنمای بخش</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <p class="text-green">1- اندازه تصویر نوع اصلی محصول 100×200 پیکسل است. </p>

                    <p class="text-light-blue">2- حداکثر اندازه فایل کمتر از 90 کیلوبایت باشد</p>

                    <p class="text-red">3- برای حذف هر مورد از کلید حذف مقابل آن استفاده کنید</p>

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
