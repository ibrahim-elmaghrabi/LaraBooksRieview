<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- css link -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>LaraBooks</title>
</head>
<body>
    <header>
        <div class="logo">
            <h1 class="logo-text">
                <a href="{{ route('posts.index') }}"><span>BR</span>-Book Reviews</a>
            </h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li><a href="{{ route('posts.index') }}">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            @auth
                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>{{ auth()->user()->name }}
                        <i class="fa fa-chevron-down" style="font-size: 0.8em ;"></i>
                    </a>
                    <ul>
                         @if(auth()->user()->admin === 1)
                         <li><a href="{{ route('admin.posts.index') }}">Dashboard</a></li>
                         @endif
                        <li>
                            <form action="{{ route('users.logout') }}" method="post" >
                                @csrf
                                <button type="submit" class="logout"><a>logout</a></button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('users.register') }}">Signup</a></li>
                <li><a href="{{ route('users.login') }}">login</a></li>
             @endauth
        </ul>
    </header>




    @yield('content')


     <!-- jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--slick carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Custom script -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
