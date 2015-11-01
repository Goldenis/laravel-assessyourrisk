<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class Sendmail extends Controller
{
    public function send(Request $request)
    {
       /* Mail::send('web.emails.user',['user'=>'Gonzalo'],function($msj){
            $msj->subject('assess yor risk - envío');
            $msj->to('gdelcarpio@gmail.com');
        });*/

        $email = $request['email'];
		$myemail = $request['myemail'];
		$name = $request['name'];
        $subject = $request['subject'];
        $emailbody = $request['emailbody'];
        $emailbodytext = strip_tags($emailbody);
		/*
            echo $email;
            echo $myemail;
            echo $name;
            echo $subject;
            echo $emailbody;
			echo $emailbodytext;
		 */

		try {
			Mail::send([], [], function ($message) use ($email, $subject, $myemail, $name, $emailbody, $emailbodytext) {
				$message->from('brightpink@brightpink.org', 'Bright Pink')
				->to($email)
				->subject($subject)
				->setReplyTo(array($myemail => $name))
				->setBody($emailbody);
//				->addPart($emailbodytext);
			});
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
		}

    }


    /**
     * @param Request $request
     */
    public function sendpdf(Request $request)
    {

        $email = $request['email'];
        $data['name'] = $request['name'];
        $data['pdf'] = $request['pdf'];
        $type = $request['type'];

        if($type==1)//doctor
        {
            $subject = 'Requesting Discussion: Breast & Ovarian Cancer Risk';
            $view = 'web.emails.doctor';
        }
        else//user
        {
            $subject = 'Breast & Ovarian Risk Assessment Results';
            $view = 'web.emails.user';
        }



        try {
            Mail::send($view, $data, function ($message) use ($email, $subject) {
                $message->from('brightpink@brightpink.org', 'Bright Pink')
                    ->to($email)
                    ->subject($subject);
            });
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
