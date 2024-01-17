<?php
namespace App\DataTables;

use App\Models\Job;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class JobsDataTable extends DataTable
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
                return '<div class="d-flex gap-2">' .
                '<a href="' . route('jobs.edit', $row->id) . '" class="btn btn-sm btn-primary edit-btn" data-id="' . $row->id . '"><i class="bi bi-pencil"></i></a>' .
                '<a href="' . route('jobs.destroy', $row->id) . '" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '"><i class="bi bi-trash"></i></a>' .
                    '</div>';
            })

            ->addColumn('status', function ($row) {
                return '<div class="form-check form-switch form-switch-sm">
                            <input class="form-check-input job-status-toggle" type="checkbox" ' . ($row->status == 1 ? 'checked' : '') . ' data-id="' . $row->id . '" data-status="' . $row->status . '">
                        </div>';

            })
            ->rawColumns(['action', 'status'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Job $model): QueryBuilder
    {
        $employerId = Auth::id();

        return $model->newQuery()->where('employer_id', $employerId);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jobs-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->orderBy(2, 'desc')
            ->buttons([

            ]);
    }

    public function getColumns(): array
    {
        return [

            Column::make('title'),
            Column::make('job_type'),
            Column::make('category'),
            Column::make('gender'),
            Column::make('qualification'),
            Column::make('experience'),
            Column::make('salary'),
            Column::make('address'),
            Column::make('level'),
            Column::make('skills'),
            Column::make('posted_date'),
            Column::make('application_end_date'),
            // Column::make('description'),

            Column::make('status')
                ->title('Status')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),

            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }
    protected function filename(): string
    {
        return 'Jobs_' . date('YmdHis');
    }
}
