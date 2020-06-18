{{-- ERROR --}}
<div>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div>

{{-- SUCCESSFULLY --}}
<div>
    {{session('Success')?session('Success'):''}}
</div>
<hr>


<!-- Button trigger modal -->
<button style="display:none" id="modal-neo" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId"></button>

<!-- Modal -->
<form method="post" action="{{ route('update-subject-put') }}">
    @method('put')
    @csrf
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật Tên môn:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        
                            <div class="form-group">
                                <label for="name" class="col-form-label">Tên môn:</label>
                                <input type="hidden" name="id" value="{{ $subject->id }}">
                                <input class="form-control" type="text" id="name" name="name" value="{{ $subject->name }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Code:</label>
                                <input class="form-control" type="text" name="code" value="{{ $subject->code }}">
                            </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary-neo" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
     $(document).ready(function(){
        $("#modal-neo").click()
    });

    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
