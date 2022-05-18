@extends('dashboard')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
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
                            <li class="active"><a href="#"><i class="fa fa-inbox"></i> ابنباکس
                                    <span class="label label-primary pull-left">{{ CollectFolderMailsNumber()['INBOX'] }}</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> ارسال شده</a></li>
                            <li><a href="#"><i class="fa fa-file-text-o"></i> پیش نویس</a></li>
                            <li><a href="#"><i class="fa fa-filter"></i> هرزنامه <span class="label label-warning pull-left">{{ CollectFolderMailsNumber()['spam'] }}</span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> سطح زباله</a></li>
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
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">اینباکس</h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="جستجو">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-left">
                                1-50/{{ count($MailInbox) }}
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach ($MailInbox as $key => $Mail)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                            <td class="mailbox-name"><a href="read-mail.html">{{ $Mail->from }}</a></td>
                                            <td class="mailbox-subject">
                                                @if (!$Mail->seen)
                                                    <b>{{ $Mail->subject }}</b>@else{{ $Mail->subject }}
                                                @endif
                                            </td>
                                            <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                            <td class="mailbox-date">{{ $Mail->date }}</td>
                                            <td class="mailbox-date">{{ $Mail->udate }}</td>
                                        </tr>
                                    @endforeach


                                    {{-- <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">علیرضا حسینی زاده</a></td>
                                        <td class="mailbox-subject"><b>تایید سفارش</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 دقیقه پیش</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                        <td class="mailbox-name"><a href="read-mail.html">علیرضا حسینی زاده</a></td>
                                        <td class="mailbox-subject"><b>تایید سفارش</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                                        </td>
                                        <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                        <td class="mailbox-date">28 دقیقه پیش</td>
                                    </tr> --}}

                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-left">
                                1-50/{{ count($MailInbox) }}
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    {{-- </div> --}}
    <!-- /.content-wrapper -->
@endsection
