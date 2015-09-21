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

        $header = "From: noreply@assessyourrisk.org\nX-Mailer:PHP/".phpversion()."\nMime-Version: 1.0\nContent-Type: text/html;";

        $type = $request['type'];
        $mail = $request['mail'];
        $quiz = $request['atributo'];
        $level =  $request['level'];


        $subject = 'Mensaje de envio assess';
        $message = 'este es un mensaje para ver si esta funcionando correctamente';



        mail($mail,$subject,$message,$header);

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
