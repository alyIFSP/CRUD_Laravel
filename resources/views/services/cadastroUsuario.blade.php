@extends('layout.main')

@section('title', 'cadastro')


@section('body')
<main>
  <div class="col">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm ">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="me-auto">
            <form action="#" method="post" class="bg-secondary" style="background-color: #E9E9E9; border: none;">
              <input type="text" placeholder="Encontrar serviços...">
            </form>
          </div>

          <div class="vr me-2 py-2">
          </div>
          <div class="me-1 mt-3">
            <p>Dr.Camila Ribeiro <i><img src="" alt="" srcset=""></i></p>
          </div>

        </div>
      </div>
    </nav>
    <section class="form  d-flex justify-content-center flex-column">
      <form method="post" action="/processaCadastro" class="mx-5 p-5">
        @csrf
        <div class="form-outline mb-4">
          <label class="form-label" for="nome">Nome</label>
          <input type="text" id="nome" name="nome" placeholder="Digite o nome" required id="nome inputChanger" class="form-control" style="background-color: #D9D9D9;">
        </div>

        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example2">e-mail</label>
            <input type="email" name="email" id="form6Example2 inputChanger" class="form-control" placeholder="Digite seu email" style="background-color: #D9D9D9;" required />
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example1">Senha</label>
            <input type="password" name="senha" id="form6Example1 inputChanger" class="form-control" style="background-color: #D9D9D9;" required />
          </div>
        </div>

        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="form6Example3">Confirmar Senha</label>
            <input type="password" name="confirmaSenha" id="form6Example3 inputChanger" class="form-control" style="background-color: #D9D9D9;" />
          </div>
        </div>
        @if($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif
        {{-- @if(request()->has["erro"])
        <label for="erro">Senha e confirmar senha não são iguais</label>
        @endif --}}
        <input type="submit" name="cadastro" class="btn btn-success btn-block my-4" value="Cadastrar usuario" />
      </form>

    </section>
  </div>
</main>
