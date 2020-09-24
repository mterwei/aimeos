@if($media)
    <div class="product__media">
        @foreach($media as $img)
        @if($loop->index === 2)
            @break
        @endif
        @if($loop->index === 0)
            <img src="{{ $img->getUrl() }}" alt="{{$img->getName()}}">
        @else
            <div class="product__media__layer">
                <img src="{{ $img->getUrl() }}" alt="{{$img->getName()}}">
                <div class="product__layer">
                    <p class="product__stock">{{ __('product.product_available') }}</p>
                    <p class="button orange">{{ __('product.product_show_details') }}</p>
                </div>
            </div>
        @endif
        @endforeach
    </div>
@endif
