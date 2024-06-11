<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deaf\About\AboutResource;
use Illuminate\Http\Request;
use App\Models\About;
use App\Traits\FileManagement;
use Illuminate\Support\Str;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class AboutController extends Controller
{
    use FileManagement;

    public function about()
    {
        $about = About::with('translation')->first();
        return response()->success(new AboutResource($about), trans("api/deaf.successfull_operation"));
    }

}
