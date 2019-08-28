@extends('layouts.app')

@section('content')
<section  style="padding: 5% 10% 100%;background-image: url('http://casaderepousoemanuel.com.br/wp-admin/admin-ajax.php?action=imgedit-preview&_ajax_nonce=9e82364fcc&postid=36&rand=5375')">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="painel-quadro">Upload de Relatórios</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="container">

                    <form action="uploadArq" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <input class="input-nome" type="text" name="nome_relatorio" id="nome_relatorio"
                        placeholder="Nome do Arquivo">
                        <br>

                        <br>
                        
                        <input type="file" name="relatorio" id="relatorio">
                        <br>

                        <button class="btn botao-enviar" type="submit">Enviar</button>

                    </form>
                    
                </div>

                


                </div>
               
            </div>
            <a class="btn botao-padrao" href="home">Ver Planilhas</a>
        </div>
    </div>
</div>
</section>
@endsection
