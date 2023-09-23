<script>
    @if (session('success'))
     toastr.success("{{ session('success') }}", "done");
    @endif

    @if (session('message'))
    toastr.success("{{ session('message') }}", "done");
    @endif

    @if(session('info'))
    toastr.info("{{ session('info') }}", "info");
    @endif

    @if(session('warning'))
    toastr.warning("{{ session('warning') }}", "warning");
    @endif

    @if ($errors->any())
          @if($errors->get('error'))
            @foreach($errors->get('error') as $error)
            toastr.error("{{$error}}", "error");
           @endforeach
        @else
            @foreach($errors->all() as $error)
            toastr.error("{{$error}}", "error");
            @endforeach
        @endif
    @endif

    function commonError(){
        toastr.error(" something_went_wrong", "error");
    }


</script>
