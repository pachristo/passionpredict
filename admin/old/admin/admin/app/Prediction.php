<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{

    protected $fillable =
        [
            'creator', 'gameDate', 'gameTime', 'teamOne', 'teamOneForm', 'teamOneOdds', 'teamTwo', 'teamTwoForm', 'teamTwoOdds', 'drawOdd', 'league', 'freePick', 'upcomingGame', 'FTRecommendation', 'oneFiveGoals', 'doubleChance', 'twoFiveGoals', 'threeFiveGoals', 'overZeroFiveHT', 'BTTS', 'draws', 'BigOdds', 'jackpot', 'jackpotTips', 'jackpotOdds', 'handicap', 'drawNoBet', 'bankerOfTheDay', 'bankerOfTheDayTip', 'bankerOfTheDayOdds', 'sure2Odds', 'sure2OddsTip', 'sure2OddsOdds', 'sure3Odds', 'sure3OddsTip', 'sure3OddsOdds', 'sure5Odds', 'sure5OddsTip', 'sure5OddsOdds', 'overThree', 'overThreeOdds', 'superSingle', 'superSingleTip', 'superSingleOdds', 'fiftyPlus', 'fiftyPlusTip', 'fiftyPlusOdds', 'weekend', 'weekendTip', 'weekendOdds', 'HTFTStatus', 'HTFT', 'HTFTOdds', 'superInvestment', 'superInvestmentTip', 'superInvestmentOdds', 'tennis', 'basketball', 'handball', 'ice_hockey', 'moreOption', 'FreePickStatus', 'testimonial', 'testimonialValue', 'cornerStatus', 'cornerResult', 'teamOneScore', 'teamTwoScore', 'teamOneWon', 'teamTwoWon', 'status', 'display', 'other', 'gameType', 'created_at', 'updated_at','weh', 'singleBet'
        ];

    public function getPrediction($id) {
        return $this->find($id);
    }

    public function addResult($request)
    {
        $id = trim($request['id']);
        $score1 = trim($request['score1']);
        $score2 = trim($request['score2']);

        $this->find($id)->update(['teamOneScore' => $score1, 'teamTwoScore' => $score2, 'teamOneWon'=>'Value']);
        if (isset($request['potential']) && $request['potential']!='')
        {
            $this->find($id)->update(['testimonial' => '1', 'testimonialValue' => $request['potential']]);

        }
        if (isset($request['investment']))
        {
            $this->find($id)->update(['moreOption' => $request['investment']]);

        }
        if (isset($request['FreePickStatus']))
        {
            $this->find($id)->update(['FreePickStatus' => $request['FreePickStatus']]);

        }
        if (isset($request['cornerResult']) && $request['cornerResult']!='')
        {
            $this->find($id)->update(['cornerStatus' => '1', 'cornerResult' => $request['cornerResult']]);

        }
        return true;
    }

    public function validateInput($request) {
        $teamOne = trim($request['teamOne']);
        $matchDate = trim($request['gameDate']);
        $matchTime = trim($request['gameTime']);
        $teamTwo = trim($request['teamTwo']);
        $league = trim($request['league']);

        if ($teamOne==null || $matchDate==null || $matchTime==null || $teamTwo==null || $league==null) {
            ResponseFacade::validationMessage('All * fields are required');
        }
    }

    public function checkValidate($request) {
        $teamOne = trim($request['teamOne']);
        $gameDate = trim($request['gameDate']);
        $teamTwo = trim($request['teamTwo']);
        $clause = trim($request['gameType']);

        $check = $this->where('gameDate', $gameDate)->where('teamOne', $teamOne)->where('teamTwo', $teamTwo)->where('gameType', $clause)->first();
        if ($check) {
            ResponseFacade::validationMessage('EXISTING PREDICTION FOUND! SAME MATCH ON SAME DATE. MULTIPLE PREDICTIONS CAN BE SUBMITTED WITH A SINGLE FORM');
        }
        return true;
    }

    public function checkValidateUpdate($request, $id) {
        $teamOne = trim($request['teamOne']);
        $gameDate = trim($request['gameDate']);
        $teamTwo = trim($request['teamTwo']);
        $clause = trim($request['gameType']);

        $check = $this->where('gameDate', $gameDate)->where('teamOne', $teamOne)->where('teamTwo', $teamTwo)->where('id', '!=', $id)->where('gameType', $clause)->first();
        if ($check) {
            ResponseFacade::validationMessage('EXISTING PREDICTION FOUND! SAME MATCH ON SAME DATE');
        }
        return true;
    }

    public function unarchiveGames($id)
    {
            $game = Archive::find($id);
            $this->create($game->attributes);
            Archive::destroy($id);
            return $id;
    }

    public function getGames($date, $key)
    {
        return $this->where('gameDate', $date)->where($key, 'Yes')->where('gameType', 1)->get();
    }
}
