<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
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
                'permission' => 'student.view',
                'route' => 'students.show',
            ];
            $edit = [
                'permission' => 'student.edit',
                'route' => 'students.edit',
            ];
            $destroy = [
                'permission' => 'student.destroy',
                'route' => 'students.destroy',
            ];

        return view('datatable.action', compact('row', 'view', 'edit', 'destroy'));
    })
            ->addColumn('parents', function($row){
                $return = '<span class="ms-1"> Mr. ' .$row->father_name . '</span><br><span class="ms-1">Mrs. '.$row->mother_name.'</span>';
                return $return;
            })
            ->addColumn('my_class', function($row){
                $return = $row->my_class->name . '<span class="ms-1">('.$row->section->name.')</span>';
                return $return;
            })
            ->addColumn('mobile_no', function($row){
                $return = $row->mobile_no. '<br>';
                $return .= '<a href="https://wa.me/91'.$row->mobile_no.'?text=Hello" target="_blank"><i class="bi bi-whatsapp pe-2"></i></a>';
                $return .= '<a href="tel:91'.$row->mobile_no.'" target="_blank"><i class="bi bi-telephone-outbound pe-2"></i></a>';
                return $return;
            })
            ->rawColumns(['action', 'my_class', 'parents', 'mobile_no'])
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Student $model): QueryBuilder
    {
        return $model->newQuery()->with(['my_class', 'section']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('student-table')
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
            Column::make('parents'),
            Column::make('mobile_no'),
            Column::make('my_class'),
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
        return 'Student_' . date('YmdHis');
    }
}
