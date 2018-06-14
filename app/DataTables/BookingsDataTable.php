<?php

namespace App\DataTables;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use timgws\QueryBuilderParser;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;

/**
 * Class BookingsDataTable
 * @package App\DataTables
 */
class BookingsDataTable extends DataTable
{
    /**
     * List of columns to be exported.
     *
     * @var array
     */
    protected $exportColumns = [
        'quest',
        'data',
        'first_name',
        'last_name',
        'phone',
        'email',
        'status',
    ];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query): DataTableAbstract
    {
        return datatables($query)
            ->addColumn('quest', function ($item) {
                return $item->quest->title;
            })
            ->addColumn('actions', 'bookings.actions')
            ->rawColumns(['actions']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws \timgws\QBParseException
     */
    public function query(): Builder
    {
        $rules = $this->request()->input('rules');

        $query = DB::table('bookings')->select($this->getColumns());

        if (json_decode($rules)) {
            $qbp = new QueryBuilderParser($this->getFilterableColumns());

            $query = $qbp->parse($rules, $query);
        }

        return (new Builder($query))
            ->setModel(new Booking())
            ->with(['quest']);
    }

    /**
     * @return array
     */
    protected function getFilterableColumns(): array
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
    protected function getColumns(): array
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
    protected function filename(): string
    {
        return 'Bookings_' . date('YmdHis');
    }
}
