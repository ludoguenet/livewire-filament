<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;

class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms;

    public string $uuid;
    public null|string $bio = null;

    public function mount(User $user): void
    {
        $this->uuid = $user->profile->uuid;
        $this->bio = $user->profile->bio;
    }

    protected function getFormSchema(): array
    {
        return [
            MarkdownEditor::make('bio')->required(),
        ];
    }

    public function submit(): void
    {
        $this->validate();

        Profile::query()
            ->where('uuid', $this->uuid)
            ->update(['bio' => $this->bio]);
    }

    protected function rules(): array
    {
        return [
            'bio' => [
                'nullable',
                'string',
            ]
        ];
    }

    public function render(): string
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
