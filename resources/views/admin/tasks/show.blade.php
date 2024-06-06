@extends('admin.layout.app')
@section('title')
    <title>Check Task | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 30%;">Check Task Screen</h3>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ route('admin.tasks.update',$task->id) }}">
            @csrf
            @method('POST')
            <div class="row mt-4">
                <div class="col-md-9">
                    @include('partials.alerts')
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea style="display:none" id="description" name="remarks"></textarea>
                                    <div class="form-group fw-bold">
                                        <label for="description">Add Remarks </label>
                                        <div id="editor" style="height: 250px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Select Status</label>
                                        <select class="form-control form-select subheading mt-1"  name="status">
                                            <option >Pass</option>
                                            <option>Fail</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Add Remarks</button>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
  ['link', 'image', 'video', 'formula'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];
    const quill = new Quill('#editor', {
        modules: {
        toolbar: toolbarOptions
    },
        theme: 'snow'
    });
    quill.on('text-change', () => {
        const delta = quill.getSemanticHTML();
        $('#description').html(delta);
    });
</script>
@stop
