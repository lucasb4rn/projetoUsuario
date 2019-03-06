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

    public function listaUsuarios(){

        $usuarios = Usuario::paginate(6);

        return view('usuario/listagemUsuario')->with('usuarios', $usuarios);

    }



    // public function resize($value)
    // {
    //     $img = Image::make(storage_path($value))->resize(300, 200);
    
    //     return $img->response('jpg');
    // }



    public function alterar($id, UsuarioAlteraRequest $request) {
        
        return dd(\Auth::user());

        //return dd($request->hasFile('image'));

        $usuario = Usuario::find($id);
        
        $usuario->name = FacadeRequest::input('name');
        $usuario->email = FacadeRequest::input('email');
        $usuario->cpf = FacadeRequest::input('cpf');
        $usuario->data_nascimento = FacadeRequest::input('data_nascimento');
        $usuario->situacao_id =  FacadeRequest::input('situacao_id');


        $validator = Validator::make($request->all(),[
            'email' => [
                'required',
                Rule::unique('usuarios')->ignore($usuario->id),
            ],
            'cpf' => [
                'required',
                Rule::unique('usuarios')->ignore($usuario->id),
            ],
        ]);


        if ($validator->fails())
            {
                return back()->withErrors($validator)->withInput();
            }



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

        $usuario->save();

        return redirect()->action('UsuarioController@listaUsuarios');

    }


    public function mostraAlterar($id){

        $usuario = Usuario::find($id);

        return view('usuario.alterar')->with('user', $usuario)->with('situacao', Situacao::all());

    }



    public function pesquisar(Request $request){
        
        
    $texto = FacadeRequest::input('texto');

    if($request->input('seletorPesquisa') == 'Nome'){
        $usuarios = Usuario::where('name', 'like', '%'.$texto.'%')->paginate(6);
    } elseif($request->input('seletorPesquisa') == 'Email') {
        $usuarios = Usuario::where('email', 'like', '%'.$texto.'%')->paginate(6);    
    } else {
        $usuarios = Usuario::where('CPF', 'like', '%'.$texto.'%')->paginate(6);    
    }


        return view('usuario.listagemUsuario')->with('usuarios', $usuarios);

    }

    public function mostra($id){

        $usuario = Usuario::find($id);

        if(empty($usuario)) {
            return "Esse usuario não existe";
        }

        return view('usuario/detalhes')->with('user', $usuario);

    }

    public function novo() {


        return view('usuario.formulario')->with('situacao', Situacao::all());

    }


    public function remove($id){

        $usuarios = Usuario::find($id);
        $usuarios->delete();
        return redirect()
          ->action('UsuarioController@listaUsuarios');


    }


    public function adiciona(UsuarioAdicionaRequest $request){

        $usuario = new Usuario();
        $usuario->name = FacadeRequest::input('name');
        $usuario->email = FacadeRequest::input('email');
        $usuario->cpf = FacadeRequest::input('cpf');
        $usuario->data_nascimento = FacadeRequest::input('data_nascimento');
        $usuario->password  = FacadeRequest::input('password');
        $password1 =  FacadeRequest::input('password1');
        $usuario->data_nascimento = self::getFromDateAttribute($usuario->data_nascimento);
        $usuario->password = \Hash::make($usuario->password);
        $usuario->situacao_id =  FacadeRequest::input('situacao_id');

      

        $validator = Validator::make($request->all(),[
            'email' => [
                'required',
                Rule::unique('usuarios')->ignore($usuario->id),
            ],
            'cpf' => [
                'required',
                Rule::unique('usuarios')->ignore($usuario->id),
            ],
        ]);


        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }



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

            
            $usuario->avatar = $imagenameUrl;
        }
        
        $usuario->save();
            
        return redirect()->action('UsuarioController@listaUsuarios')->withInput(FacadeRequest::only('nome'));;

      }

        public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('Y/m/d');
      }

}
