<div class="col-md-3">
    <a href="compose.html" class="btn btn-primary btn-block margin-bottom">ارسال ایمیل جدید</a>
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">پوشه ها</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ route('ShowEmailPage') }}"><i class="fa fa-inbox"></i> ابنباکس
                        <span class="label label-primary pull-left">{{ CollectFolderMailsNumber()['INBOX'] }}</span></a></li>
                <li><a href="{{ route('ShowEmailPage', ['Sent']) }}"><i class="fa fa-envelope-o"></i> ارسال شده</a></li>
                <li><a href="{{ route('ShowEmailPage', ['Drafts']) }}"><i class="fa fa-file-text-o"></i> پیش نویس</a></li>
                <li><a href="{{ route('ShowEmailPage', ['spam']) }}"><i class="fa fa-filter"></i> هرزنامه <span class="label label-warning pull-left">{{ CollectFolderMailsNumber()['spam'] }}</span></a>
                </li>
                {{-- <li><a href="#"><i class="fa fa-filter"></i> ایمیل های ناخواسته <span class="label label-warning pull-left">{{ CollectFolderMailsNumber()['Junk'] }}</span></a>
                </li> --}}
                <li><a href="{{ route('ShowEmailPage', ['Trash']) }}"><i class="fa fa-trash-o"></i> سطل زباله</a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">برچسب ها</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> مهم</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> شخصی</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> شبکه های اجتماعی</a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
