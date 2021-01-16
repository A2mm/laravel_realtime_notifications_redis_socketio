<?php

namespace App\Exceptions;

use Exception;

class NotFoundModel extends Exception
{
    public function render(Exception $exception)
    {
    	if ($exception instanceof ModelNotFoundException && $request->wantsJson()) 
    	{
		      return response()->json([
		        'error' => 'Resource not found'
		      ], 404);
		    }
    }
}
