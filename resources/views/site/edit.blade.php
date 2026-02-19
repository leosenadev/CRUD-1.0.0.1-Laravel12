@extends('principal')

@section('conteudo')
    <div class="container">
        <h4 class="mb-4">Editar contato</h4>
        <form action="{{ route('lista_contato.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group mb-3">
                <input type="file" name="capa" class="form-control"/>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="name" class="form-control"  placeholder="Nome" value={{ old('name',$data->name) }} />
            </div>
            <div class="form-group mb-3">
                <input type="text" name="email" class="form-control"  placeholder="Email" value={{ old('email',$data->email) }} />
            </div>
            <div class="form-group mb-3">
                <input type="text" name="contato" class="form-control" id="contato" placeholder="Contato" value={{ old('contato',$data->contato) }} />
            </div>
         
            <div class="form-group">
                <select name="status" class="form-select">
                   <option> Selecione </option>
                    <option value="inativo">Inativo</option>
                    <option value="ativo">Ativo</option>
                <select>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-primary w-100">Salvar </button>
            </div>
        </form>

    </div>
@endsection