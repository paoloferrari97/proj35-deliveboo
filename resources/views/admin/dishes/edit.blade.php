@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Modifica il tuo piatto!</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="nameHelperr" placeholder="Modifica il nome del piatto" value="{{$dish->name}}" requiredminlength="5" maxlength="255" />
                <small id="nameHelperr" class="form-text text-muted">Inserisci il nome del piatto! (max 255 caratteri)</small>
            </div>

            <div class="form-group">
                <div>
                    <label for="price">Price</label>
                </div>
                <input type="number" step="0.01" class="@error('price') is-invalid @enderror" name="price" id="price" aria-describedby="priceHelperr" placeholder="Modifica il prezzo" value="{{$dish->price}}" requiredminlength="5" maxlength="255" />
                <small id="priceHelperr" class="form-text text-muted">Inserisci il prezzo del piatto!</small>
            </div>

            <div class="form-group d-flex align-items-start flex-column">
                <label for="is_visible">Is Visible</label>

                <div class="form-check">
                    <input class="form-check-input @error('is_visible') is-invalid @enderror" type="radio" name="is_visible" id="true" value="1" {{$dish->is_visible ? 'checked' : ''}}>
                    <label class="form-check-label" for="true">
                      Visibile
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input @error('is_visible') is-invalid @enderror" type="radio" name="is_visible" id="false" value="0" {{$dish->is_visible ? '' : 'checked'}}>
                    <label class="form-check-label" for="false">
                      Not visible
                    </label>
                  </div>

                <small id="is_visibleHelperr" class="form-text text-muted">Seleziona se il tuo piatto è visibile o meno!</small>
            </div>

            <div class="form-group">
                <div>   
                    <label for="image">Image</label>
                </div>
                <input type="file" class="@error('image') is-invalid @enderror" name="image" id="image" aria-describedby="imageHelperr" placeholder="Modifica l'immagine" {{-- value="{{ old('image') }}" --}} />
                <small id="imageHelperr" class="form-text text-muted">Inserisci un'immagine del piatto! (max 50 KB)</small>
                <img src="{{asset('storage/' . $dish->image)}}" alt="{{$dish->name}}" width="200">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea required class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5">{{$dish->description}}</textarea>
            </div>
            
            {{-- <div class="form-group">
                <label for="tags">Tags</label>
                <select class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="tags" multiple>
                    metto tags[] perchè mi serve array (posso scegliere più di un tag per post)
                    <option value="" disabled>Seleziona un tag</option>
                    @if ($tags)
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection