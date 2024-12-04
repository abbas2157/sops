<div class="row mt-3">
    <div class="col-md-12">
        <div class="card border-0 card-shadow rounded-3 p-2 mt-4 mb-3">
            <div class="row mb-3">
                <div class="col-md-12 mt-2">
                    <div class="border-bottom" style="width: 100%;">
                        <h3 class="all-adjustment pb-2 mb-0" style="width: 15%;">Other Module</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>Task Type</th>
                            <th>Class</th>
                            <th>Given Task</th>
                            <th>Due Date</th>
                            <th>Submitted Task</th>
                            <th>Submission Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tasks->isNotEmpty())
                            @foreach ($tasks as $item)
                                <tr>
                                    <td class="align-middle">{{ $item->user->full_name ?? '' }}</td>
                                    <td class="align-middle">{{ $item->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $item->task->type ?? '' }}</td>
                                    <td class="align-middle">{{$item->class->title ?? '' }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ asset('trainee/tasks/'.$item->task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">{{ date("M d, Y",strtotime($item->task->due_date)) }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ asset('trainee/tasks/'.$item->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle">{{ $item->created_at->format('M d, Y') ?? '' }}</td>
                                    <td>
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('trainer.tasks.remarks.create', $item->id) }}?type=fundamental" >
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 20%;" alt=""/>
                                                    Add Remarks
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="align-middle text-center">
                                    No Record Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
