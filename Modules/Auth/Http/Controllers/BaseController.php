<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
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
        $exResponse['trace'] = $ex->getTrace();
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
