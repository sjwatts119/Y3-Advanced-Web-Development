<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'User';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Message Details')->columns(2)->schema([
                    Infolists\Components\TextEntry::make('email'),
                    Infolists\Components\TextEntry::make('phone'),
                    Infolists\Components\TextEntry::make('subject'),
                    Infolists\Components\TextEntry::make('message')->columnSpan(2),
                    Infolists\Components\TextEntry::make('status'),
                    Infolists\Components\Actions::make([
                        Infolists\Components\Actions\Action::make('Mark as Closed')
                            ->icon('heroicon-s-x-mark')
                            ->color('danger')
                            ->action(function (Message $message) {
                                $message->status = 'closed';
                                $message->save();
                                //MAIL EVENT TODO
                            })->visible(fn (Message $message) => $message->status !== 'closed'),

                        Infolists\Components\Actions\Action::make('Mark as Open')
                            ->icon('heroicon-s-check')
                            ->color('success')
                            ->action(function (Message $message) {
                                $message->status = 'open';
                                $message->save();
                                //MAIL EVENT TODO
                            })->visible(fn (Message $message) => $message->status !== 'open'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //we should show the subject, date sent, and current status of the message
                Tables\Columns\TextColumn::make('subject'),
                Tables\Columns\TextColumn::make('created_at')->date()->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'success',
                        'open' => 'warning',
                        'closed' => 'gray',
                        default => 'danger',
                    })
                    ->formatStateUsing(
                        function (Message $value) {
                            //capitalize the first letter of the status
                            return ucfirst($value->status);
                        }
                    )
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->mutateRecordDataUsing(function (array $data, Message $record) {
                    //if the message is new, we should mark it as open
                    if($record->status === 'new'){
                        $record->status = 'open';
                        $record->save();
                    }
                    return $data;
                })
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
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
