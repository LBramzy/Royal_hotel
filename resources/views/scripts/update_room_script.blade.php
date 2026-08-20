<script type="text/javascript" async>

    {{--  Panda function  --}}
    function __(element){
        return document.querySelector(element)
    }

    {{--  Single function  --}}
    function _(element){
        return document.getElementById(element)
    }
    {{--  alert("hello")  --}}

    {{--  Variables  --}}

    var room_images = _("room_images")
    var image_preview_box = _("image_preview_box")

    let selectedFiles = new DataTransfer(); // ?? holds current files

    {{--  Variables  --}}

    {{--  Function Binders  --}}

    room_images.addEventListener("change", preview_image)

    {{--  Function Binders  --}}

    {{--  Image Preview  --}}

    {{--  Seed existing DB images (id + url) into JS  --}}
    let existingImages = @json(
        $room->room_images_relation->map(fn ($img) => [
            'id'  => $img->id,
            'url' => \Storage::url($img->image_path),
        ])
    );

    let deletedImageIds = [];
    {{--  let selectedFiles = new DataTransfer(); // holds only NEW files  --}}

    function preview_image(e){

        // Note this line clears the image preview box before rendering new previews, ensuring that only the newly selected images are displayed.
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

    {{--  RENDER: existing DB images + new selected files, in one grid  --}}

    function renderPreviews(){
        image_preview_box.innerHTML = "";

        // 1. Existing images from DB
        existingImages.forEach((img) => {
            const container = document.createElement('div');
            container.classList.add('preview_container');

            const imageEl = document.createElement('img');
            imageEl.classList.add('preview_img');
            imageEl.src = img.url;

            const btn = document.createElement('button');
            btn.innerHTML = "x";
            btn.classList.add('remove_btn');
            btn.type = 'button'; // important: don't submit the form
            btn.onclick = function () {
                removeExistingImage(img.id);
            };

            container.appendChild(imageEl);
            container.appendChild(btn);
            image_preview_box.appendChild(container);
        });


        // 2. Newly selected files
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
                removeNewImage(i);
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

    // REMOVE an existing DB image (mark for deletion, don't touch file input)
    function removeExistingImage(id) {
        existingImages = existingImages.filter(img => img.id !== id);
        deletedImageIds.push(id);
        syncDeletedIdsInputs();
        renderPreviews();
    }

    // REMOVE FUNCTION
    // REMOVE a newly-selected file (unchanged logic, rebuilt as its own function)

    function removeNewImage(index){

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

    // Keep hidden inputs in sync so the form submits deleted_image_ids[]
    function syncDeletedIdsInputs() {
        const container = _('deleted_ids_container');
        container.innerHTML = "";
        deletedImageIds.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deleted_image_ids[]';
            input.value = id;
            container.appendChild(input);
        });
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

    // Initial render on page load so existing DB images show immediately
    renderPreviews();
    {{--  Image Preview  --}}

    {{--  Functions  --}}
</script>
