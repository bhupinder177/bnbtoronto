<?php

namespace App\DataTables;

//use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Auth;
use App\Models\{
    User,
    UsersVerification,
    Wallet,
    Properties,
    SpaceType,
    Settings,
    Accounts,
    Country,
    Bookings
};

class CustomerpropDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($users) {

                $edit = \Helpers::has_permission(Auth::guard('admin')->user()->id, 'edit_customer') ?'<a href="' . url('admin/edit-customer/' . $users->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;' : '';

                return $edit;
            })
            ->addColumn('action', function ($users) {

                $first_name = \Helpers::has_permission(Auth::guard('admin')->user()->id, 'edit_customer') ?'<a href="' . url('admin/customer/properties/' . $users->id) . '">' . ucfirst($users->first_name).' '.ucfirst($users->last_name).'</a>&nbsp;' : '';

                return $first_name;
            })
  ->addColumn('status', function ($users) {

                // $status = \Helpers::has_permission(Auth::guard('admin')->user()->id, 'edit_customer') ?'<a href="' . url('admin/customer/properties/' . $users->id) . '">' . ucfirst($users->first_name).' '.ucfirst($users->last_name).'</a>&nbsp;' : '';

                return $users->status;
            })

            // ->addColumn('last_name', function ($users) {

            //     // $first_name = \Helpers::has_permission(Auth::guard('admin')->user()->id, 'edit_customer') ?'<a href="' . url('admin/customer/properties/' . $users->id) . '">' . ucfirst($users->first_name).' '.ucfirst($users->last_name).'</a>&nbsp;' : '';

            //     return ucfirst($users->last_name);
            // })
            //     ->addColumn('first_name', function ($users) {
            //     return '<a href="' . url('admin/customer/properties/' . $users->id) . '">' . ucfirst($users->first_name).'</a>';
            // })
                  ->addColumn('viewprop', function ($users) {
                return '<a class="btn btn-success" href="' . url('admin/customer/properties/' . $users->id) . '">View</a>';
            })
               
                        ->addColumn('numlisting', function ($users) {

                    $countprop = Properties::where('host_id', $users->id)->get();
                    $count = count($countprop);
                        return $count;
                    })
// ->filter(function ($query) {
//                     if (request()->has('first_name')) {
//                         $query->where('first_name', 'like', "%" . request('first_name') . "%");
//                     }

                    
                // })
     
            ->rawColumns(['last_name', 'viewprop','action'])
            ->make(true);
    }

    public function query()
    {
        $status   = isset(request()->status) ? request()->status : null;
        $from     = isset(request()->from) ? setDateForDb(request()->from) : null;
        $to       = isset(request()->to) ? setDateForDb(request()->to) : null;
        $customer = isset(request()->customer) ? request()->customer : null;
  
        
        $query    = User::select();

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
   
        $query->where('user_type', '=', 'host');
        
        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID', 'orderable' => false,])
           // ->addColumn(['data' => 'user_type', 'name' => 'user_type', 'title' => 'user_type'])
            ->addColumn(['data' => 'first_name', 'name' => 'first_name', 'title' => 'Firstname', 'orderable' => false, 'searchable' => true])
             ->addColumn(['data' => 'last_name', 'name' => 'last_name', 'title' => 'Lastname', 'orderable' => false, 'searchable' => true])
            
            ->addColumn(['data' => 'numlisting', 'name' => 'numlisting', 'title' => '# of Listings', 'orderable' => false])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status', 'orderable' => false,'searchable' => true])
             ->addColumn(['data' => 'viewprop', 'name' => 'viewprop', 'title' => 'Action', 'orderable' => false,'searchable' => true])
            
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
        return 'customerspropdatatables_' . time();
    }
}
