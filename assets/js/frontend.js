/**
 * Plugin Template frontend js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery( document ).ready(
	function ( $ ) {
		/*
		$("#grupacioni").on("click", ".vc_toggle .vc_toggle_title", function(){
			//console.log("klik");
			$parent = $(this).parent().parent();
			if( $parent.hasClass("sc-dummy") ) {
				//$parent.removeClass("sc-dummy");
				setTimeout(function() {
					$parent.removeClass("sc-dummy");
				}, 300);
			}
			else {
				$parent.addClass("sc-dummy");
			}
		})
		*/

		function b() {
			clearTimeout(w);
			r.removeClass("open");
			r.animate({
				height: 0
			}, s ? 200 : 300);
			i.removeClass("dropup")
		}

		function k(t) {
			if (i.hasClass("dropup")) {
				t != null && t && b();
				return
			}
			w = setTimeout(function() {
				var n = r.find(".container").outerHeight();
				r.animate({
					height: n + "px"
				}, 200, function() {
					r.addClass("open")
				});
				i.addClass("dropup")
			}, 100);
			$("#widgets").removeClass("open")
		}

		function pt() {
			k(!1)
		}

		function wt() {
			k(!0)
		}

		var i = $("#topbar-toggle"),
			yt = $(".topbar"),
			r = $(".topbar-content"),
			s, w, h, c, d, l, g, nt, tt, it, rt, ut, ft, a, f, ot, st, p, vt, t;
		setTimeout(function() {
			s = !$("html").hasClass("ua-desktop");
			yt.on("mouseleave", b);
			if (s) i.on("mouseenter", pt);
			i.on("click", wt)
		}, 100);
		$(".htmlContent table").wrap("<div class='tableOverflow'><\/div>");
		$(".activities .dropdown").click(function(t) {
			t.preventDefault();
			var i = $(this).find("a").attr("href");
			$(this).addClass("open").siblings(".dropdown").removeClass("open");
			$(i).addClass("open").siblings(".dropdown-menu").removeClass("open")
		});


		$(".dropdown-toggle_search-btn").on("click", function() {
			console.log('hini');
			$(this).parent().addClass("opened");
		});
		$(document).on("click", function(t) {
			$(t.target).closest(".dropdown-toggle_search-btn").length || $(t.target).closest(".search.dropdown-menu").length || $(".dropdown_header-search").removeClass("opened")
		});
	}
);
