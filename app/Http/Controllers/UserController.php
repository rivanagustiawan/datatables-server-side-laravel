<?php
       
namespace App\Http\Controllers;
       
use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
       
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn() 
                    ->addColumn('pic', function($row){
                        
                        $pic = '<img src="'.$row->pic.'" style="width:100px;"/>';
                        
                        return $pic;
                    })
                    ->rawColumns(['pic'])
                    ->make(true);
        }
        
        return view('users');
    }
}