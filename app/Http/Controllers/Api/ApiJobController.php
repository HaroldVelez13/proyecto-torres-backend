<?php

namespace App\Http\Controllers\Api;

use App\Job;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;


class ApiJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::All();

        return compact('jobs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(JobRequest $jobRequest)
    {
        $job = new Job();

        $job->business_person   = $jobRequest->business_person;
        $job->principal_phone   = $jobRequest->principal_phone;
        $job->optional_phone    = $jobRequest->optional_phone;
        $job->init_date         = $jobRequest->init_date;
        $job->finish_date       = $jobRequest->finish_date;
        $job->city              = $jobRequest->city;

        $job->save();

        return compact('job');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        $users = $job->users;

        return compact('job', 'users');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $jobRequest, $id)
    {
        $job = Job::findOrFail($id);

        $job->business_person   = $jobRequest->business_person;
        $job->principal_phone   = $jobRequest->principal_phone;
        $job->optional_phone    = $jobRequest->optional_phone;
        $job->init_date         = $jobRequest->init_date;
        $job->finish_date       = $jobRequest->finish_date;
        $job->city              = $jobRequest->city;

        $job->save();

        return compact('job');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Id $id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        return compact('job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  users Ids
     * @param  \App\Job  $job id
     * @return \Illuminate\Http\Response
     */
    public function addUsers(Request $request, $id){

        $job = Job::findOrFail($id);
        $usersArray = array_values($request->all());
        
        $job->users()->sync($usersArray);

        $users = $job->users;

        return compact('job', 'users');

    }
}
