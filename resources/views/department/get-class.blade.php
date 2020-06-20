@extends(CheckRole::role()->code == 'admin' ? 'admin.home' : 'department.home')
@section(CheckRole::role()->code == 'admin' ? 'contentAdmin' : 'contentPDT')
<div class="container-fluid  p-4">
    <div class="box p-4">
        <div class="title p-2 mb-3  text-center alert-primary-neo">
            Danh sách Lớp
        </div>
        <div></div>
        <div class="p-lg-4" id="load-class-all">

        </div>
    </div>
</div>

<div id="ajax-class-detail"></div>

<script>
    $(document).ready(function(){
        $('#load-class-all').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
        .attr('style', 'position: fixed; top: 50%; z-index: 2; left: 50%;');

        $.ajax({
            url: window.location + '?get_json=dfsdtj9r04werfei90ng4iHJIS432JAIr3',
            method: 'GET',
            success(data){
                // console.log(data)
                $('#load-class-all').html('').attr('style', '')
                $('#load-class-all').html(data)
            }
        });
    })
</script>
@endsection

 