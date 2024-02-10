console.log("first");
(function ($) { // Pass the jQuery object as a parameter
    // Ensure the Customizer object is available
    wp.customize('your_name_setting', function (value) {
        value.bind(function (newVal) {
            // Replace '#your_name' with the actual selector of the element
            console.log("new value: " + newVal);
            $('#your_name').html(newVal); // Update the element with the new value
        });
    });
})(jQuery); // Pass jQuery as an argument to the anonymous function
