<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Lang;
use Calendar;
use App;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;


class Event extends Model
{
    protected $fillable = ['title','start_date','end_date', 'lang_id'];

    static function event($locale) {
        $lng=Lang::getLangId($locale);



        $events = [];
        $data = Event::all();
      //  return  $data;
       $data = DB::table("events")->where('lang_id','=',$lng)->get();


        if($data->count()) {

            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                       'url' => url(app()->getLocale().'/archieves/'.$value->start_date),
                    ]
                );
            }
        }
        return   $calendar = Calendar::addEvents($events);

    }

}
