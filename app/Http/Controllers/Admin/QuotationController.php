<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuotationRequest;
use App\Http\Requests\StoreQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use App\Models\Quotation;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QuotationController extends Controller
{
    public function update_is_sent_email(Request $request){
        $quotation = Quotation::findOrFail($request->id);
        $quotation->is_sent_email = $request->status;
        $quotation->save(); 
        return 1;
    } 

    public function index(Request $request)
    {
        abort_if(Gate::denies('quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Quotation::with(['service'])->select(sprintf('%s.*', (new Quotation)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'quotation_show';
                $editGate      = 'quotation_edit';
                $deleteGate    = 'quotation_delete';
                $crudRoutePart = 'quotations';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('the_company', function ($row) {
                return $row->the_company ? $row->the_company : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('position', function ($row) {
                return $row->position ? Quotation::POSITION_SELECT[$row->position] : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->addColumn('service_name', function ($row) {
                return $row->service ? $row->service->name : '';
            });
            $table->editColumn('is_sent_email', function ($row) {
                return '
                <label class="c-switch c-switch-pill c-switch-success">
                    <input onchange="update_is_sent_email(this)" value="' . $row->id . '" type="checkbox" class="c-switch-input" '. ($row->is_sent_email ? "checked" : null) .' }}>
                    <span class="c-switch-slider"></span>
                </label>';
            });

            $table->rawColumns(['actions', 'placeholder', 'service','is_sent_email']);

            return $table->make(true);
        }

        return view('admin.quotations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quotations.create', compact('services'));
    }

    public function store(StoreQuotationRequest $request)
    {
        $quotation = Quotation::create($request->all());

        return redirect()->route('admin.quotations.index');
    }

    public function edit(Quotation $quotation)
    {
        abort_if(Gate::denies('quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quotation->load('service');

        return view('admin.quotations.edit', compact('quotation', 'services'));
    }

    public function update(UpdateQuotationRequest $request, Quotation $quotation)
    {
        $quotation->update($request->all());

        return redirect()->route('admin.quotations.index');
    }

    public function show(Quotation $quotation)
    {
        abort_if(Gate::denies('quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotation->load('service');

        return view('admin.quotations.show', compact('quotation'));
    }

    public function destroy(Quotation $quotation)
    {
        abort_if(Gate::denies('quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuotationRequest $request)
    {
        $quotations = Quotation::find(request('ids'));

        foreach ($quotations as $quotation) {
            $quotation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
