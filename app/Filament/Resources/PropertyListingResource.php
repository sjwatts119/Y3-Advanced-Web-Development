<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyListingResource\Pages;
use App\Filament\Resources\PropertyListingResource\RelationManagers;
use App\Models\PropertyListing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PropertyListingResource extends Resource
{
    protected static ?string $model = PropertyListing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->minlength(3),
                Forms\Components\TextInput::make('slug')->required()->minlength(3),
                Forms\Components\RichEditor::make('description')->required()->minlength(3),
                Forms\Components\TextInput::make('sleeps')->required()->numeric()->minlength(1),
                Forms\Components\TextInput::make('location')->required()->minlength(3),
                //we need an array of attributes for: Single Story, Multistory, Beach, Disability friendly, Family Friendly, Dog/Pets Allowed, Parking, Pool, Garden
                Forms\Components\Checkbox::make('attributes.Multi Story'),
                Forms\Components\Checkbox::make('attributes.Beach Nearby'),
                Forms\Components\Checkbox::make('attributes.Disability Friendly'),
                Forms\Components\Checkbox::make('attributes.Family Friendly'),
                Forms\Components\Checkbox::make('attributes.Pets Allowed'),
                Forms\Components\Checkbox::make('attributes.Parking'),
                Forms\Components\Checkbox::make('attributes.Pool'),
                Forms\Components\Checkbox::make('attributes.Garden'),
                //make a hidden field so we can store the user_id and fill it with the current user
                Forms\Components\Hidden::make('user_id')
                ->dehydrateStateUsing(function ($state) {
                    return Auth::id();
                }),
                Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                    ->acceptedFileTypes(['image/*'])
                    ->rules('required')
                    ->maxFiles(10)
                    ->optimize('webp')
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                //Show the user's name instead of the user_id
                Tables\Columns\TextColumn::make('user.name')->label('Created by'),
            ])
            ->filters([
                //add a filter showing deleted records
                Tables\Filters\TrashedFilter::make('Deleted'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPropertyListings::route('/'),
            'create' => Pages\CreatePropertyListing::route('/create'),
            'edit' => Pages\EditPropertyListing::route('/{record}/edit'),
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
