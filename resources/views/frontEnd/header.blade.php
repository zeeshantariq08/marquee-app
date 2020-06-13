@section('styles')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/framework.css') }}">
@endsection

<div id="menu-1" class="menu-wrapper menu-light menu-sidebar-left menu-large">
    <div class="menu-scroll">
        
        <a href="{{ url("/") }}" class="">
            <img src="{{ asset('frontEnd/images/logo.png') }}" alt="" style="width: 80%; left: 5px;">
        </a>
        <div class="menu">
            
            <a class="menu-item active-item" href="{{ url("/") }}"><i class="font-15 fa color-night-light fa-home"></i><strong>Home</strong></a>
            <a class="menu-item close-menu " href="#"><i class="font-14 fa color-orange-dark fa-times"></i><strong>Close</strong></a>
            <a class="menu-item close-menu " href="#"><i class="font-14 fa  fa-info-circle"></i><strong>Privacy Policy</strong></a>
        </div>
    </div>
</div>
<div id="header" class="header-logo-right header-dark">
    <a href="{{ url("/") }}" class="header-logo"> 
        <img src="{{ asset('frontEnd/images/logo.png') }}" alt="" style="width: 120%; right: 25px;">
    </a>
    <a href="#" class="header-icon header-icon-1 hamburger-animated" data-deploy-menu="menu-1"></a>  
</div>