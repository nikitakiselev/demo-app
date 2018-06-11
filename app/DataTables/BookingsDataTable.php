<?php

namespace App\DataTables;

use App\User;
use Illuminate\Support\Facades\DB;
use timgws\QueryBuilderParser;
use Yajra\DataTables\Services\DataTable;

/**
 * Class BookingsDataTable
 * @package App\DataTables
 */
class BookingsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('actions', 'bookings.actions')
            ->rawColumns(['actions']);
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     * @throws \timgws\QBParseException
     */
    public function query()
    {
        $rules = $this->request()->input('rules');

        $query = DB::table('bookings')->select($this->getColumns());

        if (json_decode($rules)) {
            $qbp = new QueryBuilderParser($this->getFilterableColumns());

            $builder = DB::table('bookings')->select($this->getColumns());

            $query = $qbp->parse($rules, $builder);
        }

        return $query;
    }

    protected function getFilterableColumns()
    {
        return [
            'first_name',
            'last_name',
            'phone',
            'email',
            'status',
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'quest_id',
            'first_name',
            'last_name',
            'phone',
            'email',
            'status',
            'date',
            'price',
            'created_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Bookings_' . date('YmdHis');
    }
}
