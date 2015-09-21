@foreach($educations as $education)
<li class="tile" data-id="{{$education->id}}">
    <div class="checkbox checkbox-styled tile-text">
        <label>
            <span>
               <b>{{$education->title}}</b><br>
                {!!$education->text!!}
            </span>
        </label>
    </div>

    <a href="{{route('admin.education.edit',$education->id)}}" class="btn btn-flat ink-reaction btn-default">
        <i class="fa fa-pencil"></i>
    </a>
    <a class="btn btn-flat ink-reaction btn-default">
        <i class="btn-delete fa fa-trash"></i>
    </a>

</li>
@endforeach