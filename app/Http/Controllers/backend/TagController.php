<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RealRashid\SweetAlert\Facades\Alert;
use function redirect;
use function view;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        try {
            $tags = Tag::paginate(10);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(TagRequest $request)
    {
        try {
            Tag::create([
                'name'=>$request['name'],
                'status'=>$request['status']
            ]);
            Alert::success('Done','Tag Created Successfully');
        }
        catch (ModelNotFoundException $exception)
        {
            Alert::error('Error','Can\'t create this tag now');
        }
        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    public function update(TagRequest $request,Tag $tag)
    {
        try {
        $tag->update([
            'name'=>$request['name'],
             'status'=>$request['status']

        ]);
        Alert::success('Done','Tag updated successfully');
        }

        catch (ModelNotFoundException $exception){
            Alert::error('Error','Can\'t create this tag now');
        }
        return redirect()->route('admin.tag.index');
    }
    public function destroy(Tag $tag)
    {
        try {
            $tag->delete();
            Alert::success('Done','Tag deleted successfully');
        }
        catch (\Exception $exception){
            Alert::error('Error','Can\'t delete this tag now');
        }
        return redirect()->route('admin.tag.index');
    }


}
