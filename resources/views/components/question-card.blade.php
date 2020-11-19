<div class="card card-body">
    <a href="{{ route('questions.show', $question) }}">
        {{ $question->title }}
    </a>

    <div class="d-flex align-items-center mt-3">
        <div class="badge badge-secondary mr-3">
            {{ $question->category->name }}
        </div>

        <small class="text-muted">
            {{ $question->created_at->diffForHumans() }}
        </small>
    </div>

</div>
