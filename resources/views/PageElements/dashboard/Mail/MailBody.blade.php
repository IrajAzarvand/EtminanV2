@extends('PageElements.dashboard.Mail.Shared.MailSectionTemplate')
{{-- @dd($MailBody) --}}
@section('MailContents')
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $MailboxName }}</h3>

                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    <h3>{{ $MailBody[1] }}</h3> <!-- /subject -->
                    <h5>از: <span dir="ltr">{{ $MailBody[0] }}</span>
                        <!-- /from -->
                        <span class="mailbox-read-time pull-left">۳ مرداد ۱۳۹۶ ساعت ۱۴:۳۲</span>
                    </h5>
                </div>
                <!-- /.mailbox-read-info -->
                <div class="mailbox-controls with-border text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                            <i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                            <i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                            <i class="fa fa-share"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                        <i class="fa fa-print"></i></button>
                </div>
                <!-- /.mailbox-controls -->
                {{-- <div> --}}
                <div style=" margin: 5px 10px 10px;">
                    <p style="white-space: pre-line;">
                        @php
                            print_r($MailBody[2]);
                        @endphp
                    </p>
                </div>
                {{-- </div> --}}
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                    @if (isset($MailBody[3]) && !empty($MailBody[3]))
                        @foreach ($MailBody[3] as $attachment)
                            <li>
                                <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                                <div class="mailbox-attachment-info">
                                    <a href="{{ route('DownloadAttachment', [$MailBody[4], $MailBody[5], $attachment]) }}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{ $attachment }}</a>
                                    <span class="mailbox-attachment-size">
                                        1,245 KB
                                        <a href="{{ route('DownloadAttachment', [$MailBody[4], $MailBody[5], $attachment]) }}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> پاسخ دادن</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-share"></i> فوروارد</button>
                </div>
                <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> حذف</button>
                <button type="button" class="btn btn-default"><i class="fa fa-print"></i> پرینت</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
@endsection
