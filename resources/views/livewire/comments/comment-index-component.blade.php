<section class="comments">
    <h2 class="sr-only">
        {{ trans('Comments') }}
    </h2>

    @forelse ($comments as $comment)
        <livewire:comments.comment-show-component
            wire:key="{{ $comment->id }}"
            :comment="$comment"
        />
    @empty
        @include('notifications.none-listed', [
        // TODO: Need to change the text based on the subsite; Ask uses "answers" instead of "comments"
            'records' => 'comments'
        ])
    @endforelse

    @auth
        <h2>
            {{ trans('Add a comment') }}
        </h2>

        <livewire:comments.comment-form-component
            :authorized-user-id="$authorizedUserId"
            :post-id="$post->id"
        />
    @endauth
</section>
