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

    var add_room_form = _("add_room_form")
    var submit_button = _("submit_button")
    var error_panel = __(".error_panel")
    var success_message = __(".success_message")

    var room_images = _("room_images")
    var image_preview_box = _("image_preview_box")
    var show_item_counter = __(".show_item")
    var image_count = _("image_count")
    var upload_check = _("upload_check")

    let selectedFiles = new DataTransfer(); // ?? holds current files
    {{--  Variables  --}}

    {{--  Function Binders  --}}

    add_room_form.addEventListener("submit", add_room)
    room_images.addEventListener("change", preview_image)

    {{--  Function Binders  --}}

    {{--  Functions  --}}

    function resetRoomForm(){
        add_room_form.reset();
        selectedFiles = new DataTransfer();
        document.getElementById('room_images').files = selectedFiles.files;

        image_preview_box.innerHTML = `
            <div class="w-full h-full manrope flex items-center justify-center h-15 text-xl font-normal opacity-25">
                <div>
                    <p>Images Preview</p>
                    <img src="{{ Vite::asset("resources/css/icon/image_preview.png") }}" class="w-30 h-30">
                </div>
            </div>
        `;

        image_count.innerHTML = 0;
        upload_check.checked = false;
        upload_check.disabled = false;
        show_item_counter.classList.remove("open");
    }

    function add_room(e){
        e.preventDefault();

        //  Targeting the form
        let form = e.target;

        //  Initiating new XML HTTPRequest
        let xml = new XMLHttpRequest();
        let formData = new FormData(form);
        submit_button.disabled = true
        submit_button.value = "Loading Room";

        //  ENDPOINT
        let END_POINT = "/dashboard/admin/add_room"
        xml.open("POST", END_POINT, true)

        //  AJAX Headers
        xml.setRequestHeader("X-CSRF-TOKEN", __('meta[name="csrf-token"]').content );
        xml.setRequestHeader("Accept", "application/json")


        //   Data Passing
        xml.onload = function(){
            submit_button.value = "Processing"
            if(xml.readyState === 4 && xml.status === 200){
                var response = JSON.parse(xml.responseText);
                console.log(response.status)

                if(response.status === "success"){
                    // alert("correct")
                    success_message.classList.add('open')



                    submit_button.value = "Add Room"
                    submit_button.disabled = false
                    {{--  loading.classList.remove("open")  --}}

                    setTimeout(()=>{
                        success_message.classList.remove('open')
                    }, 4000)

                    resetRoomForm()

                }
            }

            if(xml.status === 422){
                // alert("Wrong Validation")
                let response = JSON.parse(xml.responseText)
                console.log(response.errors)
                error_panel.style.display = "flex"

                showErrorList(response.errors)

                setTimeout(()=>{
                    error_panel.classList.add('close')
                }, 6000)
                error_panel.classList.remove('close')

                submit_button.value = "Add Room"
                submit_button.disabled = false
                //loading.classList.remove("open")

            }
        }

        xml.send(formData)
    }


    function handle_data(data){
        var data = {}

        var decode_data = JSON.parse(data)

    }

    function showErrorList(errors){
        let error_section = _("error_section")

        let ul =  document.createElement("ul")
        ul.className = "error_list"
        Object.keys(errors).forEach(field => {
            errors[field].forEach(message => {
                let li = document.createElement("li")
                li.textContent = message

                ul.appendChild(li)
            })
        })

        error_section.innerHTML = "";
        error_section.appendChild(ul);
    }

    {{--  Image Preview  --}}

    function preview_image(e){
        image_preview_box.innerHTML = "";

        let fileInput = e.target

        const files = fileInput.files

        // const files = e.target.files;

        for(let i = 0; i < files.length; i++){
            const file = files[i];

            if(!file.type.startsWith('image/')) continue;

            selectedFiles.items.add(file); // ? store file
        }

        fileInput.files = selectedFiles.files

        renderPreviews();
    }

    // RENDER IMAGES FUNCTION

    function renderPreviews(){
        image_preview_box.innerHTML = "";

        const files = selectedFiles.files;

        for(let i = 0; i < files.length; i++){
            const file = files[i];

            const container = document.createElement('div');
            container.classList.add('preview_container');

            const img = document.createElement('img');
            img.classList.add('preview_img');
            img.src = URL.createObjectURL(file);

            const btn = document.createElement('button');
            btn.innerHTML = "x";
            btn.classList.add('remove_btn');

            btn.onclick = function(){
                removeImage(i);
            };

            container.appendChild(img);
            container.appendChild(btn);
            image_preview_box.appendChild(container);
        }

        image_count.innerHTML = files.length;
        show_item_counter.classList.add("open");
        upload_check.checked = files.length > 0;
        upload_check.disabled = files.length > 0;
    }

    // REMOVE FUNCTION

    function removeImage(index){
        let newFiles = new DataTransfer();

        const files = selectedFiles.files;

        for(let i = 0; i < files.length; i++){
            if(i !== index){
                newFiles.items.add(files[i]);
            }
        }

        selectedFiles = newFiles;

        // update input file list
        document.getElementById('room_images').files = selectedFiles.files;

        // fileInput.files = selectedFiles.files;
        renderPreviews();
    }

    const dropZone = image_preview_box; // or separate div

    dropZone.addEventListener("dragover", function(e){
        e.preventDefault();
        dropZone.classList.add("dragover");
    });

    dropZone.addEventListener("dragleave", function(){
        dropZone.classList.remove("dragover");
    });

    dropZone.addEventListener("drop", function(e){
        e.preventDefault();
        dropZone.classList.remove("dragover");

        const files = e.dataTransfer.files;

        for(let i = 0; i < files.length; i++){
            const file = files[i];

            if(!file.type.startsWith('image/')) continue;

            selectedFiles.items.add(file); // ? add to list
        }

        // update input
        document.getElementById('room_images').files = selectedFiles.files;

        // fileInput.files = selectedFiles.files;
        renderPreviews();
    });

    {{--  Image Preview  --}}

    {{--  Functions  --}}




</script>

