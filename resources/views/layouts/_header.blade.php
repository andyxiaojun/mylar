<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ route('root') }}">
                主页
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if(Auth::check())
                    <li><a href="{{ route('users.show',Auth::user()->id) }}">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('channel') }}">创建房间</a></li>
                    <li>
                        <a href="#" id="logout">
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                            </form>
                        </a>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('sigup') }}">注册</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>