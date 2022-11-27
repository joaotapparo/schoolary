@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Adicionar professor
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Voltar</a></li>
                        </ol>
                    </nav>

                    @include('session-messages')

                    <div class="mb-4">
                        <form class="row g-3" action="{{route('school.professor.create')}}" method="POST">
                            @csrf
                            <div class="col-3">
                                <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                <input type="text" class="form-control" id="inputFirstName" name="primeiro_nome" placeholder="Primeiro nome" required>
                            </div>
                            <div class="col-3">
                                <label for="inputLastName" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" id="inputLastName" name="sobrenome" placeholder="Sobrenome" required>
                            </div>
                            <div class="col-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required>
                            </div>
                            <div class="col-3">
                                <label for="inputPassword" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" required>
                            </div>
                            <div class="col-3">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="formFile" onchange="previewFile()">
                                <div id="previewFoto"></div>
                                <input type="hidden" id="FotoHiddenInput" name="Foto" value="">
                            </div>
                            <div class="col-4">
                                <label for="inputAddress" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Rua H.Romeo Pinto" required>
                            </div>
                            <div class="col-2">
                                <label for="inputCity" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="inputCity" name="city" placeholder="Paulinia" required>
                            </div>
                            <div class="col-2">
                                <label for="inputZip" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="inputZip" name="zip" required>
                            </div>
                            <div class="col-3">
                                <label for="inputPhone" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+19 998......" required>
                            </div>
                            <div class="col-2">
                                <label for="inputSexo" class="form-label">Sexo</label>
                                <select id="inputSexo" class="form-select" name="Sexo" required>
                                    <option selected>Masculino</option>
                                    <option>Feminino</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="inputnacionalidade" class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control" id="inputnacionalidade" name="nacionalidade" placeholder="Brasileiro, Alemão..." required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-person-plus"></i> Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@include('components.Fotos.Foto-input')
@endsection
