<?php
namespace App\Http\Controllers;

use Auth, DB, validator;
use Illuminate\Http\Request;
use App\Http\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\{
    Messages,
    Properties,
    Bookings,
    ReportList,
    User,
    UserDetails,

    Payouts,
    Withdrawal,
    Reviews,
    UsersVerification
};


class InboxController extends Controller
{
    private $helper;
    
    public function __construct()
    {
        $this->helper = new Common;
    }
    
    /**
    * Inbox Page
    * Conversassion List
    * Message View
    */
    public function index(Request $request)
    {



        $data['hostinbox']  = $request->host;
        $data['archives']  = $request->id;

        if($data['archives']=="archive"){
          $data['title']  = "Archive";
            $data['messages']  = Messages::where('receiver_id', Auth::id())
                            ->where('archive',1) 
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');

        }elseif($data['archives']=="support"){
          $data['title']  = "Support";
            $data['messages']  = Messages::where('receiver_id', Auth::id())
                            ->where('admin',1)
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');
        }else{
            $data['messages']  = Messages::where('receiver_id', Auth::id())
                            ->where('archive',0)
                            ->where('admin',0)
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');
        }
        // $data['messages']  = Messages::where('sender_id', Auth::id())
        //                     ->orWhere('receiver_id', Auth::id())

        //                     ->orderBy('id', 'desc')->get()
        //                     ->unique('booking_id');

       

          $data['countmyarchive']  = Messages::where('receiver_id', Auth::id())
                            ->where('archive',1)
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');
           $data['countarchive']   = count($data['countmyarchive']);   


            $data['countmyadmin']  = Messages::where('receiver_id', Auth::id())
                            ->where('admin',1)
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');
           $data['countadmin']   = count($data['countmyadmin']);                 

        if ( count($data['messages']) > 0 ) {
            $booking_id             = $data['messages'][0]->booking_id;
            $data['conversassion']  = Messages::where('booking_id', $booking_id)->get();
            $data['booking']        = Bookings::where('id', $booking_id)
                                                ->with('users','properties')
                                                ->first();
        }
             $data['reasonslist'] =  ReportList::where('status','Active')->get();
             $data['savemgss'] = DB::table('save_messages')->where('userid',Auth::id())->get();
            
             $data['countreservation'] = Bookings::where('host_id', Auth::user()->id)->get();
             $data['countbooking']   = count($data['countreservation']);
             $data['countmytrips'] = Bookings::where('user_id', Auth::user()->id)->get();
             $data['counttrips']   = count($data['countmytrips']);





//start counts codes
     $data['countmsg']  = Messages::Where('receiver_id', Auth::id())
                            ->where('read',0)
                             ->where('admin',0)
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');

     $data['msgcount']   = count($data['countmsg']);
     $data['countreservation'] = Bookings::where('host_id', Auth::user()->id)->get();
     $data['countbooking']   = count($data['countreservation']);
     $data['countmytrips'] = Bookings::where('user_id', Auth::user()->id)->get();
     $data['counttrips']   = count($data['countmytrips']);
     $data['countmypayout'] = Payouts::where('user_id', Auth::user()->id)->get();
     $data['countpayout']   = count($data['countmypayout']);
     $data['countmytransaction'] = Withdrawal::where('user_id', Auth::user()->id)->get();
     $data['counttransaction']   = count($data['countmytransaction']);     
     $data['countmyreviews'] = Reviews::where('sender_id', Auth::user()->id)->orwhere('receiver_id', Auth::user()->id)->get();
     $data['countreviews']   = count($data['countmyreviews']);
     $data['countmylisting'] = Properties::where('host_id', Auth::user()->id)->get();
     $data['countlisting']   = count($data['countmylisting']);
       $UsersVerification= UsersVerification::where('user_id', Auth::user()->id)->where('identification', "yes")->where('email', "yes")->first();

       if($UsersVerification==""){
        $data['user_verification']="";
       }
//end of counts code        






        return view('users.inbox', $data); 
    }

    
    public function hostmessages(Request $request)
    {
        $data['messages']  = Messages::where('sender_id', Auth::id())
                            ->orWhere('receiver_id', Auth::id())
                            ->orderBy('id', 'desc')->get()
                            ->unique('booking_id');

        if ( count($data['messages']) > 0 ) {
            $booking_id             = $data['messages'][0]->booking_id;
            $data['conversassion']  = Messages::where('booking_id', $booking_id)->get();
            $data['booking']        = Bookings::where('id', $booking_id)
                                                ->with('users','properties')
                                                ->first();
        }
         $data['reasonslist'] =  ReportList::where('status','Active')->get();
 $data['savemgss'] = DB::table('save_messages')->where('userid',Auth::id())->get();
        return view('users.inbox', $data); 
    }






public function savefilter(Request $request)
    {
        $user_id = Auth::id();

      
        if($request->status == 1){
            DB::table('messages')
              ->where('id', $request->id)
              ->update(['read' => 0,'archive' => 0]);

        }elseif($request->status == 2){
             DB::table('messages')
              ->where('id', $request->id)
              ->update(['star' => 1]);
        }else{
          DB::table('messages')
              ->where('id', $request->id)
              ->update(['archive' => 1]);
        }
        return true;
    }



 public function saveformmsg(Request $request)
    {
        $user_id = Auth::id();

       // $data['savemgsss'] = DB::table('save_messages')->where('userid', $user_id)->get();
        if($request->id){


        $affected = DB::table('save_messages')
              ->where('id', $request->id)
              ->update(['title' => $request->title,'message' => $request->message]);

  }else{
     $affected = DB::table('save_messages')->insert(['userid' => $user_id,'title' => $request->title,'message' => $request->message]);
  }


        return true;
    }

    


   public function getsavemsg(Request $request)
    {
        $user_id = Auth::id();

        $data['savemgsss'] = DB::table('save_messages')->where('userid', $user_id)->get();

        return response()->json(["savemsglist"=>view('users.save_messages_list', $data)->render()]);
    }

    


   public function editsavemsg(Request $request)
    {
        $user_id = Auth::id();

        $id = $request->id;

        $data['savemsgrow'] = DB::table('save_messages')->where('id',  $id)->first();


        return response()->json(["msgdetails"=>view('users.save_msg_form', $data)->render()]);
    }

    /**
    * Message Read status Change
    * Details pass according to booking message
    */
    public function message(Request $request)
    {
        $booking_id = $request->id;
        $message = Messages::where([['booking_id', '=', $booking_id], ['receiver_id', '=', Auth::id()]])->update(['read' => 1]);
 
        $data['messages'] = Messages::where('booking_id', $booking_id)->get();
        $data['booking'] = Bookings::where('id', $booking_id)
                          ->with('host')->first();


        return response()->json([
             "inbox"=>view('users.messages', $data)->render(), "booking"=>view('users.booking', $data)->render()
        ]);
    }


   public function savemessage(Request $request)
    {
        $user_id = Auth::id();
        //$message = Messages::where([['booking_id', '=', $booking_id], ['receiver_id', '=', Auth::id()]])->update(['read' => 1]);
 
        // $data['messages'] = Messages::where('booking_id', $booking_id)->get();
        // $data['booking'] = Bookings::where('id', $booking_id)
        //                   ->with('host')->first();
        $data['savemgs'] = DB::table('save_messages')->where('userid', $user_id)->get();

        return response()->json(["smgs"=>view('users.save_messages', $data)->render()]);
    }

    /**
    * Message Reply 
    * Message read status change
    */
    public function messageReply(Request $request)
    {
        $messages = Messages::where([['booking_id', '=', $request->booking_id], ['receiver_id', '=', Auth::id()]])->update(['read' => 1]);

        $rules = array(
            'msg'      => 'required|string',
        );

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {     
            $message = new Messages;
            $message->property_id = $request->property_id;
            $message->booking_id = $request->booking_id;
            $message->receiver_id = $request->receiver_id;
            $message->sender_id = Auth::id();
            $message->message = $request->msg;
            $message->type_id = 1;
            $message->save();
            return 1;
        }
    }
}
