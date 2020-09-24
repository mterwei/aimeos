@if($price)
    @if($price->getRebate() > 0)
        <span class="product__rebate">€ {{ number_format($price->getValue() + $price->getRebate(), 2) }}</span>
    @endif
    <span class="product__price">€ {{ $price->getValue() }}</span>
@endif
