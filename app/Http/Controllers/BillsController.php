<?php

namespace Republicas\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Republicas\Contracts\Repositories\BillRepository;
use Republicas\Contracts\Repositories\BillTypeRepository;
use Republicas\Contracts\Repositories\RepublicRepository;
use Republicas\Http\Controllers\Controller;
use Republicas\Http\Requests;
use Republicas\Models\Republic;
use Republicas\Repositories\Criteria\ByRepublic;

class BillsController extends Controller
{
    protected $repository;
    protected $billtypeRepository;
    protected $republicRepository;

    public function __construct(
        RepublicRepository $republicRepository,
        BillRepository $billRepository,
        BillTypeRepository $billtypeRepository
    )
    {
        $this->repository         = $billRepository;
        $this->republicRepository = $republicRepository;
        $this->typeRepository     = $billtypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($republicId)
    {
        $republic = $this->republicRepository->find($republicId);
        $bills    = $this->repository->with(['billtype', 'responsible'])->getByRepublicOrderedByNotPaid($republicId, 'due_date')->paginate(5);

        return view('bills.index', compact('republic', 'bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($republicId)
    {
        $republic         = $this->republicRepository->with(['bills', 'billtypes', 'users'])->find($republicId);
        $generalBilltypes = $this->typeRepository->getGeneralTypes()->get();

        return view('bills.create', compact('republic', 'generalBilltypes'));
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

        if($inputs['user_id'] == '')
            $inputs['user_id'] = NULL;

        if($inputs['due_date'] != '')
            $inputs['due_date'] = Carbon::createFromFormat('d/m/Y', $inputs['due_date']);

        $inputs['value'] = (float) str_replace(',', '.', $inputs['value']);

        $bill = $this->repository->create($inputs);

        return redirect()->route('bill.index', $republicId);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($republicId, $billId)
    {
        $republic         = $this->republicRepository->with(['bills', 'billtypes', 'users'])->find($republicId);
        $bill             = $this->repository->find($billId);
        $generalBilltypes = $this->typeRepository->getGeneralTypes()->get();

        return view('bills.edit', compact('republic', 'generalBilltypes', 'bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $republicId, $billId)
    {
        $inputs = $request->all();
        $inputs['republic_id'] = $republicId;

        if($inputs['user_id'] == '')
            $inputs['user_id'] = NULL;

        if($inputs['due_date'] != '')
            $inputs['due_date'] = Carbon::createFromFormat('d/m/Y', $inputs['due_date']);

        $inputs['value'] = (float) str_replace(',', '.', $inputs['value']);

        $bill             = $this->repository->find($billId);
        $bill->fill($inputs);
        $bill->save();

        return redirect()->route('bill.index', $republicId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($republicId, $billId)
    {
        if(!\Request::ajax())
            abort(403);

        $bill = $this->repository->find($billId);
        $bill->delete();

        if($bill)
            return response()->json(['status' => 'success', 'billId' => $billId]);
        else
            return response()->json(['status' => 'fail']);
    }
}
