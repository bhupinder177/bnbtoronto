<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Messages;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MessageExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        
        $to                 = setDateForDb(request()->to);
        $from               = setDateForDb(request()->from);
        $status             = isset(request()->status) ? request()->status : null;
        $customer           = isset(request()->customer) ? request()->customer : null;

        $query = messages::orderBy('id', 'desc')->select();


        // if ($from) {
        //     $query->whereDate('created_at', '>=', $from);             
        // }
        // if ($to) {
        //     $query->whereDate('created_at', '<=', $to); 

        // }               
        // if ($status) {
        //     $query->where('status','=',$status);
        // }
        // if ($customer) {
        //     $query->where('id','=',$customer);
        // }

        $customerList = $query->get();
        if ($customerList->count()) {
            foreach ($customerList as $key => $value)
                {
                 

$sendername = user::where('id', $value->sender_id)->first();
$receivername= user::where('id', $value->receiver_id)->first();

                    $data[$key]['Property Id']        = $value->property_id;
                    $data[$key]['User Type']        = $value->booking_id;
                    $data[$key]['Sender']         = $sendername->first_name." ".$sendername->last_name;
                    $data[$key]['Receiver']        = $receivername->first_name." ".$receivername->last_name;
                    $data[$key]['Message']        = $value->message;
                    $data[$key]['Created At']   = dateFormat($value->created_at);
                }
            }
        else {
            $data = null;
        }
        return $data;
    }

    public function headings(): array
    {
        return [
            'Property Id',
            'Booking Id',
            'Sender',
            'Receiver',
            'Message',
            'Crated at',
        ];
    }
}
