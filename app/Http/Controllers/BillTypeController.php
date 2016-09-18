<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;
use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Contracts\Repositories\BillTypeRepository;
use Republicas\Contracts\Repositories\RepublicRepository;

class BillTypeController extends Controller
{
    protected $republicRepository;
    protected $repository;

    public function __construct(RepublicRepository $republicRepository, BillTypeRepository $billTypeRepository)
    {
        $this->repository         = $billTypeRepository;
        $this->republicRepository = $republicRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($republicId)
    {
        $republic         = $this->republicRepository->with('billtypes')->find($republicId);
        $generalBilltypes = $this->repository->getGeneralTypes()->get();

        return view('billtypes.index', compact('republic', 'generalBilltypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($republicId)
    {
        $republic = $this->republicRepository->find($republicId);

        return view('billtypes.create', compact('republic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $republicId)
    {
        $inputs = $request->all();
        $inputs['republic_id'] = $republicId;

        $billtype = $this->repository->create($inputs);

        if($billtype)
            return redirect()->route('bill.type.index', $republicId);
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
    public function destroy($republicId, $billtypeId)
    {
        if(!\Request::ajax())
            abort(403);

        $billtype = $this->repository->find($billtypeId);
        $billtype->delete();

        if($billtype)
            return response()->json(['status' => 'success', 'billtypeId' => $billtypeId]);
        else
            return response()->json(['status' => 'fail']);
    }
}
