@if(isset($categories) && $categories)
    <section class="popular-categories">
        @if(isset($headline))
            @include('partials.headlines.section-headline', ['headline' => $headline])
        @endif
        <div class="popular-categories__list">
            @foreach($categories as $category)
                <ul>
                    <li>{{ $category->getName() }}</li>
                    @foreach($category->getChildren() as $child)
                        <li><a href="{{  route('aimeos_shop_list', ['f_catid' => $child->getId(), 'f_name' => $child->getName( 'url' )]) }}">{{ $child->getName() }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </section>
@endif
