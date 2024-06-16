<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $prevPost = Post::where('created_at', '<', $post->created_at)
            ->latest()
            ->first();

        $nextPost = Post::where('created_at', '>', $post->created_at)
            ->latest()
            ->first();

        $lastPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        $postCategories = Post::query()
            ->select('category_id', DB::raw('count(category_id) as count'))
            ->with('category')
            ->groupBy('category_id')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        $tagsTop = $this->getTagsTop();

        return view('posts.show', compact(
            'post',
            'prevPost',
            'nextPost',
            'lastPosts',
            'postCategories',
            'tagsTop'
        ));
    }

    private function getTagsTop(): array
    {
        return Cache::remember('tags_top_list', 3600, function () {
            $posts = Post::all('id', 'tags');

            // get tags
            $tags = [];
            $posts->each(function (Post $post) use (&$tags) {
                foreach ($post->tags as $tag) {
                    if (isset($tags[$tag])) {
                        $tags[$tag] += 1;
                    } else {
                        $tags[$tag] = 1;
                    }
                }
            });

            $tags = Arr::sortDesc($tags);

            return Arr::take($tags, 30);
        });
    }

}
