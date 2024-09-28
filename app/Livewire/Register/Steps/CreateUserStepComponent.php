<?php

declare(strict_types=1);

namespace App\Livewire\Register\Steps;

use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Contracts\View\View;
use Spatie\LivewireWizard\Components\StepComponent;

final class CreateUserStepComponent extends StepComponent
{
    public function stepInfo(): array
    {
        return [
            'label' => 'User Info',
        ];
    }

    protected function rules(): array
    {
        return (new StoreUserRequest())->rules();
    }

    public function submit(): void
    {
        $this->validate();

        $this->nextStep();
    }

    public function render(): View
    {
        return view('livewire.register.steps.create-user');
    }
}
