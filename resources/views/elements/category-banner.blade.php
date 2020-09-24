@if((isset($category) && $category) )

    <section class="category-banner {{isset($left) ? 'flex-row-reverse' : ''}}">
        <div class="category-banner__image">
            @if(current($category->getRefItems('media', 'default')))
                <img class="img-responsive" src="{{ current(current($category->getRefItems('media', 'default')))->getUrl() }}" alt="{{  current(current($category->getRefItems('media', 'default')))->getName() }}">
                <div class="transparent-layer">
                    <h2 class="layer--headline">{{ $category->getName() }}</h2>
                </div>
            @endif
        </div>
        <div class="category-banner__category-list">
            @if(count($category->getChildren()) >0)
            <ul>
                @foreach($category->getChildren()->slice(0, 8) as $child)
                <li><a href="{{ route('aimeos_shop_list', ['f_catid' => $child->getId(), 'f_name' => $child->getName( 'url' )]) }}">{{ $child->getName() }}</a></li>
                @endforeach
            </ul>
            @endif
            <a href="{{ route('aimeos_shop_list')}}?f_catid={{ $category->getId() }}" class="button secondary small">
                {{ __('home.view_all') }}
            </a>
        </div>
    </section>
@endif
