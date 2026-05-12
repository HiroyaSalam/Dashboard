<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('registration_id')
                    ->relationship('registration', 'id')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_bayar')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_bayar')
                    ->required(),
                Forms\Components\Select::make('status_pembayaran')
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Lunas' => 'Lunas',
                        'Gagal' => 'Gagal',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('bukti_pembayaran')
                    ->image()
                    ->directory('bukti-pembayaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration.id'),
                Tables\Columns\TextColumn::make('jumlah_bayar'),
                Tables\Columns\TextColumn::make('tanggal_bayar')
                    ->date(),
                Tables\Columns\TextColumn::make('status_pembayaran'),
                Tables\Columns\ImageColumn::make('bukti_pembayaran'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }    
}
