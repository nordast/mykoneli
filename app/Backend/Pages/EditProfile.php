<?php

namespace App\Backend\Pages;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;

class EditProfile extends \Filament\Pages\Auth\EditProfile {

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::pages/auth/edit-profile.form.email.label'))
            ->email()
            ->required()
            ->disabled()
            ->maxLength(255)
            ->unique(ignoreRecord: true);
    }

}
