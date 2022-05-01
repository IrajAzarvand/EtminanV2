@extends('dashboard')

@section('contents')

    <!-- Main row -->
    <div class="row">
        <!-- file uploader box -->
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-image-o"></i>

                    <h3 class="box-title">تصاویر رویدادها </h3>

                </div>
                <div class="box-body">
                    <form method="post" action="{{ route('StoreEventsItems') }}" enctype="multipart/form-data" class="dropzone" id="events-dropzone">
                        @csrf

                        <div class="fallback">
                            <input name="file" type="file" multiple required />
                        </div>
                        <br>
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

                    <p class="text-orange">1- برای افزودن رویداد، اضافه کردن تصویر الزامی است. </p>

                    <p class="text-green">2- اندازه تصویر رویداد 370×370 پیکسل است. </p>

                    <p class="text-light-blue">3- حداکثر اندازه فایل کمتر از 90 کیلوبایت باشد</p>

                    <p class="text-aqua">4- تیتر و متن با کلید Enter از هم جدا می شوند </p>

                    <p class="text-red">5- برای حذف رویداد روی آن کلیک کنید</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!--/.Guide box   -->


        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-file-text-o"></i>

                    <h3 class="box-title"> متن و توضیحات رویداد </h3>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('StoreEventsText') }}">
                        @csrf
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>

                </div>

            </div>
        </div>



        <div class="col-lg-9">
            @livewire('section-setting')
        </div>
    </div>
    <!-- /.row (main row) -->

@endsection
