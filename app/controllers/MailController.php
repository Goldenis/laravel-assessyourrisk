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
			$content = Input::get ('content');
			$isDoctor = Input::get ( 'isDoctor' );
			$userName = Input::get ( 'userName' );
			
			$validator = Validator::make ( array (
					'email' => $email,
					'content' => $content
			), array (
					'email' => 'required|email',
					'content' => 'required'
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

				$url = "https://www.hypdf.com/htmltopdf";

				$data = array(
				  'user' => 'app29096163@heroku.com',
				  'password' => 'wSTMougxX0C8ptb',
				  'test' => 'true',
				  'bucket' => 'brightenup',
				  'public'=> 'true',
				  'content' => $content
				);

				$opts = array('http' =>
				  array(
				      'method'  => 'POST',
				      'header'  => 'Content-type: application/json',
				      'content' => json_encode($data)
				  )
				);

				$context = stream_context_create($opts);
				$json = file_get_contents($url, false, $context);
				$pdf = json_decode($json);
                echo $pdf;

				$template = 'emails.user';
				if ($isDoctor == 'true') {
					$template = 'emails.doctor';
				}
				
				Log::info ( '>> Validator passed.' );
				Mail::send($template, array('userName' => $userName), function($message) use ($email)
				{
					
					$messageSubject = "Breast & Ovarian Cancer Risk Management Strategy";
					
					$message->from('assessyourrisk@brightpink.org');
					$message->to($email); //->cc("trevorobrien@theexperiment.io");
					$message->subject($messageSubject);	
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
