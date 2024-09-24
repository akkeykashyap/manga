<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    public function show(Request $request){

        if($request->isMethod('post')){


            $mangaResponse=[];

            $title=$request->input('manga');

            $response=Http::withHeaders([
                "x-rapidapi-host"=>"mangaverse-api.p.rapidapi.com",
                "x-rapidapi-key"=>"275ae33d7fmshb2db00522b0c720p135beejsna20a10208221"
            ])->get("https://mangaverse-api.p.rapidapi.com/manga/search?text=legendary&nsfw=true&type=all", [
                'text' => $title,
                'nsfw' => 'true',
                'type' => 'all'
            ]);

        if ($response->successful()) {
            $mangaResponse = $response->json();
        } else {

        }
    }

    return view('manga', ['mangaResponse' => $mangaResponse]);
}
}
