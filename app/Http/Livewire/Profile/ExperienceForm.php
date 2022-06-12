<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Collection;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\HasManyRepeater;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\Forms\Concerns\InteractsWithForms;

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Profile $profile;

    public null|array $experiences;

    public function mount(Profile $profile): void
    {
        $this->form->fill([
            'experiences' => $profile->experiences?->toArray()
        ]);
    }

    protected function getFormModel(): Profile
    {
        return $this->profile;
    }

    protected function getFormSchema(): array
    {
        return [
            HasManyRepeater::make('experiences')
                ->schema([
                    BelongsToSelect::make('job_title_id')
                        ->relationship('jobTitle', 'name')
                        ->searchable('name')
                        ->preload()
                        ->required(),
                    BelongsToSelect::make('company_id')
                        ->relationship('company', 'name')
                        ->searchable('name')
                        ->preload()
                        ->required(),
                    TextInput::make('description'),
                    Checkbox::make('current')
                        ->reactive()
                        ->nullable(),
                    DatePicker::make('started_at')
                        ->required(),
                    DatePicker::make('finished_at')->hidden(fn ($get) => $get('current')),
                ])
        ];
    }

    public function submit(): void
    {
        $this->profile->update(
            $this->form->getState(),
        );
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
