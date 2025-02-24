<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Santri')
                ->color('primary')
                ->icon('heroicon-o-user-plus'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Admin' => Tab::make()->query(fn($query) => $query->where('role', 'admin')),
            'Santri' => Tab::make()->query(fn($query) => $query->where('role', 'student')),
            'Mentor' => Tab::make()->query(fn($query) => $query->where('role', 'teacher')),
            'Leader' => Tab::make()->query(fn($query) => $query->where('role', 'leader')),
        ];
    }
}
