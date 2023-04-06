<div class="container-fluid">
    <div class="my-4">
        <div class="form-action row g-3 justify-content-center">
            <div class="col-sm-12 col-md-6">
                <input wire:model="search" type="text" name="" class="form-control" placeholder="Search...">
            </div>
        </div>
    </div>
    
    <div class="row" data-masonry='{"percentPosition": true }'>
        @foreach ($posts as $post)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card m-3 border-0 shadow-sm" style="">
                    <div class="card-body">
                        <p class="m-0 text-muted">{{ $post->date }}</p>
                        <a href="{{route('blog.show',[$post->category->slug, $post->id, $post->slug])}}" class="text-decoration-none link-dark">
                            <h4 class="fw-bold">{{ $post->title }}</h4>
                        </a>
                        <div class="d-flex mb-1 gap-2 align-items-center">
                            <a href="{{route('blog.category', $post->category->slug)}}" class="fw-bold m-0 text-primary text-decoration-none">
                                {{ $post->category->category }}
                            </a> 
                            <a href="{{route('blog.show',[$post->category->slug, $post->id, $post->slug])}}" class="ms-auto my-0 btn btn-outline-secondary btn-sm">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container-fluid">
        {{ $posts->links() }}
    </div>
</div>