@if(isset($categories) && $categories)
    <section class="tiles">
        @foreach($categories as $category)
            <div class="tiles__big">
                <a href="{{ route('aimeos_shop_list', ['f_catid' => $category->getId(), 'f_name' => $category->getName( 'url' )]) }}">
                    @if(current($category->getRefItems('media', 'default')))
                        <img src="{{ current(current($category->getRefItems('media', 'default')))->getUrl() }}" alt="{{ current(current($category->getRefItems('media', 'default')))->getName() }}">
                    @endif
                </a>
            </div>
            @break
        @endforeach
        <div class="tiles__small">
            @foreach($categories as $category)
                @if($loop->index !== 0)
                    <a href="{{ route('aimeos_shop_list', ['f_catid' => $category->getId(), 'f_name' => $category->getName( 'url' )]) }}">
                        @if(current($category->getRefItems('media', 'default')))
                            <img src="{{ current(current($category->getRefItems('media', 'default')))->getUrl() }}" alt="{{ current(current($category->getRefItems('media', 'default')))->getName() }}">
                        @endif
                    </a>
                @endif
            @endforeach
        </div>
    </section>
@endif
