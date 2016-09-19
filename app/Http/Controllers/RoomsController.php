<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;
use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Contracts\Repositories\RoomRepository;
use Republicas\Contracts\Repositories\UserRepository;
use Republicas\Contracts\Repositories\RepublicRepository;

class RoomsController extends Controller
{
    protected $repository;
    protected $roomRepository;
    protected $userRepository;

    public function __construct(
        RepublicRepository $republicRepository,
        RoomRepository $roomRepository,
        UserRepository $userRepository
    )
    {
        $this->repository = $roomRepository;
        $this->republicRepository = $republicRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($republicId)
    {
        $republic = $this->republicRepository->find($republicId);

        return view('rooms.index', compact('republic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($republicId, $roomId)
    {
        $room     = $this->repository->find($roomId);
        $republic = $room->republic;

        return view('rooms.edit', compact('room', 'republic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $republicId, $roomId)
    {
        // dd($request->all());
        $room = $this->repository->find($roomId);
        $users = $this->userRepository->find($request['user_id']);

        foreach ($users as $key => $user) {
            $room->users()->save($user);
        }

        $room->update($request->except('user_id'));

        return redirect()->route('room.index', $republicId);
    }
}
