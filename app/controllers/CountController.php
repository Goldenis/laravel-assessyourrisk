<?php
class CountController extends BaseController {
	
	public function postCount($type) {
	$response = [ ];
		try {
			$validator = Validator::make ( array (
					'type' => $type 
			), array (
					'type' => array (
							'required',
							'regex:[^.*\b(lifestyle|knowing)\b.*$]' 
					) 
			) );
			if ($validator->fails ()) {
				Log::info ( '>> Validator failed.' );
				$statusCode = 401;
				$messages = $validator->messages ();
				$response ['errors'] = [ ];
				foreach ( $messages->all () as $message ) {
					$response ['errors'] [] = $message;
				}
			} else {
				$statusCode = 200;
				$response = ["success" => true];
				DB::table('count')->increment($type);
			}
		} catch ( Exception $ex ) {
			Log::info ( '>> Validator failed: ' . ($ex->getMessage()) );
			$response = $ex->getMessage ();
			$statusCode = 401;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	
	public function wipe() {
		$countObj = Count:: first();
		$countObj->lifestyle = 0;
		$countObj->knowing = 0;
		$countObj->family = 0;
		$countObj->save ();
		return Response::json ( ["success" => true], 200 );
	}
	
	public function get() {
		$response = [ ];
		try {
			
			$statusCode = 200;
			
			$countObj = Count:: first();
			
			if(!isset($countObj)){
				$countObj = new Count;
				$countObj->lifestyle = 0;
				$countObj->knowing = 0;
				$countObj->family = 0;
				$countObj->save ();
			}
			$response = $countObj;
			
		} catch ( Exception $ex ) {
			Log::info ( '>> failed: ' . ($ex->getMessage()) );
			$response = $ex->getMessage ();
			$statusCode = 401;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	
}