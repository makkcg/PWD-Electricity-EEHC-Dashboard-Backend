<?php

namespace App\Http\Controllers\APIs;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Events\EndChat;
use App\Events\OpenChat;
use App\Events\ChannelID;
use App\Traits\FileManagement;
use App\Http\Resources\Chat\ChatResource;
use App\Models\User;
use Carbon\Carbon;

class ChatController extends Controller
{
    use FileManagement;

    public function scanChat(Request $request)
    {
         $request->validate(
            [
                'scan_result'            => 'required|string',
            ]);
        $employee = User::where('qr_code' , $request->scan_result)->first();

        if(!isset($employee)){
            return response()->error('qr code not valid', trans("api/user.check_inputs"));
        }
        $employee_id = $employee->id;
        $chatIsset=Chat::where('deaf_id',auth()->user()->id)->where('employee_id', $employee_id)->first();
        if(!isset($chatIsset)){
          $chat = Chat::create([
                'deaf_id' =>auth()->user()->id,
                'employee_id' => $employee_id,
                'status' => 1,
            ]);
        }
        else{
            $chat=Chat::where('deaf_id',auth()->user()->id)->where('employee_id', $employee_id)->first();
            $chat->update(['status'=>1]);
        }
         // broadcast by pusher;
         broadcast(new OpenChat($chat))->toOthers();
        return response()->success(array(new ChatResource($chat)), trans("api/deaf.successfull_operation"));

    }

    public function openChatForDeaf()
    {
        $chat=Chat::where('deaf_id',auth()->user()->id)->where('status', 1)->first();
        if(isset($chat)){
        Message::where('chat_id', $chat->id)->update(['deaf_view' => 1]);
        return response()->success(array(new ChatResource($chat)), trans("api/deaf.successfull_operation"));
        }
        $error = array(["failed" => [trans("api/user.failed_operation")]]);
        return response()->error($error, trans("api/user.chat_not_found"));
    }

    public function endChatForDeaf()
    {
        $chat= Chat::where('deaf_id',auth()->user()->id)->where('status', 1)->first();
      Chat::where('deaf_id',auth()->user()->id)->update(['status'=> 0]);
      // broadcast by pusher;
          broadcast(new EndChat($chat))->toOthers();
        return response()->success([] , trans("api/deaf.successfull_operation"));
    }

    public function openChatForEmployee()
    {
        $chat=Chat::where('employee_id',auth()->user()->id)->where('status', 1)->first();
        if(isset($chat)){
            Message::where('chat_id', $chat->id)->update(['employee_view' => 1]);
            return response()->success(array(new ChatResource($chat)), trans("api/deaf.successfull_operation"));
        }
        $error = array(["failed" => [trans("api/user.failed_operation")]]);
        return response()->error($error, trans("api/user.chat_not_found"));

    }

    public function endChatForEmployee()
    {
        $chat= Chat::where('employee_id',auth()->user()->id)->where('status', 1)->first();
        Chat::where('employee_id',auth()->user()->id)->update(['status'=> 0]);
  // broadcast by pusher;
      broadcast(new EndChat($chat))->toOthers();
        return response()->success([] , trans("api/deaf.successfull_operation"));
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {

   $data = $request->validate(
        [
            'chat_id'            => 'required|integer',
            'message'             => 'required'
        ]);
    $chat=Chat::where('status', 1)->find($request->chat_id);
       if(isset($chat)){
       if($chat->employee_id == auth()->user()->id) {
           $data['type'] = 1 ;
           $data['deaf_view'] = 0;
           $data['employee_view'] = 1;
       }

       elseif($chat->deaf_id == auth()->user()->id) {
           $data['chat_id'] = $chat->id ;
           $data['type'] = 2 ;
           $data['deaf_view'] = 1;
           $data['employee_view'] = 0;
       }
       else{
        $error = array(["failed" => [trans("api/user.failed_operation")]]);
        return response()->error($error, trans("api/user.chat_not_found"));
       }
    $message= $chat->messages()->create($data);
      $data['created_at']=$message->created_at;

  // broadcast by pusher;
   broadcast(new MessageSent($data))->toOthers();

  return response()->success([] , trans("api/deaf.successfull_operation"));
    }
    $error = array(["failed" => [trans("api/user.failed_operation")]]);
        return response()->error($error, trans("api/user.chat_not_found"));
}



    }


