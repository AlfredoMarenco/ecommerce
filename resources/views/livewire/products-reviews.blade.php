<div>
    <div class="py-6 mt-4">
        <p class="text-lg text-trueGray-700 mb-4 "><span class="font-bold">Reseñas</span> {{ $product->reviews->count() }}</p>

        @foreach ($product->reviews as $review)
            <article class="flex items-center mb-4 text-trueGray-800">
                <figure class="mr-4">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                        src="{{ $review->user->profile_photo_url }}" alt="">
                </figure>
                <div class="bg-trueGray-100 px-4 py-6 flex-1 rounded-lg">
                    <p>
                        <b>{{ $review->user->name }}</b>
                        <i class="fas fa-star text-yellow-400"></i>({{ $review->rating }})
                    </p>
                    {{ $review->comment }}
                </div>
            </article>
        @endforeach
    </div>
</div>
