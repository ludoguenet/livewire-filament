<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms;

    public function mount(User $user): void
    {
        $this->uuid = $user->profile->uuid;
        $this->experiences = $user->profile->experiences;
    }

    protected function getFormSchema(): array
    {
        return [
            Repeater::make('members')
            ->schema([
                TextInput::make('name')->required(),
                Select::make('role')
                    ->options([
                        'member' => 'Member',
                        'administrator' => 'Administrator',
                        'owner' => 'Owner',
                    ])
                    ->required(),
            ])
            ->columns(2)
        ];
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    {{ $this->form }}

                    <button
                        type="submit"
                        class="mt-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Submit
                    </button>
                </form>
            </div>
        blade;
    }
}
