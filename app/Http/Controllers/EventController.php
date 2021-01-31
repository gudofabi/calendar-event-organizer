<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Repositories\EventRepository;
use App\Http\Requests\Event as EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = new EventRepository($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {

        $event = [
            'name'          => $request->name,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'selected_days' => json_encode($request->selected_days),
        ];
    
        try {

            return $this->model->create($event);
        
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function update(Request $request, $id) {
        $event = [
            'name'          => $request->name,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'selected_days' => json_encode($request->selected_days),
        ];

        try {
            return $this->model->update($event, $id);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function show($id) {
        return $this->model->show($id);
    }

    
}
