<x-layout>
    <div class="container mb-5">
        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-12 col-md-4 justify-content-center align-items-center d-flex flex-wrap mt-5">
                    <div class="p-2">
                        <div class="text-center">
                            @if(Auth::user())
                                <form action="{{route('revisor.undo', $ad->id)}}" method=POST>
                                @csrf
                                <button type="submit" class="btn btn-lr">Revisiona</button>
                                </form>
                            @endif
                        </div>
                        @if ($ad->images->count())
                        <x-_ad
                            image="{{$ad->images->getUrl(300, 150)}}"
                            title="{{$ad->title}}"
                            body="{{$ad->body}}"
                            href="{{route('public.ads.category',[$ad->category->name,$ad->category->id])}}"
                            category="{{$ad->category->name}}"
                            date="{{$ad->created_at->format('d/m/Y')}}"
                            user="{{$ad->user->name}}"
                            price="{{$ad->price}}"
                            link="{{route('ads.show', compact('ad'))}}"
                        />
                        @else                        
                        <x-_ad
                        image="https://via.placeholder.com/150/300"
                        title="{{$ad->title}}"
                        body="{{$ad->body}}"
                        href="{{route('public.ads.category',[$ad->category->name,$ad->category->id])}}"
                        category="{{$ad->category->name}}"
                        date="{{$ad->created_at->format('d/m/Y')}}"
                        user="{{$ad->user->name}}"
                        price="{{$ad->price}}"
                        link="{{route('ads.show', compact('ad'))}}"
                        />
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-7 offset-md-5">
            {{$ads->links()}}
        </div>
    </div>
</x-layout>


