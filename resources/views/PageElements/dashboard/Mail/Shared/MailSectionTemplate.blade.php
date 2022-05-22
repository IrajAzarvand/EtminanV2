@extends('dashboard')

@section('contents')
    <!-- Main content -->
    <section class="content">
        <div class="row">

            @include('PageElements.dashboard.Mail.Shared.MailSideMenu')


            <!-- Main Contents -->
            @yield('MailContents')

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    {{-- </div> --}}
    <!-- /.content-wrapper -->
@endsection
