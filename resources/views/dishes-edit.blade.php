@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{ route('dishes-update', $dish -> id) }}" method="POST">

                @csrf
                @method('POST')

                <label for="name"> Nome</label>
                <input name="name" type="text" class="@error('name') is-invalid @enderror" value="{{ $dish -> name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                <br>
                <label for="desc"> Desc</label>
                <input name="desc" type="text" class="@error('desc') is-invalid @enderror" value="{{ $dish -> desc }}">
                    @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <br>
                <label for="price"> Price</label>
                {{-- <input name="price" type="text"> --}}
                <input type="number" required name="price" min="0" step=".01" class="@error('price') is-invalid @enderror" value="{{ $dish -> price / 100 }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <br>
                <select name="visible" class="@error('visible') is-invalid @enderror">
                    <option value="1" >Si</option>
                    <option value="0">No</option>

                </select>

                @error('visible')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                

                <br>
                <input type="submit" value="salva">

            </form>
            
        </div>
    </div>
</div>
@endsection