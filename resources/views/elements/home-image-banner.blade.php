@if(isset($category) && $category)
<section>
    <div class="image-banner">
        @if(current($category->getRefItems('media', 'stage')))
            <img class="img-responsive" src="{{ current(current($category->getRefItems('media', 'stage')))->getUrl() }}" alt="{{  current(current($category->getRefItems('media', 'stage')))->getName() }}">
        @endif
        @if((!empty($headline)) || (!empty($body)) )
        <div class="transparent-layer d-flex flex-column align-items-center">
            @if(!empty($headline))
            <h2 class="layer--headline">{{ $headline->getContent() }}</h2>
            @endif
            @if(!empty($body))
            <p class="layer--body">{!! $body->getContent() !!}</p>
            @endif
            <a class="secondary button large" href="{{ route('aimeos_shop_list', ['f_catid' => $category->getId(), 'f_name' => $category->getName( 'url' )]) }}">{{ __('home.show_category') }}</a>
        </div>
        @endif
    </div>
</section>
@endif

