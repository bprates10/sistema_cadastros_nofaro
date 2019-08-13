<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;
use Psy\Util\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $keyword = $request->get('Procurar');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Post::where('name', 'LIKE', "%$keyword%")
                ->orWhere('mail', '=', "$keyword")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::orderBy('name', 'asc')->latest()->paginate($perPage);
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|alpha|min:2',
            'mail'  => 'required|email|unique:posts',
            'ddd'   => 'nullable|numeric|digits_between:2,2',
            'phone' => 'nullable|numeric|digits_between:9,9'
        ]);
        Post::create($validatedData);

        return redirect('posts')->with('flash_message', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $post = Post::findOrFail($id);

        $validatedData = $request->validate([
            'name'  => 'required|alpha|min:2',
            'mail'  => 'required|email|unique:posts,mail,'.$post->id,
            'ddd'   => 'nullable|numeric|digits_between:2,2',
            'phone' => 'nullable|numeric|digits_between:9,9'
        ]);

        $post->update($validatedData);

        return redirect('posts')->with('flash_message', 'Cadastro Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts')->with('flash_message', 'Cadastrado excluído com sucesso!');
    }
}
