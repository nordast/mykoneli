@php
    use App\Models\Post;

    /** @var Post $post */
    /** @var Post $prevPost */
    /** @var Post $nextPost */
@endphp

<div class="col-lg-8">

    <div class="blog-header">
        <h1 class="mb20">{{ $post->title }}</h1>

        <div class="entry-blog d-flex justify-content-between">
            <div class="bypost">
                <a href="{{ route('post.index', ['category_id' => $post->category_id]) }}">
                    <i class="fas fa-layer-group"></i> {{ $post->category->name }}
                </a>
            </div>
            <div class="posted-on">
                <i class="fas fa-clock"></i> {{ __date($post->created_at) }}
            </div>
        </div>
    </div>

    <div class="image-set">
        <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}" class="img-fluid">
    </div>

    <div class="blog-content mt30">
        {!! $post->content !!}
    </div>

    @isset($post->tags)
        <div class="row">
            <div class="col mt30 mb30">
                <div class="blog-post-tag">
                    <span>Related Tags</span>

                    @foreach($post->tags as $tag)
                        <a href="{{ route('post.index', ['tag' => $tag]) }}">
                            {{ $tag }}
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    @endisset

    <div class="row">
        @isset ($prevPost)
            <div class="col-lg-6 col-md-6 mt30 mb30">
                <div class="post-navigation text-left ">
                    <div class="mb10">Prev Post</div>
                    <h4>
                        <a href="{{ route('post.show', ['post' => $prevPost->slug]) }}">{{ $prevPost->title }}</a>
                    </h4>
                </div>
            </div>
        @endisset

        @isset ($nextPost)
                <div class="col-lg-6 col-md-6 mt30 mb30">
                    <div class="post-navigation text-left text-md-right">
                        <div class="mb10">Next Post</div>
                        <h4>
                            <a href="{{ route('post.show', ['post' => $nextPost->slug]) }}">{{ $nextPost->title }}.</a>
                        </h4>
                    </div>
                </div>
        @endisset
    </div>

</div>
