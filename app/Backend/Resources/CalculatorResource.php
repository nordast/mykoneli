<?php

namespace App\Backend\Resources;

use App\Backend\Filters\DateFilter;
use App\Backend\Resources\CalculatorResource\Pages;
use App\Models\Calculator;
use CodebarAg\FilamentJsonField\Infolists\Components\JsonEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Arr;

class CalculatorResource extends Resource
{
    protected static ?string $model = Calculator::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    protected static ?string $navigationLabel = 'Calculator';

    protected static array $statusesColors = [
        Calculator::STATUS_NEW      => 'primary',
        Calculator::STATUS_ACTIVE   => 'success',
        Calculator::STATUS_PRIVATE  => 'warning',
        Calculator::STATUS_DELETED  => 'gray',
    ];

    protected static array $isSpamColors = [
        Calculator::IS_SPAM_NO  => 'success',
        Calculator::IS_SPAM_YES => 'danger',
    ];

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('key')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => Calculator::getStatuses($state))
                    ->color(fn(int $state): string => Arr::get(self::$statusesColors, $state))
                    ->badge()
                    ->sortable(),

                TextColumn::make('ip')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('is_spam')
                    ->formatStateUsing(fn (string $state): string => Calculator::isSpam($state))
                    ->color(fn(int $state): string => Arr::get(self::$isSpamColors, $state))
                    ->badge()
                    ->sortable(),

                TextColumn::make('likes')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('dislikes')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('rating')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')->options(Calculator::getStatuses()),
                SelectFilter::make('is_spam')->options(Calculator::isSpam()),

                DateFilter::make('created_at')
                    ->columnSpan(2)
                    ->columns(),
            ])
            ->filtersFormColumns(2)
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //
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
                    TextEntry::make('user_id'),
                    TextEntry::make('key'),
                    TextEntry::make('name'),

                    TextEntry::make('status')
                        ->formatStateUsing(fn (string $state): string => Calculator::getStatuses($state))
                        ->color(fn(int $state): string => Arr::get(self::$statusesColors, $state))
                        ->badge(),

                    TextEntry::make('ip'),

                    TextEntry::make('is_spam')
                        ->formatStateUsing(fn (string $state): string => Calculator::isSpam($state))
                        ->color(fn(int $state): string => Arr::get(self::$isSpamColors, $state))
                        ->badge(),

                    TextEntry::make('likes')
                        ->numeric(),

                    TextEntry::make('dislikes')
                        ->numeric(),

                    TextEntry::make('rating')
                        ->numeric(),

                    TextEntry::make('created_at'),
                    TextEntry::make('updated_at'),
                ]),

                Section::make('Description')->schema([
                    TextEntry::make('description')
                        ->prose()
                        ->hiddenLabel(),
                ])->collapsible(),

                Section::make('Answer')->schema([
                    JsonEntry::make('answer')
                        ->hiddenLabel(),
                ])->collapsible(),

                Section::make('Feedback')->schema([
                    TextEntry::make('feedback')
                        ->prose()
                        ->hiddenLabel(),
                ])->collapsible(),

            ])->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalculators::route('/'),
            'view'  => Pages\ViewCalculator::route('/{record}'),
        ];
    }
}
