<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
  /**
 * @api {get} /directors Get all directors
 * @apiName GetDirectors
 * @apiGroup Directors
 * @apiVersion 1.0.0
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *   "directors": [
 *     {
 *       "id": 1,
 *       "name": "Steven Spielberg"
 *     }
 *   ]
 * }
 */


    public function index()
    {
        //$directors = Director::paginate(12);
        //return view('directors.index', compact('directors'));


        $director = Director::all();
        return response()->json([
            'director' => $director,
        ]);
    }

    /**
     * Show form for creating a new director.
     */
    public function create()
    {
        return view('directors.create');
    }

/**
 * @api {post} /directors Create new director
 * @apiName CreateDirector
 * @apiGroup Directors
 * @apiVersion 1.0.0
 *
 * @apiBody {String} name Director name
 *
 * @apiSuccessExample {json} Success-Response:
 * HTTP/1.1 201 Created
 * {
 *   "director": {
 *     "id": 1,
 *     "name": "Steven Spielberg"
 *   }
 * }
 */

    public function store(DirectorRequest $request)
    {

        /*
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048', // max 2 MB
        ]);

        */

        $director = Director::create($request->all());
        return response()->json(['director' => $director]);




        $director = new Director();
        $director->name = $request->name;

        if ($request->hasFile('image')) {
            $director->image = $request->file('image')->store('directors', 'public');
        }

        $director->save();

        return redirect()->route('directors.index')->with('success', 'Director created successfully!');
    }

    /**
     * Display the specified director.
     */
    public function show(Director $director)
    {
        return view('directors.show', compact('director'));
    }

    /**
     * Show the form for editing the specified director.
     */
    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

   
/**
 * @api {put} /directors/:id Update director
 * @apiName UpdateDirector
 * @apiGroup Directors
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Director ID
 * @apiBody {String} name Director name
 *

 * @apiSuccessExample {json} Success:
 * HTTP/1.1 200 OK
 * {
 *   "director": {
 *      "id": 3,
 *      "name": "Updated Name"
 *   }
 * }
 */
    public function update(DirectorRequest $request, Director $director,$id)
    {
       
       /*
       
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
        ]);
        */

         $director = Director::findOrFail($id);
        $director->update($request->all());
        return response()->json(['director' => $director]);



        $director->name = $request->name;

        if ($request->hasFile('image')) {
            if ($director->image) {
                Storage::disk('public')->delete($director->image);
            }
            $director->image = $request->file('image')->store('directors', 'public');
        }

        $director->save();

        return redirect()->route('directors.index')->with('success', 'Director updated successfully!');
    }

    
/**
 * @api {delete} /directors/:id Delete director
 * @apiName DeleteDirector
 * @apiGroup Directors
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Director ID
 * 
 * @apiSuccessExample {json} Success:
 * HTTP/1.1 200 OK
 * {
 *   "message": "Director deleted successfully."
 * }
 */


    public function destroy(Director $director)
    {
        if ($director->image) {
            Storage::disk('public')->delete($director->image);
        }

        $director->delete();

        return redirect()->route('directors.index')->with('success', 'Director deleted successfully!');


       
        $director = Director::findOrFail($id);
        $director->delete();

        return response()->json(['message' => 'Director deleted successfully.', 'id' => $id]);
    }
}
