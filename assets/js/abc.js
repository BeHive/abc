Ink.requireModules([
    'Ink.Dom.Loaded_1',
    'Ink.Dom.Element_1',
    'Ink.Dom.Event_1',
    'Ink.Dom.FormSerialize_1',
    'Ink.Net.Ajax_1',
    'Ink.Dom.Css_1',
    'Ink.UI.Animate_1'
], function (ILoaded, IElement, IEvent, IForm, IAjax, ICss, IAnimate) {

    ILoaded.run(function () {
        Ink.routeAdd(['/$'], [], function () {
            Ink.log("homepage");
            PHOTOSLIDE.init({
                interval: 5000,
                targetElm: Ink.s("#photoslide"),
                images: imageList
            });
            addToHomescreen({modal: true, lifespan: 0, maxDisplayCount: 1});

            IEvent.observeMulti(Ink.ss(".abc-team-chevron"), "click", function (event) {
                var target = event.target.getAttribute("data-to");

                if (parseInt(event.target.getAttribute("data-to")) < 0) {
                    target = Ink.ss("[data-index]").length - 1;
                }
                if (parseInt(event.target.getAttribute("data-to")) >= (Ink.ss("[data-index]",event.target.closest(".abc-row").parentElement).length)) {
                    target = 0;
                }

                ICss.addClassName(event.target.parentElement.parentElement, "abc-hide");
                ICss.removeClassName(Ink.s("[data-index='" + target + "']",event.target.closest(".abc-row").parentElement), "abc-hide");

            });
            IEvent.observeMulti(Ink.ss(".abc-blog-chevron"), "click", function (event) {
                var target = event.target.getAttribute("data-to");

                if (parseInt(event.target.getAttribute("data-to")) < 0) {
                    target = Ink.ss("[data-index]").length - 1;
                }
                if (parseInt(event.target.getAttribute("data-to")) >= (Ink.ss("[data-index]",event.target.closest(".abc-row").parentElement).length)) {
                    target = 0;
                }

                ICss.addClassName(event.target.parentElement.parentElement, "abc-hide");
                ICss.removeClassName(Ink.s("[data-index='" + target + "']",event.target.closest(".abc-row").parentElement), "abc-hide");

            });
        });


        Ink.routeAdd(['/admin/homepage'], [], function () {
            setMenu("homepage");
            tinymce.init({
                selector: "#item-sociedade",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-sociedade_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-filosofia",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-filosofia_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-beliefs",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-beliefs_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-areas",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-areas_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });


            var pictureList;

            function readFile() {
                if (this.files && this.files[0]) {

                    var FR= new FileReader();

                    FR.addEventListener("load", function(e) {
                        var parentElement = document.querySelector("#listaImagens");
                        var imageBlock = document.createElement("SPAN");
                        imageBlock.setAttribute("class","abc-quarter")
                        var image = document.createElement("IMG");
                        image.src = e.target.result;
                        image.style.width = "100%";
                        var iconContainer = document.createElement("SPAN");
                        iconContainer.setAttribute("class","imageDeleteButton");
                        var icon = document.createElement("I");
                        icon.setAttribute("class","fa fa-trash-o");
                        icon.setAttribute("aria-hidden",true);
                        iconContainer.appendChild(icon);
                        imageBlock.appendChild(iconContainer);
                        imageBlock.appendChild(image);
                        parentElement.appendChild(imageBlock);

                    });

                    FR.readAsDataURL( this.files[0] );
                }

            }

            document.getElementById("fotoUpload").addEventListener("change", readFile);

            document.querySelector("#listaImagens").addEventListener("click",function(ev){
                el = ev.target;
                el.closest(".abc-quarter").remove();
            });

        });
        Ink.routeAdd(['/admin/recrutamento'], [], function () {
            setMenu("recrutamento");
            tinymce.init({
                selector: "#item-valor",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-valor_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-razoes",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-razoes_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });

        });

        Ink.routeAdd(['/admin/dashboard'], [], function () {
            setMenu("dashboard");
        });

        Ink.routeAdd(['/admin/messages'], [], function () {
            setMenu("mensagens");
        });

        Ink.routeAdd(['/admin/team'], [], function () {
            setMenu("equipa");
            tinymce.init({
                selector: "#item-text",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-text_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/areas'], [], function () {
            setMenu("areaspratica");
        });

        Ink.routeAdd(['/admin/admins'], [], function () {
            setMenu("administradores");
        });

        Ink.routeAdd(['/admin/testimonials'], [], function () {
            setMenu("testemunhos");
        });

        Ink.routeAdd(['/admin/disclaimer'], [], function () {
            setMenu("disclaimer");
            tinymce.init({
                selector: "#item-text",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-text_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/areas/add'], [], function () {
            tinymce.init({
                selector: "#item-short_desc",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-short_desc_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });

        });

        Ink.routeAdd(['/admin/areas/edit'], [], function () {
            tinymce.init({
                selector: "#item-short_desc",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-short_desc_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });

        });

        Ink.routeAdd(['/admin/sociedade'], [], function () {
            setMenu("sociedade");
        });

        Ink.routeAdd(['/admin/sociedade/add'], [], function () {
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });

        });

        Ink.routeAdd(['/admin/sociedade/edit'], [], function () {
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });

        });

        Ink.routeAdd(['/admin/team/add'], [], function () {
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/team/edit'], [], function () {
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
            tinymce.init({
                selector: "#item-description_en",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/testimonials/add'], [], function () {
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/testimonials/edit'], [], function () {
            tinymce.init({
                selector: "#item-description",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/areas'], [], function () {
            IEvent.observe(Ink.s("#areasMenu"), 'click', function (evt) {
                var currentMenuItem = Ink.s(".abc-bottombar", Ink.s("#areasMenu"));
                ICss.removeClassName(currentMenuItem, "abc-bottombar");
                ICss.addClassName(evt.target, "abc-bottombar");

                var currentDescItem = Ink.s(".active", Ink.s("#areasDescription"));
                ICss.removeClassName(currentDescItem, "active");
                ICss.addClassName(currentDescItem, "abc-hide");

                var newTarget = Ink.s("[data-area-id='" + evt.target.parentElement.getAttribute("data-area-id") + "']", Ink.s("#areasDescription"));
                evt.target.getAttribute("data-area-id");
                ICss.addClassName(newTarget, "active");
                ICss.removeClassName(newTarget, "abc-hide");


            });

            if (!window.location.search || isNaN(parseInt(window.location.search.split('=')[1].split("&")[0]))) {
                ICss.addClassName(Ink.s("[data-area-id] h6", Ink.s("#areaMenu")), "abc-bottombar");
                ICss.addClassName(Ink.s("[data-area-id]", Ink.s("#areasDescription")), "active");
                ICss.removeClassName(Ink.s("[data-area-id]", Ink.s("#areasDescription")), "abc-hide");
            }
            else {
                var index = window.location.search.split('=')[1].split("&")[0];
                ICss.addClassName(Ink.s("[data-area-id='" + index + "'] h6", Ink.s("#areaMenu")), "abc-bottombar");
                ICss.addClassName(Ink.s("[data-area-id='" + index + "']", Ink.s("#areasDescription")), "active");
                ICss.removeClassName(Ink.s("[data-area-id='" + index + "']", Ink.s("#areasDescription")), "abc-hide");
            }

        });

        Ink.routeAdd(['/admin/blog'], [], function () {
            setMenu("blog");
        });

        Ink.routeAdd(['/admin/blog/add'], [], function () {
            tinymce.init({
                selector: "#item-text",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/blog/edit'], [], function () {
            tinymce.init({
                selector: "#item-text",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/news'], [], function () {
            setMenu("news");
        });

        Ink.routeAdd(['/admin/news/add'], [], function () {
            tinymce.init({
                selector: "#item-text",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeAdd(['/admin/news/edit'], [], function () {
            tinymce.init({
                selector: "#item-text",
                height: 300,
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste code"],
                readonly: 0,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
        });

        Ink.routeRun();
    });
});
    
    

