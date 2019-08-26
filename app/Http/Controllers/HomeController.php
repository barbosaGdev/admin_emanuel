<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('listaArq');
    }

    public function cadastrar()
    {
        return view('home');
    }

    public function uploadArq(Request $request)
    {

    //Cria um novo dado 
    $arquivo = new Upload();

    // Define o valor default para a variável que contém o nome da imagem 
    $nameFile = null;
 
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('relatorio') && $request->file('relatorio')->isValid()) {
         
        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));
 
        // Recupera a extensão do arquivo
        $extension = $request->relatorio->extension();
 
        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";
 
        // Faz o upload:
        $upload = $request->relatorio->storeAs('public/downloads', $nameFile);

        $arquivo->nome = $nameFile;
        $arquivo->nome_relatorio = $request->nome_relatorio . ".{$extension}";
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
 
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();  
    }
        $arquivo->save();

        return redirect('listaArq');

    }



    public function listaArq(){

        $lista = Upload::all();
        return view('lista', compact('lista'));

    }

    public function downloadArq($id){
        $arq = Upload::find($id);
        return response()->download(public_path('storage/downloads/'.  $arq->nome),$arq->nome_relatorio);
    }

    public function deleteArq(Request $request){
        
        $deleteArq = Storage::delete(public_path('downloads/' . $request->nome));
        $deletedRows = Upload::where('id', $request->id)->delete();
        $deleteArq->delete();
        return redirect('listaArq');
        

    

}   

}