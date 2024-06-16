@php
    use App\Models\Post;

    /** @var Post $post; */
    /** @var Post $postCategory; */
@endphp

<div class="col-lg-4">
    <div class="sidebar">

        <!--Start Recent post-->
        @isset($lastPosts)
            <div class="recent-post widgets mt60">
                <h3 class="mb30">Recent post</h3>

                @foreach($lastPosts as $post)
                    <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="media d-flex-inline" >
                        <div class="post-image bdr-radius">
                            <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}" class="img-fluid">
                        </div>
                        <div class="media-body post-info">
                            <h5>
                                {{ $post->title }}
                            </h5>
                            <p>{{ __date($post->created_at) }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        @endisset

        <!--Start Blog Category-->
        @isset($postCategories)
            <div class="recent-post widgets mt60">
                <h3 class="mb30">Blog Category</h3>
                <div class="blog-categories">
                    <ul>
                        @foreach($postCategories as $postCategory)
                            <li>
                                <a href="#">{{ $postCategory->category->name }} <span class="categories-number">({{ Number::abbreviate($postCategory->count) }})</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endisset

        <!--Start Tags-->
        @isset($tagsTop)
            <div class="recent-post widgets mt60">
                <h3 class="mb30">Most Used Tags</h3>
                <div class="tabs">
                    @foreach($tagsTop as $tag => $count)
                        <a href="#">{{ $tag }}</a>
                    @endforeach
                </div>
            </div>
        @endisset

    </div>
</div>
