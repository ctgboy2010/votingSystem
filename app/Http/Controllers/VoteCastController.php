<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\Voter;
use Illuminate\Http\Request;

class VoteCastController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //$candidates = Candidate::all();
        $candidates = Candidate::orderBy('cast','desc')->get();
        //dd($candidates);
        $maxValue = Candidate::all()->max('cast');
        $totalMaxValue = Candidate::where('cast','=',$maxValue)->count();
        /*source: http://stackoverflow.com/questions/22131609/select-distinct-value-count-laravel*/

        /*$status = Candidate::all()->min('cast');*/
        //dd($totalMaxValue);

        /*$price = DB::table('orders')->min('price');*/
        return view('votingsystem.index', compact('candidates','maxValue','totalMaxValue'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('votingsystem.createCastVote');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Voter $voter,Candidate $candidate)
	{
        $voterId = $_POST['voterId'];
        $symbol = $_POST['symbol'];
        //dd($voterId);
        /*var_dump($symbol);
        var_dump($voterId);*/
        //die();
//        dd($symbol);
//        dd($voterId);

//        $candidates = Candidate::all()->where('id',$symbol)->first();
//        dd($candidates);
        $voter = Voter::where('voterId',$voterId)->first();
//        dd($voter['vote']);
//        $voter->update(array('vote' => true));

//        $candidate = Candidate::where('id',$symbol)->first();
//        $countCast = $candidate->cast + 1;
//        $candidate->update(array('cast' => $countCast));
        //return Redirect::route('castVote.index');

        if(isset($voterId) && !empty($voterId)/* && isset($symbol)*/)
        {
            if($voterId == $voter['voterId'])
            {
                if($voter['vote']==false)
                {
                    $voter->update(array('vote' => true));

                    $candidate = Candidate::where('id',$symbol)->first();
                    $countCast = $candidate->cast + 1;
                    $candidate->update(array('cast' => $countCast));

                    Session::flash('message','Thank you, Your vote is successfully taken');
                    return Redirect::route('castVote.index');
                }
                else{
                    Session::flash('message',"This voter already casted his/her vote, so his can't cast no more vote");
                    return Redirect::route('castVote.create');
                }
            }
            else{
                Session::flash('message', "This voter doesn't exist into the system");
                return Redirect::route('castVote.create');
            }
        }
        else{
            Session::flash('message','Voter Id is required');
            return Redirect::route('castVote.create');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}