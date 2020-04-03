<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan){

      $this->repository = $detailPlan;
      $this->plan = $plan;
    }

    public function index($urlPlan){

      $plan = $this->plan->where('url', $urlPlan)->first();
      if(!$plan)
        return redirect()->back();

      //$details = $plan->details();
      $details = $plan->details()->paginate();

      return view('admin.pages.plans.details.index', [
        'plan' => $plan,
        'details' => $details,
      ]);
    }

    public function create($urlPlan){

      $plan = $this->plan->where('url', $urlPlan)->first();
      if(!$plan)
        return redirect()->back();

        return view('admin.pages.plans.details.create',[
          'plan' => $plan,
        ]);

    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan){

      $plan = $this->plan->where('url', $urlPlan)->first();
      if(!$plan)
        return redirect()->back();

      /*
      $data = $request->all();
      $data['plan_id'] = $plan->id;
      $this->repository->create($data);
      */

      $plan->details()->create($request->all());

      return redirect()->route('details.plan.index', $plan->url );

    }

    public function edit($url, $idDetail){
      $plan = $this->plan->where('url', $url)->first();

      $detail = $this->repository->find($idDetail);

      if(!$plan || !$detail)
        return redirect()->back();

      return view('admin.pages.plans.details.edit', [
        'plan' => $plan,
        'detail' => $detail,
      ]);

    }

    public function update(StoreUpdateDetailPlan $request, $url){
      $plan = $this->plan->where('url', $url)->first();

      $detail = $this->repository->where('id', $request->idDetail)->first();

      if(!$plan || !$detail)
        return redirect()->back();

        $detail->update($request->all());

      return redirect()->route('details.plan.index', $url);

    }


        public function destroy($urlPlan, $idDetail){
          $detail = $this->repository->where('id', $idDetail)->first();

          if(!$detail)
            return redirect()->back();

            $detail->delete();

            return redirect()
                        ->route('details.plan.index', $urlPlan)
                        ->with('message',"Registro deletado com sucesso");

        }


}
