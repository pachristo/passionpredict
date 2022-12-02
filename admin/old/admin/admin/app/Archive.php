<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable =
        [
            'creator',
            'gameDate',
            'gameTime',
            'teamOne',
            'teamOneForm',
            'teamOneOdds',
            'teamTwo',
            'teamTwoForm',
            'teamTwoOdds',
            'drawOdd',
            'league',
            'freePick',
            'upcomingGame',
            'FTRecommendation',
            'actualPoint',
            'twoMaxStake',
            'threeMaxStake',
            'dailyDouble',
            'dailyTreble',
            'pickDay',
            'superSingles',
            'accumulatorTips',
            'oneDotFive',
            'twoDotFive',
            'threeDotFive',
            'BTTS',
            'jackPot',
            'HTFT',
            'correctScore',
            'doubleChance',
            'firstHalfResult',
            'customTips',
            'moreOption',
            'testimonial',
            'testimonialValue',
            'teamOneScore',
            'teamTwoScore',
            'teamOneWon',
            'teamTwoWon',
            'status',
            'display',
            'other'
        ];

    public function getArchive($id) {
        return $this->find($id);
    }

    public function archiveGames($request, $id = null)
    {
        if ($id != null)
        {
            $game = Prediction::find($id);
            Archive::create($game->attributes);
            Prediction::destroy($id);
            return $id;
        }
        else
        {
            $games = Prediction::whereBetween('created_at', [date('Y-m-d H:i:s', strtotime($request['from'])), date('Y-m-d H:i:s', strtotime($request['to']))])->take('30')->get();
            foreach ($games as $game) {
                Archive::create($game->attributes);
                Prediction::destroy($game->attributes['id']);
            }
            return count($games);
        }
    }
}
