<?php 

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EventTrait;

class EventRepository implements RepositoryInterface 
{
    use EventTrait;
    protected $model;

    public function __construct(Model $model) 
    {
        $this->model = $model;
    }

    public function all() {

        $dates = $this->model->all();

        $newDates = [];
        foreach($dates as $date) {
            $from = Carbon::parse($date['start_date']);
            $to = Carbon::parse($date['end_date']);

            $days = json_decode($date['selected_days'], true);
            $dateRange = $this->getDateRange($from, $to);

            $newDateRange = [];
            foreach($days as $day) {
                foreach($dateRange as $range) {
                    if($day['name'] === $range['day']) {
                        array_push($newDateRange, $range);
                    }
                }
            }

            $date = [
                "id" => $date['id'],
                "name" => $date['name'],
                "start_date" => $date['start_date'],
                "end_date" => $date['end_date'],
                "selected_days" => $date['selected_days'],
                "dates" => $newDateRange,
            ];

            array_push($newDates, $date);
        }

        
        return $newDates;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }
}
