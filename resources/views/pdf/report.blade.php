<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    {!! Html::style('css/report.css') !!}
</head>
<body>

    <div>

        <div class="logo"><img width="160" src="{{asset('img/ayr_logo_bp.png')}}" alt=""/></div>

        <h1>YOUR BASELINE RISK IS: {{$level}}  </h1>
                {!!$texto!!}



        <h2>Working In Your Favor</h2>


        @foreach($favors as $favor)

                @if(in_array($favor->question_opcion_id,$answers_array->toArray(),true))
                    <span class="level">
                        <div class="item item-{{$favor->question_opcion_id}}">
                            <h3>{{$favor->title}}</h3>
                            {!!$favor->content!!}
                        </div>
                    </span>
                @endif


        @endforeach


        <h2>Not Working in Your Favor</h2>

        @foreach($no_favors as $no_favor)

            @if(in_array($no_favor->question_opcion_id,$answers_array->toArray(),true))



                <span class="level">
                    <div class="item item-{{$no_favor->question_opcion_id}}">
                        <h3>{{$no_favor->title}}</h3>
                        {!!$no_favor->content!!}
                    </div>
                </span>
            @endif

        @endforeach




        <h2>Your Assessment Answers</h2>


        <ol>

            @foreach( $answers as $answer)

                <li>{!!$answer->question->text!!}
                    <?php $options = \App\Models\Answer::where('quiz_id',$answer->quiz_id)->where('question_id',$answer->question_id)->get() ?>
                    @foreach($options as $option)
                        {!!$option->questionoption->text!!}
                    @endforeach
                </li>
            @endforeach()

        </ol>









    </div>

</body>
</html>

