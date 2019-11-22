<?php

namespace Bulkly\Http\Controllers;

use Bulkly\Model\BufferPosting;
use Bulkly\Model\Group;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $buffers = BufferPosting::with('user')->with('group')->with('post')->paginate(10);
        $group = Group::all();
//        return $buffers;
        return view('history.index', compact('buffers', 'group'));
    }
}
