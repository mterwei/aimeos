@if(count($products) > 0)
    <section class="most-wanted-products">
        @if(isset($categoryLink) && $categoryLink)
            @include('partials.headlines.section-headline', ['headline' => __('home.most_wanted'), 'categoryLink' => $categoryLink])
        @else
            @include('partials.headlines.section-headline', ['headline' => __('home.most_wanted')])
        @endif
        <div class="product-slider hidden">
            @foreach($products as $pos => $product)
                @include('partials.product.product', ['product' => $product, 'pos' => $pos])
            @endforeach
        </div>
    </section>
@endif
