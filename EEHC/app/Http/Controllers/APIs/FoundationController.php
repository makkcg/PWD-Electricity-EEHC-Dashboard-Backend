<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deaf\Foundation\FoundationResource;
use App\Http\Resources\Deaf\Foundation\FoundationAllProjectResource;
use Illuminate\Http\Request;
use App\Models\Foundation;
use App\Traits\FileManagement;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class FoundationController extends Controller
{
    use FileManagement;

    public function foundation()
    {

        $foundation = Foundation::with('translation')->first();
        return response()->success(new FoundationResource($foundation), trans("api/user.successfull_operation"));

    }


}
