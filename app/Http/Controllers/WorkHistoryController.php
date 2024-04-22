<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkHistoryUpdateRequest;
use App\Models\WorkHistory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class WorkHistoryController extends Controller
{
    /**
     * Display the user's work_histories form.
     */
    public function index(Request $request)
    {
        return view('work_histories.index', [
            'user' => $request->user(),
        ]);
    }

    public function create(Request $request)
    {
        return view('work_histories.create');
    }
    
    public function store(WorkHistoryUpdateRequest $request)
    {
        try {
            $work_history = new WorkHistory($request->validated());
            $work_history->user_id = $request->user()->id;
            $work_history->save();
        
            DB::commit();
            return Redirect::route('work_histories.index')->with('success', '作成が完了しました');
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', '作成に失敗しました'. $e->getMessage());
        }
    }

    public function edit($id)
    {
        $work_history = WorkHistory::findOrFail($id);
        return view('work_histories.edit', compact('work_history'));
    }

    public function update(WorkHistoryUpdateRequest $request, $id)
    {
        try {
            $work_history = WorkHistory::findOrFail($id);
            $work_history->update($request->validated());
        
            DB::commit();
            
            return Redirect::route('work_histories.index')->with('success', '更新しました');;
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', '更新に失敗しました');
        }
    }

    public function destroy($id) {
        $work = WorkHistory::findOrFail($id);
        $work->delete();
        return Redirect::back()->with('success', '削除しました');
    }
}
