<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@if(Auth::user()->role==='atemp-admin')
<title>{{ config('app.name', 'tutuorfinder') }} - Admin</title>
@elseif(Auth::user()->role==='student')
    <title>{{ config('app.name', 'tutuorfinder') }} - Student</title>
    @elseif(Auth::user()->role==='atemp-author')
    <title>{{ config('app.name', 'tutuorfinder') }} - Author</title>
    @else
    <title>{{ config('app.name', 'tutuorfinder') }} - Guest</title>
    @endif
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- bootstrap4 & jquery -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- Styles -->

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/commonstyle.css') }}" rel="stylesheet">

<script>var base_url = "<?php echo e(asset('/')); ?>";
    var user_name='<?= \Auth::user()->name ?>';
    var user_role='<?= \Auth::user()->role ?>';
    var user_id='<?= \Auth::user()->id ?>';
</script>