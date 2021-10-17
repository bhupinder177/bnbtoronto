<?php

/**
 * ReasonsDataTable Data Table
 *
 * ReasonsDataTable Data Table handles AmenityTypeDataTable datas.

 */

namespace App\DataTables;

use App\Models\ReportList;
use Yajra\DataTables\Services\DataTable;

class ReasonsDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($reasonsl) {

                $edit   = '<a href="' . url('admin/settings/edit-reasons/' . $reasonsl->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;';
                $delete = '<a href="' . url('admin/settings/reasons/delete/' . $reasonsl->id) . '" class="btn btn-xs btn-danger delete-warning"><i class="glyphicon glyphicon-trash"></i></a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function query()
    {
        $query = ReportList::select();

        return $this->applyScopes($query);
    }

    public function html()
    {
        return $this->builder()
            ->addColumn(['data' => 'title', 'name' =>'title', 'title' => 'Title'])
            ->addColumn(['data' => 'status', 'name' =>'status', 'title' => 'Status'])
            ->addColumn(['data' => 'action', 'name' =>'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false])
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
        return 'reportlistdatatables_' . time();
    }
}
