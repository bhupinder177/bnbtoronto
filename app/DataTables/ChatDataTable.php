<?php

namespace App\DataTables;

use App\Models\ChatFilter;
use Yajra\DataTables\Services\DataTable;
use Auth;

class ChatDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($users) {

                $edit = \Helpers::has_permission(Auth::guard('admin')->user()->id, 'edit_customer') ?'<a href="' . url('admin/edit-chat/' . $users->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>&nbsp; <a href="' . url('admin/delete-chat/' . $users->id) . '" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>' : '';

                return $edit;
            })
                
       
            ->rawColumns(['first_name', 'last_name', 'formatted_phone','action'])
            ->make(true);
    }

    public function query()
    {
        $status   = isset(request()->status) ? request()->status : null;
        $from     = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to       = isset(request()->to) ? setDateForDb(request()->to) : null;
        $customer = isset(request()->customer) ? request()->customer : null;
        
        $query    = ChatFilter::select();

        if (!empty($from)) {
             $query->whereDate('created_at', '>=', $from);
        }
        if (!empty($to)) {
             $query->whereDate('created_at', '<=', $to);
        }
        if (!empty($status)) {
            $query->where('status', '=', $status);
        }
        if (!empty($customer)) {
            $query->where('id', '=', $customer);
        }
        
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
            
            ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Title'])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
      
           ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action'])
             ->parameters([
                'dom' => 'lBfrtip',
                'buttons' => [],
                'order' => [0, 'desc'],
                'pageLength' => \Session::get('row_per_page'),
            ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'created_at',
            'updated_at',
        ];
    }

    protected function filename()
    {
        return 'customersdatatables_' . time();
    }
}
