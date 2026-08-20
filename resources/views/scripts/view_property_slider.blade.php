<script type="text/javascript" async>

    const wrapper=document.querySelector(".slider-wrapper")
    const slides=document.querySelectorAll(".slider-slide")
    const dots=document.querySelectorAll(".slider-dots span")
    const prevBtn=document.getElementById('prev')
    const nextBtn=document.getElementById('next')

    let index=0
    let interval

    //show_slid_by_index
    function  showSlide(i){
        if(i<0){
            index=slides.length-1;
        }
        else if(i>=slides.length){
            index=0
        }
        else{
            index = i
        }

        wrapper.style.transform = `translateX(-${index*100}%)`

        dots.forEach((dot)=>{dot.classList.remove('active')})
        dots[index].classList.add("active")
    }

    //Auto_slide
    function startAutoSlide(){
        interval=setInterval(()=>{
            showSlide(index + 1)
        },4000)
    }

    //Stop auto slide
    function stopAutoSlide(){
        clearInterval(interval)
    }

    //Event Listeners
    nextBtn.addEventListener("click",()=>{
        showSlide(index+1)
    })

    prevBtn.addEventListener("click",()=>{
        showSlide(index-1)
    })

    dots.forEach((dot,i)=>{
        dot.addEventListener("click",()=>{
            showSlide(i)
        })
    })

    //Pause on hover

    const sliderContainer=document.querySelector(".slider-container")
    sliderContainer.addEventListener('mouseenter',stopAutoSlide)
    sliderContainer.addEventListener('mouseleave',startAutoSlide)

    //Initialize
    showSlide(index);
    startAutoSlide();

</script>
