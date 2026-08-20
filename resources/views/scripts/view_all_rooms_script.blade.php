<script type="text/javascript" async>

    {{--  Panda function  --}}
    function __(element){
        return document.querySelector(element)
    }

    {{--  Single function  --}}
    function _(element){
        return document.getElementById(element)
    }

    {{--  Variables  --}}
    
    var enable_view_all_rooms_interface = _("enable_view_all_rooms_interface")
    var view_all_rooms_interface = __(".view_all_rooms_interface")

    var disable_view_all_rooms_interface = _("disable_view_all_rooms_interface")

    {{--  Variables  --}}

    {{--  Function Binders  --}}

    enable_view_all_rooms_interface.addEventListener("click", view_all_rooms)
    disable_view_all_rooms_interface.addEventListener("click", disable_view_all_rooms)

    {{--  Function Binders  --}}

    {{--  Functions  --}}

    function view_all_rooms(){
        view_all_rooms_interface.classList.add('active')
    }

    function disable_view_all_rooms(){
        view_all_rooms_interface.classList.remove('active')
    }
    {{--  Functions  --}}


</script>
