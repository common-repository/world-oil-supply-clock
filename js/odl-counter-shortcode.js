// initialize shortcode counters
jQuery(document).ready(function () {
    var now      = new Date();
    var midnight = new Date(); midnight.setHours(0,0,0,0);
    var end      = new Date(2069, 7, 1, 0, 0, 0);

    var e_daysLeft = (end - now) / (24 * 60 * 60 * 1000);
    var daysLeft = Math.floor(e_daysLeft);
    var yearsLeft = 0;
    var monthsLeft = e_daysLeft / 31;

    var daysLeft2 = daysLeft;

    var e_secondsLeft = (end - now) / 1000;

console.log((end - now) % (24 * 60 * 60 * 1000));
    if (daysLeft > 365) {

        yearsLeft = Math.floor(daysLeft / 365);
        daysLeft = daysLeft % 365;
    }

    jQuery(".odl-container #odl-counter-div-left-barrels").attr("data-start-value", Math.round((end - now) / 1000000 * 1076).toString());
    jQuery(".odl-container #odl-counter-div-left-barrels").attr("data-end-value", 0);

    jQuery(".odl-container #odl-counter-div-barrels").attr("data-start-value", Math.round((now - midnight) / 1000 * 1076).toString());

    jQuery('.odl-container .odl-counter').each(function() {
        jQuery(this).data('odlCounter', new OdlOdometer(this));
        jQuery(this).data('odlCounter').init();
    });

    // countdown
    var yearContainer = document.getElementById("odl-counter-div-year");
    var monthContainer = document.getElementById("odl-counter-div-month");
    var dayContainer = document.getElementById("odl-counter-div-days");
    var hourContainer = document.getElementById("odl-counter-div-hours");
    var minuteContainer = document.getElementById("odl-counter-div-minutes");
    var secondContainer = document.getElementById("odl-counter-div-seconds");
    if (yearContainer != null) {
        var ts = countdown(end);

        jQuery(".odl-container #odl-counter-div-year").attr("data-start-value", ts.years);
        jQuery(".odl-container #odl-counter-div-year").attr("data-end-value", ts.years);

        jQuery(".odl-container #odl-counter-div-month").attr("data-start-value", ts.months);
        jQuery(".odl-container #odl-counter-div-month").attr("data-end-value", ts.months);

        jQuery(".odl-container #odl-counter-div-days").attr("data-start-value", ts.days);
        jQuery(".odl-container #odl-counter-div-days").attr("data-end-value", ts.days);

        jQuery(".odl-container #odl-counter-div-hours").attr("data-start-value", ts.hours + 1);
        jQuery(".odl-container #odl-counter-div-hours").attr("data-end-value", ts.hours + 1);

        jQuery(".odl-container #odl-counter-div-minutes").attr("data-start-value", ts.minutes + 1);
        jQuery(".odl-container #odl-counter-div-minutes").attr("data-end-value", ts.minutes);
        jQuery(".odl-container #odl-counter-div-minutes").attr("data-interval", ts.seconds);

        jQuery(".odl-container #odl-counter-div-seconds").attr("data-start-value", ts.seconds);
        jQuery(".odl-container #odl-counter-div-seconds").attr("data-end-value", 0);


        jQuery(yearContainer).data('odlCounter', new OdlOdometer(yearContainer));
        jQuery(yearContainer).data("odlCounter").init();

        jQuery(monthContainer).data('odlCounter-mn', new OdlOdometer(monthContainer));
        jQuery(monthContainer).data("odlCounter-mn").init();

        jQuery(dayContainer).data('odlCounter-d', new OdlOdometer(dayContainer));
        jQuery(dayContainer).data("odlCounter-d").init();

        jQuery(hourContainer).data('odlCounter-h', new OdlOdometer(hourContainer));
        jQuery(hourContainer).data("odlCounter-h").init();

        jQuery(minuteContainer).data('odlCounter-m', new OdlOdometer(minuteContainer));
        jQuery(minuteContainer).data("odlCounter-m").init();

        jQuery(secondContainer).data('odlCounter-s', new OdlOdometer(secondContainer));
        jQuery(secondContainer).data("odlCounter-s").init();

        setInterval(function () {
            ts = countdown(new Date(2069, 7, 1, 0, 0, 0));

            updateClock(ts.year, ts.months, ts.days, ts.hours, ts.minutes, ts.seconds);
        }, 1000);
    }
});

function updateClock(years, months, days, hours, minutes, seconds) {

    var yearContainer = document.getElementById("odl-counter-div-year");
    var monthContainer = document.getElementById("odl-counter-div-month");
    var dayContainer = document.getElementById("odl-counter-div-days");
    var hourContainer = document.getElementById("odl-counter-div-hours");
    var minuteContainer = document.getElementById("odl-counter-div-minutes");
    var secondContainer = document.getElementById("odl-counter-div-seconds");

    jQuery(".odl-container #odl-counter-div-year").attr("data-start-value", years);
    jQuery(".odl-container #odl-counter-div-year").attr("data-end-value", years);
    //
    jQuery(".odl-container #odl-counter-div-month").attr("data-start-value", months);
    jQuery(".odl-container #odl-counter-div-month").attr("data-end-value", months);
    //
    jQuery(".odl-container #odl-counter-div-days").attr("data-start-value", days);
    jQuery(".odl-container #odl-counter-div-days").attr("data-end-value", days);
    //
    jQuery(".odl-container #odl-counter-div-hours").attr("data-start-value", hours);
    jQuery(".odl-container #odl-counter-div-hours").attr("data-end-value", hours);
    //
    jQuery(".odl-container #odl-counter-div-minutes").attr("data-start-value", minutes);
    jQuery(".odl-container #odl-counter-div-minutes").attr("data-end-value", minutes);
    jQuery(".odl-container #odl-counter-div-minutes").attr("data-interval", seconds);

    jQuery(".odl-container #odl-counter-div-seconds").attr("data-start-value", seconds);
    jQuery(".odl-container #odl-counter-div-seconds").attr("data-end-value", 0);


    jQuery(yearContainer).data('odlCounter', new OdlOdometer(yearContainer));
    jQuery(yearContainer).data("odlCounter").reset();

    // months counter
    jQuery(monthContainer).data("odlCounter-mn").stop();
    jQuery(monthContainer).data("odlCounter-mn").set(months);

    // days counter
    jQuery(dayContainer).data("odlCounter-d").stop();
    jQuery(dayContainer).data("odlCounter-d").set(days);

    // hours counter
    jQuery(hourContainer).data("odlCounter-h").stop();
    jQuery(hourContainer).data("odlCounter-h").set(hours);

    // minutes counter
    jQuery(minuteContainer).data("odlCounter-m").stop();
    jQuery(minuteContainer).data("odlCounter-m").set(minutes);

    // seconds counter
    jQuery(secondContainer).data("odlCounter-s").stop();
    jQuery(secondContainer).data("odlCounter-s").set(seconds);
}