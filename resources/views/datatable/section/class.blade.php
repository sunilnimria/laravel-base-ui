<div class="text-center">
    @php if(isset($data->name)){
        echo $data->name ;
    } else {
        echo '<span class="text-danger">N/a</span>';
    }
    @endphp
</div>
