<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @foreach (SiteLang() as $locale => $specs)
                    <li class="@if ($loop->first) active @endif"><a href="#tab_{{ $Section == 'Edit' ? $locale . '_Edit' . $SelectedItem['id'] : $locale }}_{{ $InputformName ?? '' }}" data-toggle="tab">{{ $specs['name'] }}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach (SiteLang() as $locale => $specs)
                    <div class="tab-pane @if ($loop->first) active @endif" id="tab_{{ $Section == 'Edit' ? $locale . '_Edit' . $SelectedItem['id'] : $locale }}_{{ $InputformName ?? '' }}">
                        @if (isset($Data, $InputformName))
                            <textarea @if ($specs['rtl']) dir="rtl" @else dir="ltr" @endif id="editor1" name="content_{{ $Section == 'Edit' ? $locale . '_Edit' : $locale }}{{ isset($InputformName) ? '_' . $InputformName : '' }}" style="width: 100%; height: 120px;" required>{{ $Data['content_' . $locale . '_' . $InputformName] }}</textarea>
                        @elseif (isset($Data, $Section))
                            <textarea @if ($specs['rtl']) dir="rtl" @else dir="ltr" @endif id="editor1" name="content_{{ $Section == 'Edit' ? $locale . '_Edit' : $locale }}{{ isset($InputformName) ? '_' . $InputformName : '' }}" style="width: 100%; height: 120px;" required>{{ $Data['content_' . $locale . '_' . $Section] }}</textarea>
                        @else
                            <textarea @if ($specs['rtl']) dir="rtl" @else dir="ltr" @endif id="editor1" name="content_{{ $Section == 'Edit' ? $locale . '_Edit' : $locale }}{{ isset($InputformName) ? '_' . $InputformName : '' }}" style="width: 100%; height: 120px;" required></textarea>
                        @endif
                    </div>
                @endforeach
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

{{-- InputformName var comes from products view file to devide double input box textarea --}}
