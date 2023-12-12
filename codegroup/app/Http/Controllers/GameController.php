<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Repositories\Contracts\GameRepositoryContract;
use App\Repositories\Contracts\PlayerRepositoryContract;
use App\Repositories\Contracts\GamePlayerRepositoryContract;
use App\Repositories\Contracts\TeamPlayerRepositoryContract;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    private GameRepositoryContract $gameRepository;
    private PlayerRepositoryContract $playerRepository;
    private GamePlayerRepositoryContract $gamePlayerRepository;
    private TeamPlayerRepositoryContract $teamPlayerRepository;


    public function __construct(GameRepositoryContract $gameRepository, PlayerRepositoryContract $playerRepository, GamePlayerRepositoryContract $gamePlayerRepository, TeamPlayerRepositoryContract $teamPlayerRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->playerRepository = $playerRepository;
        $this->gamePlayerRepository = $gamePlayerRepository;
        $this->teamPlayerRepository = $teamPlayerRepository;
    }

    public function index()
    {
        $games = $this->gameRepository->getAllGames();
        return view('logged.game.index', compact('games'));
    }

    public function add()
    {
        return view('logged.game.add');
    }

    public function record(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'playersteam' => 'required|integer',



        ]);
        $messages = $validator->errors();
        if (!$messages->isEmpty()) {
            //dd($messages);
            session(['error' => 'Preenchimento de campos incorretos: ']);
            session(['msg' => $messages]);
            return back();

        } else {

            //dd($request);
            session(['success' => 'Jogo Inserido']);
            $this->gameRepository->createGame(request()->except(['_token',]));

            return redirect()->route('game-index');
        }

    }

    public function view($id)
    {
        $game = $this->gameRepository->getGameById($id);
        $playersnconf = $this->playerRepository->getInfoByPlayers('*', 'id not in (select x.player_id from gameplayers x where x.game_id = ' . $id . ')', '', '');

        $players = $this->gamePlayerRepository->getInfoByGamePlayers('(select x.last_name from players x where x.id = player_id) as last_name,(select x.first_name from players x where x.id = player_id) as first_name,(select x.level from players x where x.id = player_id) as level,(select x.is_goalkeeper from players x where x.id = player_id) as is_goalkeeper,(select x.phone from players x where x.id = player_id) as phone ', 'game_id = ' . $id, '', '');

        $teams = $this->teamPlayerRepository->getAllTeamPlayers($id);


        //dd($teams);
        return view('logged.game.view', compact('game', 'playersnconf', 'players', 'teams'));
    }

    public function presence($playerId, $gameId)
    {
        $request["player_id"] = $playerId;
        $request["game_id"] = $gameId;
        $p = $this->gamePlayerRepository->createGamePlayers($request);
        //dd($p);
        return redirect()->route('game-view', $gameId);
    }

    public function teams($gameId)
    {
        $game = $this->gameRepository->getGameById($gameId);
        $playersgame = $this->gamePlayerRepository->getGamePlayersByGameId($gameId);
        //dd($playersgame);


        return redirect()->route('game-view', $gameId);
    }

    public function sortingteams($gameId)
    {
        
        $gk = $this->gamePlayerRepository->getInfoByGamePlayers('(select x.id from players x where x.id = player_id) as pid', ' player_id in (select x.id from players x where x.is_goalkeeper = true )', '', '');

        
        $lineplayers = $this->gamePlayerRepository->getInfoByGamePlayers('(select x.id from players x where x.id = player_id) as pid', ' player_id in (select x.id from players x where x.is_goalkeeper = false order by level desc)', '', '');
        
        $nconf = count($gk) + count($lineplayers);
        //
        $confgame = $this->gameRepository->getGameById($gameId);
        
        $numbyteam = $confgame->playersteam;
        
        $nteams = $nconf / $numbyteam;

        $leftover = $nconf % $numbyteam;

        //dd((int)$nteams);

        $x = 0;
        $p=[];
        
        foreach($lineplayers as $i => $lp)
        {
            $p['game_id'] = $gameId;
            $p['player_id'] = $lp->pid;
            if($i % ($numbyteam-1) == 0){
                $x++;
            }
                

            $p['team'] = $x;

            $this->teamPlayerRepository->createTeamPlayer($p);

        }

        foreach($gk as $i => $lp)
        {
            $p['game_id'] = $gameId;
            $p['player_id'] = $lp->pid;
            

            $p['team'] = $i+1;

            $this->teamPlayerRepository->createTeamPlayer($p);

        }

        return redirect()->route('game-view', $gameId);


    }


    public function delete($id)
    {
        //
    }
}
