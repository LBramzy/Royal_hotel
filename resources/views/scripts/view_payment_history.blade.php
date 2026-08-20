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
    
    var enable_view_payment_history_interface = _("enable_view_payment_history_interface")
    var view_payment_history_interface = __(".view_payment_history_interface")

    var disable_view_payment_history_interface = _("disable_view_payment_history_interface")

    {{--  Variables  --}}

    {{--  Function Binders  --}}

    enable_view_payment_history_interface.addEventListener("click", view_payment_history)
    disable_view_payment_history_interface.addEventListener("click", disable_view_payment_history)

    {{--  Function Bbookingrs  --}}

    {{--  Functions  --}}

    function view_payment_history(){
        view_payment_history_interface.classList.add('active')
    }

    function disable_view_payment_history(){
        view_payment_history_interface.classList.remove('active')
    }
    {{--  Functions  --}}


</script>
