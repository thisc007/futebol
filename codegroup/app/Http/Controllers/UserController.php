<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  

    private UserRepositoryContract $userRepository;
    

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();

        return view('logged.user.index', compact('users'));
    }
    public function add()
    {
        return view('logged.user.add');
    }

    public function record(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            //'string | email | unique:users'
            'password' => 'required|min:6|confirmed',
            


        ]);
        $messages = $validator->errors();
        if (!$messages->isEmpty()) {
            //dd($messages);
            session(['error' => 'Preenchimento de campos incorretos: ']);
            session(['msg' => $messages]);
            return back();

        }
        else{
            $request["password"] = bcrypt($request["password"]);
            //dd($request);
            session(['success' => 'Usuário Inserido']);
            $this->userRepository->createUser( request()->except(['_token', 'password_confirmation']));

            return redirect()->route('user-add');
        }
        
    }

    public function edit(string $id)
    {
        $u = $this->userRepository->getUserById($id);
        return view('logged.user.edit', compact('u'));
    }
   
    public function update(string $id, Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email',
            

        ]);
        $messages = $validator->errors();
        if (!$messages->isEmpty()) {
            //dd($messages);
            session(['error' => 'Preenchimento de campos incorretos: ']);
            session(['msg' => $messages]);
            return back();

        }
        else{
            $request["password"] = bcrypt($request["password"]);
            //dd($request);
            session(['success' => 'Usuário atualizado']);
            $this->userRepository->updateUser($id, request()->except(['_token']));

            return redirect()->route('user-index');
        }
    }

    public function delete(string $id)
    {
        $this->userRepository->deleteUser($id);
        session(['success' => 'Usuário excluído com sucesso ']);
        return redirect()->route('user-index');
    }
}