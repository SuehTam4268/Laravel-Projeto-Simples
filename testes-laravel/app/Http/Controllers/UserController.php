<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function CreateUser(Request $request){
        if(is_null($request->input('name'))){
            return view('user.create');
        }else{
            $User = new User;
            $User->name = $request->input('name');
            $User->email = $request->input('email');
            $User->password = Hash::make($request->input('password'));
            $User->save();
            return view('index');
        }
    }

    public function EditUserIndex(Request $request){
      
        return view('user.edit');
    }

    public function EditUserCheck(Request $request){
      
            $User = User::where('email','=',$request->input('email'))
                ->first();
                
            if(is_null($User)){
                return redirect()->back()->with('Erro','erro');
            }else{
               
                if(Hash::check($request->input('password'),$User->password)){
                    
                    return redirect()->back()->with(['Match' => 'Deu match','teste' =>session(['email' => $request->input('email')])]);
                }else{
                    return redirect()->back()->with('Erro','erro');
                }
            }
            
    }
    
    public function EditUser(Request $request){
        $EmailUser =  session('email');
        
        $User = User::where('email','=',$EmailUser)->update(array_filter($request->all()));

        return redirect()->back()->with('UpdateSuccess','Conta atualizada com sucesso');
    }

    public function DeleteUserIndex(){
        return view('user.delete');
    }
    public function DeleteUser(Request $request){
        $User = User::where('email','=',$request->input('email'))->first();
      
        if(Hash::check($request->input('password'),$User->password)){
            if($User->delete()){
                return redirect()->back()->with('Mensagem','Usuario Deletado com sucesso');
            }else{
                return redirect()->back()->with('Mensagem','Não foi possivel deletar o usuario');
            }
            
        }else{
            return redirect()->back()->with('Mensagem','Credenciais não batem');
        }
    }
}
