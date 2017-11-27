<?php

namespace Modules\Tour\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'client_name',
        'tour_code',
        'inquiry_date',
        'date_from',
        'date_to',
        'adult',
        'child',
        'infant',
        'status',
        'destination',
        'remark',
        'user_id'
    ];

    protected $dates = [
        'date_from',
        'date_to',
        'inquiry_date'
    ];

    /**
     * Accessor for tour code
     *
     * @return string
     */
    public function getCodeAttribute()
    {
        return 'CRT' . $this->tour_code;
    }

    /**
     * Accessor for total number of pax
     *
     * @return string
     */
    public function getPaxAttriburte()
    {
        return $this->adult + $this->child + $this->infant;
    }

    public static function createTour(Request $request)
    {
        (new static)->makeData($request->all());
    }

    public static function updateTour(Request $request)
    {

    }

    protected function makeData($data)
    {dd($data);
        $data['tour_code'] = (is_null(Tour::max('tour_code'))) ? 17180 : date('y') . Tour::max('tour_code') + 1;

        $this->title = $data['title'];
        $this->client_name = $data['client_name'];
    }
}
