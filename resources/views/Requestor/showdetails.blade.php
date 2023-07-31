<form id="detailsform" method="POST" action="javascript:void(0)" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ Crypt::encrypt($task->getId()) }}"/>
    <input type="hidden" id="task_id" name="task_id" value="{{$task->getId()}}"/>
    <input type="hidden" name="executor" value="{{$task->getAssignedTo()->name}}"/>
    <div class="mb-2">
        @if($differenceInMinutes)
            <p class="text-center">Completed In: {{'Just '.$differenceInMinutes.' Minutes'}}</p>
        @elseif($differenceInHours && $differenceInMinutes)
            <p class="text-center">Completed In: {{'Just '.$differenceInHours.' Hours and '.$differenceInMinutes.' Minutes'}}</p>
        @elseif($differenceInDays && $differenceInHours)
            <p class="text-center">Completed In: {{$differenceInDays.' Days and '.$differenceInHours.' Hours'}}</p>
        @elseif($differenceInDays && $differenceInWeeks)
            <p class="text-center">Completed In: {{$differenceInWeeks.' Week(s) and '.$differenceInDays.' Days'}}</p>
        @endif
    </div>
    <div class="d-flex flex-column mb-2">
        <label>Title: </label>
        <input name="title" id="title" value="{{ $task->getTitle() }}"/>
    </div>
    <div class="d-flex flex-column mb-2">
        <label>Message: </label>
        <input name="message" id="message" value="{{ $task->getMessage() }}"/>
    </div>
    <div class="d-flex flex-column mb-2">
        <label>Date Assigned</label>
        <input name="dateAssigned" id="dateAssigned" value="{{ $task->getDateAssigned() }}"/>
    </div>
    <div class="d-flex flex-column mb-2">
        <label>Date Assigned</label>
        <input name="dateCompleted" id="dateCompleted" value="{{ $task->getDateCompleted() }}"/>
    </div>
</form>