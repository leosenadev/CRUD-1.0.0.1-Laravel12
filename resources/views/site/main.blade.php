
@extends('principal')
@section('conteudo')
<main>
	
	<div class="container table-responsive">
		<div class='row d-flex align-items-center justify-content-center'>
			<div class="col-sm-6">
				<form role="search" method="GET" action="{{ route('lista_contato.index') }}">
					@csrf
					<div class="input-group mb-3">
						<input type="text" name="busca" value="{{ request('busca') }}" class="form-control" placeholder="..."
							aria-label="Recipient’s username" aria-describedby="button-addon2">
						<button class="btn btn-sm btn-outline-secondary" type="submit" id="buscar">Buscar</button>
					</div>

				</form>
			</div>
		</div>
		@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
		<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Status</th>
      <th scope="col">Nome</th>
	  <th scope="col">Contato</th>
	  <th scope="col">Editar</th>
	  <th scope="col">Excluir</th>
    </tr>
  </thead>
 <tbody> 
  @foreach($data as $valor)
	
		<tr>
			<th scope="row">{{ $valor->id}}</th>
			<td>
				@if($valor->status == 'ativo')
					<span style="width:80px" class="badge d-flex align-items-center p-1 pe-2 text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill"> <img class="rounded-circle me-1" width="24" height="24" src="{{ $valor->capa  }}" alt="">Ativo
					</span>
				@endif

				@if($valor->status == 'inativo')
					<span style="width:80px" class="badge d-flex align-items-center p-1 pe-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-pill"> <img class="rounded-circle me-1" width="24" height="24" src="{{ $valor->capa  }}" alt="">Inativo
					</span>
				@endif

			</td>
			<td>{{ $valor->name }}</td>
			<td><button class="btn btn-sm btn-secondary" data-bs-toggle="modal"  data-bs-target="#modal-{{ $valor->id }}">Mostrar </button></td>     
			<td><a class="btn btn-sm btn-primary" href="{{ route('lista_contato.edit',$valor->id) }}">Editar</a></td>
			<td>
				<form action={{ route('lista_contato.destroy',$valor->id) }} method="post">
					@method('DELETE')
					@csrf
					<button class="btn btn-sm btn-danger" type="submit">Excluir</button>
				</form>
			
			</td>
		</tr>
			<div class="modal fade" id="modal-{{ $valor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5 fw-bolder" id="exampleModalLabel">Contato</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p class="fw-bolder">{{ $valor->name }}</p>
						<p class="fw-bolder">{{ $valor->email }}</p>
						<p class="fw-bolder">{{ $valor->contato }}</p>
						<p class="fw-bolder">Status: 
							@if($valor->status == 'ativo')
								<span class="badge text-bg-success">Ativo</span>
							@endif
								
							@if($valor->status == 'inativo')
								<span class="badge text-bg-danger">Inativo</span>
							@endif
						</p>
							
					</div>
					
					</div>
				</div>
			</div>
	
  @endforeach
</tbody>
      
	
</table>
	</div>
	 
               
               

</main>

@endsection
