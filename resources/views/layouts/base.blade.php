<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Deliver</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    @livewireStyles

</head>
<body>

<!-- header section starts      -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>Foodie.</a>

    <nav class="navbar">
        <a class="active" href="#home">home</a>
        <a href="#dishes">dishes</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#review">review</a>
        <a href="#order">order</a>
    </nav>

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
        <i class="fas fa-user" id="login-btn"></i>
        <i class="fas fa-bars" id="menu-bars"></i>
    </div>

    <div class="login-menu" id="login_menu">
        @auth
        <div class="login-list">
            @if(Auth::user()->is_admin === 1)
            <div><a href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line"></i><span>Dashboard</span></div>
            @else
            <div><a href="{{ route('user.dashboard') }}"><i class="fas fa-chart-line"></i><span>Dashboard</span></a></div>
            @endif
            <div >
                <form action="{{ route('logout') }}" method="post" id="logout">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                </form>
            </div>
        </div>
        @else
        <div class="login-list">
            <div>
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span>Login</span></a></div>
            <div><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i><span>Register</span></a></div>
        </div>
        @endauth
    </div>

</header>

<!-- header section ends-->

<main>
    {{ $slot }}
</main>


{{--  <!-- loader part  -->
<div class="loader-container">
    <img src="{{asset('assets/frontend/img/loader.gif')}}" alt="">
</div>  --}}

{{--  Js link  --}}

<script src="{{asset('assets/frontend/js/script.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>

<script>
document.getElementById('login-btn').addEventListener('click',function(){
  document.getElementById('login_menu').classList.toggle('login-menu-active');
});
</script>

@livewireScripts
</body>
</html>
