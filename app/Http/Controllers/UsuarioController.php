<?php

namespace projetoUsuario\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request as FacadeRequest;
use projetoUsuario\Usuario;
use Validator;
use projetoUsuario\Http\Requests\UsuarioAdicionaRequest;
use projetoUsuario\Http\Requests\UsuarioAlteraRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use projetoUsuario\Situacao;
use Illuminate\Validation\Rule;



class UsuarioController extends Controller
{


    
    /**************************************/
    /********* LISTA USUARIOS *************/
    /**************************************/

    public function listaUsuarios(){

        $usuarios = Usuario::paginate(5);

        return view('usuario/listagemUsuario')->with('usuarios', $usuarios);

    }



    /**************************************/
    /*************** ALTERA ***************/
    /**************************************/

    public function alteraUsuario($id, UsuarioAlteraRequest $request) {

        //busco o usuario
        $usuario = Usuario::find($id);

        //preenche com os dados do formulario preenchido e atribuie para o usuario
        //Verificar está opção para não fazer nada caso o objeto não foi alterado
        $usuario->name = FacadeRequest::input('name');
        $usuario->email = FacadeRequest::input('email');
        $usuario->cpf = FacadeRequest::input('cpf');
        $usuario->data_nascimento = FacadeRequest::input('data_nascimento');
        $usuario->situacao_id =  FacadeRequest::input('situacao_id');


        if($request->hasFile('image')) {

            $imagem = $request->file('image');

            //get filename with extension
            $filenamewithextension = $imagem->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension =  $imagem->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Deleta a imagem atual para não sobrecarregar o bucket com muitas imagens, pois é free...
            if(!empty($usuario->avatar)){
                $nomeDaImagem = explode('/',$usuario->avatar);
                $nomeDaImagem = $nomeDaImagem[3];
                Storage::disk('s3')->delete($nomeDaImagem);
            }
            
            //Upload File to s3
            Storage::disk('s3')->put($filenametostore, fopen($imagem, 'r+'), 'public');
            $imagenameUrl =  Storage::disk('s3')->url($filenametostore);
            $usuario->avatar = $imagenameUrl; 
         }


        //salva o usuario com os dados novos 
        $usuario->save();

        return redirect()->action('UsuarioController@listaUsuarios');

    }


    
    /**************************************/
    /******* CARREGA PARA ALTERAR *********/
    /**************************************/

    public function carregaInformacoesDoUsuarioParaAlterar($id){

        $usuario = Usuario::find($id);

        return view('usuario.alteraUsuario')->with('user', $usuario)->with('situacao', Situacao::all());

    }



    
    /**************************************/
    /************** PESQUISA *************/
    /**************************************/

    public function pesquisa(Request $request){
        
    $texto = FacadeRequest::input('texto');

    //refatorar para tirar os ifs e usar when com clausura
    if($request->input('seletorPesquisa') == 'Nome'){
        $usuarios = Usuario::where('name', 'like', '%'.$texto.'%')->paginate(5);
    } elseif($request->input('seletorPesquisa') == 'Email') {
        $usuarios = Usuario::where('email', 'like', '%'.$texto.'%')->paginate(5);    
    } else {
        $usuarios = Usuario::where('CPF', 'like', '%'.$texto.'%')->paginate(5);    
    }

        return view('usuario.listagemUsuario')->with('usuarios', $usuarios);
    }


    
    /**************************************/
    /*************** DETALHES *************/
    /**************************************/
    public function detalheUsuario($id){

        $usuario = Usuario::find($id);

        return view('usuario/detalheUsuario')->with('user', $usuario);

    }


    /***************************************/
    /********** Tela de adicionar **********/
    /***************************************/

    public function cadastroUsuario() {

        return view('usuario.cadastroUsuario')->with('situacao', Situacao::all());

    }


    /***************************************/
    /*************** Remover ***************/
    /***************************************/

    public function remove($id){

        $usuario = Usuario::find($id);

        //deletar imagem do bucket para não flodar
        if(!empty($usuario->avatar)){
            $nomeDaImagem = explode('/',$usuario->avatar);
            $nomeDaImagem = $nomeDaImagem[3];
            Storage::disk('s3')->delete($nomeDaImagem);
        }

        $usuario->delete();

        return redirect()->action('UsuarioController@listaUsuarios');
    }


    /***************************************/
    /*************** Adicionar**************/
    /***************************************/


    public function adicionaUsuario(UsuarioAdicionaRequest $request){

        $usuario = new Usuario();
        $usuario->name = FacadeRequest::input('name');
        $usuario->email = FacadeRequest::input('email');
        $usuario->cpf = FacadeRequest::input('cpf');
        $usuario->data_nascimento = FacadeRequest::input('data_nascimento');

        $usuario->password  = FacadeRequest::input('password');
        $password1 =  FacadeRequest::input('password1');
        //$usuario->data_nascimento = self::retornaDataAmericana($usuario->data_nascimento);

        //return dd($usuario->data_nascimento);
        $usuario->password = \Hash::make($usuario->password);
        $usuario->situacao_id =  FacadeRequest::input('situacao_id');


        if($request->hasFile('image')) {
 
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File to s3
            Storage::disk('s3')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');
            
            $imagenameUrl =  Storage::disk('s3')->url($filenametostore);


            //so salvar avatar se requisicao for informado o avatar
            $usuario->avatar = $imagenameUrl;
        }
        
        $usuario->save();
            
        return redirect()->action('UsuarioController@listaUsuarios')->withInput(FacadeRequest::only('nome'));;

      }




        public function retornaDataAmericana($value) {
        return \Carbon\Carbon::parse($value)->format('Y/m/d');
          
      }

         public function retornaDataBrasileira($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
        }




}
