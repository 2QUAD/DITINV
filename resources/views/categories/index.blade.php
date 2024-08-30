@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        @if (!$categories)
            <x-empty title="Nenhuma categoria encontrada"
                message="Tente ajustar sua pesquisa ou filtro para encontrar o que está procurando."
                button_label="{{ __('Adicione sua primeira Categoria') }}" button_route="{{ route('categories.create') }}" />
        @else
            <div class="container-xl">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h3 class="mb-1">Sucesso</h3>
                        <p>{{ session('success') }}</p>

                        <a class="btn-close" data-bs-dismiss="alert" aria-label="fechar"></a>
                    </div>
                @endif
                @livewire('tables.category-table')
            </div>
        @endif
    </div>
@endsection
