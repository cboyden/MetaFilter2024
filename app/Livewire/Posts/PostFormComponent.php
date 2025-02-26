<?php

declare(strict_types=1);

namespace App\Livewire\Posts;

use App\Http\Requests\Post\StoreMetaFilterPostRequest;
use App\Services\PostService;
use App\Traits\LoggingTrait;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class PostFormComponent extends Component
{
    use LoggingTrait;

    public string $title = '';
    public string $url = '';
    public string $link_text = '';
    public string $body = '';
    public string $more_inside = '';

    private PostService $postService;
    public function boot(PostService $postService): void
    {
        $this->postService = $postService;
    }

    protected function rules(): array
    {
        return new StoreMetaFilterPostRequest()->rules();
    }

    public function render(): View
    {
        return view('livewire.post.post-form-component');
    }

    public function store(): void
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'url' => $this->url ?? null,
            'link_text' => $this->link_text ?? null,
            'body' => $this->body,
            'more_inside' => $this->more_inside ?? null,
        ];

        $post = $this->postService->store($data);

        if ($post) {
            $this->logInfo('Post created');

            session()->flash('message', 'Post created');

            $this->redirect(route('posts.show', $post));
        } else {
            $this->logError('Post creation failed');

            session()->flash('error', 'Post creation failed');
        }
    }
}
