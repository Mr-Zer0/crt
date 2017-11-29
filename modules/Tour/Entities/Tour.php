<?php

namespace Modules\Tour\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Tour extends Model
{
    # TODO : Make Repository Pattern

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
        'inquiry_date',
        'date_from',
        'date_to'
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

    public function getTourDurationAttribute()
    {
        $date_from = (Carbon::parse($this->date_from))->toFormattedDateString();
        $date_to = (Carbon::parse($this->date_to))->toFormattedDateString();

        return $date_from . ' - ' . $date_to;
    }

    /**
     * Accessor for total number of pax
     *
     * @return string
     */
    public function getPaxAttribute()
    {
        return $this->adult + $this->child + $this->infant;
    }

    public function createTour(Request $request)
    {
        $this->makeData($request->all());

        return $this->save();
    }

    public function updateTour(Request $request)
    {
        $this->makeData($request->all(), false);

        return $this->save();
    }

    public function getInquiryDateAttribute()
    {
        $carbon = Carbon::createFromFormat('Y-m-d', $this->attributes['inquiry_date']);
        return $carbon->format('j F Y');
    }

    public function getDateFromAttribute()
    {
        $carbon = Carbon::createFromFormat('Y-m-d', $this->attributes['date_from']);
        return $carbon->format('j F Y');
    }

    public function getDateToAttribute()
    {
        $carbon = Carbon::createFromFormat('Y-m-d', $this->attributes['date_to']);
        return $carbon->format('j F Y');
    }

    public function setInquiryDateAttribute($data)
    {
        $this->attributes['inquiry_date'] = Carbon::createFromFormat('j F Y', $data)->toDateTimeString();
    }

    public function setDateFromAttribute($data)
    {
        $this->attributes['date_from'] = Carbon::createFromFormat('j F Y', $data)->toDateTimeString();
    }

    public function setDateToAttribute($data)
    {
        $this->attributes['date_to'] = Carbon::createFromFormat('j F Y', $data)->toDateTimeString();
    }

    protected function makeData($data, $create = true)
    {
        # TODO - Add updated by data field
        
        if($create)
        {
            $this->tour_code = $this->makeCode();
            $this->user_id = auth()->user()->id;
        }

        $this->title = $data['title'];
        $this->client_name = $data['client_name'];
        $this->adult = $data['adult'];
        $this->infant = $data['infant'];
        $this->child = $data['child'];
        $this->status = $data['status'];
        $this->destination = $data['destination'];
        $this->remark = $data['destination'];
        $this->inquiry_date = $data['inquiry_date'];
        $this->date_from = $data['date_from'];
        $this->date_to = $data['date_to'];
    }

    protected function makeCode()
    {
        $tourCode = Tour::max('tour_code');
        $year = substr($tourCode, 0, 2);
        $number = substr($tourCode, -3);

        if ($year == date('y'))
        {
            return $tourCode += 1;
        }
        
        return date('y') . 001;
    }
}
