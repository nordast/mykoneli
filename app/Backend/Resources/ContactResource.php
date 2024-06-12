<?php

namespace App\Backend\Resources;

use App\Backend\Filters\DateFilter;
use App\Backend\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('subject')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('key')
                    ->searchable()
                    ->toggleable(),

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
                DateFilter::make('created_at')
            ])
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
                    TextEntry::make('name'),
                    TextEntry::make('email'),
                    TextEntry::make('subject'),
                    TextEntry::make('key'),
                    TextEntry::make('created_at'),
                    TextEntry::make('updated_at'),
                ]),

                Section::make('Content')->schema([
                    TextEntry::make('content')
                        ->prose()
                        ->hiddenLabel(),
                ])->collapsible(),
            ])->columns(1);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContacts::route('/'),
            'view'   => Pages\ViewContact::route('/{record}'),
        ];
    }
}
