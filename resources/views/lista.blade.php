@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="painel-quadro">Transparência</div>

    
                    <br>
        
        

        <table>
        <thead>
            <th>Relatório</th>
            <th>Ação</th>
        </thead>
        <tbody>
        
        @foreach($lista as $l) 

        <tr>
        
            <td><a href="{{ route('downloadArq' , $l->id) }}" >{{ $l->nome_relatorio }}</a></td> 
            
            <td>
                <form action="/deleteArq" style="display:inline; text-align:left;" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$l->id}}">
                    <button type="submit">Deletar</button>  
                </form>
            </td>
           

        </tr>

        </tbody>

        </table>     

        

        @endforeach

        <br>
        

        
   
                </div>
                
            </div>
            
        </div>
        <a class="btn botao-padrao" href="cadastrar">Cadastrar Planilhas</a>
    </div>
</div>

@endsection
