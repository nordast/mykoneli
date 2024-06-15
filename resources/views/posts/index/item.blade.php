@php
    /** @var App\Models\Post $post */
@endphp

<div class="col-lg-4 col-sm-6 single-card-item">
    <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="isotope_item hover-scale">
        <div class="item-image">
            <img src="{{ asset($post->image ? Storage::disk('public')->url($post->image) : 'images/blog_preview.jpg') }}" alt="{{ $post->title }}" class="img-fluid">
        </div>
        <div class="item-info blog-info">
            <div class="entry-blog d-flex justify-content-between">
                <div class="bypost">
                    <i class="fas fa-layer-group"></i> {{ $post->category->name }}
                </div>
                <div class="posted-on">
                    <i class="fas fa-clock"></i> {{ __date($post->created_at) }}
                </div>
            </div>
            <h4>{{ $post->title }}</h4>
            <p>{{ Str::of($post->content)->stripTags()->limit(100) }}</p>
        </div>
    </a>
</div>
