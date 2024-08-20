<?php

namespace App\DataTables;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubjectDataTable extends DataTable
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
                // $view = [
                //     'permission' => 'subject.view',
                //     'route' => 'subjects.show',
                // ];
                $edit = [
                    'permission' => 'subject.edit',
                    'route' => 'subjects.edit',
                ];
                $destroy = [
                    'permission' => 'subject.destroy',
                    'route' => 'subjects.destroy',
                ];

                return view('datatable.action', compact('row', 'edit', 'destroy'));
            })
            ->addColumn('my_class', function($row){
                $return = isset($row->my_class->name) ? $row->my_class->name : 'N/a';

                return $return;
            })
            ->addColumn('teacher', function($row){
                $return = isset($row->teacher->name) ? $row->teacher->name : 'N/a';
                return $return;
            })
            ->rawColumns(['action', 'my_class', 'teacher'])
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Subject $model): QueryBuilder
    {
        return $model->newQuery()->with(['my_class', 'teacher']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subject-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1, 'asc')
            ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->width(60)
                ->orderable(false)
                ->addClass('text-center'),
            Column::make('name'),
            Column::make('my_class'),
            Column::make('teacher'),
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
        return 'Subject_' . date('YmdHis');
    }
}
