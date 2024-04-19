<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Display the user's skill form.
     */
    public function index(Request $request)
    {
        return view('skills.index', [
            'user' => $request->user(),
        ]);
    }

    public function create(Request $request)
    {
        return view('skills.create');
    }

    public function store(SkillUpdateRequest $request)
    {
        try {
            $skill = new Skill($request->validated());
            $skill->user_id = $request->user()->id;
            $skill->save();
        
            DB::commit();
            return Redirect::route('skills.index')->with('success', 'Skillを追加しました');
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', 'Skillの追加に失敗しました');
        }
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('skills.edit', compact('skill'));
    }

    public function update(SkillUpdateRequest $request, $id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->update($request->validated());
        
            DB::commit();
            
            return Redirect::route('skills.index')->with('success', '更新しました');;
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', '更新に失敗しました');
        }
    }

    public function destroy($id) {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return Redirect::back()->with('success', '削除しました');
    }
}
