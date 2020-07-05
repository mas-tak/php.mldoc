<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Gregwar\RST\Parser;
use cebe\markdown\GithubMarkdown;
use Validator;
use App\Models\Doc;

class DocsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the document list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('docs');//->with('docs', Doc::get());
    }

    /**
     * Get the document list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {   
        return Doc::get();
    }

    /**
     * Show the document.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {   
        $doc = Doc::find($id);
        $parser = ($doc->type == 'rst') ? new Parser(): new GithubMarkdown(); 
        $html = $parser->parse(File::get($doc->path));
        return view('show')->with('name', $doc->name)->with('html', $html);
    }

    /**
     * Add the document info.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function regist()
    {
        return view('doc');
    }

    /**
     * Add the document info.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'path' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // $req->validate([
        //     'name' => 'required',
        //     'path' => 'required',
        // ]);

        Doc::create($req->all());
        return redirect(route('docs'));
    }
}
