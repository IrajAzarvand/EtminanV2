@extends('PageElements.dashboard.Mail.Shared.MailSectionTemplate')

@section('MailContents')
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $MailboxName }}</h3>

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

                        <div class="btn-group">
                            {{ $Mailbox->perPage() * $Mailbox->currentPage() - $Mailbox->perPage() + 1 }} - @if ($Mailbox->perPage() * $Mailbox->currentPage() > $Mailbox->total())
                                {{ $Mailbox->total() }}
                            @else
                                {{ $Mailbox->perPage() * $Mailbox->currentPage() }}
                            @endif

                        </div>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.pull-right -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @foreach ($Mailbox as $key => $Mail)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td class="mailbox-name"><a href="{{ route('ShowMsgbody', [$MailboxName, $Mail->uid]) }}">
                                            @if (last(request()->segments()) == 'Sent' || last(request()->segments()) == 'Drafts')
                                                {{ $Mail->to }}
                                            @else
                                                @if (!$Mail->seen)
                                                    <b>{{ $Mail->from }}</b>
                                                @else
                                                    <span style="color: black;">{{ $Mail->from }} </span>
                                                @endif
                                            @endif
                                        </a></td>
                                    <td class="mailbox-subject">
                                        <a href="{{ route('ShowMsgbody', [$MailboxName, $Mail->uid]) }}">
                                            @if (!$Mail->seen)
                                                <b>{{ $Mail->subject }}</b>
                                            @else
                                                <span style="color: black;">{{ $Mail->subject }} </span>
                                            @endif
                                        </a>
                                    </td>
                                    <td class="mailbox-attachment">
                                        @if (isset($Mail->MailHasAttachment) && $Mail->MailHasAttachment)
                                            <i class="fa fa-paperclip"></i>
                                        @endif
                                    </td>
                                    <td class="mailbox-date">{{ $Mail->date }}</td>
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

                        {{ $Mailbox->perPage() * $Mailbox->currentPage() - $Mailbox->perPage() + 1 }} - @if ($Mailbox->perPage() * $Mailbox->currentPage() > $Mailbox->total())
                            {{ $Mailbox->total() }}
                        @else
                            {{ $Mailbox->perPage() * $Mailbox->currentPage() }}
                        @endif
                        <div class="btn-group">

                            @if ($Mailbox->hasPages())
                                <ul class="pager">

                                    @if ($Mailbox->onFirstPage())
                                        <li class="disabled"><span>
                                                < قبلی</span>
                                        </li>
                                    @else
                                        <li><a href="{{ $Mailbox->previousPageUrl() }}" rel="prev">
                                                < قبلی</a>
                                        </li>
                                    @endif



                                    @foreach ($Mailbox->links()->elements as $element)
                                        @if (is_string($element))
                                            <li class="disabled"><span>{{ $element }}</span></li>
                                        @endif



                                        @if (is_array($element))
                                            @foreach ($element as $page => $url)
                                                @if ($page == $Mailbox->currentPage())
                                                    <li class="active my-active"><span>{{ $page }}</span></li>
                                                @else
                                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach



                                    @if ($Mailbox->hasMorePages())
                                        <li><a href="{{ $Mailbox->nextPageUrl() }}" rel="next">بعدی > </a>
                                        </li>
                                    @else
                                        <li class="disabled"><span>بعدی > </span>
                                        </li>
                                    @endif
                                </ul>
                            @endif







                            {{-- <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button> --}}
                        </div>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.pull-right -->
                </div>
            </div>
        </div>
        <!-- /. box -->
    </div>
@endsection
