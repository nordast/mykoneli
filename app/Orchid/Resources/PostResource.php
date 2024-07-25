<?php

namespace App\Orchid\Resources;

use App\Models\Post;
use Orchid\Crud\Filters\DefaultSorted;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Post::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Title')
                ->placeholder('Enter title here')
                ->horizontal(),

            Input::make('status')
                ->title('Status')
                ->placeholder('Enter status here'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', 'ID'),
            TD::make('title'),
            TD::make('category')->render(fn (Post $model) => $model->category->name),

            TD::make('image')
                ->width('100')
                ->render(fn (Post $model) => "<img src='{$model->getImageUrlAttribute()}' class='mw-100 d-block img-fluid rounded-1 w-100'")
                ->defaultHidden(),

            TD::make('status')->render(function (Post $model) {
                if ($model->status === Post::STATUS_INACTIVE) {
                    return '<span class="badge bg-light text-dark">Inactive</span>';
                }

                return '<span class="badge bg-success">Active</span>';
            }),


            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                })
                ->defaultHidden(),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('title'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            new DefaultSorted('id', 'desc'),
        ];
    }

    /**
     * Get the number of models to return per page
     *
     * @return int
     */
    public static function perPage(): int
    {
        return 10;
    }
}
