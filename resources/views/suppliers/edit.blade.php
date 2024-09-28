@extends('layouts.tabler')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('suppliers.update', $supplier->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h3 class="card-title">
                                    {{ __('Profile Image') }}
                                </h3> -->

                                <img class="img-account-profile mb-2" src="{{ $supplier->photo ? asset('storage/'.$supplier->photo) : asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />
                                <!-- Profile picture help block -->
                                <div class="small font-italic text-muted mb-2">Formato JPG o PNG, no mayor a 1 MB</div>
                                <!-- Profile picture input -->
                                <input class="form-control form-control-solid mb-2 @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();">
                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h3 class="card-title">
                                        {{ __('Editar proveedor') }}
                                    </h3>
                                </div>

                                <div class="card-actions">
                                    <x-action.close route="{{ route('suppliers.index') }}" />
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row row-cards">
                                    <div class="col-md-12">
                                        <x-input name="name" label="Nombre" :value="old('name', $supplier->name)" :required="true"/>
                                        <x-input name="email" label="Correo electrónico" :value="old('email', $supplier->email)" :required="true"/>
                                        <x-input name="shopname" label="Nombre de tienda" :value="old('shopname', $supplier->shopname)" :required="true"/>
                                        <x-input name="phone" label="Teléfono" :value="old('phone', $supplier->phone)" :required="true"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <label for="type" class="form-label required">
                                            Tipo de proveedor
                                        </label>

                                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                            @foreach(\App\Enums\SupplierType::cases() as $supplierType)
                                            <option value="{{ $supplierType->value }}" @selected(old('type', $supplier->type) == $supplierType->value)>
                                                {{ $supplierType->label() }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <label for="bank_name" class="form-label required">
                                            Nombre de banco
                                        </label>

                                        <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                            <option selected="" disabled="">Elige un banco:</option>
                                            <option value="BAC" @if(old('bank_name') == 'BAC')selected="selected"@endif>BAC</option>
                                            <option value="Industrial" @if(old('bank_name') == 'Industrial')selected="selected"@endif>Industrial</option>
                                            <option value="Promerica" @if(old('bank_name') == 'Promerica')selected="selected"@endif>Promerica</option>
                                            <option value="Banrural" @if(old('bank_name') == 'Banrural')selected="selected"@endif>Banrural</option>
                                            <option value="AZTECA" @if(old('bank_name') == 'Azteca')selected="selected"@endif>Azteca</option>
                                        </select>

                                        @error('bank_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input name="account_holder"
                                                 label="Titular de la cuenta"
                                                 :value="old('account_holder', $supplier->account_holder)"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input name="account_number"
                                                 label="No. de cuenta"
                                                 :value="old('account_number', $supplier->account_number)"
                                        />
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="address" class="form-label required">
                                                {{ __('Dirección ') }}
                                            </label>

                                            <textarea id="address"
                                                      name="address"
                                                      rows="3"
                                                      class="form-control @error('address') is-invalid @enderror"
                                            >{{ old('address', $supplier->address) }}</textarea>

                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <x-button type="submit">
                                    {{ __('Guardar') }}
                                </x-button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce