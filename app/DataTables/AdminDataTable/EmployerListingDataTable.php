<?php

namespace App\DataTables\AdminDataTable;

use App\Models\EmployerDetail;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EmployerListingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                // return '<a href="' . route('employers.edit', $row->id) . '" class="btn btn-sm btn-primary edit-btn" data-id="' . $row->id . '">Edit</a>
                return  '<a href="' . route('employers.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '">Delete</a>';
            })
            ->editColumn('status', function ($row) {
                return '<div class="form-check form-switch form-switch-sm">
                            <input class="form-check-input employer-status" type="checkbox" ' . ($row->status == 1 ? 'checked' : '') . ' data-id="' . $row->id . '" data-status="' . $row->status . '">
                        </div>';
            })
           
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }
    public function query(EmployerDetail $model): QueryBuilder
    {
        return $model->newQuery();
    }
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('admin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->responsive(true)
             ->orderBy(2, 'desc')
            ->buttons([
            ]);
    }
    public function getColumns(): array
    {
        return [
            Column::make('categories'),
            Column::make('name'),
            Column::make('location'),
            Column::make('contact_number'),
            Column::make('since'),
            Column::make('team_members'),
            Column::make('email'),
            Column::make('website'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Admin_' . date('YmdHis');
    }
}
