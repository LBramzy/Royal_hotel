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
    
    var enable_sign_up = _("enable_sign_up")
    var disable_sign_up_interface = _("disable_sign_up")
    var sign_up_interface = __(".sign_up")


    var enable_sign_in = _("enable_sign_in")
    var disable_sign_in_interface = _("disable_sign_in")
    var sign_in_interface = __(".sign_in")


    {{--  Variables  --}}

    {{--  Function binders  --}}

    enable_sign_up.addEventListener("click", sign_up)
    disable_sign_up_interface.addEventListener("click", disable_sign_up)

    enable_sign_in.addEventListener("click", sign_in)
    disable_sign_in_interface.addEventListener("click", disable_sign_in)

    {{--  Function binders  --}}


    {{--  Functions  --}}
    function sign_up(){
        sign_up_interface.classList.add('active')
    }

    function disable_sign_up(){
        sign_up_interface.classList.remove('active')
    }

    function sign_in(){
        sign_in_interface.classList.add('active')
    }

    function disable_sign_in(){
        sign_in_interface.classList.remove('active')
    }
    {{--  Functions  --}}
</script>