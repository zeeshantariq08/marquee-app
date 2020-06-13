@extends('layouts.frontEndLayout')

@section('header')
    @include('frontEnd.header')
@endsection

@section('content')

<div id="page-content-scroll">
    <div class="blog-post-home">

        

        <a href="#"><img src="{{ asset('frontEnd/images/empty.png') }}" data-src="{{ asset('uploads/marquee/thumbnail/'.$marquee->thumbnail) }}" class="preload-image responsive-image" style="height: 333px;"></a>
        <strong class="font-17">{{$marquee->name ?? ''}}</strong>
        <span ><a href="#" style="color: #88211a;">{{$marquee->address ?? ''}}</a></span>
        
        <span><a href="#" style="color: #88211a;">{{$marquee->phone_no ?? ''}}</a></span>
        {{-- <div class="blog-post-stats">
            <a href="#"><i class="fa fa-heart color-red-light"></i>503</a>
            <a href="#"><i class="fa fa-eye color-blue-light"></i>623</a>
            <a href="#"><i class="fa fa-comments color-brown-light"></i>135</a>
            <div class="clear"></div>
        </div> --}}
        <p class="small-bottom">
           {{$marquee->description ?? ''}}
        </p>
        
    </div>
    
    <div class="content content-boxed content-boxed-padding">
        <h4 class="uppercase ultrabold color-black" style="text-align: center;">SERVICES</h4>
        
        @forelse ($marquee->services as $service)

            <div class="system-box"><strong>{{ $service->name }}</strong><em class="color-green-dark"><i class="fa fa-check fa-2x"></i> </em></div>

        @empty
            <div class="system-box"><strong class="color-red-dark text-center"> No Service Available </strong><em class="color-red-dark"><i class="fa fa-exclamation-triangle fa-2x" style="font-size: 15px !important;"></i> </em></div>
        @endforelse
        
    </div>
    {{-- gallery start --}}
    <div class="content">
        <h4 class="uppercase ultrabold full-bottom center-text">PORTFOLIO</h4>
        <div class="gallery gallery-thumbs gallery-square">
            @forelse ($marquee->gallerys as $gallery)
                <a class="show-gallery" href="{{ asset('uploads/marquee/gallery/'.$gallery->filename) }}" title="">

                    <img src="{{ asset('uploads/marquee/gallery/'.$gallery->filename) }}" data-src="{{ asset('uploads/marquee/gallery/'.$gallery->filename) }}" class="preload-image responsive-image" alt="img">
                </a>
            @empty

                <div>
                    <h5 style="text-align: center;color:#c0392b;font-weight: bold;"> No Image Found </h5>
                </div>

            @endforelse
        </div>
    </div>
    {{-- galley end --}}

    <div class="content content-boxed content-boxed-padding">
        <h4 class="uppercase ultrabold color-black" style="text-align: center;">PACKAGES</h4>
        @forelse ($marquee->menus as $menu)

            <div class="content">
                <div class="pricing-4">
                    <h1 class="pricing-title center-text uppercase ultrabold" style="background:#89211b;color: #fff;">{{$menu->name}}</h1>
                    <h3 class="pricing-value center-text  small-bottom color-white ultrabold" style="background:#c0a062;color: #fff;">{{$menu->price}}<sup></sup></h3>
                    <h2 class="pricing-subtitle center-text  small-bottom" style="background:#89211b;color: #fff;padding-top: 15px;">Per Person</h2>

                    <a data-deploy-menu="menu-7-{{$menu->id}}" href="#" class="dummy-button button  button-center-large button-rounded uppercase ultrabold" style="background:#89211b;color: #fff;">View Details</a>

                </div>
                <div class="clear"></div>
            </div>
            
            @include('frontEnd.MenuDishesModal', ['menu', $menu])
        @empty
            <div class="content">
                <div class="pricing-4">
                    <h4 class="text-danger"> No Package Available </h4>
                </div>
                <div class="clear"></div>
            </div>

        @endforelse 
    </div>
</div>


<div class="content content-boxed content-boxed-padding">
    <h4 class="uppercase ultrabold color-black" style="text-align: center;">BOOK {{$marquee->name ?? ''}}</h4>
    <br/>
    <div class="contact-form">

        @if (Session::has('book_message'))
            <div class="notification-large notification-has-icon notification-green">
                <div class="notification-icon"><i class="fa fa-check notification-icon"></i></div>
                <h1 class="uppercase ultrabold" style="text-align:left;">Message Sent</h1>

                <p> {{ Session::get('book_message')}} </p>

                <a href="#" class="close-notification"><i class="fa fa-times"></i></a>
            </div>
        @endif

        @if (Session::has('already_booked'))
            <div class="notification-large notification-has-icon notification-red notification-green" autofocus>
                <div class="notification-icon"><i class="fa fa-exclamation-triangle notification-icon"></i></div>
                <h1 class="uppercase ultrabold" style="text-align:left;">Warning</h1>

                <p autofocus> {{ Session::get('already_booked')}} </p>

                <a href="#" class="close-notification" autofocus><i class="fa fa-times"></i></a>
            </div>
        @endif


        <form action="{{ route('booking.store') }}" method="post" class="contactForm">

            @csrf

            <input type="hidden" name="marquee_id" value="{{$marquee->id ?? ''}}">

            <fieldset>

                <div class="formFieldWrap">
                    
                    <input type="text" name="name" placeholder="Your Name" class="contactField" value="{{ old('name') }}" required  />
                    
                    @if($errors->has('name'))
                       <label class="field-title contactNameField" style="color: #c0392b;"> {{$errors->first('name')}} </label>
                    @endif                
                    
                </div>

                <div class="formFieldWrap">
                    <input type="text" name="email" placeholder="Email Address" class="contactField" value="{{ old('email')}}" required />

                    @if($errors->has('email'))
                       <label class="field-title contactEmailField" style="color: #c0392b;"> {{$errors->first('email')}} </label>
                    @endif
                </div>

                <div class="formFieldWrap">
                    <label class="field-title" for="contactNameField"></label>
                    <input type="number" name="contact_no" placeholder="Your Phone Number" class="contactField" required />

                    @if($errors->has('contact_no'))
                       <label class="field-title" style="color: #c0392b;"> {{$errors->first('contact_no')}} </label>
                    @endif
                    
                </div>

                <div class="formFieldWrap">

                    <input type="number" name="guests" placeholder="Number Of Guests" class="contactField" required />

                    @if($errors->has('guests'))
                       <label class="field-title" style="color: #c0392b;"> {{$errors->first('guests')}} </label>
                    @endif
                </div>

                <div class="formFieldWrap">
                    <input type="date" name="reserve_date" placeholder="Function Date"  class="contactField" required />

                    @if($errors->has('reserve_date'))
                       <label class="field-title" style="color: #c0392b;"> {{$errors->first('reserve_date')}} </label>
                    @endif
                </div>

                <div class="formFieldWrap">
                    <div class="select-box half-bottom">
                        <select name="menu_id">
                            <option value="">Select Menu</option>
                            @forelse ($marquee->menus as $menu)
                                <option value=" {{$menu->id}} "> {{ $menu->name }} </option>
                            @empty
                                <option value="">No Menu AVailable </option>
                            @endforelse
                        </select>
                    </div>

                    @if($errors->has('menu_id'))
                       <label class="field-title" style="color: #c0392b;"> {{$errors->first('menu_id')}} </label>
                    @endif

                </div>

                <div class="formFieldWrap">
                    <label class="field-title contactNameField" for="contactNameField"></label>
                    <div class="select-box half-bottom">
                        <select name="function_type">
                            <option value="">Function Type</option>
                            <option value="Mehndi">Mehndi</option>
                            <option value="Barat">Barat</option>
                            <option value="Nikah">Nikah</option>
                            <option value="Walima">Walima</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    @if($errors->has('function_type'))
                       <label class="field-title" style="color: #c0392b;"> {{$errors->first('function_type')}} </label>
                    @endif
                </div>

                <div class="formFieldWrap">
                    <label class="field-title contactNameField" for="contactNameField"> Function Time </label>
                    <div class="select-box half-bottom">
                        <select name="function_time">
                        <option value="" disabled>Function Time</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        </select>
                    </div>

                    @if($errors->has('function_time'))
                       <label class="field-title" style="color: #c0392b;"> {{$errors->first('function_time')}} </label>
                    @endif
                </div>
                
                <div class="clear"></div>

                <div class="formTextareaWrap half-bottom">
                    {{-- <label class="field-title contactMessageTextarea" for="contactMessageTextarea"></label> --}}
                    <textarea name="message" placeholder="Enter your message here." class="contactTextarea" required></textarea>

                    @if($errors->has('message'))
                       <label class="field-title contactMessageTextarea" style="color: #c0392b;"> {{$errors->first('message')}} </label>
                    @endif

                </div>

                <div class="contactFormButton">

                    <button type="submit" class="button button-rounded " style="text-align: center;background: #88211a;">Send Inquiry</button>
                </div>
            </fieldset>
        </form>
    </div>    
</div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ asset('frontEnd/js/cordova.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontEnd/js/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontEnd/js/custom.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontEnd/js/plugins.js') }}"></script>
        
@endsection
