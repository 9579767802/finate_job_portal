<?php

namespace App\DataTables;

use App\Models\CandidateDetail;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ShortlistedCandidatesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id');
    }

    public function query(CandidateDetail $model): QueryBuilder
    {
        return $model->newQuery()->where('shortlisted', 1);

    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('shortlistedcandidates-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('name')->title('Name'),
            Column::make('designation')->title('Designation'),
            Column::make('location')->title('Location'),
            Column::make('contact_number')->title('Contact No'),
            Column::make('age')->title('Age'),
            Column::make('gender')->title('Gender'),
            Column::make('experience')->title('Experience'),
        ];
    }

    protected function filename(): string
    {
        return 'ShortlistedCandidates_' . date('YmdHis');
    }
}
