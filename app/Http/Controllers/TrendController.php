<?php

namespace App\Http\Controllers;

use App\Models\Trend;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class TrendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'สิ่งที่หน้าสนใจ',
            'description' => 'รายการ Crypto ที่หน้าสนใจอยู่ในขณะนี้',
            'breadcrumbs' => [
                ['title' => 'หน้าแรก', 'url' => 'dashboard.index', 'active' => false],
                ['title' => 'สิ่งที่หน้าสนใจ', 'url' => 'trend.index', 'active' => true],
            ],
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ];
        return Inertia::render('Trend', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trend  $trend
     * @return \Illuminate\Http\Response
     */
    public function show(Trend $trend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trend  $trend
     * @return \Illuminate\Http\Response
     */
    public function edit(Trend $trend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trend  $trend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trend $trend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trend  $trend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trend $trend)
    {
        //
    }
}
