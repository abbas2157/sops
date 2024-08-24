<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name </th>
                <th>Studen Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle">{{ $task->user->full_name ?? '' }}</td>
                <td class="align-middle">
                    <a href="tel:{{ $task->user->phone ?? '' }}" class="text-decoration-none">{{ $task->user->phone ?? '' }}</a>
                </td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Course</th>
                <th>Task Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <input type="hidden" name="type" value="fundamental">
                <td class="align-middle">{{ $task->course->name ?? '' }}</td>
                <td class="align-middle">{{$task->task->type ?? '' }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Given Task</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle text-center">
                    <a href="{{ asset('trainee/tasks/'.$task->task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                        <i class="fa fa-download"></i>
                    </a>
                </td>
                <td class="align-middle">{{ date("M d, Y",strtotime($task->task->due_date)) }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Submitted Task</th>
                <th>Submission Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle text-center">
                    <a href="{{ asset('trainee/tasks/'.$task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                        <i class="fa fa-download"></i>
                    </a>
                </td>
                <td class="align-middle">{{ $task->created_at->format('M d, Y') ?? '' }}</td>
            </tr>
        </tbody>
    </table>
</div>