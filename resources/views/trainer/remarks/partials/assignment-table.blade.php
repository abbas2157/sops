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
                <th>Module  </th>
                <th>Step No</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <input type="hidden" name="type" value="intro">
                <input type="hidden" name="step_id" value="{{ $task->step->id ?? '' }}">
                <td class="align-middle">{{ $task->step->type ?? '' }}</td>
                <td class="align-middle">{{ $task->step->steps_no ?? '' }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="2">Submission Date</th>
            </tr>
        </thead>
        <tbody>
            <tr >
                <td colspan="2" class="align-middle">{{ $task->created_at->format('M d, Y') ?? '' }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Given Assignment</th>
                <th>Submitted Assignment</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle text-center">
                    <a href="{{ asset('course/steps/assignments/'.$task->step->assignment ) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                        <i class="fa fa-download"></i>
                    </a>
                </td>
                <td class="align-middle text-center">
                    <a href="{{ asset('trainee/tasks/'.$task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                        <i class="fa fa-download"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>