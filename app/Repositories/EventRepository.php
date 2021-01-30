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

    public function index() {
        $from = Carbon::parse($data['start_date']);
        $to = Carbon::parse($data['end_date']);

        $days = $data['selected_days'];
        $dateRange = $this->getDateRange($from, $to);

        $newDateRange = [];

        foreach($days as $day) {
            foreach($dateRange as $range) {
                if($day['name'] === $range['day']) {
                    array_push($newDateRange, $range);
                }
            }
        }

        return $newDateRange;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
