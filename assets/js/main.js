(function() {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all);
        if (selectEl) {
            if (all) {
                selectEl.forEach((e) => e.addEventListener(type, listener));
            } else {
                selectEl.addEventListener(type, listener);
            }
        }
    };

    /**
     * Easy on scroll event listener
     */
    const onscroll = (el, listener) => {
        el.addEventListener("scroll", listener);
    };

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select("#header");
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY >= 1) {
                selectHeader.classList.add("fixed-top");
            } else {
                selectHeader.classList.remove("fixed-top");
            }
        };
        window.addEventListener("load", headerScrolled);
        onscroll(document, headerScrolled);
    }

    /**
     * Back to top button
     */
    let backtotop = select(".back-to-top");
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add("active");
            } else {
                backtotop.classList.remove("active");
            }
        };
        window.addEventListener("load", toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    /**
     * Preloader
     */
    let preloader = select("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            preloader.remove();
        });
    }

    /**
     * Skills animation
     */
    let skilsContent = select(".skills-content");
    if (skilsContent) {
        new Waypoint({
            element: skilsContent,
            offset: "80%",
            handler: function(direction) {
                let progress = select(".progress .progress-bar", true);
                progress.forEach((el) => {
                    el.style.width = el.getAttribute("aria-valuenow") + "%";
                });
            },
        });
    }

    /**
     * Initiate  glightbox
     */
    try {
        const glightbox = GLightbox({
            selector: ".glightbox",
        });
    } catch (error) {}

    /**
     * Porfolio isotope and filter
     */
    window.addEventListener("load", () => {
        let portfolioContainer = select(".portfolio-container");
        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: ".portfolio-item",
            });

            let portfolioFilters = select("#portfolio-flters li", true);

            on(
                "click",
                "#portfolio-flters li",
                function(e) {
                    e.preventDefault();
                    portfolioFilters.forEach(function(el) {
                        el.classList.remove("filter-active");
                    });
                    this.classList.add("filter-active");

                    portfolioIsotope.arrange({
                        filter: this.getAttribute("data-filter"),
                    });
                    portfolioIsotope.on("arrangeComplete", function() {
                        AOS.refresh();
                    });
                },
                true
            );
        }
    });

    /**
     * Initiate portfolio lightbox
     */

    try {
        const portfolioLightbox = GLightbox({
            selector: ".portfolio-lightbox",
        });
    } catch (error) {
        console.log("glightbox error");
    }

    /**
     * Portfolio details slider
     */
    try {
        new Swiper(".portfolio-details-slider", {
            speed: 400,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: true,
            },
        });
    } catch (error) {}
    /**
     * Animation on scroll
     */
    window.addEventListener("load", () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    });
})();

//Swal Toast
var toastMixin = Swal.mixin({
    toast: true,
    position: "top-right",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

//Zoom Slider
function sliderValue(type, jump) {
    let rangeval = parseInt($(".rs-range").val());
    if (type == "plus") {
        rangeval += jump;
        setRangeSliderValue(rangeval);
    } else {
        rangeval -= jump;
        setRangeSliderValue(rangeval);
    }
}

function setRangeSliderValue(rangeval) {
    $(".rs-range").val(rangeval);
    $(".modal-content-img").css("width", "" + rangeval + "%");
}

//Order Modal
function buildModal(content,callback) {
    $('html').css('overflow','hidden')
    let modal = `<!-- Modal -->
        <div onclick='checkModal(this)'  class="modal fade " id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div style="max-width: 95vw;" class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                <div class="modal-content">
                    ${content}
                </div>
            </div>
        </div>`;
    setTimeout(() => {
        $("#modalContent").html(modal);
    }, 100);
    setTimeout(() => {
        $("#staticBackdrop").modal("show");
        modal = "";
        content += " ";
        callback()
    }, 150);
}

//Update User Online Status
setInterval(() => {
    const basepath = $("#basepath").val();
    if (basepath != undefined) {
        $.ajax({
            url: basepath + "index.php/admin/ajax_set_user_last_active",
        });
    }
}, 10000);

function resetUser(id_user) {
    $(`#btn_${id_user}`).text("");
    $(`#btn_${id_user}`).addClass("spinner spinner-sm spinner-border");
    const basepath = $("#basepath").val();
    $.ajax({
        url: basepath + "index.php/admin/action_reset_user",
        type: "POST",
        data: { id_user: id_user },
        success: function() {
            $(`#btn_${id_user}`).removeClass("spinner spinner-border");
            $(`#btn_${id_user}`).text("Reset");
            $(`#msg_${id_user}`).html('<span class="text-success">OK</span>')
            setTimeout(() => {
                $(`#msg_${id_user}`).html('')
            }, 2000);
        },
        error: function() {
            $(`#btn_${id_user}`).removeClass("spinner spinner-border");
            $(`#btn_${id_user}`).text("Reset");
            $(`#msg_${id_user}`).html('<span class="text-danger">ERROR</span>')
            setTimeout(() => {
                $(`#msg_${id_user}`).html('')
            }, 2000);
        },
    });
}

function checkModal(modal) {
    setTimeout(() => {
        let show=$(modal).hasClass("show")
        if(show){
            $('html').css('overflow','hidden')
        }else{
            $('html').css('overflow','overlay')
        }
    }, 1);
}