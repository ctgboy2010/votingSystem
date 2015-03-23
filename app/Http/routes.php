<?php
Route::model('voters','Voter');
/*Route::bind('voters', function($value, $route)
{
    return App\Voter::whereid($value)->first();
});*/
Route::resource('/voters','VotersController');


Route::model('candidates','Candidate');
/*Route::bind('candidates', function($value, $route)
{
    return App\Candidate::whereid($value)->first();
});*/
Route::resource('/candidates','CandidatesController');

Route::resource('/castVote','VoteCastController');