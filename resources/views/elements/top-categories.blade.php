@if(isset($categories) && $categories)
<section class="top-categories">
    @if(isset($headline))<h2 class="top-categories__headline">{{ $headline }}</h2>@endif
    <div class="top-categories__list">
        @foreach($categories as $category)
            <a class="button primary large" href="{{ route('aimeos_shop_list', ['f_catid' => $category->getId(), 'f_name' => $category->getName( 'url' )]) }}">{{ $category->getName() }}</a>
        @endforeach
    </div>
</section>
@endif
