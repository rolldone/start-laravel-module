<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class BaseController extends Controller
{
  /* --------------------------------
	 * Track record log at here, debug or not
	 * --------------------------------------------- */
  public function returnResponseException($status = 'error', $number = 400, $ex)
  {
    $exResponse = [];
    switch (true) {
      case config('app.debug') == true:
        if (method_exists($ex, 'getName')) {
          $exResponse['name'] = $ex->getName();
        }
        $exResponse['message'] = $ex->getMessage();
        $exResponse['line'] = $ex->getLine();
        $exResponse['file'] = $ex->getFile();
        // $exResponse['trace'] = $ex->getTrace();
        Log::error(\array_merge($exResponse, [
          'trace' => '=>'
        ]));
        Log::error($ex);
        break;
      default:
        $exResponse['message'] = $ex->getMessage();
        break;
    }
    $res = [
      'status' => $status,
      'status_code' => $number,
      'return' => $exResponse
    ];
    return $res;
  }

  public function getBaseQueryRequest(Request $req, $props)
  {
    $props['take'] = $req->query('take', 100);
    $props['skip'] = $req->query('page', 1);
    $props['skip'] = $props['skip'] - 1;
    $props['where_date_field'] = $req->query('where_date_field', 'created_at');
    $props['sort_option'] = $req->query('sort_option', 'DESC');
    $props['sort_field'] = $req->query('sort_field', 'id');
    $props['start'] = $req->query('start', null);
    $props['end'] = $req->query('end', null);
    $props['search'] = $req->query('search', null);
    $props['join'] = $req->query('join', null);
    $props['join_origin_id'] = $req->query('join_origin_id', null);
    $props['join_relation_id'] = $req->query('join_relation_id', null);
    return $props;
  }


  public function getSmartValue(&$value, $exceptValue = null)
  {
    return (isset($value)) ? $value : $exceptValue;
  }

  public function returnSimpleException(Exception $ex)
  {
    $res = $this->returnResponseException('error', 400, $ex);
    return response()->json($res, $res['status_code']);
  }
}
