<form method="POST" action="{{ route($loginCreateRoute) }}">
    @include('forms.partials.csrf-token')

    <fieldset>

        @include('forms.partials.validation-summary')
        @include('forms.partials.required-fields-note')

        <x-forms.input
            name="username"
            type="text"
            :autofocus="true"
            :required="true"
            label="{{ trans('Username') }}" />

        <x-forms.input
            name="password"
            type="password"
            :required="true"
            label="{{ trans('Password') }}" />

        <x-forms.field>
            <button type="submit" class="button primary-button">
                {{ trans('Log In') }}
            </button>
        </x-forms.field>

        <p>
            {!! trans('Don&rsquo;t have an account?') !!}
            <a href="{{ route($signupCreateRoute) }}">
                {{ trans('Sign up here') }}
            </a>
        </p>
        {{--
        TODO: Fix errors on forgot password page
        <p>
            <a href="{{ route($forgotPasswordRoute) }}">
                {{ trans('Forgot your password?') }}
            </a>
        </p>
        --}}
        <p>
            {{ trans('Need help?') }}
            <a href="{{ route($contactMessageRoute) }}">
                {{ trans('Contact the admins.') }}
            </a>
        </p>
    </fieldset>
</form>
