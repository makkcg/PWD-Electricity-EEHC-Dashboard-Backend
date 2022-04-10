<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Deaf\UserProfileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Traits\FileManagement;


/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class DeafController extends Controller
{
    use FileManagement;


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "string", "max:60"],
            "phone" => ["required", "string", "max:60"],
            "UUID" => ["nullable", "string"],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }
        $employee = User::where('phone', $request->phone)->where('type', 1)->first();
        if(isset($employee)){
            $error = array(["failed" => ['this number exist as employee account']]);
            return response()->error($error, 'this number exist as employee account');
        }
        else{
            $user = User::where('phone', $request->phone)->where('type', 2)->first();
        }
        if(!isset($user)){
            $user = User::create([
                "name" => $request->name,
                "phone" => $request->phone,
                "type" => 2,
                "UUID" => $request->filled("UUID") ? $request->UUID : null,
            ]);
            if ($user->wasRecentlyCreated) {
                $user->access_token = $user->createToken("khraba", ["user"])->plainTextToken;
                $user->save();
                return response()->success(array(new UserProfileResource($user)), trans("api/user.registered_successfully"));
            } else {
                $error = array(["failed" => [trans("api/user.failed_operation")]]);
                return response()->error($error, trans("api/user.failed_to_register"));
            }
        }
        return response()->success(array(new UserProfileResource($user)), trans("api/user.registered_successfully"));

    }

    public function edit(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            "name" => ["nullable", "string", "max:60"],
            "phone" => ["nullable", "string", "max:60","unique:users,phone,".$user->id],
            "email" => ["nullable", "email:rfc,filter", "unique:users,email,".$user->id],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }
        $updated = $user->update([
            "name" => $request->filled("name") ? $request->name : $user->name ?? null,
            "phone" => $request->filled("phone") ? $request->phone : $user->phone ?? null,
            "email" => $request->filled("email") ? $request->email : $user->email ?? null,
        ]);
        if ($updated) {
            return response()->success(array(new UserProfileResource($user)), trans("api/user.profile_updated_successfully"));
        } else {
            $error =  array(["failed" => [trans("api/user.failed_operation")]]);
            return response()->error($error, trans("api/user.profile_updating_failed"));
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        $user->access_token = $user->createToken("Basmety", ["user"])->plainTextToken;
        $user->save();
        $data = array(["success" => [trans("api/user.successfull_operation")],]);
        return response()->success($data, trans("api/user.logged_out"));
    }

    public function profile(Request $request)
    {
        return response()->success(array(new UserProfileResource($request->user())), trans("api/user.user_found"));
    }
}
