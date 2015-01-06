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
		} catch ( Exception $e ) {
			Log::error ( '>> Validator failed.', $e );
			$response = $e->getMessage ();
			$statusCode = 401;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	public function post() {
		$response = [ ];
		try {
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
				Log::error ( '>> Validator failed.' );
				
				$statusCode = 401;
				$messages = $validator->messages ();
				$response ['errors'] = [ ];
				foreach ( $messages->all () as $message ) {
					$response ['errors'] [] = $message;
				}
			} else {
				Log::info ( '>> Validator passed.' );
				FacebookSession::setDefaultApplication ( '757106917704007', '460fc7a9192ab2adc792739b9738ba94' );
				
				$session = null;
				// Check for user token from JavaScript
				
				$helper = new FacebookJavaScriptLoginHelper ();
				try {
					$session = $helper->getSession ();
				} catch ( FacebookRequestException $ex ) {
					Log::error ( '>> Exception', $ex );
					$response ['errorCode'] = $ex->getCode ();
					$response ['errorMessage'] = $ex->getMessage ();
				} catch ( \Exception $ex ) {
					Log::error ( '>> Exception', $ex );
					$response ['errorCode'] = $ex->getCode ();
					$response ['errorMessage'] = $ex->getMessage ();
				}
				
				if ($session) {
					Log::info ( '>> Session found',  $session);
					try {
						Log::info ( '>> Begin try block');
						$user_profile = (new FacebookRequest ( $session, 'GET', '/me' ))->execute ()->getGraphObject ( GraphUser::className () );
						$id = $user_profile->getId ();
						$name = $user_profile->getName ();
						
						Log::info ( '>> User profile retreived, name: ', $name);
						
						$user = FacebookUser::findOrNew ( $id );
						$user->id = $id;
						$user->name = $name;
						$user->addType ( $type );
						$user->save ();
						
						Log::info ( '>> User object retreived: ', $user);
						
						$response ['user'] = $user;
					} catch ( FacebookRequestException $e ) {
						Log::error ( '>> Exception', $e );
						$response ['errorCode'] = $e->getCode ();
						$response ['errorMessage'] = $e->getMessage ();
					}
				} else {
					Log::info ( '>> No session detected' );
				}
			}
			// Send activation code to the user so he can activate the account
		} catch ( Exception $e ) {
			Log::error ( '>> Exception', $e );
			$statusCode = 401;
			$response ['errors'] = [ ];
			$response ['errors'] [] = $e->getMessage ();
		} finally {
			return Response::json ( $response, $statusCode );
		}
	}
}
