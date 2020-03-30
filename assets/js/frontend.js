/**
 * Plugin Template frontend js.
 *
 *  @package WordPress Plugin Template/JS
 */

jQuery( document ).ready(
	function ( $ ) {

		function close_content() {
			clearTimeout(open_content);
			content.removeClass("open");
			content.animate({
				height: 0
			}, is_desktop ? 200 : 300);
			toggle.removeClass("dropup")
		}

		function open(t) {
			if (toggle.hasClass("dropup")) {
				t != null && t && close_content();
				return
			}
			open_content = setTimeout(function() {
				var height = content.find(".container").outerHeight();
				content.animate({
					height: height + "px"
				}, 200, function() {
					content.addClass("open")
				});
				toggle.addClass("dropup")
			}, 100);
		}

		function toggle_desktop() {
			open(false)
		}

		function toggle_mobile() {
			open(true)
		}

		var toggle = $("#topbar-toggle"),
			topbar = $(".topbar"),
			content = $(".topbar-content"),
			is_desktop, open_content;
		setTimeout(function() {
			is_desktop = !$("html").hasClass("ua-desktop");
			topbar.on("mouseleave", close_content);
			if (is_desktop) toggle.on("mouseenter", toggle_desktop);
			toggle.on("click", toggle_mobile)
		}, 100);

    /*open activities*/
    $(".activities .dropdown a").on("click", function(t) {
			t.preventDefault();
      var a = $(this).attr("href");
			$(this).parent().addClass("open").siblings(".dropdown").removeClass("open");
			$(a).addClass("open").siblings(".dropdown-menu").removeClass("open")
		});

    /*open search on mobile*/
		$(".dropdown-toggler_search-btn").on("click", function() {
			$(this).parent().addClass("opened");
		});
    /*close top header*/
		$(document).on("click", function(t) {
			$(t.target).closest(".dropdown-toggler_search-btn").length || $(t.target).closest(".search.dropdown-menu").length || $(".dropdown_header-search").removeClass("opened")
		});
	}
);
