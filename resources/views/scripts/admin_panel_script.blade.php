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

    var enable_admin_home_panel_interface = _("enable_admin_home_panel")
    var admin_home_panel_interface = __(".admin_home_panel_interface")
    var home = __('.home')

    var enable_admin_room_management_interface = _("enable_admin_room_management")
    var admin_room_management_interface = __(".admin_room_management_interface")
    var room_management = __(".room_management")

    var enable_admin_booking_management_interface = _("enable_admin_booking_management")
    var admin_booking_management_interface = __(".admin_booking_management_interface")
    var booking_management = __(".booking_management")

    var enable_admin_payment_record_interface = _("enable_admin_payment_record")
    var admin_payment_record_interface = __(".admin_payment_record_interface")
    var payment_record = __(".payment_record")

    var enable_add_room_interface = _("enable_add_room_interface")
    var add_room_interface = __(".add_room_interface")
    var disable_add_room_interface = _("disable_add_room_interface")

    {{--  Variables  --}}



    {{--  Function binders  --}}

    enable_admin_home_panel_interface.addEventListener("click", admin_home_panel)
    enable_admin_room_management_interface.addEventListener("click", admin_room_management)
    enable_admin_booking_management_interface.addEventListener("click", admin_booking_management)
    enable_admin_payment_record_interface.addEventListener("click", admin_payment_record)
    enable_add_room_interface.addEventListener("click", add_room)
    disable_add_room_interface.addEventListener("click", disable_add_room)

    {{--  Function binders  --}}



    {{--  Functions  --}}

    function admin_home_panel(){
        admin_home_panel_interface.classList.add('active')
        home.classList.add('active')

        //  Pulse
        admin_room_management_interface.classList.remove('active')
        room_management.classList.remove('active')

        admin_booking_management_interface.classList.remove('active')
        booking_management.classList.remove('active')

        admin_payment_record_interface.classList.remove('active')
        payment_record.classList.remove('active')

    }

    function admin_room_management(){
        admin_room_management_interface.classList.add('active')
        room_management.classList.add('active')

        //  Pulse
        admin_home_panel_interface.classList.remove('active')
        home.classList.remove('active')

        admin_booking_management_interface.classList.remove('active')
        booking_management.classList.remove('active')

        admin_payment_record_interface.classList.remove('active')
        payment_record.classList.remove('active')
    }

    function admin_booking_management(){
        admin_booking_management_interface.classList.add('active')
        booking_management.classList.add('active')

        //  Pulse
        admin_home_panel_interface.classList.remove('active')
        home.classList.remove('active')

        admin_room_management_interface.classList.remove('active')
        room_management.classList.remove('active')

        admin_payment_record_interface.classList.remove('active')
        payment_record.classList.remove('active')
    }

    function admin_payment_record(){
        admin_payment_record_interface.classList.add('active')
        payment_record.classList.add('active')

        //  Pulse
        admin_home_panel_interface.classList.remove('active')
        home.classList.remove('active')

        admin_room_management_interface.classList.remove('active')
        room_management.classList.remove('active')
         
        admin_booking_management_interface.classList.remove('active')
        booking_management.classList.remove('active')
    }

    function add_room(){
        add_room_interface.classList.add('active')
    }

    function disable_add_room(){
        add_room_interface.classList.remove('active')
    }
    {{--  Functions  --}}

    {{--  Window loading function   --}}
    window.onload = function(){
        admin_home_panel()
    }
    {{--  Window loading function   --}}

</script>
