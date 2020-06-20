 
@extends(CheckRole::role()->code == 'admin' ? 'admin.home' : 'department.home')
@section(CheckRole::role()->code == 'admin' ? 'contentAdmin' : 'contentPDT')
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-2 mb-3  text-center alert-primary-neo">
            Danh sách Môn 
        </div>
        <div></div>
        <div id="load-subjects" class="p-lg-4">
        </div>
    </div>
</div>

<div id="ajax-update"></div>

<script>
    $(document).ready(function(){
        $('#load-subjects').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
        .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');

        $.ajax({
            url: window.location + '?get_json=dfsdtj9r04werfei90ng4iHJIS432JAIr3',
            method: 'GET',
            success(data){
                // console.log(data)
                $('#load-subjects').html('').attr('style', '')
                $('#load-subjects').html(data)
            }
        });
    })
</script>
@endsection



 