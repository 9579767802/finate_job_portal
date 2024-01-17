<?php

namespace App\DataTables;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AppliedCandidateDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Candidate $model): QueryBuilder
    {
        // $data = $model->join('jobs', 'jobs.id', '=', 'job_candidates.job_id')
        //               ->join('users', 'users.id', '=', 'job_candidates.user_id');

        $data = Candidate::join('jobs', 'jobs.id', '=', 'job_candidates.job_id')
            ->join('candidate_details', 'candidate_details.id', '=', 'job_candidates.user_id');
        return $data;

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('appliedcandidate-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
        // ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('name'),
            Column::make('designation'),
            Column::make('contact_number'),
            Column::make('location'),
            Column::make('title'),
            Column::make('age'),
            Column::make('experience'),
            Column::make('gender'),

        ];
    }
    protected function filename(): string
    {
        return 'AppliedCandidate_' . date('YmdHis');
    }
}
