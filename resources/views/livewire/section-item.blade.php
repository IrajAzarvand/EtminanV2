<div>
    @switch($CurrentPage.','.$Section)
        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Slider,')
            <a><img src="{{ $Slider['filePath'] }}" alt=""></a>
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('AboutUs,')
            @if (File::extension($AUItem['filePath']) == 'jpg')
                <a wire:click="RemoveSelectedItem({{ $AUItem['id'] }})"><img src="{{ $AUItem['filePath'] }}" alt=""></a>
            @else
                <a wire:click="RemoveSelectedItem({{ $AUItem['id'] }})">
                    <video height="auto" width="197px">
                        <source src="{{ $AUItem['filePath'] }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </a>
            @endif
            <br>
            <span>{{ $AUItem['name'] }}</span>
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Events,')
            <!-- drag handle -->
            <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
            </span>
            <!-- checkbox -->
            <input type="checkbox" value="">
            <!-- todo text -->
            <span class="text">{{ $EventItem['title'] }}</span>

            <!-- General tools such as edit or delete-->
            <div class="tools">

                <a wire:click="EditSelectedItem({{ $EventItem['id'] }})"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                <a wire:click="RemoveSelectedItem({{ $EventItem['id'] }},'')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

            </div>
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Events,Edit')
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">ویرایش رویداد ({{ $SelectedItem['title'] }})</h3>
                    <div class="pull-left box-tools">
                        <button wire:click="CancelEdit()" type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                    <h4>کد آیتم: {{ $SelectedItem['id'] }}</h4>
                    <br>


                    <form method="POST" action="{{ route($CurrentPage . 'Update') }}">
                        @csrf
                        <input type="hidden" name="SelectedItemId" value="{{ $SelectedItem['id'] }}">
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>

                    <hr>
                    <br>
                    {{-- ------------------------------------------------------------------- --}}
                    {{-- dropzone for add new files to current item --}}
                    <div class="box-header">
                        <i class="fa fa-file-image-o"></i>

                        <h3 class="box-title">افزودن تصویر جدید </h3>

                    </div>
                    <div class="box-body">
                        <form method="post" wire:submit.prevent="ItemAddNewImage({{ $SelectedItem['id'] }})" enctype="multipart/form-data">
                            @csrf
                            <input type="file" wire:model="ItemNewImages" multiple required>
                            <br>
                            <button type="submit" class="btn btn-primary">افزودن تصویر جدید</button>
                        </form>

                    </div>

                    <!-- /.file uploader box -->
                    <hr>
                    {{-- ------------------------------------------------------------------- --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">تصاویر آپلود شده</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach ($SelectedItem['images'] as $key => $UploadedItem)
                                <li>

                                    <a wire:click="RemoveItemImage({{ $SelectedItem['id'] }},{{ $key }})"><img src="{{ $UploadedItem }}" alt=""></a>
                                </li>
                            @endforeach

                        </ul>
                        <!-- /.slider-list -->
                    </div>
                    <!-- /.box-body -->
                    <br>
                    {{-- ------------------------------------------------------------------- --}}


                </div>
                <!-- /.box-body -->
            </div>
            <!--/.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Ptypes,')
            <!-- drag handle -->
            <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
            </span>
            <!-- checkbox -->
            <input type="checkbox" value="">
            <!-- todo text -->
            <span class="text">{{ $PtypeItem['title'] }}</span>

            <!-- General tools such as edit or delete-->
            <div class="tools">

                <a wire:click="EditSelectedItem({{ $PtypeItem['id'] }})"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                <a wire:click="RemoveSelectedItem({{ $PtypeItem['id'] }},'')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

            </div>
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Ptypes,Edit')
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">ویرایش نوع اصلی محصول ({{ $SelectedItem['title'] }})</h3>
                    <div class="pull-left box-tools">
                        <button wire:click="CancelEdit()" type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                    <h4>کد آیتم: {{ $SelectedItem['id'] }}</h4>
                    <br>


                    <form method="POST" action="{{ route($CurrentPage . 'Update') }}">
                        @csrf
                        <input type="hidden" name="SelectedItemId" value="{{ $SelectedItem['id'] }}">
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>

                    <hr>
                    <br>
                    {{-- ------------------------------------------------------------------- --}}
                    {{-- dropzone for add new files to current item --}}
                    <div class="box-header">
                        <i class="fa fa-file-image-o"></i>

                        <h3 class="box-title">افزودن تصویر جدید </h3>

                    </div>
                    <div class="box-body">
                        <form method="post" wire:submit.prevent="ItemAddNewImage({{ $SelectedItem['id'] }})" enctype="multipart/form-data">
                            @csrf
                            <input type="file" wire:model="ItemNewImages" required>
                            <br>
                            <button type="submit" class="btn btn-primary">افزودن تصویر جدید</button>
                        </form>

                    </div>

                    <!-- /.file uploader box -->
                    <hr>
                    {{-- ------------------------------------------------------------------- --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">تصاویر آپلود شده</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach ($SelectedItem['images'] as $key => $UploadedItem)
                                <li>

                                    <img src="{{ $UploadedItem }}" alt="">
                                </li>
                            @endforeach

                        </ul>
                        <!-- /.slider-list -->
                    </div>
                    <!-- /.box-body -->
                    <br>
                    {{-- ------------------------------------------------------------------- --}}


                </div>
                <!-- /.box-body -->
            </div>
            <!--/.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('NewProduct,')
            <a href="{{ route('EditProduct', $ProductItem['id']) }}"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
            <a wire:click="RemoveSelectedItem({{ $ProductItem['id'] }})"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Gallery,')
            <!-- drag handle -->
            <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
            </span>
            <!-- checkbox -->
            <input type="checkbox" value="">
            <!-- todo text -->
            <span class="text">{{ $GalleryItem['title'] }}</span>

            <!-- General tools such as edit or delete-->
            <div class="tools">

                <a wire:click="EditSelectedItem({{ $GalleryItem['id'] }})"><button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                <a wire:click="RemoveSelectedItem({{ $GalleryItem['id'] }},'')"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

            </div>
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Gallery,Edit')
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">ویرایش گالری ({{ $SelectedItem['title'] }})</h3>
                    <div class="pull-left box-tools">
                        <button wire:click="CancelEdit()" type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                    <h4>کد آیتم: {{ $SelectedItem['id'] }}</h4>
                    <br>


                    <form method="POST" action="{{ route($CurrentPage . 'Update') }}">
                        @csrf
                        <input type="hidden" name="SelectedItemId" value="{{ $SelectedItem['id'] }}">
                        @include('PageElements.dashboard.Shared.Inputform')

                        <button type="submit" class="btn btn-success">ذخیره</button>

                    </form>

                    <hr>
                    <br>
                    {{-- ------------------------------------------------------------------- --}}
                    {{-- dropzone for add new files to current item --}}
                    <div class="box-header">
                        <i class="fa fa-file-image-o"></i>

                        <h3 class="box-title">افزودن تصویر جدید </h3>

                    </div>
                    <div class="box-body">
                        <form method="post" wire:submit.prevent="ItemAddNewImage({{ $SelectedItem['id'] }})" enctype="multipart/form-data">
                            @csrf
                            <input type="file" wire:model="ItemNewImages" multiple required>
                            <br>
                            <button type="submit" class="btn btn-primary">افزودن تصویر جدید</button>
                        </form>

                    </div>

                    <!-- /.file uploader box -->
                    <hr>
                    {{-- ------------------------------------------------------------------- --}}
                    <div class="box-header with-border">
                        <h3 class="box-title">تصاویر آپلود شده</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            @foreach ($SelectedItem['images'] as $key => $UploadedItem)
                                <li>

                                    <a wire:click="RemoveItemImage({{ $SelectedItem['id'] }},{{ $key }})"><img src="{{ $UploadedItem }}" alt=""></a>
                                </li>
                            @endforeach

                        </ul>
                        <!-- /.slider-list -->
                    </div>
                    <!-- /.box-body -->
                    <br>
                    {{-- ------------------------------------------------------------------- --}}


                </div>
                <!-- /.box-body -->
            </div>
            <!--/.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}


    @endswitch
</div>
