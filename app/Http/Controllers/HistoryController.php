<?php

namespace Bulkly\Http\Controllers;

use Bulkly\Model\BufferPosting;
use Bulkly\Model\Group;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
//        $buffers = BufferPosting::with('user')->with('group')->with('post')->paginate(10);
        $buffers = BufferPosting::get();
        $group = Group::all();
        $buffers_date = BufferPosting::all();
//        return $buffers;
        return view('history.index', compact('buffers', 'group', 'buffers_date'));
    }

    public function getData($search, $time, $group){
        if ($search == 'null' && $time == 'null' && $group == 'null'){
            $buffers = BufferPosting::with('user')->with('group')->with('post')->paginate(10);
        }
        else{
            $buffers = BufferPosting::where(function ($query) use ($search, $time, $group){
                if ($search != 'null'){
                    $query->where('post_text', 'like', '%'.$search.'%');
                }
                if ($time != 'null'){
                    $query->where('created_at', $time);
                }
                if ($group != 'null'){
                    $query->where('group_id','=', $group);
                }
            })->with('user')->with('group')->with('post')->paginate(10);
        }

        return response()->json($buffers);
    }
}
