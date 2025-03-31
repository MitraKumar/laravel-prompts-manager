<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Snippet;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prompts.index', [
            'prompts' => Prompt::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prompts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            "name" => ["required"],
            "question" => ["required"],
        ]);

        Prompt::create([
            "name" => request('name'),
            "description" => request('description'),
            "question" => request('question'),
            "result" => request('result'),
            "user_id" => Auth::user()->id,
        ]);

        return redirect("/prompts");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prompt $prompt)
    {
        return view('prompts.show', [
            'prompt' => $prompt,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prompt $prompt)
    {
        // $prompt = Prompt::findOrFail($id);
        return view('prompts.edit', [
            'prompt' => $prompt,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prompt $prompt)
    {
        request()->validate([
            "name" => ["required"],
            "question" => ["required"],
        ]);

        
        // $prompt->name = $request->input("name");
        // $prompt->description = $request->input("description");
        // $prompt->question = $request->input("question");
        // $prompt->result = $request->input("result");
        // $prompt->save();

        $prompt->update([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "question" => $request->input('question'),
            "result" => $request->input('result'),
        ]);

        $id = $prompt->id;
        return redirect("/prompts/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prompt $prompt)
    {
        //
    }
}
