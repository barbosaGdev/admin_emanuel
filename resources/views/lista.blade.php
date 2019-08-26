@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        @foreach($lista as $l) 
        
        <a href="{{ route('downloadArq' , $l->id) }}" >{{ $l->nome_relatorio }}</a>

     

        <form action="/deleteArq" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        
            
            <input type="hidden" name="id" value="{{$l->id}}">
            <!-- <input type="hidden" name="nome" value="{{$l->nome}}"> -->
            

            <button type="submit">Deletar</button>

        
        </form>

        @endforeach

        <br>

   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
