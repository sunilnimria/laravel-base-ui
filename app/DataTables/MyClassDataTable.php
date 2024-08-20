<?php

namespace App\DataTables;

use App\Models\ClassType;
use App\Models\MyClass;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class MyClassDataTable extends DataTable
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
                    'permission' => 'class.view',
                    'route' => 'classes.show',
                ];
                $edit = [
                    'permission' => 'class.edit',
                    'route' => 'classes.edit',
                ];
                $destroy = [
                    'permission' => 'class.destroy',
                    'route' => 'classes.destroy',
                ];
            return view('datatable.action', compact('row', 'view', 'edit', 'destroy'));
            })
            ->addColumn('class_type', function ($row) {
                return $row->class_type->name;
            })
            ->addColumn('sections', function ($row) {
                $return = '' ;
                foreach( $row->sections as $section){
                    $class = $section->active ? 'success' : 'danger';
                    $return .= '<button type="button" class="btn btn-outline-'.$class .' m-1" disabled>'.$section->name.'</button>';
                }
                return $return;
            })
            ->rawColumns(['sections', 'class_type','action'])
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MyClass $model): QueryBuilder
    {
        return $model->newQuery()->with('sections', 'class_type');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('myclass-table')
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
            Column::make('sections'),
            Column::make('class_type')
                ->width(100)
                ->addClass('text-center'),
            // Column::make('updated_at'),
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
        return 'MyClass_' . date('YmdHis');
    }
}
