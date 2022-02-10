<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePlayerRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("authenticate");

        $user_id = Auth::user()->id;
        $players = Player::where("user_id", $user_id)->get();

        return view("players.index", [
            "players" => $players,
            "newPlayer" => new Player
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //Gates
        $this->authorize("authenticate");
        return view("players.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(CreatePlayerRequest $request)
    {
        //Gates
        $this->authorize("authenticate");

        $player = new Player($request->validated());
        $player->user_id = Auth::user()->id;
        if ($player->image){
            $player->image = $request->file("image")->store("images", "public");
            $player->save();
        }else{
            $player->save();
        }

        return redirect("/players");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize("authenticate");
        $player = Player::find($id);

        return view("players.show", [
            "player" => $player,
            "newPlayer" => new Player
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize("authenticate");
        $this->authorize("create");

        $player = Player::find($id);
        return view("players.edit")->with("player", $player);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePlayerRequest $request, $id)
    {
        //Gates
        $this->authorize("authenticate");
        $this->authorize("create");

        $player = Player::find($id);

        if ($request->image === "/images/nba-logo.jpg") {
            $player = $player->fill($request->validated());
            $player->image = $request->file("image");

            $player->save();
        }else if ($request->hasFile("image")){
            Storage::disk("public")->delete($player->image);

            $player = $player->fill($request->validated());
            $player->image = $request->file("image")->store("images", "public");

            $player->save();
        } else {
            $player->update(array_filter($request->validated()));
        }

        return redirect("/players");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Gates
        $this->authorize("authenticate");
        $this->authorize("create");

        $player = Player::find($id);

        Storage::disk("public")->delete($player->image);
        $player->delete();

        return redirect("/players");
    }

}
