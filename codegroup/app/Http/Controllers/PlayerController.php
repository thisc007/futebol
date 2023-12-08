<?php

namespace App\Http\Controllers;

use Database\Factories\PlayerFactory;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PlayerRepositoryContract;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    private PlayerRepositoryContract $playerRepository;

    public function __construct(PlayerRepositoryContract $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function index()
    {
        $players = $this->playerRepository->getAllPlayers();

        return view('logged.player.index', compact('players'));
    }

    public function add()
    {
        
        return view('logged.player.add');
    }

    public function addfake()
    {

        Player::factory()->createOne();
        $players = $this->playerRepository->getAllPlayers();
        //dd($players);
        return view('logged.player.index', compact('players'));
    }

    public function record(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'max:15',
            'is_goalkeeper' => 'boolean',
            'level' => 'integer'


        ]);
        $messages = $validator->errors();
        if (!$messages->isEmpty()) {
            //dd($messages);
            session(['error' => 'Preenchimento de campos incorretos: ']);
            session(['msg' => $messages]);
            return back();

        } else {

            //dd($request);
            session(['success' => 'Usuário Inserido']);
            $this->playerRepository->createPlayer(request()->except(['_token',]));

            return redirect()->route('player-index');
        }

    }
}
