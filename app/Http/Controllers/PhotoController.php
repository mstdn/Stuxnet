<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\ReplyResource;
use Illuminate\Support\Facades\Redirect;

class PhotoController extends Controller
{
    public function index()
    {
        return Inertia::render('Photos/Index', [
            'photos' =>  PhotoResource::collection(
                Photo::query()
                    ->select('id', 'photo', 'name', 'user_id', 'created_at', 'category_id')
                    ->with('user', 'category')
                    ->latest()
                    ->paginate(20)
                    ->withQueryString()
            ),
        ]);
    }

    public function show(Photo $photo)
    {
        return Inertia::render('Photos/Show', [
            'photo'         =>  PhotoResource::make($photo),
            'replies'       =>  ReplyResource::collection(
                $photo->replies()
                    ->with('user')
                    ->oldest()
                    ->paginate(15)
            )
        ]);
    }

    public function store(Request $request)
    {
        $photo = $request->validate([
            'name'           =>  'required|min:1|max:80',
            'photo'          =>  ['required', 'mimes:jpg,jpeg,png,gif', 'max:500048'],
            'category'       =>  ['required', Rule::exists('categories', 'id')],
        ]);

        $photo['user_id'] = auth()->user()->id;

        $photo = Photo::create([
            'user_id'        =>  auth()->id(),
            'name'           =>  $request->name,
            'category_id'    =>  $request->category,
            'photo'          =>  $request->photo->store('uploads/' . $photo['user_id'] . '/' . 'photos', 'public')
        ]);

        return Redirect::route('photos');
    }

    public function destroy(Photo $photo)
    {
        if (!Gate::allows('delete-photo', $photo)) {
            abort(403);
        }

        if (File::exists('storage' . $photo->file)) {
            File::delete('storage' . $photo->file);
        }

        $photo->delete();
        return Redirect::route('photos');
    }
}
