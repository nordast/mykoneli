<?php

namespace App\Backend\Providers;

use App\Backend\Pages\EditProfile;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class BackendPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('backend')
            ->path('backend')
            ->login()
            ->profile(EditProfile::class)
            ->colors([
                'primary' => '#4099ff',
            ])
            ->font('Roboto')
            ->favicon(asset('images/favicon.png'))
            ->discoverResources(in: app_path('Backend/Resources'), for: 'App\\Backend\\Resources')
            ->discoverPages(in: app_path('Backend/Pages'), for: 'App\\Backend\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Backend/Widgets'), for: 'App\\Backend\\Widgets')
            ->widgets([
//                Widgets\AccountWidget::class,
//                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandLogo(asset('images/logo.png'))
            ->darkMode(false)
            ->sidebarWidth('15rem')
            ->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('3rem')
            ->maxContentWidth(MaxWidth::Full)
            ->viteTheme('resources/css/filament/backend/theme.css');
    }

    public function boot(): void
    {
        Table::configureUsing(function (Table $table): void {
            $table
                ->defaultSort('id', 'DESC')
                ->striped()
                ->paginated([10, 20, 50])
                ->defaultPaginationPageOption(20);

            $table::$defaultDateTimeDisplayFormat = 'Y-m-d H:i:s';
            $table::$defaultDateDisplayFormat = 'Y-m-d';
        });

        DatePicker::configureUsing(function (DatePicker $obj): void {
            $obj
                ->native(false)
                ->displayFormat('Y-m-d');
        });

        TextColumn::configureUsing(function (TextColumn $obj): void {
            $obj->placeholder('-');
        });

        TextEntry::configureUsing(function (TextEntry $obj): void {
            $obj->placeholder('-')->inlineLabel();
        });

        ImageEntry::configureUsing(function (ImageEntry $obj): void {
            $obj->inlineLabel();
        });

        TextInput::configureUsing(function (TextInput $obj): void {
            $obj->inlineLabel();
        });

        FileUpload::configureUsing(function (FileUpload $obj): void {
            $obj->inlineLabel();
        });

        Textarea::configureUsing(function (Textarea $obj): void {
            $obj->inlineLabel();
        });

        Select::configureUsing(function (Select $obj): void {
            $obj->inlineLabel()->native(false);
        });

        TagsInput::configureUsing(function (TagsInput $obj): void {
            $obj->inlineLabel();
        });

        TinyEditor::configureUsing(function (TinyEditor $obj): void {
            $obj
                ->toolbarSticky(true)
                ->inlineLabel();
        });
    }
}
