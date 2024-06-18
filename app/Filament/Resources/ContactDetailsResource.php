<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactDetailsResource\Pages;
use App\Filament\Resources\ContactDetailsResource\RelationManagers;
use App\Models\ContactDetails;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactDetailsResource extends Resource
{
    protected static ?string $model = ContactDetails::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('details_name')->required()->minlength(3),
                Forms\Components\TextInput::make('phone')->required()->minlength(3),
                Forms\Components\TextInput::make('email')->required()->minlength(3),
                Forms\Components\Textarea::make('address')->required()->minlength(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('details_name')->label('Details Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active')->alignCenter()->sortable()
                    ->beforeStateUpdated(function (ContactDetails $contactDetails) {
                        //if the theme is being set to active, we need to make sure all other themes are set to inactive
                        ContactDetails::where('id', '!=', $contactDetails->id)
                            ->update(['is_active' => false]);
                    }),
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
            'index' => Pages\ListContactDetails::route('/'),
            'create' => Pages\CreateContactDetails::route('/create'),
            'edit' => Pages\EditContactDetails::route('/{record}/edit'),
        ];
    }
}
