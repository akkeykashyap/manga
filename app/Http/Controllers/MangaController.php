<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MangaController extends Controller
{
    public function show(Request $request)
    {

        $mangaResponse = [];
        if ($request->isMethod('post')) {


            $title = $request->input('manga');

            $response = Http::withHeaders([
                "x-rapidapi-host" => "mangaverse-api.p.rapidapi.com",
                "x-rapidapi-key" => "275ae33d7fmshb2db00522b0c720p135beejsna20a10208221"
            ])->get("https://mangaverse-api.p.rapidapi.com/manga/search?text=legendary&nsfw=true&type=all", [
                'text' => $title,
                'nsfw' => 'true',
                'type' => 'all'
            ]);

            if ($response->successful()) {
                $mangaResponse = $response->json();
            }
            else {
                $mangaResponse = ['data' => [], 'error' => 'Failed to retrieve data'];
            }
        }

        return view('manga', ['mangaResponse' => $mangaResponse]);
    }


    public function showDetail($id)
    {
        $response = Http::withHeaders([
            "x-rapidapi-host" => "mangaverse-api.p.rapidapi.com",
            "x-rapidapi-key" => "275ae33d7fmshb2db00522b0c720p135beejsna20a10208221",
        ])->get("https://mangaverse-api.p.rapidapi.com/manga?id=659524dd597f3b00281f06ff", [
            'id' => $id
        ]);

        if ($response->successful()) {
            $mangaDetail = $response->json();
        } else {
            return response()->json(['error' => 'Failed to retrieve manga details'], $response->status());
        }

        return view('detail', ['mangaDetail' => $mangaDetail]);
    }


    public function fetchChapters($id)
{
    try {
        $response = Http::withHeaders([
            "x-rapidapi-host" => "mangaverse-api.p.rapidapi.com",
            "x-rapidapi-key" => "275ae33d7fmshb2db00522b0c720p135beejsna20a10208221",
        ])->get("https://mangaverse-api.p.rapidapi.com/manga/chapter?id={$id}");

        if ($response->successful()) {
            $chapters = $response->json();
            return view('chapters', ['chapters' => $chapters]);
        } else {
            throw new \Exception('Failed to retrieve chapters. Status: ' . $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error occurred: ' . $e->getMessage()], 500);
    }
}

public function fetchimage($id)
{
    try {
        $response = Http::withHeaders([
            "x-rapidapi-host" => "mangaverse-api.p.rapidapi.com",
            "x-rapidapi-key" => "275ae33d7fmshb2db00522b0c720p135beejsna20a10208221",
        ])->get("https://mangaverse-api.p.rapidapi.com/manga/image?id=659524e9597f3b00281f070d");

        if ($response->successful()) {
            $chapters = $response->json();
            return view('chapters', ['chapters' => $chapters]);
        } else {
            throw new \Exception('Failed to retrieve chapters. Status: ' . $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error occurred: ' . $e->getMessage()], 500);
    }
}

}
