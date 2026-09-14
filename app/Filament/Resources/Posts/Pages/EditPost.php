<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    private ?string $correctionReason = null;

    private ?string $previousContentHash = null;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->correctionReason = $data['correction_reason'] ?? null;
        $this->previousContentHash = $this->record->content_hash;
        unset($data['correction_reason']);

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->correctionReason && $this->previousContentHash !== $this->record->content_hash) {
            $this->record->corrections()->create([
                'reason' => $this->correctionReason,
                'previous_content_hash' => $this->previousContentHash,
                'corrected_content_hash' => $this->record->content_hash,
                'corrected_at' => now(),
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('approveRevision')
                ->label('Approve current revision')
                ->requiresConfirmation()
                ->modalDescription('This approval is tied to the current content hash and is cleared automatically if the title or body changes.')
                ->action(function (): void {
                    $approvedAt = now();
                    $this->record->update([
                        'editorial_approved_hash' => $this->record->content_hash,
                        'editorial_approved_at' => $approvedAt,
                        'editorial_approval_record_hash' => hash('sha256', implode('|', [
                            'manual',
                            $this->record->id,
                            $this->record->content_hash,
                            auth()->id(),
                            $approvedAt->toIso8601String(),
                        ])),
                    ]);
                }),
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
