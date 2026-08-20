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
    
    var booking_days = _("booking_days")
    var booking_amount = _("booking_amount")
    var booking_total = _("booking_total")
    {{--  Variables  --}}

    {{--  Function Binders  --}}

    {{--  Variables  --}}

    {{--  Function Binders  --}}
    {{--  booking_days.addEventListener("change", change_price)  --}}
    {{--  Function Binders  --}}

    {{--  Function  --}}

    function change_price(content){

        var booking_price = content.getAttribute('data-id')
        var total = booking_days.value * booking_price
        booking_amount.value = total
        booking_total.innerHTML = total
        
    }
    {{--  Function  --}}
</script>
