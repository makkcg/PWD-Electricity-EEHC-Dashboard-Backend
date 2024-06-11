<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deaf\Service\ServicesResource;
use App\Http\Resources\Deaf\Service\ServiceDetailsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Traits\FileManagement;
use Illuminate\Support\Str;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class ServiceController extends Controller
{
    use FileManagement;

    public function services(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => ['nullable', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }

        $services = Service::where('parent_id', null);

        if ($request->filled('search')) {

            $services->whereTranslationLike('title', '%' . $request->search . '%');
        }

        return response()->success(ServicesResource::collection($services->get()), trans("api/user.successfull_operation"));

    }
    public function branchServices(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'search' => ['nullable', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }

        $services = Service::where('parent_id', null)->whereHas('branch', function($q) use($request)
        {
            $q->where('branch_id', $request->branch_id);

        });

        if ($request->filled('search')) {

            $services->whereTranslationLike('title', '%' . $request->search . '%');
        }

        return response()->success(ServicesResource::collection($services->get()), trans("api/user.successfull_operation"));

    }

    public function details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_id' => ['required', 'integer', 'exists:services,id'],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }

        $service = Service::where('id', $request->service_id)->with('translations')->first();

        return response()->success(new ServiceDetailsResource($service), trans("api/user.successfull_operation"));

    }

}
