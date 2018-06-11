<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use timgws\QueryBuilderParser;
use Yajra\DataTables\Facades\DataTables;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Booking $booking
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Booking $booking, Request $request)
    {
        $bookings = $booking::all();

        if (request()->ajax()) {
            $rules = $request->input('rules');

            $query = DB::table('bookings');

            if (json_decode($rules)) {
                $qbp = new QueryBuilderParser([
                    'first_name',
                    'last_name',
                    'status',
                    'phone',
                ]);

                $builder = DB::table('bookings');

                $query = $qbp->parse($rules, $builder);
            }

            return DataTables::query($query)->toArray();
        }

        return view('bookings.index', compact('bookings'));
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
     * @param  \App\Models\Booking  $order
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $order
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
     * @param  \App\Models\Booking  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $order)
    {
        //
    }
}
