<div class="task {{$data['is_done'] ? 'task_done' : 'task_pending'}}">
    <div class="title">
        <input type="checkbox" name="" onchange="taskUpdate(this)" data-id="{{$data['id']}}" @if ($data && $data['is_done']) checked @endif >
        <div class="task_title">{{$data['title'] ?? ''}}</div>
    </div>

    <div class="priority">
        <div class="sphere"></div>
        <h4>{{$data['category']->title ?? ''}}</h4>
    </div>

    <div class="actions">
        <a href="{{route('tasks.edit', ['id'=> $data['id']])}}"><img src="/assets/images/icon-edit.png" alt=""></a>
        <a href="{{route('tasks.delete', ['id' => $data['id']])}}"><img src="/assets/images/icon-delete.png" alt=""></a>
    </div>
</div>

