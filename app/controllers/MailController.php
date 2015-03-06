<?php
class MailController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$response = [];
		try {
			$statusCode = 200;			
			$messageSubject = 'email is up';
			$messageCopy = 'nice work';
									
			$response['messageCopy'] = $messageCopy;
			Mail::send('emails.welcome', array('messageCopy' => $messageCopy), function($message) use ($messageSubject)
			{
				$message->from('nickvelloff@theexperiment.io', 'Nick Velloff');
				$message->to('nick.velloff@gmail.com', 'Nick Velloff')->subject($messageSubject);
			});
			
		} catch ( Exception $e ) {
			$statusCode = 400;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	
	public function post() {
		$response = [ ];
		try {
			$statusCode = 200;
			$email = Input::get ( 'email' );
			$attachment = Input::get ( 'attachment' );
			$isDoctor = Input::get ( 'isDoctor' );
			 
			$validator = Validator::make ( array (
					'email' => $email,
					'attachment' => $attachment
			), array (
					'email' => 'required|email',
					'attachment' => 'required'
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

				$template = 'emails.user';
				if ($isDoctor == 'true') {
					$template = 'emails.doctor';
				}
				
				Log::info ( '>> Validator passed.' );
				Mail::send($template, function($message) use ($email, $attachment)
				{
					
					$messageSubject = "Breast & Ovarian Cancer Risk Management Strategy";
					
					$message->from('nickvelloff@theexperiment.io', 'Nick Velloff');
					$message->to($email); //->cc("trevorobrien@theexperiment.io");
					$message->subject($messageSubject);	
					$pdf_encoded = base64_decode($attachment);
					$message->embedData($pdf_encoded, "results.pdf", "application/pdf");
				});
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
