<?php

namespace App\Forms\Components;

use App\Models\EducationStage;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;



class EducationStageSelect extends Select
{


    public static function make(string $name): static
    {
        return parent::make($name)
            ->label('Education Stage')
            ->prefixIcon('heroicon-o-bookmark')
            ->prefixIconColor('primary')
            ->searchable()
            ->native(false)
            ->options(fn() => EducationStage::all()->pluck('name', 'id'))
            ->createOptionForm([
                TextInput::make('name')
                    ->required()
                    ->prefixIcon('heroicon-o-bookmark')
                    ->prefixIconColor('primary'),
                Textarea::make('description'),
                DatePicker::make('start_date')
                    ->native(false)
                    ->prefixIcon('heroicon-o-calendar-days')
                    ->prefixIconColor('primary'),
                DatePicker::make('end_date')
                    ->native(false)
                    ->prefixIcon('heroicon-o-calendar-days')
                    ->prefixIconColor('primary')
            ])
            ->createOptionUsing(function (array $data) {

                $resultInput = EducationStage::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'start_date' => $data['start_date'],
                    'end_date' => $data['end_date'],
                ]);

                return $resultInput->id;
            });
    }
}
