(function ($) {
  "use strict";

  /**
   * All of the code for your public-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   */

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function setCookie(cname, cvalue) {
    var expires = "expires=Thu, 01 Jan 1970 00:00:01 GMT";
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  document.addEventListener(
    "wpcf7mailsent",
    function (event) {
      const contactFormId = event.detail.contactFormId;
      var pdfValue = getCookie("cf7_pdf_path");
      var pdfDownloadLinkText = getCookie("cf7_pdf_download_link_txt");
      var unit_tag = getCookie("wp-unit_tag");
      if (contactFormId == config.formId) {
        if (pdfValue) {
          setTimeout(function () {
            if ($(".wpcf7").hasClass("wpcf7-mail-sent-ok")) {
              $("#" + unit_tag + " .wpcf7-response-output").append(
                '<br><a class="download-lnk-pdf" href="' +
                  pdfValue +
                  '" target="_blank">' +
                  pdfDownloadLinkText +
                  "</a>"
              );
              setCookie("pdf_path", "");
            } else {
              $("#" + unit_tag + " .wpcf7-response-output").append(
                '<br><a class="download-lnk-pdf" href="' +
                  pdfValue +
                  '" target="_blank">' +
                  pdfDownloadLinkText +
                  "</a>"
              );
              setCookie("pdf_path", "");
            }
          }, 250);
        }
      }
    },
    false
  );
})(jQuery);
