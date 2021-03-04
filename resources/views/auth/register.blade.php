@extends('layouts.app')

@section('content')
<div class="container registerContainer col-md-10 col-md-12 ">
    <div class="row justify-content-center ">
        <div  class="col-sm-8 col-md-6">
            <div class="card">
                <div class="card-header text-left">{{ __('Company Info') }}
                    <hr class="ml-0">
                </div>
                
                

                <div class="card-body">
                    <form  method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- -------------- COMPANY NAME ---------------- --}}
                        <div class="form-group row">
                            <label for="company_name" class=" col-xl-2 offset-xl-0 col-form-label text-xl-right">{{ __('Company Name') }}</label>

                            <div class=" col-xl-8">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- -------------- ADDRESS ---------------- --}}
                        <div class="form-group row">
                            <label for="address" class="col-xl-2 offset-xl-0 col-form-label text-xl-right">{{ __('Address') }}</label>

                            <div class="col-xl-8">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        
                        {{-- -------------- VAT  PHONE & OPENING ---------------- --}}
                        <div class="form-group row">

                            <div class="form-group col-xl-4 ">
                                
                                {{-- -------------- VAT ---------------- --}}
                                <div class="form-group row ">

                                    <label for="vat" class="col-xl-6   col-form-label text-xl-right">{{ __('VAT') }}</label>
                                    
                                    <div class="col-xl-6">
                                        <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat" maxlength="11" autofocus>
    
                                        @error('vat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                {{-- -------------- PHONE ---------------- --}}
                                <div class="form-group row ">

                                    <label for="phone_number" class="col-xl-6  col-form-label text-xl-right">{{ __('Phone') }}</label>

                                    <div class="col-xl-6">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" maxlength="20" autofocus>

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            {{-- -------------- OPENING INFO ---------------- --}}
                            <div class="form-group col-xl-8 ">

                                <div class="form-group row ">
                                    <label for="opening_info" class="col-xl-3 col-form-label text-xl-right">{{ __('Opening hours') }}</label>

                                    <div class="col-xl-6">
                                    
                                        <textarea 
                                            id="opening_hours" name="opening_info" class="form-control @error('opening_info') is-invalid @enderror" 
                                            value="{{ old('opening_info') }}" required autocomplete="opening_info" autofocus cols="20" rows="4">
                                        </textarea>

                                        @error('opening_info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>

                        {{-- -------------- USER INFO ----------------  --}}
                        <div class="card-headerRegister text-left">{{ __('User Info') }}
                        
                            <hr class="ml-0">
                            
                        </div>

                        

                        {{-- -------------- WEBSITE ----------------  --}}
                        <div class="form-group row mt-3">
                            <label for="website" class="col-xl-4 col-form-label text-xl-right">{{ __('Website') }}</label>

                            <div class="col-xl-4 ">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website" autofocus>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- -------------- EMAIL ----------------  --}}
                        <div class="form-group row">
                            <label for="email" class="col-xl-4 col-form-label text-xl-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-xl-4 ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- -------------- PASSWORD ----------------  --}}
                        <div class="form-group row">
                            <label for="password" class="col-xl-4 col-form-label text-xl-right">{{ __('Password') }}</label>

                            <div class="col-xl-4 ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- -------------- CONFIRM PASSWORD ----------------  --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-xl-4 col-form-label text-xl-right">{{ __('Confirm Password') }}</label>

                            <div class="col-xl-4 ">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div> --}}

                        {{-- -------------- REGISTER----------------  --}}

                        <div class="form-group row mb-0">
                            <div class="col-sm-12 col-md-12  col-lg-12  col-xl-4 offset-xl-4 ">
                                <button type="submit" class="btn btn-outline-light btn-block registerBtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
