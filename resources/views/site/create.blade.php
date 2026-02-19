@extends('principal')

@section('conteudo')
    <div class="container">
        <h4 class="mb-4">Novo contato</h4>
        <form action="{{ route('lista_contato.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <input type="file" name="capa" class="form-control"/>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome"/>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email"/>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="contato" class="form-control" id="contato" placeholder="Contato"/>
            </div>
            <input type="hidden" name="status" value="ativo" />
            <div class="form-group mb-3">
                <button class="btn btn-primary w-100">Salvar </button>
            </div>
        </form>

    </div>
@endsection