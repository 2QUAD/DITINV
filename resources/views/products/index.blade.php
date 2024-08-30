@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if (!$products)
            <x-empty title="Nenhum produto encontrado" message="Tente ajustar sua busca ou filtro para encontrar o que você está procurando.."
                button_label="{{ __('Novo Produto') }}" button_route="{{ route('products.create') }}" />

            <div style="text-center" style="padding-top:-25px">
                <center>
                    <a href="{{ route('products.import.view') }}" class="">
                        {{ __('Importar Produtos') }}
                    </a>
                </center>
            </div>
        @else
            <div class="container-xl">
                <x-alert />
                @livewire('tables.product-table')
            </div>
        @endif
    </div>
@endsection
