@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="container">

                    <h2>Upload de Relatórios</h2>

                    <form action="uploadArq" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <input type="text" name="nome_relatorio" id="nome_relatorio"
                        placeholder="Nome do Arquivo">

                        <br>
                        
                        <input type="file" name="relatorio" id="relatorio">
                        <br>

                        <button type="submit">Enviar</button>

                    </form>
                    
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
