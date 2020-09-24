@if($product)
    <a class="product__link" href="{{ route('aimeos_shop_detail', ['d_prodid' => $product->getId(), 'd_pos' => $pos, 'd_name' => $product->getName( 'url' )]) }}">
        <div class="product">
            <div>
                <p class="product__name">{{ $product->getName() }}</p>
                @include('partials.product.product-price', ['price' => current(current($product->getRefItems('price', null, 'default')))])
            </div>
            @include('partials.product.product-media', ['media' => $product->getRefItems('media', 'default', 'default')])
            @if(current(current($product->getRefItems('price', null, 'default'))) && current(current($product->getRefItems('price', null, 'default')))->getRebate() > 0)
                @include('partials.shared.badge', ['state' => 'rebate', 'body' => '%'])
            @endif
        </div>
    </a>
@endif
