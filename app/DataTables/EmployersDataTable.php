<?php

namespace App\DataTables;

use App\Models\EmployerDetail;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EmployersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status', function ($row) {
                return ucfirst($row->status) ?? '-';
            })

            ->editColumn('image', function ($row) {
                $imagePath = asset('storage/company_logos/' . $row->logo);
                return '<img class="mx-auto d-block img-fluid" width="50" src="' . $imagePath . '">';
            })
            ->rawColumns(['image'])
            ->setRowId('id');
    }
    public function query(EmployerDetail $model): QueryBuilder
    {
        return $model->newQuery();
    }
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('employers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(4)
            ->selectStyleSingle()
            ->buttons([

            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('image'),
            Column::make('categories'),
            Column::make('location'),
            Column::make('contact_number'),
            Column::make('since'),
            Column::make('email'),
            Column::make('team_members'),
            Column::make('website'),

        ];
    }

    protected function filename(): string
    {
        return 'Employers_' . date('YmdHis');
    }
}
