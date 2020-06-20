@extends(CheckRole::role()->code == 'admin' ? 'admin.home' : 'department.home')
@section(CheckRole::role()->code == 'admin' ? 'contentAdmin' : 'contentPDT')

<div id="load-view-create-class-subject"></div>
<script>
    $(document).ready(()=>{
        let loadView = $('#load-view-create-class-subject');
        loadView.html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
        .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;')

        $.ajax({
            type: 'GET',
            url: '{{ route('com-create-class-subject') }}',
            success(data){
                loadView.html('').attr('style', '')
                loadView.html(data)
            }
        })
    })
</script>
@endsection
