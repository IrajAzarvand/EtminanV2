<div>
    @switch($CurrentPage.','.$Section)
        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Events,')
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">لیست رویدادها</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">

                        @foreach ($EventItems as $EventItem)
                            <li style="cursor: pointer;">
                                @livewire('section-item',['CurrentPage'=>$CurrentPage,'EventItem'=>$EventItem],key($EventItem['id']))
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Ptypes,')
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">لیست عناوین اصلی محصولات</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                        @foreach ($PtypeItems as $PtypeItem)
                            <li style="cursor: pointer;">
                                @livewire('section-item',['CurrentPage'=>$CurrentPage,'PtypeItem'=>$PtypeItem],key($PtypeItem['id']))
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        <!-- /about us -->
        @case('AboutUs,')
            <!-- About Us LIST -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">ویدئو و تصاویر آپلود شده</h3>
                </div>
                <!-- /.box-header -->
                {{-- @dd($AboutUsItems) --}}
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @if ($AboutUsItems)
                            @foreach ($AboutUsItems['items'] as $key => $AUItem)
                                <li>
                                    @livewire('section-item',['CurrentPage'=>$CurrentPage,'AUItem'=>$AUItem],key($AUItem['id']))
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <!-- /.slider-list -->
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Slider,')
            <!-- Slider LIST -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">تصاویر آپلود شده</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                    <ul class="clearfix users-list">
                        @foreach ($Sliders as $Slider)
                            <li>
                                @livewire('section-item',['CurrentPage'=>$CurrentPage,'Slider'=>$Slider],key($Slider['id']))
                                <br>
                                <span>{{ $Slider['name'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <!-- /.slider-list -->
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('NewProduct,')
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">جدول محصولات</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10%;">نوع اصلی</th>
                                <th style="width: 10%;">وزن</th>
                                <th style="width: 10%;">طعم</th>
                                <th style="width: 60%;">معرفی محصول</th>
                                <th style="width: 10%;">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ProductItems as $key => $Product)
                                <tr>
                                    <td>{{ $Product['ptype'] }}</td>
                                    <td>{{ $Product['weight'] }}</td>
                                    <td>{{ $Product['flavor'] }}</td>
                                    <td> {{ $Product['intro'] }}</td>
                                    <td>
                                        @livewire('section-item',['CurrentPage'=>$CurrentPage,'ProductItem'=>$Product],key($Product['id']))
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}
        @case('Gallery,')
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">لیست عناوین اصلی محصولات</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                    <ul class="todo-list">
                        @foreach ($GalleryItems as $GalleryItem)
                            <li style="cursor: pointer;">
                                @livewire('section-item',['CurrentPage'=>$CurrentPage,'GalleryItem'=>$GalleryItem],key($GalleryItem['id']))
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @break

        {{-- ================================================================================================ --}}
        {{-- ================================================================================================ --}}



    @endswitch
</div>
