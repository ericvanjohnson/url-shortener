<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Url;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|max:255|url'
        ]);

        $code = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '',(substr(Hash::make($request->url), -38, -30))));

        Url::firstOrCreate([
            'code' => $code,
            'url' => $request->url
        ]);

        return view('home', ['code' => $code]);
    }

    public function apiStore(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|max:255|url'
        ]);

        $code = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '',(substr(Hash::make($request->url), -38, -30))));

        Url::firstOrCreate([
            'code' => $code,
            'url' => $request->url
        ]);

        return $code;
    }
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'code' => 'alpha_num' ]);

        $record = Url::where('code', $request->code)->first();
        if ($record) {
            return redirect($record->url) ;
        }
        return redirect('/');
    }
}
