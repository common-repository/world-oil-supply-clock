// initialize widget counter
jQuery(document).ready(function () {
    var now      = new Date();
    var midnight = new Date(); midnight.setHours(0,0,0,0);
    var end      = new Date(2069, 7, 1, 0, 0, 0);

    var e_daysLeft = (end - now) / (24 * 60 * 60 * 1000);
    var daysLeft = Math.floor(e_daysLeft);
    var yearsLeft = 0;

    if (daysLeft > 365) {
        yearsLeft = Math.floor(daysLeft / 365);
        daysLeft = daysLeft % 365;
    }

    jQuery("#odl-widget #odl-counter-div-left-barrels").attr("data-start-value", Math.round((end - now) / 1000000 * 1076).toString());
    jQuery("#odl-widget #odl-counter-div-left-barrels").attr("data-end-value", 0);

    jQuery("#odl-widget #odl-widget-counter-div-barrels").attr("data-start-value", Math.round((now - midnight) / 1000 * 1076).toString());

    jQuery('#odl-widget .odl-counter').each(function() {
        jQuery(this).data('odlCounter', new OdlOdometer(this));
        jQuery(this).data('odlCounter').init();
    });


    // countdown

    var ts = countdown( new Date(2069, 7, 1, 0, 0, 0) );

    jQuery("#odl-widget #odl-widget-counter-div-year").attr("data-start-value", ts.years);
    jQuery("#odl-widget #odl-widget-counter-div-year").attr("data-end-value", ts.years);

    jQuery("#odl-widget #odl-widget-counter-div-month").attr("data-start-value", ts.months);
    jQuery("#odl-widget #odl-widget-counter-div-month").attr("data-end-value", ts.months);

    jQuery("#odl-widget #odl-widget-counter-div-days").attr("data-start-value", ts.days);
    jQuery("#odl-widget #odl-widget-counter-div-days").attr("data-end-value", ts.days);

    jQuery("#odl-widget #odl-widget-counter-div-hours").attr("data-start-value", ts.hours+1);
    jQuery("#odl-widget #odl-widget-counter-div-hours").attr("data-end-value", ts.hours+1);

    jQuery("#odl-widget #odl-widget-counter-div-minutes").attr("data-start-value", ts.minutes+1);
    jQuery("#odl-widget #odl-widget-counter-div-minutes").attr("data-end-value", ts.minutes);
    jQuery("#odl-widget #odl-widget-counter-div-minutes").attr("data-interval", ts.seconds);

    jQuery("#odl-widget #odl-widget-counter-div-seconds").attr("data-start-value", ts.seconds);
    jQuery("#odl-widget #odl-widget-counter-div-seconds").attr("data-end-value", 0);

    var yearContainer = document.getElementById("odl-widget-counter-div-year");
    var monthContainer = document.getElementById("odl-widget-counter-div-month");
    var dayContainer = document.getElementById("odl-widget-counter-div-days");
    var hourContainer = document.getElementById("odl-widget-counter-div-hours");
    var minuteContainer = document.getElementById("odl-widget-counter-div-minutes");
    var secondContainer = document.getElementById("odl-widget-counter-div-seconds");

    if (yearContainer != null) {
        jQuery(yearContainer).data('odlCounter-wy', new OdlOdometer(yearContainer));
        jQuery(yearContainer).data("odlCounter-wy").init();

        jQuery(monthContainer).data('odlCounter-wmn', new OdlOdometer(monthContainer));
        jQuery(monthContainer).data("odlCounter-wmn").init();

        jQuery(dayContainer).data('odlCounter-wd', new OdlOdometer(dayContainer));
        jQuery(dayContainer).data("odlCounter-wd").init();

        jQuery(hourContainer).data('odlCounter-wh', new OdlOdometer(hourContainer));
        jQuery(hourContainer).data("odlCounter-wh").init();

        jQuery(minuteContainer).data('odlCounter-wm', new OdlOdometer(minuteContainer));
        jQuery(minuteContainer).data("odlCounter-wm").init();

        jQuery(secondContainer).data('odlCounter-ws', new OdlOdometer(secondContainer));
        jQuery(secondContainer).data("odlCounter-ws").init();

        setInterval(function () {
            ts = countdown(new Date(2069, 7, 1, 0, 0, 0));

            updateWidgetClock(ts.years, ts.months, ts.days, ts.hours, ts.minutes, ts.seconds);
        }, 1000);
    }
});

function updateWidgetClock(years, months, days, hours, minutes, seconds) {

    var yearContainer = document.getElementById("odl-widget-counter-div-year");
    var monthContainer = document.getElementById("odl-widget-counter-div-month");
    var dayContainer = document.getElementById("odl-widget-counter-div-days");
    var hourContainer = document.getElementById("odl-widget-counter-div-hours");
    var minuteContainer = document.getElementById("odl-widget-counter-div-minutes");
    var secondContainer = document.getElementById("odl-widget-counter-div-seconds");

    jQuery("#odl-widget #odl-widget-counter-div-year").attr("data-start-value", years);
    jQuery("#odl-widget #odl-widget-counter-div-year").attr("data-end-value", years);
    //
    jQuery("#odl-widget #odl-widget-counter-div-month").attr("data-start-value", months);
    jQuery("#odl-widget #odl-widget-counter-div-month").attr("data-end-value", months);
    //
    jQuery("#odl-widget #odl-widget-counter-div-days").attr("data-start-value", days);
    jQuery("#odl-widget #odl-widget-counter-div-days").attr("data-end-value", days);
    //
    jQuery("#odl-widget #odl-widget-counter-div-hours").attr("data-start-value", hours);
    jQuery("#odl-widget #odl-widget-counter-div-hours").attr("data-end-value", hours);
    //
    jQuery("#odl-widget #odl-widget-counter-div-minutes").attr("data-start-value", minutes);
    jQuery("#odl-widget #odl-widget-counter-div-minutes").attr("data-end-value", minutes);
    jQuery("#odl-widget #odl-widget-counter-div-minutes").attr("data-interval", seconds);

    jQuery("#odl-widget #odl-widget-counter-div-seconds").attr("data-start-value", seconds);
    jQuery("#odl-widget #odl-widget-counter-div-seconds").attr("data-end-value", 0);


    jQuery(yearContainer).data('odlCounter-wy', new OdlOdometer(yearContainer));
    jQuery(yearContainer).data("odlCounter-wy").reset();

    // months counter
    jQuery(monthContainer).data("odlCounter-wmn").stop();
    jQuery(monthContainer).data("odlCounter-wmn").set(months);

    // days counter
    jQuery(dayContainer).data("odlCounter-wd").stop();
    jQuery(dayContainer).data("odlCounter-wd").set(days);

    // hours counter
    jQuery(hourContainer).data("odlCounter-wh").stop();
    jQuery(hourContainer).data("odlCounter-wh").set(hours);

    // minutes counter
    jQuery(minuteContainer).data("odlCounter-wm").stop();
    jQuery(minuteContainer).data("odlCounter-wm").set(minutes);

    // seconds counter
    jQuery(secondContainer).data("odlCounter-ws").stop();
    jQuery(secondContainer).data("odlCounter-ws").set(seconds);
}