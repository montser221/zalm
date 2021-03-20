<?php
namespace App\Http\Controllers;
use App\Models\DenoatePayDetail;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\PayDetail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DenoateExample;
use App\Exports\AllDenoate;
use \Carbon\Carbon;
class MoneyReportController extends Controller
{
	 public function index()
    {
     	$allprojects = Projects::latest()->where('projectStatus',1)->paginate(10);
    	// dd($allprojects);
      return view('dashboard.moneyreport.index')->with([
        'allprojects'=>$allprojects,
      ]);
    }

    public function exportToExcel(Request $request ,$id)
    {
      $startDate = $request->query('startDate');
      $endDate   = $request->query('endDate');
			$request->validate([
				'startDate'=>'required|date',
				'endDate'=>'required|date',
			]);
      
          return Excel::download(new DenoateExample($id,$startDate,$endDate), 'ex.xlsx');
    }

     public function dDetail($id)
    {
     $allDenoate = DenoatePayDetail::all()->where('projectTable',$id);

      return view('dashboard.moneyreport.projectReport')->with([
        'allDenoate'=>$allDenoate
      ]);
    }

}
