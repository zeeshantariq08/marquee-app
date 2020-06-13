<div id="menu-7-{{$menu->id}}" data-menu-size="470" class="menu-wrapper menu-dark menu-modal menu-large">
        {{-- <div class="menu-scroll"> --}}
            

            <div class="pricing-4">
                <h1 class="pricing-title center-text uppercase ultrabold" style="background:#89211b;color: #fff;"> {{$menu->name ?? ''}}
                    <span title="Close Menu" class="font-14 close-menu" style="float: right; padding-right: 10px;"><i class="fa color-white fa-times"></i></span>
                </h1>

                

                <h3 class="pricing-value center-text small-bottom color-white ultrabold" style="background:#c0a062;color: #fff;">{{$menu->price ?? ''}}<sup></sup></h3>
                <h2 class="pricing-subtitle center-text small-bottom" style="background:#89211b;color: #fff;padding-top: 15px;">Per Person</h2>

            </div>
                @forelse ($menu->dishes as $dish)
                
                    <span class="menu-item">
                        <i class="font-15 fa fa-check"></i><strong>{{$dish->name}}</strong>
                    </span>
                @empty
                <span class="menu-item">
                    <i class="font-15 fa fa-exclamation-circle"></i><strong class="text-danger" style="color: #c0a062;font-size: 16px;"> Coming Soon </strong>
                </span>
                @endforelse

            <a class="menu-item close-menu" href="#"><i class="font-14 fa color-orange-dark fa-times"></i><strong>Close</strong></a>
        {{-- </div> --}}
    </div>