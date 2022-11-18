<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!--- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- custom style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--- admin style-->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>LaraBooks</title>
</head>
<body>
     <header>
        <div class="logo">
            <h1 class="logo-text"><a href="{{ route('posts.index') }}"><span>BR</span>-Book Reviews</a></h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                        {{ auth()->user()->name }}
                    <i class="fa fa-chevron-down" style="font-size: 0.8em ;"></i>
                </a>
                 <ul>
                    <li>
                            <form action="{{ route('users.logout') }}" method="post" >
                                @csrf
                                <button type="submit" class="logout"><a>logout</a></button>
                            </form>
                        </li>
                </ul>
            </li>
        </ul>
    </header>
    <div class="admin-wrapper">
        <!-- left sidebar-->
        <div class="left-sidebar">
            <ul>
                <li><a href="{{ route('admin.posts.index') }}">Manage Posts</a></li>
                <li><a href="{{ route('admin.topics.index') }}">Manage Topics</a></li>
                <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
            </ul>
        </div>


        {{--  content --}}
            @yield('content')


    </div>
<x-flash-message></x-flash-message>
<!-- jQuery-->
    <scrip src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--slick carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- ckEditor --->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Custom script -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>

</body>
</html>
