<?php

namespace App\DataTables;

use App\Models\MyClass;
use App\Models\Section;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SectionDataTable extends DataTable
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
                $view = [
                    'permission' => 'section.view',
                    'route' => 'sections.show',
                ];
                $edit = [
                    'permission' => 'section.edit',
                    'route' => 'sections.edit',
                ];
                $destroy = [
                    'permission' => 'section.destroy',
                    'route' => 'sections.destroy',
                ];

            return view('datatable.action', compact('row', 'view', 'edit', 'destroy'));
        })
        ->addColumn('class', function ($row) {
            $return = isset($row->my_class->name) ? $row->my_class->name : 'N/a' ;
            if ($row->active == true) {
                $return .= '<i class="bi bi-check-circle text-success mx-2"></i>';
            } else {
                $return .= '<i class="bi bi-time-circle text-danger mx-2"></i>';
            }
            return $return;
        })
        ->addColumn('teacher', function ($row) {
            $return = isset($row->teacher->name) ? $row->teacher->name : 'N/a' ;
            return $return;
        })
        ->rawColumns(['class', 'teacher','action'])
        ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Section $model): QueryBuilder
    {
        return $model->newQuery()->with('my_class', 'teacher');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('section-table')
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
            Column::make('class')
                ->addClass('text-center'),
            Column::make('teacher')
                ->addClass('text-center'),
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
        return 'Section_' . date('YmdHis');
    }
}
