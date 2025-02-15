<article class="comment">
    {{ $comment->text }}

    <footer class="comment-footer">
        @include('posts.partials.profile-link', [
            'userId' => $comment->user->id,
            'username' => $comment->user->username,
        ])

        @include('comments.partials.comment-created-at-time', [
            'comment' => $comment,
        ])

        @auth
            <button
                class="button footer-button"
                wire:click.prevent="toggleReplying()"
                aria-controls="comment-reply-form-{{ $comment->id }}"
                aria-expanded="{{ $this->isReplying ? 'true' : 'false' }}">
                <x-icons.icon-component filename="reply-fill" />
                {{ trans('reply') }}
            </button>

            <button
                class="button footer-button"
                wire:click.prevent="toggleEditing()"
                aria-controls="edit-comment-form-{{ $comment->id }}"
                aria-expanded="{{ $this->isEditing ? 'true' : 'false' }}">
                <x-icons.icon-component filename="pencil-square" />
                {{ trans('Edit') }}
            </button>
            @can('edit-comment', $comment)
            @endcan

            @auth
                @if ($userFavorited === true)
                    <button
                        class="button footer-button"
                        title="{{ trans('Remove favorite') }}">
                        <span class="icon">
                            <x-icons.icon-component filename="{{ $favoriteIconFilename }}" />
                        </span>
                        {{ $favoriteCount }}
                    </button>
                @else
                    <button class="button footer-button">
                        <x-icons.icon-component filename="{{ $favoriteIconFilename }}" />
                        {{ $favoriteCount }}
                    </button>
                @endif

                @if ($userFlagged === true)
                    <button
                        class="button footer-button"
                        title="{{ trans('Remove flag') }}">
                        <x-icons.icon-component filename="{{ $flagIconFilename  }}" />
                        {{ $flagCount }}
                    </button>
                @else
                    <button
                        class="button footer-button"
                        wire:click="toggleFlagging()"
                        aria-controls="flag-comment-form-{{ $comment->id }}"
                        aria-expanded="{{ $this->isFlagging ? 'true' : 'false' }}">
                        <x-icons.icon-component filename="{{ $flagIconFilename }}" />
                    </button>
                @endif
            @endauth
        @endauth

        @guest
            <button disabled="disabled" class="button">
                <span class="icon">
                    <x-icons.icon-component filename="flag" />
                </span>
                {{ $flagCount }}
            </button>
        @endguest

    @if ($isEditing === true)
        <livewire:comments.comment-form-component
            wire:key="'edit-comment-' . $comment->id"
            :authorized-user-id="$authorizedUserId"
            :post-id="$comment->post_id"
            :comment="$comment"
            button-text="{{ trans('Update') }}"
            is-editing="true"
        />
    @endif

    @if ($isReplying === true)
        <livewire:comments.comment-form-component
            wire:key="'reply-to-comment-' . $comment->id"
            :authorized-user-id="$authorizedUserId"
            :post-id="$comment->post_id"
            :parent-id="$comment->id"
            is-replying="true"
        />
    @endif

    @if ($isFlagging === true)
        <livewire:flags.flag-component
            wire:key="'reply-to-comment-' . $comment->id"
            :comment-id="$comment->id"
            :model="$comment"
            is-flagging="true"
        />
    @endif
</article>
