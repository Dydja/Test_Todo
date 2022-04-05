@extends("template.base")
@section("title", "Ma Todo List")
@section("content")
<div class="container">
  <div class="card">
    <div class="card-body">

      <!-- Action -->

      @if(Session::has('message'))
      <p class="alert alert-danger">{{ Session::get('message') }}</p>
      @endif

      <form action="{{ route('todo.save') }}" method="post" class="add">
        @csrf
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"
            ><span class="oi oi-pencil"></span
          ></span>
          <input
            id="texte"
            name="text"
            type="text"
            class="form-control"
            placeholder="Prendre une note…"
            aria-label="My new idea"
            aria-describedby="basic-addon1"
          />
        </div>




      </form>

      <!-- Liste -->
      <ul class="list-group">
        @forelse ($liste as $todo)
        <li class="list-group-item">
          <span>{{ $todo->text }}</span>
          <!-- Action à ajouter pour Terminer et supprimer -->
          <a class="btn btn-danger ml-1" href="{{ route('todo.done', ['id' => $todo->id]) }}"> <i class="fas fa-check"></i></a>
          <a class="btn btn-warning" href="{{ route('todo.delete', ['id'=> $todo->id]) }}"><i class="fa-solid fa-trash"></i></a>


        </li>
        @empty
        <li class="list-group-item text-center">C'est vide !</li>
        @endforelse
      </ul>

    </div>
  </div>
</div>
@endsection
