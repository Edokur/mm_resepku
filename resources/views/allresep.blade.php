<x-app-layout>
    <x-slot name="header">
        <div class="container">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <h4>Resep Gratis</h4>
            
            <div class="row ">
                @foreach ($resep as $item)
                <div class="col-4 mb-4">
                    <div class="card h-100">
                        <img src="../image/{{ $item->photo }}" class="card-img-top" width="100%" height="50%">
                        <div class="card-body">
                            <a href="/detail/{{ $item->id }}"><h5 class="card-title text-decoration-none">{{ $item->judul }}</h5></a>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                            <button class="btn btn-secondary btn-lg btn-block">Suka</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>