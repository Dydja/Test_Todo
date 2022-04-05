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

      <form method="POST" action="/api/concert/add" class="add">
        @csrf

        <!-- Equivalent to... -->

        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"
            ><span class="oi oi-pencil"></span
          ></span>
          <input
          id="name"
            name="name"
            type="text"
            class="form-control"
            placeholder="Prendre une note…"
            aria-label="My new idea"
            aria-describedby="basic-addon1"
          />
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>


    </div>
  </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
@endsection

