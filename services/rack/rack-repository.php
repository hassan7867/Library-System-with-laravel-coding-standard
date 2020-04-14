<?php

namespace services\rack;
use App\RackTable;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use library_system\rack\Name;

class RackRepository
{
    public function store($rackName)
    {
        $name=new Name(new \NonEmptyString($rackName));
        $rackTable=new RackTable();
        $rackTable->name=$name->value();
        $result=$rackTable->save();
        return $result;
    }

    public function index()
    {
            $racks = RackTable::all();
            return view('template/pages/show-racks')->with(['racks' => $racks, 'role' => Session::get('role')]);
    }
}
