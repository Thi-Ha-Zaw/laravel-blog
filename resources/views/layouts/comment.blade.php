<div id="comments-container">

    {{-- for displaying comment --}}

    @forelse ($article->comments()->whereNull("parent_id")->latest("id")->with('user')->get() as $comment)
        <div class="card mb-3" id="comment-{{ $comment->id }}">
            <div class="card-body">
                <i class=" bi bi-chat-text-fill fs-5 me-2"></i><span>{{ $comment->content }}</span>
                <div class="">
                    <span class=" badge bg-black"> <i class=" bi bi-person"></i> {{ $comment->user->name }}</span>
                    <span class=" badge bg-black"> <i
                            class=" bi bi-clock"></i>{{ $comment->created_at->diffForHumans() }}</span>
                    @can('delete', $comment)
                        <form action="{{ route('comment.destroy', $comment->id) }}" class=" d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button class=" badge bg-black border-0">
                                <i class=" bi bi-trash3"></i>
                                delete
                            </button>
                        </form>
                    @endcan

                    {{-- for displaying replying box --}}


                    @auth

                        <span role="button" class=" user-select-none badge bg-black reply-btn "
                            data-comment-id="{{ $comment->id }}">
                            <i class=" bi bi-reply pe-none"></i>
                            Reply
                        </span>

                        <form action="{{ route('comment.store') }}" class=" mt-2 d-none ms-4 reply-form "
                            data-parent-id="{{ $comment->id }}" method="post">
                            @csrf
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea name="content" rows="2" class=" form-control"
                                placeholder=" replying comment {{ $comment->user->name }}'s comment"></textarea>
                            <div class=" d-flex justify-content-between align-items-start mt-2">
                                <p class=" mb-0">Replying as {{ Auth::user()->name }}</p>
                                <button class=" btn btn-sm btn-dark px-4">Reply</button>
                            </div>
                        </form>

                    @endauth
                </div>

                {{-- for displaying replies --}}

                <div class="replies-container">
                    @foreach ($comment->replies()->latest('id')->get() as $reply)
                        <div class="card mt-2 ms-4" id="reply-{{ $reply->id }}">
                            <div class="card-body">
                                <i class=" bi bi-reply me-2"></i><span>{{ $reply->content }}</span>
                                <div class="">
                                    <span class=" badge bg-black"> <i class=" bi bi-person"></i>
                                        {{ $reply->user->name }}</span>
                                    <span class=" badge bg-black"> <i
                                            class=" bi bi-clock"></i>{{ $reply->created_at->diffForHumans() }}</span>
                                    @can('delete', $reply)
                                        <form action="{{ route('comment.destroy', $reply->id) }}" class=" d-inline-block"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class=" badge bg-black border-0">
                                                <i class=" bi bi-trash3"></i>
                                                delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <div class="card mb-3" id="emptyreply">
            <div class="card-body text-center">
                <p>There is on comment yet!</p>
            </div>
        </div>
    @endforelse
</div>

@vite(['resources/js/reply.js','resources/js/comment.js'])
