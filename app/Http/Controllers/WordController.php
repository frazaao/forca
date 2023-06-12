<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Http\Requests\StoreWordRequest;
use App\Http\Requests\UpdateWordRequest;
use Illuminate\Http\Response;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();
        return response()->json($words);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request)
    {
        $word = Word::create([
            Word::WORD => $request->word,
            Word::LEVEL => $request->level,
        ]);

        return response()->json($word);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $wordId)
    {
        $word = Word::find($wordId);

        if (!$word) {
            abort(404, 'A palavra não pode ser encontrada');
        }

        return response()->json($word);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, int $wordId)
    {
        $word = Word::find($wordId);

        if (!$word) {
            abort(404, 'A palavra não pode ser encontrada');
        }

        $word->update([
            Word::WORD => $request->word,
            Word::LEVEL => $request->level,
        ]);

        $word->save();

        return response()->json($word);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $wordId)
    {
        $word = Word::find($wordId);

        if (!$word) {
            abort(404, 'A palavra não pode ser encontrada');
        }

        $word->delete();

        return response('', Response::HTTP_OK);
    }
}
