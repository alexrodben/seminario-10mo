@extends('layouts.tabler')

@section('content')
<div class="page-body">
    @if(!$purchases)
    <x-empty
        title="Compras no encontradas"
        message="Intenta ajustar tu búsqueda o filtro para encontrar lo que estás buscando."
        button_label="{{ __('Agrega tu primera compra') }}"
        button_route="{{ route('purchases.create') }}"
    />
    @else
    <div class="container-xl">
        @livewire('tables.purchase-table')
    @endif
</div>
@endsection
