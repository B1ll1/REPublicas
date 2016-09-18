<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;
use Republicas\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Republicas\Contracts\Repositories\RoomRepository;
use Republicas\Contracts\Repositories\RepublicRepository;

class RepublicController extends Controller
{
    protected $repository;
    protected $roomRepository;

    public function __construct(RepublicRepository $republicRepository, RoomRepository $roomRepository)
    {
        $this->repository = $republicRepository;
        $this->roomRepository = $roomRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null(Auth::user()->republic))
            return redirect()->route('republic.create');
        else {
            $republic = Auth::user()->republic;

            return redirect()->route('republic.dashboard', $republic->id);
        }
    }

    public function dashboard($republicId)
    {
        $republic = $this->repository->find($republicId);

        return view('republics.dashboard', compact('republic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('republics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \DB::beginTransaction();
        $inputs = $request->all();

        $republic = $this->repository->create($inputs);
        $republic->users()->save(Auth::user());

        if($republic) {
            $totalRooms = intval($inputs['simple_rooms']) + intval($inputs['suite_rooms']);

            for ($i=1; $i <= $totalRooms; $i++) {
                $this->roomRepository->create([
                    'republic_id' => $republic->id,
                    'num_beds' => 1,
                    'type' => 'normal',
                    'price' => 0.00
                ]);
            }
            \DB::commit();

            return redirect()->route('republic.dashboard', $republic->id);
        }
        else {
            \DB::rollback();

            return redirect()->route('republic.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
