@if($headline)
<div class="section-headline">
    <h2>{{ $headline }}</h2>
    @if(isset($categoryLink) && $categoryLink)
        <a class="button small primary" href="{{ $categoryLink }}">{{__('home.view_all')}}</a>
    @endif
    <hr>
</div>
@endif
