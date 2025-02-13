<span class="icon">
    @if (isset($iconPath))
        [
        @if (!empty($titleText))
            <img
                src="{{ asset($iconPath) }}"
                alt="{{ $altText }}"
                title="{{ $titleText }}">
        @else
            <img
                src="{{ asset($iconPath) }}"
                alt="{{ $altText }}">
        @endif
        ]
    @else
        iconPath is not set
    @endif
</span>
