<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php if(isset($head) && $head=='indexHead'){ ?>
        @include('layouts.commonHead.commonIndexHead')
    <?php }else{ ?>
        @include('layouts.commonHead.commonHead')
    <?php } ?>





</head>
<body>
@include('layouts.commonbody.commonBodyAdmin')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<?php if(isset($head) && $head=='indexHead'){ ?>
@include('layouts.commonFooter.commonIndexFooter')
<?php }else{ ?>
@include('layouts.commonFooter.commonFooter')
<?php } ?>


@yield('script')
</html>
