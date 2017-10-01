@extends("layouts.app")

@section("content")
<ul>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jumbotron">
                    <h1>Usuarios</h1> 
                    <p>Lista de usuarios con los post publicados por cada uno de ellos.</p> 
                </div>
                @foreach($users as $user)
                    <h2 class="text-center">Post de {{ $user->name }}</h2>
                    @if(count($user->posts) > 0)
                        @foreach($user->posts as $indexKey => $post)
                            <div class="well">
                                <p>{{$indexKey + 1}}) <strong>{{ $post->title }}</strong></p>
                                <div class="lean">{{ $post->body}}</div>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <div>No hay post publicados</div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</ul>
@endsection