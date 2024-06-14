<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThemeResource\Pages;
use App\Filament\Resources\ThemeResource\RelationManagers;
use App\Models\Theme;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThemeResource extends Resource
{
    protected static ?string $model = Theme::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Theme')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required()->minlength(3),
                        Forms\Components\TextInput::make('company_name')->required()->minlength(3),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('images')
                            ->acceptedFileTypes(['image/*'])
                            ->rules('required')
                            ->maxFiles(1)
                            ->imageEditor(),
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Theme Name'),
                Tables\Columns\TextColumn::make('company_name')->label('Company Name'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active')->alignCenter()->sortable()
                    ->beforeStateUpdated(function (Theme $theme) {
                        //if the theme is being set to active, we need to make sure all other themes are set to inactive
                        Theme::where('id', '!=', $theme->id)
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
            'index' => Pages\ListThemes::route('/'),
            'create' => Pages\CreateTheme::route('/create'),
            'edit' => Pages\EditTheme::route('/{record}/edit'),
        ];
    }

    //only show the themes resource if the user is an admin
    public static function canAccess(): bool
    {
        return auth()->user()->isAdmin();
    }

}
