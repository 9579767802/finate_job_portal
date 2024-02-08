<?php

namespace App\DataTables;

use App\Models\job;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
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
    public function query(job $model): QueryBuilder
    {
        $employerId = Auth::user()->employerDetail?->id;

        return $model->newQuery()
            ->join('job_candidates', 'jobs.id', '=', 'job_candidates.job_id')
            ->join('candidate_details', 'candidate_details.user_id', '=', 'job_candidates.user_id')
            ->where('jobs.employer_id', $employerId);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('appliedcandidate-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->buttons([
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('name'),
            Column::make('designation'),
            Column::make('contact_number'),
            Column::make('location'),
            // Column::make('title'),
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
