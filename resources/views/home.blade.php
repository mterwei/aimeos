@extends('app')

@section('content')
    <div class="ai-container home">
        @if(isset($promo_data))
            @foreach($promo_data as $key => $data)

                @if(isset($data['catalog']))
                    @include('elements.home-image-banner', [ 'category' => $data['catalog'], 'headline' => (($headline = current(current($data['catalog']->getRefItems( 'text', 'name', 'default' )))) !== false ? $headline: ""), 'body' => (($headline = current(current($data['catalog']->getRefItems( 'text', 'short', 'default' )))) !== false ? $headline: "")])
                @endif
                @if(($promotions = $data['catalog']->getListItems('product', 'promotion' )) != null)
                    @include("elements.most-wanted-products", ['products' => $promotions->getRefItem(), 'categoryLink' =>route('aimeos_shop_list', ['f_catid' => $data['catalog']->getId(), 'f_name' => $data['catalog']->getName( 'url' )])])
                @endif

                @if((isset($data['promotion']) && $data['promotion'] != []) && $data['sub_catalog'])
                    @include('elements.top-categories', ['categories' => $data['sub_catalog'], 'headline' => __('home.top_categories')])
                    @include('elements.promotion-category', ['promotion' => $data['promotion']])
                @endif

                @foreach($data['sub_catalog'] as $subKey => $sub)
                    @include('elements.home-image-banner', ['category' => $sub, 'headline' => (($headline = current(current($sub->getRefItems( 'text', 'name', 'default' )))) !== false ? $headline: ""), 'body' => (($headline = current(current($sub->getRefItems( 'text', 'short', 'default' )))) !== false ? $headline: "")])
                    @if(($promotions = $sub->getListItems('product', 'promotion' )) != null)
                        @include("elements.most-wanted-products", ['products' => $promotions->getRefItem(), 'categoryLink' =>route('aimeos_shop_list', ['f_catid' => $sub->getId(), 'f_name' => $sub->getName( 'url' )]) ])
                    @endif
                    @if(count($sub->getChildren()) >0)
                        @include('elements.category-banner', ['category' => $sub])
                    @endif
                @endforeach
            @endforeach
            @include('elements.popular-categories', ['categories' => $data['sub_catalog'], 'headline' => __('home.popular_categories')])
            @include('partials.inputs.newsletter-input')
        @endif

    </div>
@endsection
