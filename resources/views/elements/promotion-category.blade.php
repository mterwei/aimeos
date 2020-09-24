<section class="product-list">
    @foreach($promotion['products'] as $product)
        @if($loop->index < 2)
            @include('partials.product.product', ['product' => $product, 'pos' => $loop->index])
        @elseif($loop->index == 2)
            @include('partials.product.product-big', ['product' => $product, 'pos' => $loop->index])
        @endif
    @endforeach
</section>
<section>
    @include('elements.product-list-big', ['category' => current($promotion['banner']), 'product' => reset($promotion['products'])])
</section>

