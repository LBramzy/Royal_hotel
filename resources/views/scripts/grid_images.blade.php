<script type="text/javascript" async>

    // PANDA FUNCTION
    function _(element){
        return document.getElementById(element)
    }


    var image_view_src=_("room_image")
    function view_image(content){
        var image_src=content.getAttribute('data-id')
        image_view_src.src=image_src
    }

</script>
