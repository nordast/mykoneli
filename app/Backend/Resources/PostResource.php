<?php

namespace App\Backend\Resources;

use App\Backend\Filters\DateFilter;
use App\Backend\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Blog';

    protected static array $statusesColors = [
        Post::STATUS_INACTIVE => 'gray',
        Post::STATUS_ACTIVE   => 'success',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->maxLength(255),

                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    FileUpload::make('image')
                        ->hint("Preview Image (Best size 370x270px)")
                        ->image()
                        ->directory('post-previews')
                        ->maxSize(1024)
                        ->imageEditor()
                        ->required(),

                    TinyEditor::make('content')
                        ->fileAttachmentsDirectory('post-images')
                        ->required(),

                    TagsInput::make('tags'),

                    Select::make('status')
                        ->required()
                        ->options(Post::getStatuses())
                        ->default(Post::STATUS_INACTIVE),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('category.name')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => Post::getStatuses($state))
                    ->color(fn(int $state): string => Arr::get(self::$statusesColors, $state))
                    ->badge()
                    ->sortable(),

                ImageColumn::make('image')
                    ->height(75)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                DateFilter::make('created_at'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()->schema([
                    TextEntry::make('id'),
                    TextEntry::make('title'),
                    TextEntry::make('slug'),
                    TextEntry::make('category.name'),

                    ImageEntry::make('image')
                        ->height(200),

                    TextEntry::make('status')
                        ->formatStateUsing(fn (string $state): string => Post::getStatuses($state))
                        ->color(fn(int $state): string => Arr::get(self::$statusesColors, $state))
                        ->badge(),

                    TextEntry::make('tags')
                        ->badge()
                        ->separator(','),

                    TextEntry::make('created_at'),
                    TextEntry::make('updated_at'),
                    TextEntry::make('deleted_at'),
                ]),

                Section::make('Content')->schema([
                    TextEntry::make('content')
                        ->formatStateUsing(fn (string $state): HtmlString => new HtmlString($state))
                        ->hiddenLabel(),
                ])->collapsible(),
            ])->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view'   => Pages\ViewPost::route('/{record}'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
