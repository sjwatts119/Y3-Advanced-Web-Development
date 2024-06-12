<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {;
        return $form
            ->schema([
                Section::make('User Information')->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('password')
                        ->required()
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->visibleOn('create')
                        ->rule(Password::default()),
                    Forms\Components\Toggle::make('is_admin')->label('Admin'),
                ]),
                Section::make('Change Password')->schema([
                    Forms\Components\TextInput::make('new_password')
                    ->nullable()
                    ->password()
                    ->visibleOn('edit')
                    ->rule(Password::default()),
                    Forms\Components\TextInput::make('confirm_password')
                    ->password()
                    ->same('new_password')
                    ->requiredWith('new_password')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //we should show name, admin or user, and email
                Tables\Columns\TextColumn::make('name'),
                //we should format the is_admin column to show Admin if value is true, and User if value is false
                Tables\Columns\TextColumn::make('is_admin')->label('Role')
                    ->formatStateUsing(function (User $value) {return $value->is_admin ? 'Admin' : 'User';}),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
