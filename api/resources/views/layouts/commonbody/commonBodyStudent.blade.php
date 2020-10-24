{{--@if (session('roles'))--}}
{{--{{Session::get('roles')[0]['id']}}--}}
{{--@if (Session::get('roles')[0]['can_create']==1)--}}
{{--show create--}}
{{--@endif--}}
{{--@endif--}}
<!-- start -->
<div id="menu_area" class="menu-area-student">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="active"><a class="navbar-brand" href="{{ url('/') }}">
                                <i class="fa fa-home" style="font-size:24px"></i>
                            </a> </li>
                        <!--main single menu -->
                        <li><a href="#">My Task</a></li>
                        <!--main management -->
                        {{--<li class="dropdown">--}}
                            {{--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Management</a>--}}
                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Subject/Chapter</a>--}}
                                    {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                        {{--<li class="dropdown">--}}
                                            {{--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Subject</a>--}}
                                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                                {{--<li><a href="{{ url('/Subject/create') }}">Add Subject</a></li>--}}
                                                {{--<li><a href="{{ url('/Subject') }}">List Subjects</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li class="dropdown">--}}
                                            {{--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Chapter</a>--}}
                                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                                {{--<li><a href="#">Add Chapter</a></li>--}}
                                                {{--<li><a href="#">List Chapters</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                        {{--<li class="dropdown">--}}
                                            {{--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Part</a>--}}
                                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                                {{--<li><a href="#">Add Part</a></li>--}}
                                                {{--<li><a href="#">List Parts</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <!-- end management -->

                    </ul>



                </div>
                <ul class="navbar-nav mr-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">



                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        {{--</div>--}}
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>


<!-- end menu -->

<div id="global-feedback"></div>






