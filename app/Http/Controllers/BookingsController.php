<?php

namespace App\Http\Controllers;

use App\DataTables\BookingsDataTable;
use App\Models\Booking;
use Illuminate\Http\Request;

/**
 * Class BookingsController
 * @package App\Http\Controllers
 */
class BookingsController extends Controller
{
    /**
     * @param \App\DataTables\BookingsDataTable $dataTable
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(BookingsDataTable $dataTable)
    {
        return $dataTable->render('bookings.index');
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Booking $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $order)
    {
        //
    }
}
