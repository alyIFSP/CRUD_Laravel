@extends('layout.main')

@section('title', 'cadastro')


@section('body')
<main class="container-fluid">

  <!-- conteúdo -->
  <div class="form  d-flex justify-content-center flex-column">
    <form action="/verificaLogin" method="post" class="mx-5 p-5">
      @csrf
      <!-- Text input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form6Example3">Email</label>
        <input type="text" name="email" id="form6Example3 inputChanger" class="form-control" style="background-color: #D9D9D9;" />
      </div>

      <div class="col">
        <div class="form-outline">
          <label class="form-label" for="form6Example2">Senha</label>
          <input type="password" name="senha" id="form6Example2 inputChanger" class="form-control" style="background-color: #D9D9D9;" />
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-success btn-block my-4">login</button>

      @if("error")
      <label for="senha">Usuário ou senha inválidos</label>
      @endif

    </form>
    <form action="/services/cadastroUsuario" method="get" class="mx-auto">
      <input type="submit" value="Cadastre-se" class="btn btn-success btn-block mb-4">
    </form>


</main>
