import 'flowbite';

/* мобильное меню */
$("#toggler").click(() => {
    $("#menu").toggleClass("max-lg:top-0 max-lg:-translate-y-full")
    $("#menu").toggleClass("max-lg:top-full")
    $("#overlay").toggleClass("hidden")
})


/* FAQ */
$(".FAQ").each((i, el) => {
    $(el).find(".question").click(() => {
        $(el).find(".answer").slideToggle()
    })
})


/* табы */
$("#tabs").tabs({
    active: 0
});



  