$(function(){
	var nav = $('.navbar-top');
	var menu = $('.navbar-collapse');
	var logo = $('.logo');

	$(window).scroll(function(){
		if ($(this).scrollTop() > 2) {
			nav.removeClass("navbar-top");
			menu.addClass("navbar-nav_sml");
			logo.addClass("logo_sml");
		}else{
			menu.removeClass("navbar-nav_sml");
			logo.removeClass("logo_sml");
			nav.addClass("navbar-top");
		}
		if($(this).scrollTop() < 2) {
			nav.addClass("navbar-top");
		}
	});
});

function renderTime() {
    var currentTime = new Date();
    var h = currentTime.getHours();
    var m = currentTime.getMinutes();
    var s = currentTime.getSeconds();
        
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }

    var myClock = document.getElementById('hour');
    myClock.textContent = h + ":" + m;
    setTimeout('renderTime()',1000);

}

$(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
            $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }   

    var accordion = new Accordion($('#accordion'), false);
});	

function loadIframe() {
    frm.document.designMode = 'On';
    return false;
}

function formatText(btn) {
    if(btn == 'b')
        frm.document.execCommand('bold', false, null);
    else if(btn == 'i')
        frm.document.execCommand('italic', false, null);
    else if(btn == 'u')
        frm.document.execCommand('underline', false, null);
    else if(btn == 's')
        frm.document.execCommand('FontSize', false, prompt("Size: "));
    else if(btn == 'c')
        frm.document.execCommand('ForeColor', false, prompt('Color: '));
    else if(btn == 'hr')
        frm.document.execCommand('inserthorizontalrule',false, null);
    else if(btn == 'ul')
        frm.document.execCommand('InsertUnorderedList',false, null);
    else if(btn == 'ol')
        frm.document.execCommand('InsertOrderedList',false, null);
    else if(btn == 'link')
        frm.document.execCommand('CreateLink',false, prompt("Link: "));
    else if(btn == 'unlink')
        frm.document.execCommand('Unink',false, null);
    else if(btn == 'image') {
        var imgSrc = prompt("Source: ");
        if(imgSrc != null) {
            frm.document.execCommand('insertimage',false, imgSrc);
        }
    }
}

function Submit () {
    var form = document.getElementById('form');
    form.elements["txtBodyPst"].value = window.frames['frm'].document.body.innerHTML;
    alert('done');
}