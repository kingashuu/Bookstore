@props(['comment'])
{{-- <div>

    <ol class="commentlist"> --}}

        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1  shadow p-3 mb-5 rounded" id="li-comment-20 " style="background-color: #fcfcfc;border 1px #fcfcfc solid;" >
            <div id="comment-20" class="comment_container p-3">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="rounded-circle" width="50" height="50" src="{{ $comment->user->profile_photo_url }}"
                        alt="{{ $comment->user->name }}" />
                @else
                    {{ $comment->user->name }}

                    <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                @endif

                <div class="comment-text">
                    {{-- <div class="star-rating">
                        <span class="width-80-percent">Rated <strong class="rating">5</strong> out of
                            5</span>
                    </div> --}}
                    <p class="meta">
                        <strong class="woocommerce-review__author">{{$comment->user->name}}</strong>
                        <br>
                        <span class="woocommerce-review__dash">Posted</span>
                        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00">{{$comment->created_at}}</time>
                    </p>
                    <div class="description">
                        <p>{{$comment->body}}
                        </p>
                    </div>
                </div>
            </div>
        </li>
    {{-- </ol>
</div> --}}
