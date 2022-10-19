<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\carros;
use App\Models\anuncios;
use App\Models\enderecos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AnuncioController extends Controller
{
    public function listar(){
        $listarCarros = carros::all();

        $data = [
            "Allcarros" => $listarCarros
        ];

        // dd($listarCarros);

        return view("telas.home", $data);
    }

    public function create(Request $request){
        $requisicao = $request->all();
        // log::info($requisicao);
        // dd($requisicao['enviarImagem']);

        $carroInfo = new carros;


        $carroInfo->user_id = \Auth::user()->id;
        $carroInfo->modelo_carro = $requisicao['modeloCarro'] ?? null;
        $carroInfo->preco_aluguel = $requisicao['precoLocacao'] ?? null;
        $carroInfo->descricao_carro = $requisicao['descricao'] ?? null;
        $carroInfo->tipo_motor = $requisicao['motorCarros'] ?? null;
        $carroInfo->tipo_cambio = $requisicao['tipoCambio'] ?? null;
        $carroInfo->tipo_tracao = $requisicao['tipoTracao'] ?? null;
        $carroInfo->quantidade_assentos = $requisicao['quantidadeLugares'] ?? null;
        $carroInfo->air_bag = $requisicao['airBag'] ?? null;
        $carroInfo->freiosABS = $requisicao['freiosABS'] ?? null;
        $carroInfo->direcao_hidraulica = $requisicao['direcaoHidraulica'] ?? null;
        $carroInfo->modo_aluguel = $requisicao['modadelidadeAluguel'] ?? null;

        #salva a imagem na pasta
        $uploadImage = [];
        $cont = 0;
        $nomesImagens = "";
        foreach ($request->file('enviarImagem') as $photos){
            $uploadImage[] = ['photo' => $photos->store('carroPhotos', 'public')];
            $nomesImagens =  $uploadImage[$cont]['photo'] . "\," . $nomesImagens;
            $cont = $cont + 1;
        }

        // dd($nomesImagens);

        $carroInfo->imagem = $nomesImagens ?? null;

        $carroInfo->save();




        // $anuncioEndereco = new enderecos;

        // $anuncioEndereco->user_id = \Auth::user()->id;
        // $anuncioEndereco->endereco = $requisicao['endereco'] ?? null;
        // $anuncioEndereco->rua = $requisicao['bairro'] ?? null;

        // $anuncioEndereco->save();


        return redirect('listar-anuncio');


    }

    public function logout(){
        Session::flush();

        Auth::logout();

        return redirect('login');

    }

}
