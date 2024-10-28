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


                                    <img class="img-account-profile mb-2"
                                        src="{{ $supplier->photo ? asset('storage/' . $supplier->photo) : asset('assets/img/demo/user-placeholder.svg') }}"
                                        alt="" id="image-preview" />

                                    <!-- <div class="small font-italic text-muted mb-2">Formato JPG o PNG, no mayor a 1 MB</div>
                                                Profile picture input
                                                <input class="form-control form-control-solid mb-2 @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();"> -->
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
                                            {{ __('Editar donador') }}
                                        </h3>
                                    </div>

                                    <div class="card-actions">
                                        <x-action.close route="{{ route('suppliers.index') }}" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <x-input name="name" label="Nombre" :value="old('name', $supplier->name)" :required="true" />
                                            <x-input name="email" label="Correo electrónico" :value="old('email', $supplier->email)" />
                                            <x-input name="phone" label="Teléfono" :value="old('phone', $supplier->phone)" :required="true" />
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="notes" class="form-label required">
                                                    {{ __('Notas ') }}
                                                </label>

                                                <textarea id="notes" name="notes" rows="3" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $supplier->notes) }}</textarea>

                                                @error('notes')
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
