<?php

namespace App\Filament\Resources\People;

use App\Filament\Resources\People\VacanciesResource\Pages;
use App\Filament\Resources\People\VacanciesResource\RelationManagers;
use App\Models\People\Vacancies;
use App\Models\People\JobTitles;
use App\Models\Core\Locations;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VacanciesResource extends Resource
{
    protected static ?string $model = Vacancies::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->columns(1)->schema([
                Forms\Components\Select::make('contact_person')
                    ->options(User::all()->pluck('full_name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('vacancy_location')
                    ->options(Locations::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('job_title')
                    ->options(JobTitles::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('available_vacancies')
                    ->required(),
                Forms\Components\DateTimePicker::make('opening_date'),
                Forms\Components\DateTimePicker::make('closing_date'),
                Forms\Components\Toggle::make('apply_online'),
                Forms\Components\Toggle::make('status'),
                Forms\Components\TextInput::make('external_code')
                    ->maxLength(255),
                
                
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
           
               
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('job_title_name'),
                Tables\Columns\TextColumn::make('contact_name'),
                Tables\Columns\TextColumn::make('location_name'),
                
                Tables\Columns\TextColumn::make('available_vacancies'),
                Tables\Columns\BooleanColumn::make('status'),
                Tables\Columns\BooleanColumn::make('apply_online'),
               
                Tables\Columns\TextColumn::make('closing_date')
                    ->dateTime(),
               
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListVacancies::route('/'),
            'create' => Pages\CreateVacancies::route('/create'),
            'edit' => Pages\EditVacancies::route('/{record}/edit'),
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
