<?php
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;
class PledgeController extends BaseController {
	public function get($type) {
		$response = [ ];
		try {
			$validator = Validator::make ( array (
					'type' => $type 
			), array (
					'type' => array (
							'required',
							'regex:[^.*\b(lifestyle|knowing|family|all)\b.*$]' 
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
				$users = FacebookUser::all ();
				if ($type != 'all') {
					$users = $users->filter ( function ($user) use($type) {
						return $user->hasType ( $type );
					} )->values ();
				}
				$response = $users;
			}
		} catch ( Exception $ex ) {
			Log::info ( '>> Validator failed: ' . ($ex->getMessage()) );
			$response = $ex->getMessage ();
			$statusCode = 401;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	public function getCount($type) {
		$response = [ ];
		try {
			$validator = Validator::make ( array (
					'type' => $type
			), array (
					'type' => array (
							'required',
							'regex:[^.*\b(lifestyle|knowing|family|all)\b.*$]'
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
				
				$users = FacebookUser::all ();
				if ($type != 'all') {
					$users = $users->filter ( function ($user) use($type) {
						return $user->hasType ( $type );
					} )->values ();
				}
				$response ['count'] [] = count($users);
			}
		} catch ( Exception $ex ) {
			Log::info ( '>> Validator failed: ' . ($ex->getMessage()) );
			$response = $ex->getMessage ();
			$statusCode = 401;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	public function post() {
		$response = [ ];
		try {
			
			$fbsr = print_r($_COOKIE, true);
			Log::info ( '>> Cookies:' . $fbsr);
			
			$statusCode = 200;
			$type = Input::get ( 'type' );
			$validator = Validator::make ( array (
					'type' => $type 
			), array (
					'type' => array (
							'required',
							'regex:[^.*\b(lifestyle|knowing|family)\b.*$]' 
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
				Log::info ( '>> Validator passed.' );
				
				FacebookSession::setDefaultApplication ( '757106917704007', '460fc7a9192ab2adc792739b9738ba94' );
				Log::info ( '>> setDefaultApplication passed.' );
				
				$helper = null;
				try {
					$helper = new FacebookJavaScriptLoginHelper();
					Log::info ( '>> FacebookJavaScriptLoginHelper initialized.' );
				} catch ( Exception $ex ) {
					Log::info ( '>> FacebookJavaScriptLoginHelper failed:' . ($ex->getMessage()) );
				}				
				
				$session = null;
				// Check for user token from JavaScript	

				if ($helper) {
					try {
						Log::info ( '>> try block started.' );
						$session = $helper->getSession();
					} catch ( FacebookRequestException $ex ) {
						Log::info ( '>> FacebookRequestException' . ($ex->getMessage()) );
						$response ['errorCode'] = $ex->getCode ();
						$response ['errorMessage'] = $ex->getMessage ();
					} catch ( \Exception $ex ) {
						Log::info ( '>> Exception' . ($ex->getMessage()) );
						$response ['errorCode'] = $ex->getCode ();
						$response ['errorMessage'] = $ex->getMessage ();
					}
				}

				if ($session) {
					Log::info ( '>> Session found');
					try {
						Log::info ( '>> Begin try block');
						$user_profile = (new FacebookRequest ( $session, 'GET', '/me' ))->execute ()->getGraphObject ( GraphUser::className () );
						$id = $user_profile->getId ();
						$name = $user_profile->getName ();
						
						Log::info ( '>> User profile retreived, name: ' . ($name));
						
						$user = FacebookUser::findOrNew ( $id );
						$user->id = $id;
						$user->name = $name;
						$user->addType ( $type );
						$user->save ();
						
						Log::info ( '>> User object retreived: ' . ($user));
						
						$response ['user'] = $user;
					} catch ( FacebookRequestException $ex ) {
						Log::info ( '>> Exception' . ($ex->getMessage()) );
						$response ['errorCode'] = $ex->getCode ();
						$response ['errorMessage'] = $ex->getMessage ();
					}
				} else {
					Log::info ( '>> No session detected' );
				}
			}
			// Send activation code to the user so he can activate the account
		} catch ( Exception $ex ) {
			Log::info ( '>> Exception' . ($ex->getMessage()) );
			$statusCode = 401;
			$response ['errors'] = [ ];
			$response ['errors'] [] = $ex->getMessage();
		} finally {
			return Response::json ( $response, $statusCode );
		}
	}
}
