@if((isset($category) && $category) && (isset($product) && $product))
<section>
    <div class="product-list-big">
        <div class="product-list-big__tile">
            @if($category->getRefItems('media', 'default'))
                <a href="{{  route('aimeos_shop_list', ['f_catid' => $category->getId(), 'f_name' => $category->getName( 'url' )]) }}">
                    <img src="{{ current(current($category->getRefItems('media', 'default')))->getUrl() }}" alt="{{ current(current($category->getRefItems('media', 'default')))->getName() }}">
                    <div class="button-layer">
                        <span class="button small secondary">{{ $category->getName() }}</span>
                    </div>
                </a>
            @endif
        </div>
        <div class="product-list-big__tile">
            @include('partials.product.product', ['product' => $product, 'pos' => 1])
        </div>
    </div>
</section>
@endif
