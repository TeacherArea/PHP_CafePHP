<?php

    // REQUIRED
    // Set your default time zone (listed here: http://php.net/manual/en/timezones.php)
    date_default_timezone_set('Europe/Copenhagen');
    // Include the store hours class
    require __DIR__ . '/StoreHours.class.php';

    // REQUIRED
    // Define daily open hours
    // Must be in 24-hour format, separated by dash
    // If closed for the day, leave blank (ex. sunday)
    // If open multiple times in one day, enter time ranges separated by a comma
    $hours = array(
        'mon' => array('10:00-23:00'),
        'tue' => array('10:00-23:00'),
        'wed' => array('10:00-23:00'),
        'thu' => array('10:00-23:00'),
        'fri' => array('10:00-23:00'),
        'sat' => array('14:00-02:00'),
        'sun' => array('00:00-02:00')
    );

    // OPTIONAL
    // Add exceptions (great for holidays etc.)
    // MUST be in a format month/day[/year] or [year-]month-day
    // Do not include the year if the exception repeats annually
    $exceptions = array(
        '2/24'  => array('11:00-18:00'),
        '10/18' => array('11:00-16:00', '18:00-20:30')
    );

    $config = array(
        'separator'      => ' - ',
        'join'           => ' and ',
        'format'         => 'g:ia',
        'overview_weekdays'  => array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun')
    );

    // Instantiate class
    $store_hours = new StoreHours($hours, $exceptions, $config);
    
    // Display open / closed message
    if($store_hours->is_open()) {
        echo "... and yes, we're open! Today's hours are " . $store_hours->hours_today();
    } else {
        echo "Sorry, but we're closed. Today's hours are " . $store_hours->hours_today();
    }