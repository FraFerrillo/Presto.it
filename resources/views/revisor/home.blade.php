{{-- <div class="card my-3" style="width: 18rem;">
    <img src="https://via.placeholder.com/300x150.png" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$ad->title}}</h5>
        <p class="card-text">{{$ad->body}}</p>
        <h5>{{$ad->price}}</h5>
        <strong>Category:{{$ad->category->name}}</strong><i>{{$ad->created_at}} - {{$user}}</i>
    </div>
</div> --}}

<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Annuncio # {{$ad->id}}</div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><h3>Utente</h3></div>
                            <div class="col-md-10">
                                #{{$ad->user->id}},
                                {{$ad->user->name}},
                                {{$ad->user->email}},
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-2"><h3>Titolo</h3></div>
                            <div class="col-md-10"> {{$ad->title}}</div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-2"><h3>Descrizione</h3></div>
                            <div class="col-md-10">{{$ad->body}}</div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2"><h3>Immagini</h3></div>
                            <div class="col-md-10">
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x150.png" class="rounded" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        ... ... ...
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/300x150.png" class="rounded" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        ... ... ...
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-6">
                                <form action="{{route('revisor.reject', $ad->id)}}" method=POST>
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            </div>
                            <div class="col-md-6 text-end">
                                <form action="{{route('revisor.accept', $ad->id)}}" method=POST>
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>