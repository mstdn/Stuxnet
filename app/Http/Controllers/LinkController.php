<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\LinkResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    public function index()
    {
        return Inertia::render('Links/Index', [
            'links'     =>  LinkResource::collection(
                Link::query()
                ->with('user')
                ->latest()
                ->paginate(25)
            )
            ]);
    }
    
    public function store(Request $request, Link $link)
    {
        if (!Gate::allows('create-category', $link)) {
            abort(403);
        }

        $request->validate([
            'link' => 'required|max:500|min:1|unique:links',
            'name' => 'required|max:500|min:1|unique:links',
        ]);

        Link::create([
            'user_id'   =>  auth()->user()->id,
            'link'      =>  $request['link'],
            'name'      =>  $request['name']
        ]);

        return Redirect::route('links');
    }

    public function destroy(Link $link)
    {
        if (!Gate::allows('delete-link', $link)) {
            abort(403);
        }
        
        $link->delete();
        return Redirect::route('links');
    }
}
