@if (session('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('error') }}</strong>
        @if (session('msg'))
            <ul>
                {!! implode('', session('msg')->all()) !!}
            </ul>                
        @endif
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('warning') }}</strong>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('info') }}</strong>
    </div>
@endif


<?php
session()->forget(['success', 'error', 'warning', 'info', 'msg']);
?>
