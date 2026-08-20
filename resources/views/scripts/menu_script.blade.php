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

    const menu_btn = __('.menu_btn')
    let menu_open = false
    var left_admin_panel = __('.left_admin_panel')

    {{--  Variables  --}}

    {{--  Function Binders  --}}

    menu_btn.addEventListener('click', open_menu)

    {{--  Function Binders  --}}

    {{--  Functions  --}}

    function open_menu(){
        if(!menu_open){
            menu_btn.classList.add('open')
            menu_open = true
            left_admin_panel.classList.add('open')
        }else{
            menu_btn.classList.remove('open')
            menu_open = false
            left_admin_panel.classList.remove('open')
        }
    }
    {{--  Functions  --}}

</script>