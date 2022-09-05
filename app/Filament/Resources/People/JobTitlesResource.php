<?php

namespace App\Filament\Resources\People;

use App\Filament\Resources\People\JobTitlesResource\Pages;
use App\Filament\Resources\People\JobTitlesResource\RelationManagers;
use App\Models\People\JobTitles;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobTitlesResource extends Resource
{
    protected static ?string $model = JobTitles::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([
                Forms\Components\Grid::make()->columns(1)->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
                Forms\Components\FileUpload::make('upload_file_path')
                    ->label('Attachment')
                    ->disk('local')
                    ->directory('public')
                    ->enableDownload(),
                    
                    
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535),
                    
                    ]),
            ]);
            
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageJobTitles::route('/'),
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
