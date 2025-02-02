<form>
    @include('forms.partials.validation-summary')
    @include('forms.partials.csrf-token')
    <fieldset>
        <h2>Make your $5 (USD) payment</h2>

        <p>
            Your membership will be enabled once payment is complete, and in a few minutes
            you&rsquo;ll be able to log in and comment on MetaFilter and the other sites.
        </p>

        <div class="level buttons">
            <button class="button primary-button" wire:click="payWithPayPal()">
                <span class="icon">
                    <img src="{{ asset('images/icons/paypal.svg') }}" alt="">
                </span>
                Pay $5 via PayPal
            </button>

            <button class="button primary-button" wire:click="payWithStripe()">
                <span class="icon">
                    <img src="{{ asset('images/icons/stripe.svg') }}" alt="">
                </span>
                Pay $5 via Stripe
            </button>
        </div>

        <small>
            If the $5 payment is a financial or logistical hardship, that&rsquo;s okay:
            <a href="#">let us know</a> and we can waive the fee for you.
        </small>
    </fieldset>
</form>
