@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 px-0">
            
            <div class="create_cover col-sm-12 mb-4">
                
            </div>
            
                <div class="card-header text-left">{{ __('Create New Meal') }}
                    <hr class="ml-0">
                </div>

                <form action="{{ route('dishes-store') }}" method="POST">
                    @csrf
                    @method('POST')
                    
                        <div class="form-group row mx-0"> 
                    
                            <label for="name" class="col-sm-2 text-left"> Name</label>
                            <input name="name" type="text" class=" col-sm-8 @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 

                        <div class="form-group row mx-0">
                            <label for="desc" class="col-sm-2 text-left"> Description</label>
                            <input name="desc" type="text" class="col-sm-8 @error('desc') is-invalid @enderror">
                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 

                        <div class="form-group row mx-0">
                            <label for="price" class="col-sm-2 text-left"> Price</label>
                            <input type="number" required name="price" min="0" value="0" step=".01" class=" col-sm-2  @error('price') is-invalid @enderror">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="visible" class="col-sm-1 text-left"> Visible:</label>
                            <select name="visible" class=" col-sm-2 @error('visible') is-invalid @enderror">
                                <option value="1" >Si</option>
                                <option value="0">No</option>
                            </select>
                                @error('visible')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input class="btn-gold col-sm-8 offset-sm-2 col-md-2 offset-md-1" type="submit" value="salva">           
                        
                        </div> 

                         
                </form>          
        </div>
    </div>
</div>
@endsection
