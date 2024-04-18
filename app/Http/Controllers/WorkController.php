<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkUpdateRequest;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class WorkController extends Controller
{
    /**
     * Display the user's work form.
     */
    public function index(Request $request): View
    {
        return view('works.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's work form.
     */
    public function create(Request $request): View
    {
        return view('works.create');
    }
    
    /**
     * Display the user's work form.
     */
    public function store(WorkUpdateRequest $request): RedirectResponse
    {
        try {
            $works = $request->user()->works()->first();
        
            if ($works == null) {
                $works = new Work();
                $works->user_id = $request->user()->id;
            }
        
            $works->fill($request->validated());
            $works->save();
        
            $image = $request->file('image');
            $imagePath = 'data:' . $image->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($image));

            $works->work_images()->create([
                'work_id' => $works->id,
                'image_path' => $imagePath
            ]);
        
            DB::commit();
            // TODO メッセージの表示
            return Redirect::route('works.index')->with('success', '作成が完了しました');
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', '作成に失敗しました');
        }
    }

    /**
     * Display the user's work form.
     */
    public function edit($id): View
    {
        $work = Work::findOrFail($id);
        return view('works.edit', compact('work'));
    }

    /**
     * Display the user's work form.
     */
    public function update(WorkUpdateRequest $request, $id): RedirectResponse
    {
        try {
            $work = Work::findOrFail($id);
        
            $work->fill($request->validated());
            $work->save();

            if ($request->file('image')) {
                $image = $request->file('image');
                $imagePath = 'data:' . $image->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($image));
                $work->work_images()->update([
                    'image_path' => $imagePath
                ]);
            } elseif ($request->file('image') == null) {
                $work->work_images()->update([
                    'image_path' => null
                ]);
            }

        
            DB::commit();
            
            return Redirect::route('works.index')->with('success', '更新しました');;
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', '更新に失敗しました');
        }
    }

    /**
     * Display the user's work form.
     */
    public function destroy($id) {
        $work = Work::findOrFail($id);
        $work->delete();
        return Redirect::back()->with('success', '削除しました');
    }
}
