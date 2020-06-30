// JavaScript Document

// go back link

    $(function () {
        "use strict";
		$('.go_back').click(function (e) {
            e.preventDefault();
            history.go(-1);
        });
    });