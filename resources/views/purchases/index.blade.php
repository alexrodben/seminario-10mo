@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if (!$purchases)
            <x-empty title="Entradas no encontradas"
                message="Intenta ajustar tu búsqueda o filtro para encontrar lo que estás buscando."
                button_label="{{ __('Agregar primera entrada') }}" button_route="{{ route('purchases.create') }}" />
        @else
            <div class="container-xl">
                @livewire('tables.purchase-table')
        @endif
    </div>
@endsection
