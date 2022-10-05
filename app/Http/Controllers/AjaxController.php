<?php
namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller {
    public function index() {
    $t=Product::select('category')
        ->groupby('category')
        ->get();
    return view('message')->with('t',$t);
    }

    function fetch(Request $request)
    {
        $nb = $request->get('nb');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
    //  return $select.".". $value.".".$dependent;
        $data = Product::select('*')
            ->where('category', $value)
            ->get();

        $output=' <input type="hidden" value="'.$nb.'" name="nb">';
       echo  $output;
        for ($i=0;$i<$nb;$i++){
         $j=$i+1;
        $output='
         <div class="col-md-12 form-group" style="display: flex;">
                                                                <input id="Quantity" type="number"
                                                                class="form-text" name="Quantity'.$i.'"
                                                                       style="background: #4b4949;color: white;border-radius: 2%;
    font-size: medium;  width: 287px; height: 43px;"   placeholder="Quantity" required >
     <select       name="p'.$i.'"
     style="background: #4b4949;
     margin-left: 11px;

    font-size: medium;
     color: white; width: 287px; height: 43px;"  >';
        $output .= '<option value="">Select products</option>';
        foreach($data as $row)
        {

            $output .= '<option value="'.$row->id.'">'.$row->$dependent.'</option>';
        }
        $output.='        </select >                                                            </div>
';
        echo $output;
        }
    }




    function fetch1(Request $request)
    {
        $nb = $request->get('nb');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
    //    return $select.".". $value.".".$dependent;
        $data = Product::select("name")
            ->get();
        $output='<div>eeeeeeee</div>';
      ;
        echo $output;
    }
}
