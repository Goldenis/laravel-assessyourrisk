<?php
function createPdf($content) {
	$url = "https://www.hypdf.com/htmltopdf";

	$data = array(
	  'user' => 'app29096163@heroku.com',
	  'password' => 'wSTMougxX0C8ptb',
	  'test' => 'true',
	  'bucket' => 'brightenup',
	  'public'=> 'true',
	  'header_html' => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAyAAAAFMCAYAAAAz2dhgAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODFCRjE4RkRDMzQyMTFFNDk1NjhEQTAyMUU5QUJCMDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6ODFCRjE4RkVDMzQyMTFFNDk1NjhEQTAyMUU5QUJCMDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MUJGMThGQkMzNDIxMUU0OTU2OERBMDIxRTlBQkIwMSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MUJGMThGQ0MzNDIxMUU0OTU2OERBMDIxRTlBQkIwMSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pl5Jt7EAAGNjSURBVHja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">',
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
	return $pdf;
}

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

			// $pdfValidator = Validator::make ( 
			// 	['content' => $content],
			// 	['content' => 'required']
			// );

			// if ($pdfValidator->passes()) {

			// }
			
			$emailValidator = Validator::make ( 
				['email' => $email],
				['email' => 'required|email']
			);
				
			if ($emailValidator->fails()) {
				if (is_null($isDoctor)) {
					// Return the pdf url
					$pdf = createPdf($content);
					$statusCode = 200;
					$response ['pdf_url'] = $pdf->url;
					return Response::json ($response, $statusCode);
				} else {
					// Email validation failed
					Log::info ( '>> Validator failed.' );
	
					$statusCode = 401;
					$messages = $validator->messages ();
					$response ['errors'] = [ ];
					foreach ( $messages->all () as $message ) {
						$response ['errors'] [] = $message;
					}
				}
			} else {
				$pdf = createPdf($content);
				$template = 'emails.user';
				if ($isDoctor == 'true') {
					$template = 'emails.doctor';
				}
				
				Log::info ( '>> Validator passed.' );
				Mail::send($template, array('userName' => $userName, 'pdf' => $pdf), function($message) use ($email)
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
