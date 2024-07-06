<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Mail\BookingApproved;
use App\Mail\BookingRejected;
use App\Models\Booking;
use App\Models\PropertyListing;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Mail;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'User';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Booking Details')->columns(2)->schema([
                    Infolists\Components\TextEntry::make('property_listing_id'),
                    Infolists\Components\TextEntry::make('user_name'),
                    Infolists\Components\TextEntry::make('user_email'),
                    Infolists\Components\TextEntry::make('user_phone_number'),
                    Infolists\Components\TextEntry::make('start_date'),
                    Infolists\Components\TextEntry::make('end_date'),
                    Infolists\Components\TextEntry::make('message')->columnSpan(2),
                    Infolists\Components\Actions::make([
                        Infolists\Components\Actions\Action::make('Approve')
                            ->icon('heroicon-s-check')
                            ->color('success')
                            ->action(function (Booking $booking) {
                                $booking->status = 'approved';
                                $booking->save();
                                $propertyName = PropertyListing::find($booking->property_listing_id)->name ?? 'Property Not Found';
                                try {
                                    Mail::to($booking->user_email)->send(new BookingApproved($booking, $propertyName));
                                    Notification::make()
                                        ->title('Booking Approved! User Notified by Email')
                                        ->success()
                                        ->send();
                                } catch (\Exception $e) {
                                    //we should display a livewire alert to warn the user the mail couldn't be sent
                                    Notification::make()
                                        ->title('Booking Approved, Email to User Failed to Send')
                                        ->danger()
                                        ->send();
                                }
                            })
                            ->visible(fn (Booking $booking) => $booking->status !== 'approved'),
                        Infolists\Components\Actions\Action::make('Reject')
                            ->icon('heroicon-s-x-mark')
                            ->color('danger')
                            ->action(function (Booking $booking) {
                                $booking->status = 'rejected';
                                $booking->save();
                                $propertyName = PropertyListing::find($booking->property_listing_id)->name ?? 'Property Not Found';
                                try {
                                    Mail::to($booking->user_email)->send(new BookingRejected($booking, $propertyName));
                                    Notification::make()
                                        ->title('Booking Rejected! User Notified by Email')
                                        ->success()
                                        ->send();
                                } catch (\Exception $e) {
                                    //we should display a livewire alert to warn the user the mail couldn't be sent
                                    Notification::make()
                                        ->title('Booking Rejected, Email to User Failed to Send')
                                        ->danger()
                                        ->send();
                                }
                            })
                            ->visible(fn (Booking $booking) => $booking->status !== 'rejected'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //we should have the following columns:
                //Property Name, User Name, Start to End Date, Current Status
                Tables\Columns\TextColumn::make('property_listing_id')
                    ->label('Property')
                    ->formatStateUsing(function (Booking $value) {
                        return PropertyListing::class::find($value->property_listing_id)->name ?? 'Property Not Found';
                    }),
                Tables\Columns\TextColumn::make('user_name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Start to End Date')
                    ->formatStateUsing(function (Booking $value) {return $value->start_date . ' - ' . $value->end_date;})
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Request Date')
                    ->formatStateUsing(function(Booking $value) {return $value->created_at->format('d/m/Y');})
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'requested' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Manage'),
            ])
            ->bulkActions([

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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
