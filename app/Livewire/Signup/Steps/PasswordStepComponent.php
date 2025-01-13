<?php

declare(strict_types=1);

namespace App\Livewire\Signup\Steps;

use App\Http\Requests\Register\StorePasswordRequest;
use Illuminate\Contracts\View\View;
use Spatie\LivewireWizard\Components\StepComponent;

final class PasswordStepComponent extends StepComponent
{
    public string $password = '';

    public function stepInfo(): array
    {
        return [
            'label' => trans('Password'),
        ];
    }

    protected function rules(): array
    {
        return new StorePasswordRequest()->rules();
    }

    public function submit(): void
    {
        $this->validate();

        $this->nextStep();
    }

    public function render(): View
    {
        return view('livewire.signup.steps.password');
    }
}
